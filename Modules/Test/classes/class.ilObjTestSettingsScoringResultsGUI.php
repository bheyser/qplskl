<?php
/* Copyright (c) 1998-2013 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * GUI class that manages the editing of general test settings/properties
 * shown on "general" subtab
 *
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 *
 * @package		Modules/Test
 * 
 * @ilCtrl_Calls ilObjTestSettingsScoringResultsGUI: ilPropertyFormGUI, ilConfirmationGUI
 */
class ilObjTestSettingsScoringResultsGUI
{
	/**
	 * command constants
	 */
	const CMD_SHOW_FORM					= 'showForm';
	const CMD_SAVE_FORM					= 'saveForm';
	const CMD_CONFIRMED_SAVE_FORM		= 'confirmedSaveForm';

	/** @var ilCtrl $ctrl */
	protected $ctrl = null;
	
	/** @var ilAccess $access */
	protected $access = null;
	
	/** @var ilLanguage $lng */
	protected $lng = null;
	
	/** @var ilTemplate $tpl */
	protected $tpl = null;
	
	/** @var ilTree $tree */
	protected $tree = null;
	
	/** @var ilDB $db */
	protected $db = null;

	/** @var ilPluginAdmin $pluginAdmin */
	protected $pluginAdmin = null;

	/** @var ilObjTest $testOBJ */
	protected $testOBJ = null;

	/** @var ilObjTestGUI $testGUI */
	protected $testGUI = null;
	
	/** @var ilTestQuestionSetConfigFactory $testQuestionSetConfigFactory Factory for question set config. */
	private $testQuestionSetConfigFactory = null;

	/**
	 * object instance for currently active settings template
	 *
	 * @var $settingsTemplate ilSettingsTemplate 
	 */
	protected $settingsTemplate = null;

	/**
	 * Constructor 
	 * 
	 * @param ilCtrl          $ctrl
	 * @param ilAccessHandler $access
	 * @param ilLanguage      $lng
	 * @param ilTemplate      $tpl
	 * @param ilDB            $db
	 * @param ilObjTestGUI    $testGUI
	 * 
	 * @return \ilObjTestSettingsGeneralGUI
	 */
	public function __construct(
		ilCtrl $ctrl, 
		ilAccessHandler $access, 
		ilLanguage $lng, 
		ilTemplate $tpl, 
		ilTree $tree,
		ilDB $db,
		ilPluginAdmin $pluginAdmin,
		ilObjTestGUI $testGUI
	)
	{
		$this->ctrl = $ctrl;
		$this->access = $access;
		$this->lng = $lng;
		$this->tpl = $tpl;
		$this->tree = $tree;
		$this->db = $db;
		$this->pluginAdmin = $pluginAdmin;

		$this->testGUI = $testGUI;
		$this->testOBJ = $testGUI->object;

		require_once 'Modules/Test/classes/class.ilTestQuestionSetConfigFactory.php';
		$this->testQuestionSetConfigFactory = new ilTestQuestionSetConfigFactory($this->tree, $this->db, $this->pluginAdmin, $this->testOBJ);
		
		$templateId = $this->testOBJ->getTemplate();

		if( $templateId )
		{
			include_once "Services/Administration/classes/class.ilSettingsTemplate.php";
			$this->settingsTemplate = new ilSettingsTemplate($templateId, ilObjAssessmentFolderGUI::getSettingsTemplateConfig());
		}
	}

	/**
	 * Command Execution
	 */
	public function executeCommand()
	{
		// allow only write access
		
		if (!$this->access->checkAccess('write', '', $this->testGUI->ref_id))
		{
			ilUtil::sendInfo($this->lng->txt('cannot_edit_test'), true);
			$this->ctrl->redirect($this->testGUI, 'infoScreen');
		}
		
		// process command
		
		$nextClass = $this->ctrl->getNextClass();
		
		switch($nextClass)
		{
			default:
				$cmd = $this->ctrl->getCmd(self::CMD_SHOW_FORM).'Cmd';
				$this->$cmd();
		}
	}

	private function showFormCmd(ilPropertyFormGUI $form = null)
	{
		//$this->tpl->addJavascript("./Services/JavaScript/js/Basic.js");
		
		if( $form === null )
		{
			$form = $this->buildForm();
		}

		$this->tpl->setContent( $this->ctrl->getHTML($form) );
	}

	private function confirmedSaveFormCmd()
	{
		return $this->saveFormCmd(true);
	}
	
	private function saveFormCmd($isConfirmedSave = false)
	{
		$form = $this->buildForm();
		
		// form validation and initialisation
		
		$errors = !$form->checkInput(); // ALWAYS CALL BEFORE setValuesByPost()
		$form->setValuesByPost(); // NEVER CALL THIS BEFORE checkInput()

		// return to form when any form validation errors exist

		if($errors)
		{
			ilUtil::sendFailure($this->lng->txt('form_input_not_valid'));
			return $this->showFormCmd($form);
		}

		// check for required confirmation and redirect if neccessary

		if( !$isConfirmedSave && $this->isScoreRecalculationRequired($form) )
		{
			return $this->showConfirmation($form);
		}

		// perform save

		$this->performSaveForm($form);

		if( $this->isScoreRecalculationRequired($form) )
		{
			$this->testOBJ->recalculateScores();
		}

		// redirect to form output

		ilUtil::sendSuccess($this->lng->txt("msg_obj_modified"), true);
		$this->ctrl->redirect($this, self::CMD_SHOW_FORM);
	}

	private function performSaveForm(ilPropertyFormGUI $form)
	{
		if( $this->areScoringSettingsWritable() )
		{
			if( !$this->isHiddenFormItem('count_system') )
			{
				$this->testOBJ->setCountSystem($form->getItemByPostVar('count_system')->getValue());
			}
			if( !$this->isHiddenFormItem('mc_scoring') )
			{
				$this->testOBJ->setMCScoring($form->getItemByPostVar('mc_scoring')->getValue());
			}
			if( !$this->isHiddenFormItem('score_cutting') )
			{
				$this->testOBJ->setScoreCutting($form->getItemByPostVar('score_cutting')->getValue());
			}
			if( !$this->isHiddenFormItem('pass_scoring') )
			{
				$this->testOBJ->setPassScoring($form->getItemByPostVar('pass_scoring')->getValue());
			}
		}
		
		if( !$this->isHiddenFormItem('results_access_enabled') )
		{
			if( $form->getItemByPostVar('results_access_enabled')->getChecked() )
			{
				$this->testOBJ->setScoreReporting($form->getItemByPostVar('results_access_setting')->getValue());

				if( $this->testOBJ->getScoreReporting() == REPORT_AFTER_DATE )
				{
					$this->testOBJ->setReportingDate(
						$form->getItemByPostVar('reporting_date')->getDate()->get(IL_CAL_FKT_DATE, 'YmdHis')
					);
				}
				else
				{
					$this->testOBJ->setReportingDate('');
				}
				
				$this->testOBJ->setShowPassDetails($form->getItemByPostVar('pass_details')->getChecked());
			}
			else
			{
				$this->testOBJ->setScoreReporting(4); // never
				$this->testOBJ->setShowPassDetails(false);
				$this->testOBJ->setReportingDate('');
			}
		}

		if( !$this->isHiddenFormItem('show_result_grading') )
		{
			$this->testOBJ->setShowGradingStatusEnabled(
				$form->getItemByPostVar('grading_status')->getChecked()
			);
			$this->testOBJ->setShowGradingMarkEnabled(
				(int)$form->getItemByPostVar('grading_mark')->getChecked()
			);
		}

		if( !$this->isHiddenFormItem('solution_details') )
		{
			if( $form->getItemByPostVar('solution_details')->getChecked() )
			{
				$this->testOBJ->setShowSolutionDetails(1);
				$this->testOBJ->setPrintBestSolutionWithResult(
					(int)$form->getItemByPostVar('print_bs_with_res')->getChecked()
				);
			}
			else
			{
				$this->testOBJ->setShowSolutionDetails(0);
				$this->testOBJ->setPrintBestSolutionWithResult(0);
			}
		}
		
		if( !$this->isHiddenFormItem('solution_printview') )
		{
			if( $form->getItemByPostVar('solution_printview')->getChecked() )
			{
				$this->testOBJ->setShowSolutionPrintview(1);
				$this->testOBJ->setShowSolutionListComparison(
					(bool)$form->getItemByPostVar('solution_compare')->getChecked()
				);
				$this->testOBJ->setShowSolutionAnswersOnly(
					(int)$form->getItemByPostVar('solution_answers_only')->getChecked()
				);
			}
			else
			{
				$this->testOBJ->setShowSolutionPrintview(0);
				$this->testOBJ->setShowSolutionListComparison(false);
				$this->testOBJ->setShowSolutionAnswersOnly(0);
			}
		}

		if( !$this->isHiddenFormItem('solution_feedback') )
		{
			$this->testOBJ->setShowSolutionFeedback($form->getItemByPostVar('solution_feedback')->getChecked());
		}

		if( !$this->isHiddenFormItem('solution_signature') )
		{
			$this->testOBJ->setShowSolutionSignature($form->getItemByPostVar('solution_signature')->getChecked());
		}

		if( !$this->isHiddenFormItem('examid_in_test_res') )
		{
			$this->testOBJ->setShowExamIdInTestResultsEnabled($form->getItemByPostVar('examid_in_test_res')->getChecked());
		}
		
		if( !$this->isHiddenFormItem('solution_suggested') )
		{
			$this->testOBJ->setShowSolutionSuggested($form->getItemByPostVar('solution_suggested')->getChecked());
		}

		if( !$this->isHiddenFormItem('exp_sc_short') )
		{
			$this->testOBJ->setExportSettingsSingleChoiceShort( (int)$form->getItemByPostVar('exp_sc_short')->getChecked() );
		}

		if( !$this->isHiddenFormItem('pass_deletion_allowed') )
		{
			$this->testOBJ->setPassDeletionAllowed( (bool)$form->getItemByPostVar('pass_deletion_allowed')->getValue() );
		}

		// result filter taxonomies
		if( $this->testQuestionSetConfigFactory->getQuestionSetConfig()->isResultTaxonomyFilterSupported() )
		{
			if( !$this->isHiddenFormItem('results_tax_filters') && count($this->getAvailableTaxonomyIds()) )
			{
				$this->testOBJ->setResultFilterTaxIds( array_intersect(
					$this->getAvailableTaxonomyIds(), $form->getItemByPostVar('results_tax_filters')->getValue()
				));
			}
		}

		if( !$this->isHiddenFormItem('anonymity') )
		{
			// anonymity setting
			$this->testOBJ->setAnonymity($form->getItemByPostVar('anonymity')->getValue());
		}

		if( !$this->isHiddenFormItem('enable_archiving') )
		{
			// Archiving
			if($this->testOBJ->getAnonymity() == true && 
				$form->getItemByPostVar('enable_archiving')->getChecked() == true)
			{
				$this->testOBJ->setEnableArchiving(false);
				ilUtil::sendInfo($this->lng->txt('no_archive_on_anonymous'), true);
			} 
			else 
			{
				$this->testOBJ->setEnableArchiving($form->getItemByPostVar('enable_archiving')->getChecked());
			}
		}

		if( !$this->isHiddenFormItem('highscore_enabled') )
		{
			// highscore settings
			$this->testOBJ->setHighscoreEnabled((bool) $form->getItemByPostVar('highscore_enabled')->getChecked());
			$this->testOBJ->setHighscoreAnon((bool) $form->getItemByPostVar('highscore_anon')->getChecked());
			$this->testOBJ->setHighscoreAchievedTS((bool) $form->getItemByPostVar('highscore_achieved_ts')->getChecked());
			$this->testOBJ->setHighscoreScore((bool) $form->getItemByPostVar('highscore_score')->getChecked());
			$this->testOBJ->setHighscorePercentage((bool) $form->getItemByPostVar('highscore_percentage')->getChecked());
			$this->testOBJ->setHighscoreHints((bool) $form->getItemByPostVar('highscore_hints')->getChecked());
			$this->testOBJ->setHighscoreWTime((bool) $form->getItemByPostVar('highscore_wtime')->getChecked());
			$this->testOBJ->setHighscoreMode((int) $form->getItemByPostVar('highscore_mode')->getValue());
			$this->testOBJ->setHighscoreTopNum((int) $form->getItemByPostVar('highscore_top_num')->getValue());
		}

		// store settings to db
		$this->testOBJ->saveToDb(true);
	}
	
	private function showConfirmation(ilPropertyFormGUI $form)
	{
		require_once 'Services/Utilities/classes/class.ilConfirmationGUI.php';
		$confirmation = new ilConfirmationGUI();
		
		$confirmation->setHeaderText($this->lng->txt('tst_trigger_result_refreshing'));
		
		$confirmation->setFormAction( $this->ctrl->getFormAction($this) );
		$confirmation->setCancel($this->lng->txt('cancel'), self::CMD_SHOW_FORM);
		$confirmation->setConfirm($this->lng->txt('confirm'), self::CMD_CONFIRMED_SAVE_FORM);

		foreach ($form->getInputItemsRecursive() as $key => $item)
		{
			//vd("$key // {$item->getType()} // ".json_encode($_POST[$item->getPostVar()]));

			switch( $item->getType() )
			{
				case 'section_header':
					
					continue;
					
				case 'datetime':
					
					list($date, $time) = explode(' ', $item->getDate()->get(IL_CAL_DATETIME));

					if( $item->getMode() == ilDateTimeInputGUI::MODE_SELECT )
					{
						list($y, $m, $d) = explode('-', $date);

						$confirmation->addHiddenItem("{$item->getPostVar()}[date][y]", $y);
						$confirmation->addHiddenItem("{$item->getPostVar()}[date][m]", $m);
						$confirmation->addHiddenItem("{$item->getPostVar()}[date][d]", $d);

						if( $item->getShowTime() )
						{
							list($h, $m, $s) = explode(':', $time);

							$confirmation->addHiddenItem("{$item->getPostVar()}[time][h]", $h);
							$confirmation->addHiddenItem("{$item->getPostVar()}[time][m]", $m);
							$confirmation->addHiddenItem("{$item->getPostVar()}[time][s]", $s);
						}
					}
					else
					{
						$confirmation->addHiddenItem("{$item->getPostVar()}[date]", $date);
						$confirmation->addHiddenItem("{$item->getPostVar()}[time]", $time);
					}

					break;
					
				case 'duration':
					
					$confirmation->addHiddenItem("{$item->getPostVar()}[MM]", (int)$item->getMonths());
					$confirmation->addHiddenItem("{$item->getPostVar()}[dd]", (int)$item->getDays());
					$confirmation->addHiddenItem("{$item->getPostVar()}[hh]", (int)$item->getHours());
					$confirmation->addHiddenItem("{$item->getPostVar()}[mm]", (int)$item->getMinutes());
					$confirmation->addHiddenItem("{$item->getPostVar()}[ss]", (int)$item->getSeconds());
					
					break;

				case 'checkboxgroup':
					
					if( is_array($item->getValue()) )
					{
						foreach( $item->getValue() as $option )
						{
							$confirmation->addHiddenItem("{$item->getPostVar()}[]", $option);
						}
					}
					
					break;
					
				case 'checkbox':
					
					if( $item->getChecked() )
					{
						$confirmation->addHiddenItem($item->getPostVar(), 1);
					}
					
					break;
				
				default:
					
					$confirmation->addHiddenItem($item->getPostVar(), $item->getValue());
			}
		}
		
		$this->tpl->setContent( $this->ctrl->getHTML($confirmation) );
	}
	
	private function buildForm()
	{
		include_once 'Services/Form/classes/class.ilPropertyFormGUI.php';
		$form = new ilPropertyFormGUI();
		$form->setFormAction($this->ctrl->getFormAction($this));
		$form->setTableWidth('100%');
		$form->setId('test_scoring_results');

		$this->addScoringSettingsFormSection($form);
		$this->addResultSettingsFormSection($form);
		$this->addResultDetailsSettingsFormSection($form);
		$this->addMiscSettingsFormSection($form);

		// remove items when using template
		if($this->settingsTemplate)
		{
			foreach($this->settingsTemplate->getSettings() as $id => $item)
			{
				if($item["hide"])
				{
					$form->removeItemByPostVar($id);
				}
			}
		}

		$form->addCommandButton(self::CMD_SAVE_FORM, $this->lng->txt('save'));

		return $form;
	}

	private function addScoringSettingsFormSection(ilPropertyFormGUI $form)
	{
		// scoring settings
		$header = new ilFormSectionHeaderGUI();
		$header->setTitle($this->lng->txt('test_scoring'));
		$form->addItem($header);

		// scoring system
		$count_system = new ilRadioGroupInputGUI($this->lng->txt('tst_text_count_system'), 'count_system');
		$count_system->addOption($opt = new ilRadioOption($this->lng->txt('tst_count_partial_solutions'), 0, ''));
		$opt->setInfo($this->lng->txt('tst_count_partial_solutions_desc'));
		$count_system->addOption($opt = new ilRadioOption($this->lng->txt('tst_count_correct_solutions'), 1, ''));
		$opt->setInfo($this->lng->txt('tst_count_correct_solutions_desc'));
		$count_system->setValue($this->testOBJ->getCountSystem());
		$form->addItem($count_system);

		// mc questions
		$mc_scoring = new ilRadioGroupInputGUI($this->lng->txt('tst_score_mcmr_questions'), 'mc_scoring');
		$mc_scoring->addOption($opt = new ilRadioOption($this->lng->txt('tst_score_mcmr_zero_points_when_unanswered'), 0, ''));
		$opt->setInfo($this->lng->txt('tst_score_mcmr_zero_points_when_unanswered_desc'));
		$mc_scoring->addOption($opt = new ilRadioOption($this->lng->txt('tst_score_mcmr_use_scoring_system'), 1, ''));
		$opt->setInfo($this->lng->txt('tst_score_mcmr_use_scoring_system_desc'));
		$mc_scoring->setValue($this->testOBJ->getMCScoring());
		$form->addItem($mc_scoring);

		// score cutting
		$score_cutting = new ilRadioGroupInputGUI($this->lng->txt('tst_score_cutting'), 'score_cutting');
		$score_cutting->addOption($opt = new ilRadioOption($this->lng->txt('tst_score_cut_question'), 0, ''));
		$opt->setInfo($this->lng->txt('tst_score_cut_question_desc'));
		$score_cutting->addOption($opt = new ilRadioOption($this->lng->txt('tst_score_cut_test'), 1, ''));
		$opt->setInfo($this->lng->txt('tst_score_cut_test_desc'));
		$score_cutting->setValue($this->testOBJ->getScoreCutting());
		$form->addItem($score_cutting);

		// pass scoring
		$pass_scoring = new ilRadioGroupInputGUI($this->lng->txt('tst_pass_scoring'), 'pass_scoring');
		$pass_scoring->addOption($opt = new ilRadioOption($this->lng->txt('tst_pass_last_pass'), 0, ''));
		$opt->setInfo($this->lng->txt('tst_pass_last_pass_desc'));
		$pass_scoring->addOption($opt = new ilRadioOption($this->lng->txt('tst_pass_best_pass'), 1, ''));
		$opt->setInfo($this->lng->txt('tst_pass_best_pass_desc'));
		$pass_scoring->setValue($this->testOBJ->getPassScoring());
		$form->addItem($pass_scoring);

		// deletion of test results
		$passDeletion = new ilRadioGroupInputGUI($this->lng->txt('tst_pass_deletion'), 'pass_deletion_allowed');
		$passDeletion->addOption(new ilRadioOption($this->lng->txt('tst_pass_deletion_not_allowed'), 0, ''));
		$passDeletion->addOption(new ilRadioOption($this->lng->txt('tst_pass_deletion_allowed'), 1, ''));
		$passDeletion->setValue($this->testOBJ->isPassDeletionAllowed());
		$form->addItem($passDeletion);

		// disable scoring settings
		if( !$this->areScoringSettingsWritable() )
		{
			$count_system->setDisabled(true);
			$mc_scoring->setDisabled(true);
			$score_cutting->setDisabled(true);
			$pass_scoring->setDisabled(true);
		}
	}

	private function addResultSettingsFormSection(ilPropertyFormGUI $form)
	{
		// HEADER: result settings
		$header_tr = new ilFormSectionHeaderGUI();
		$header_tr->setTitle($this->lng->txt('test_results'));
		$form->addItem($header_tr);

		// access to test results
		$resultsAccessEnabled = new ilCheckboxInputGUI($this->lng->txt('tst_results_access_enabled'), 'results_access_enabled');
		$resultsAccessEnabled->setInfo($this->lng->txt('tst_results_access_enabled_desc'));
		$resultsAccessEnabled->setChecked($this->testOBJ->isScoreReportingEnabled());
			$resultsAccessSetting = new ilRadioGroupInputGUI($this->lng->txt('tst_results_access_setting'), 'results_access_setting');
			$resultsAccessSetting->setRequired(true);
			$optAlways = new ilRadioOption($this->lng->txt('tst_results_access_always'), 2, '');
			$optAlways->setInfo($this->lng->txt('tst_results_access_always_desc'));
			$resultsAccessSetting->addOption($optAlways);
			$optFinished = $opt = new ilRadioOption($this->lng->txt('tst_results_access_finished'), 1, '');
			$optFinished->setInfo($this->lng->txt('tst_results_access_finished_desc'));
			$resultsAccessSetting->addOption($optFinished);
			$optionDate = new ilRadioOption($this->lng->txt('tst_results_access_date'), 3, '');
			$optionDate->setInfo($this->lng->txt('tst_results_access_date_desc'));
				// access date
				$reportingDate = new ilDateTimeInputGUI($this->lng->txt('tst_reporting_date'), 'reporting_date');
				$reportingDate->setShowTime(true);
				if (strlen($this->testOBJ->getReportingDate()))
				{
					$reportingDate->setDate(new ilDateTime($this->testOBJ->getReportingDate(), IL_CAL_TIMESTAMP));
				}
				else
				{
					$reportingDate->setDate(new ilDateTime(time(), IL_CAL_UNIX));
				}
				$optionDate->addSubItem($reportingDate);
			$resultsAccessSetting->addOption($optionDate);
			$resultsAccessValue = $this->testOBJ->getScoreReporting();
			$resultsAccessSetting->setValue(
				$resultsAccessValue > 0 && $resultsAccessValue < 4 ? $resultsAccessValue : 2
			);
			$resultsAccessEnabled->addSubItem($resultsAccessSetting);
			// show pass details
			$showPassDetails = new ilCheckboxInputGUI($this->lng->txt('tst_show_pass_details'), 'pass_details');
			$showPassDetails->setInfo($this->lng->txt('tst_show_pass_details_desc'));
			$showPassDetails->setChecked($this->testOBJ->getShowPassDetails());
			$resultsAccessEnabled->addSubItem($showPassDetails);
		$form->addItem($resultsAccessEnabled);

		// grading
		$chb_only_passed_failed = new ilCheckboxInputGUI($this->lng->txt('tst_results_grading_opt_show_status'), 'grading_status');
		$chb_only_passed_failed->setInfo($this->lng->txt('tst_results_grading_opt_show_status_desc'));
		$chb_only_passed_failed->setValue(1);
		$chb_only_passed_failed->setChecked($this->testOBJ->isShowGradingStatusEnabled());
		$form->addItem($chb_only_passed_failed);

		$chb_resulting_mark_only = new ilCheckboxInputGUI($this->lng->txt('tst_results_grading_opt_show_mark'), 'grading_mark');
		$chb_resulting_mark_only->setInfo($this->lng->txt('tst_results_grading_opt_show_mark_desc'));
		$chb_resulting_mark_only->setValue(1);
		$chb_resulting_mark_only->setChecked($this->testOBJ->isShowGradingMarkEnabled());
		$form->addItem($chb_resulting_mark_only);
	}

	private function addResultDetailsSettingsFormSection(ilPropertyFormGUI $form)
	{
		// HEADER: result settings
		$header_tr = new ilFormSectionHeaderGUI();
		$header_tr->setTitle($this->lng->txt('tst_results_details_options'));
		$form->addItem($header_tr);

		// show solution details
		$showSolutionDetails = new ilCheckboxInputGUI($this->lng->txt('tst_show_solution_details'), 'solution_details');
		$showSolutionDetails->setInfo($this->lng->txt('tst_show_solution_details_desc'));
		$showSolutionDetails->setChecked($this->testOBJ->getShowSolutionDetails());
		$form->addItem($showSolutionDetails);
	
			// best solution in test results
			$results_print_best_solution = new ilCheckboxInputGUI($this->lng->txt('tst_results_print_best_solution'), 'print_bs_with_res');
			$results_print_best_solution->setInfo($this->lng->txt('tst_results_print_best_solution_info'));
			$results_print_best_solution->setChecked((bool) $this->testOBJ->isBestSolutionPrintedWithResult());
			$showSolutionDetails->addSubItem($results_print_best_solution);

		// show solution feedback ==> solution feedback in test results
		$showSolutionFeedbackOption = new ilCheckboxInputGUI($this->lng->txt('tst_show_solution_feedback'), 'solution_feedback');
		$showSolutionFeedbackOption->setInfo($this->lng->txt('tst_show_solution_feedback_desc'));
		$showSolutionFeedbackOption->setChecked($this->testOBJ->getShowSolutionFeedback());
		$form->addItem($showSolutionFeedbackOption);

		// show suggested solution
		$showSuggestedSolutionOption = new ilCheckboxInputGUI($this->lng->txt('tst_show_solution_suggested'), 'solution_suggested');
		$showSuggestedSolutionOption->setInfo($this->lng->txt('tst_show_solution_suggested_desc'));
		$showSuggestedSolutionOption->setChecked($this->testOBJ->getShowSolutionSuggested());
		$form->addItem($showSuggestedSolutionOption);

		// show solution printview ==> list of answers
		$showSolutionPrintview = new ilCheckboxInputGUI($this->lng->txt('tst_show_solution_printview'), 'solution_printview');
		$showSolutionPrintview->setInfo($this->lng->txt('tst_show_solution_printview_desc'));
		$showSolutionPrintview->setChecked($this->testOBJ->getShowSolutionPrintview());
		$form->addItem($showSolutionPrintview);

			// show best solution in list of answers
			$solutionCompareInput = new ilCheckboxInputGUI($this->lng->txt('tst_show_solution_compare'), 'solution_compare');
			$solutionCompareInput->setChecked($this->testOBJ->getShowSolutionListComparison());
			$showSolutionPrintview->addSubItem($solutionCompareInput);
	
			// solution answers only ==> printview of results (answers only)
			$solutionAnswersOnly = new ilCheckboxInputGUI($this->lng->txt('tst_show_solution_answers_only'), 'solution_answers_only');
			$solutionAnswersOnly->setInfo($this->lng->txt('tst_show_solution_answers_only_desc'));
			$solutionAnswersOnly->setChecked($this->testOBJ->getShowSolutionAnswersOnly());
			$showSolutionPrintview->addSubItem($solutionAnswersOnly);

		// high score
		$highscore = new ilCheckboxInputGUI($this->lng->txt("tst_highscore_enabled"), "highscore_enabled");
		$highscore->setValue(1);
		$highscore->setChecked($this->testOBJ->getHighscoreEnabled());
		$highscore->setInfo($this->lng->txt("tst_highscore_description"));
		$form->addItem($highscore);
		$highscore_tables = new ilRadioGroupInputGUI($this->lng->txt('tst_highscore_mode'), 'highscore_mode');
		$highscore_tables->setRequired(true);
		$highscore_tables->setValue($this->testOBJ->getHighscoreMode());
		$highscore_table_own = new ilRadioOption($this->lng->txt('tst_highscore_own_table'), ilObjTest::HIGHSCORE_SHOW_OWN_TABLE);
		$highscore_table_own->setInfo($this->lng->txt('tst_highscore_own_table_description'));
		$highscore_tables->addOption($highscore_table_own);
		$highscore_table_other = new ilRadioOption($this->lng->txt('tst_highscore_top_table'), ilObjTest::HIGHSCORE_SHOW_TOP_TABLE);
		$highscore_table_other->setInfo($this->lng->txt('tst_highscore_top_table_description'));
		$highscore_tables->addOption($highscore_table_other);
		$highscore_table_other = new ilRadioOption($this->lng->txt('tst_highscore_all_tables'), ilObjTest::HIGHSCORE_SHOW_ALL_TABLES);
		$highscore_table_other->setInfo($this->lng->txt('tst_highscore_all_tables_description'));
		$highscore_tables->addOption($highscore_table_other);
		$highscore->addSubItem($highscore_tables);
		$highscore_top_num = new ilNumberInputGUI($this->lng->txt("tst_highscore_top_num"), "highscore_top_num");
		$highscore_top_num->setSize(4);
		$highscore_top_num->setRequired(true);
		$highscore_top_num->setMinValue(1);
		$highscore_top_num->setSuffix($this->lng->txt("tst_highscore_top_num_unit"));
		$highscore_top_num->setValue($this->testOBJ->getHighscoreTopNum(null));
		$highscore_top_num->setInfo($this->lng->txt("tst_highscore_top_num_description"));
		$highscore->addSubItem($highscore_top_num);
		$highscore_anon = new ilCheckboxInputGUI($this->lng->txt("tst_highscore_anon"), "highscore_anon");
		$highscore_anon->setValue(1);
		$highscore_anon->setChecked($this->testOBJ->getHighscoreAnon());
		$highscore_anon->setInfo($this->lng->txt("tst_highscore_anon_description"));
		$highscore->addSubItem($highscore_anon);
		$highscore_achieved_ts = new ilCheckboxInputGUI($this->lng->txt("tst_highscore_achieved_ts"), "highscore_achieved_ts");
		$highscore_achieved_ts->setValue(1);
		$highscore_achieved_ts->setChecked($this->testOBJ->getHighscoreAchievedTS());
		$highscore_achieved_ts->setInfo($this->lng->txt("tst_highscore_achieved_ts_description"));
		$highscore->addSubItem($highscore_achieved_ts);
		$highscore_score = new ilCheckboxInputGUI($this->lng->txt("tst_highscore_score"), "highscore_score");
		$highscore_score->setValue(1);
		$highscore_score->setChecked($this->testOBJ->getHighscoreScore());
		$highscore_score->setInfo($this->lng->txt("tst_highscore_score_description"));
		$highscore->addSubItem($highscore_score);
		$highscore_percentage = new ilCheckboxInputGUI($this->lng->txt("tst_highscore_percentage"), "highscore_percentage");
		$highscore_percentage->setValue(1);
		$highscore_percentage->setChecked($this->testOBJ->getHighscorePercentage());
		$highscore_percentage->setInfo($this->lng->txt("tst_highscore_percentage_description"));
		$highscore->addSubItem($highscore_percentage);
		$highscore_hints = new ilCheckboxInputGUI($this->lng->txt("tst_highscore_hints"), "highscore_hints");
		$highscore_hints->setValue(1);
		$highscore_hints->setChecked($this->testOBJ->getHighscoreHints());
		$highscore_hints->setInfo($this->lng->txt("tst_highscore_hints_description"));
		$highscore->addSubItem($highscore_hints);
		$highscore_wtime = new ilCheckboxInputGUI($this->lng->txt("tst_highscore_wtime"), "highscore_wtime");
		$highscore_wtime->setValue(1);
		$highscore_wtime->setChecked($this->testOBJ->getHighscoreWTime());
		$highscore_wtime->setInfo($this->lng->txt("tst_highscore_wtime_description"));
		$highscore->addSubItem($highscore_wtime);

		// show signature placeholder
		$showSignaturePlaceholder = new ilCheckboxInputGUI($this->lng->txt('tst_show_solution_signature'), 'solution_signature');
		$showSignaturePlaceholder->setInfo($this->lng->txt('tst_show_solution_signature_desc'));
		$showSignaturePlaceholder->setChecked($this->testOBJ->getShowSolutionSignature());
		if( $this->testOBJ->getAnonymity() ) { $showSignaturePlaceholder->setDisabled(true); }
		$form->addItem($showSignaturePlaceholder);

		// show signature placeholder
		$showExamId = new ilCheckboxInputGUI($this->lng->txt('examid_in_test_res'), 'examid_in_test_res');
		$showExamId->setInfo($this->lng->txt('examid_in_test_res_desc'));
		$showExamId->setChecked($this->testOBJ->isShowExamIdInTestResultsEnabled());
		$form->addItem($showExamId);
		
		// export settings
		$export_settings = new ilCheckboxInputGUI($this->lng->txt('tst_exp_sc_short'), 'exp_sc_short');
		$export_settings->setInfo($this->lng->txt('tst_exp_sc_short_desc'));
		$export_settings->setChecked($this->testOBJ->getExportSettingsSingleChoiceShort());
		$form->addItem($export_settings);
	}

	private function addMiscSettingsFormSection(ilPropertyFormGUI $form)
	{
		// misc settings
		$header_misc = new ilFormSectionHeaderGUI();
		$header_misc->setTitle($this->lng->txt('misc'));
		$form->addItem($header_misc);

		// result filter taxonomies
		if( $this->testQuestionSetConfigFactory->getQuestionSetConfig()->isResultTaxonomyFilterSupported() )
		{
			$availableTaxonomyIds = $this->getAvailableTaxonomyIds();

			if( count($availableTaxonomyIds) )
			{
				require_once 'Modules/Test/classes/class.ilTestTaxonomyFilterLabelTranslater.php';
				$labelTranslater = new ilTestTaxonomyFilterLabelTranslater($this->db);
				$labelTranslater->loadLabelsFromTaxonomyIds($availableTaxonomyIds);

				$results_presentation = new ilCheckboxGroupInputGUI($this->lng->txt('tst_results_tax_filters'), 'results_tax_filters');

				foreach($availableTaxonomyIds as $taxonomyId)
				{
					$results_presentation->addOption(new ilCheckboxOption(
						$labelTranslater->getTaxonomyTreeLabel($taxonomyId), $taxonomyId, ''
					));
				}

				$results_presentation->setValue($this->testOBJ->getResultFilterTaxIds());

				$form->addItem($results_presentation);
			}
		}

		// anonymity
		$anonymity = new ilRadioGroupInputGUI($this->lng->txt('tst_anonymity'), 'anonymity');
		if ($this->testOBJ->participantDataExist()) $anonymity->setDisabled(true);
		$rb = new ilRadioOption($this->lng->txt('tst_anonymity_no_anonymization'), 0);
		$anonymity->addOption($rb);
		$rb = new ilRadioOption($this->lng->txt('tst_anonymity_anonymous_test'), 1);
		$anonymity->addOption($rb);
		$anonymity->setValue((int)$this->testOBJ->getAnonymity());
		$form->addItem($anonymity);

		// enable_archiving
		$enable_archiving = new ilCheckboxInputGUI($this->lng->txt('test_enable_archiving'), 'enable_archiving');
		$enable_archiving->setInfo($this->lng->txt('test_enable_archiving_desc'));
		$enable_archiving->setValue(1);
		$enable_archiving->setChecked($this->testOBJ->getEnableArchiving());
		$form->addItem($enable_archiving);
	}

	private function areScoringSettingsWritable()
	{
		if ( !$this->testOBJ->participantDataExist() )
		{
			return true;
		}

		if( !$this->testOBJ->isScoreReportingAvailable() )
		{
			return true;
		}

		return false;
	}

	private function isScoreRecalculationRequired(ilPropertyFormGUI $form)
	{
		if ( !$this->testOBJ->participantDataExist() )
		{
			return false;
		}

		if( !$this->areScoringSettingsWritable() )
		{
			return false;
		}

		if( !$this->hasScoringSettingsChanged($form) )
		{
			return false;
		}

		return true;
	}

	private function hasScoringSettingsChanged(ilPropertyFormGUI $form)
	{
		$countSystem = $form->getItemByPostVar('count_system');
		if( is_object($countSystem) && $countSystem->getValue() != $this->testOBJ->getCountSystem() )
		{
			return true;
		}

		$mcScoring = $form->getItemByPostVar('mc_scoring');
		if( is_object($mcScoring) && $mcScoring != $this->testOBJ->getMCScoring() )
		{
			return true;
		}

		$scoreCutting = $form->getItemByPostVar('score_cutting');
		if( is_object($scoreCutting) && $scoreCutting->getValue() != $this->testOBJ->getScoreCutting() )
		{
			return true;
		}

		$passScoring = $form->getItemByPostVar('pass_scoring');
		if( is_object($passScoring) && $passScoring->getValue() != $this->testOBJ->getPassScoring() )
		{
			return true;
		}

		return false;
	}

	protected function getTemplateSettingValue($settingName)
	{
		if( !$this->settingsTemplate )
		{
			return null;
		}

		$templateSettings = $this->settingsTemplate->getSettings();

		if( !isset($templateSettings[$settingName]) )
		{
			return false;
		}

		return $templateSettings[$settingName]['value'];
	}

	private $availableTaxonomyIds = null;

	private function getAvailableTaxonomyIds()
	{
		if( $this->getAvailableTaxonomyIds === null )
		{
			require_once 'Services/Taxonomy/classes/class.ilObjTaxonomy.php';
			$this->availableTaxonomyIds = (array)ilObjTaxonomy::getUsageOfObject($this->testOBJ->getId());
		}

		return $this->availableTaxonomyIds;
	}

	/**
	 * @param $showGradingStatusEnabled
	 * @param $showGradingMarkEnabled
	 * @return string
	 */
	private function getShowGradingFormFieldValue($showGradingStatusEnabled, $showGradingMarkEnabled)
	{
		if( $showGradingStatusEnabled && $showGradingMarkEnabled )
		{
			$formFieldValue = self::FORM_FIELD_VALUE_RESULTS_GRADING_SHOW_BOTH;
		}
		elseif( $showGradingStatusEnabled )
		{
			$formFieldValue = self::FORM_FIELD_VALUE_RESULTS_GRADING_SHOW_STATUS;
		}
		elseif( $showGradingMarkEnabled )
		{
			$formFieldValue = self::FORM_FIELD_VALUE_RESULTS_GRADING_SHOW_MARK;
		}
		else
		{
			$formFieldValue = self::FORM_FIELD_VALUE_RESULTS_GRADING_SHOW_NONE;
		}

		return $formFieldValue;
	}
	
	private function isHiddenFormItem($formFieldId)
	{
		if( !$this->settingsTemplate )
		{
			return false;
		}
		
		$settings = $this->settingsTemplate->getSettings();
		
		if( !isset($settings[$formFieldId]) )
		{
			return false;
		}
		
		if( !$settings[$formFieldId]['hide'] )
		{
			return false;
		}
		
		return true;
	}
}
