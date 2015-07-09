<?php
/* Copyright (c) 1998-2013 ILIAS open source, Extended GPL, see docs/LICENSE */


/**
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 *
 * @package     Modules/Test
 *
 * @ilCtrl_Calls ilAssQuestionSkillAssignmentsGUI: ilAssQuestionSkillAssignmentsTableGUI
 * @ilCtrl_Calls ilAssQuestionSkillAssignmentsGUI: ilSkillSelectorGUI
 * @ilCtrl_Calls ilAssQuestionSkillAssignmentsGUI: ilToolbarGUI
 * @ilCtrl_Calls ilAssQuestionSkillAssignmentsGUI: ilPropertyFormGUI
 * @ilCtrl_Calls ilAssQuestionSkillAssignmentsGUI: ilAssLacLegendGUI
 * @ilCtrl_Calls ilAssQuestionSkillAssignmentsGUI: ilAssQuestionPageGUI
 */
class ilAssQuestionSkillAssignmentsGUI
{
	const CMD_SHOW_SKILL_QUEST_ASSIGNS = 'showSkillQuestionAssignments';
	const CMD_SAVE_SKILL_POINTS = 'saveSkillPoints';
	const CMD_SHOW_SKILL_SELECT = 'showSkillSelection';
	const CMD_UPDATE_SKILL_QUEST_ASSIGNS = 'updateSkillQuestionAssignments';
	const CMD_SHOW_SKILL_QUEST_ASSIGN_PROPERTIES_FORM = 'showSkillQuestionAssignmentPropertiesForm';
	const CMD_SAVE_SKILL_QUEST_ASSIGN_PROPERTIES_FORM = 'saveSkillQuestionAssignmentPropertiesForm';
	
	const PARAM_SKILL_SELECTION = 'skill_ids';
	
	/**
	 * @var ilCtrl
	 */
	private $ctrl;

	/**
	 * @var ilTemplate
	 */
	private $tpl;

	/**
	 * @var ilLanguage
	 */
	private $lng;

	/**
	 * @var ilDB
	 */
	private $db;

	/**
	 * @var ilAssQuestionList
	 */
	private $questionList;

	/**
	 * @var integer
	 */
	private $parentObjId;

	/**
	 * @param ilCtrl $ctrl
	 * @param ilTemplate $tpl
	 * @param ilLanguage $lng
	 * @param ilDB $db
	 */
	public function __construct(ilCtrl $ctrl, ilTemplate $tpl, ilLanguage $lng, ilDB $db)
	{
		$this->ctrl = $ctrl;
		$this->tpl = $tpl;
		$this->lng = $lng;
		$this->db = $db;
	}

	/**
	 * @return ilAssQuestionList
	 */
	public function getQuestionList()
	{
		return $this->questionList;
	}

	/**
	 * @param ilAssQuestionList $questionList
	 */
	public function setQuestionList($questionList)
	{
		$this->questionList = $questionList;
	}

	/**
	 * @return int
	 */
	public function getParentObjId()
	{
		return $this->parentObjId;
	}

	/**
	 * @param int $parentObjId
	 */
	public function setParentObjId($parentObjId)
	{
		$this->parentObjId = $parentObjId;
	}

	public function executeCommand()
	{
		$nextClass = $this->ctrl->getNextClass();
		
		switch($nextClass)
		{
			case strtolower(__CLASS__):
			case '':
				
				$command = $this->ctrl->getCmd(self::CMD_SHOW_SKILL_QUEST_ASSIGNS) . 'Cmd';
				$this->$command();
				break;
				
			default:
				
				throw new ilTestQuestionPoolException('unsupported next class in ctrl flow');
		}
	}

	private function updateSkillQuestionAssignmentsCmd()
	{
		require_once 'Modules/TestQuestionPool/classes/class.ilAssQuestionSkillAssignmentList.php';
		
		$questionId = (int)$_GET['question_id'];

		if( $this->isTestQuestion($questionId) )
		{
			$assignmentList = new ilAssQuestionSkillAssignmentList($this->db);
			$assignmentList->setParentObjId($this->getParentObjId());
			$assignmentList->loadFromDb();

			$handledSkills = array();
			
			$skillIds = (array)$_POST['skill_ids'];
			
			foreach($skillIds as $skillId)
			{
				$skill = explode(':',$skillId);
				$skillBaseId = (int)$skill[0];
				$skillTrefId = (int)$skill[1];
				
				if( $skillBaseId )
				{
					if( !$assignmentList->isAssignedToQuestionId($skillBaseId, $skillTrefId, $questionId) )
					{
						$assignment = new ilAssQuestionSkillAssignment($this->db);

						$assignment->setParentObjId($this->getParentObjId());
						$assignment->setQuestionId($questionId);
						$assignment->setSkillBaseId($skillBaseId);
						$assignment->setSkillTrefId($skillTrefId);

						$assignment->setSkillPoints(ilAssQuestionSkillAssignment::DEFAULT_COMPETENCE_POINTS);
						$assignment->saveToDb();
					}
					
					$handledSkills[$skillId] = $skill;
				}
			}
			
			foreach($assignmentList->getAssignmentsByQuestionId($questionId) as $assignment)
			{
				if( isset($handledSkills["{$assignment->getSkillBaseId()}:{$assignment->getSkillTrefId()}"]) )
				{
					continue;
				}

				$assignment->deleteFromDb();
			}
		}

		$this->ctrl->redirect($this, self::CMD_SHOW_SKILL_QUEST_ASSIGNS);
	}

	private function showSkillSelectionCmd()
	{
		$this->ctrl->saveParameter($this, 'question_id');
		$questionId = (int)$_GET['question_id'];

		require_once 'Modules/TestQuestionPool/classes/class.ilAssQuestionSkillAssignmentList.php';
		$assignmentList = new ilAssQuestionSkillAssignmentList($this->db);
		$assignmentList->setParentObjId($this->getParentObjId());
		$assignmentList->loadFromDb();

		$skillSelectorExplorerGUI = $this->buildSkillSelectorExplorerGUI(
			$assignmentList->getAssignmentsByQuestionId($questionId)
		);

		if( !$skillSelectorExplorerGUI->handleCommand() )
		{
			$skillSelectorToolbarGUI = $this->buildSkillSelectorToolbarGUI();

			$skillSelectorToolbarGUI->setOpenFormTag(true);
			$skillSelectorToolbarGUI->setCloseFormTag(false);
			$skillSelectorToolbarGUI->setLeadingImage(ilUtil::getImagePath("arrow_upright.png"), " ");
			$html = $this->ctrl->getHTML($skillSelectorToolbarGUI);
			
			$html .= $this->ctrl->getHTML($skillSelectorExplorerGUI).'<br />';

			$skillSelectorToolbarGUI->setOpenFormTag(false);
			$skillSelectorToolbarGUI->setCloseFormTag(true);
			$skillSelectorToolbarGUI->setLeadingImage(ilUtil::getImagePath("arrow_downright.png"), " ");
			$html .= $this->ctrl->getHTML($skillSelectorToolbarGUI);
			
			$this->tpl->setContent($html);
		}
	}

	// perhaps we can keep?
	private function saveSkillPointsCmd()
	{
		if( is_array($_POST['quantifiers']) )
		{
			require_once 'Modules/TestQuestionPool/classes/class.ilAssQuestionSkillAssignment.php';

			$success = false;
			
			foreach($_POST['quantifiers'] as $assignmentKey => $quantifier)
			{
				$assignmentKey = explode(':',$assignmentKey);
				$skillBaseId = (int)$assignmentKey[0];
				$skillTrefId = (int)$assignmentKey[1];
				$questionId = (int)$assignmentKey[2];

				if( $this->isTestQuestion($questionId) && (int)$quantifier > 0 )
				{
					$assignment = new ilAssQuestionSkillAssignment($this->db);

					$assignment->setParentObjId($this->getParentObjId());
					$assignment->setQuestionId($questionId);
					$assignment->setSkillBaseId($skillBaseId);
					$assignment->setSkillTrefId($skillTrefId);

					if( $assignment->dbRecordExists() )
					{
						$assignment->setSkillPoints((int)$quantifier);
						$assignment->saveToDb();
					}
				}
			}
		}

		ilUtil::sendSuccess($this->lng->txt('tst_msg_skl_qst_assign_points_saved'), true);
		$this->ctrl->redirect($this, self::CMD_SHOW_SKILL_QUEST_ASSIGNS);
	}
	
	private function showSkillQuestionAssignmentPropertiesFormCmd(
		assQuestionGUI $questionGUI = null, ilAssQuestionSkillAssignment $assignment = null, ilPropertyFormGUI $form = null
	)
	{
		$this->ctrl->saveParameter($this, 'question_id');
		$this->ctrl->saveParameter($this, 'skill_base_id');
		$this->ctrl->saveParameter($this, 'skill_tref_id');
		
		if( $questionGUI === null )
		{
			require_once 'Modules/TestQuestionPool/classes/class.assQuestionGUI.php';
			$questionGUI = assQuestionGUI::_getQuestionGUI('', (int)$_GET['question_id']);
		}

		if( $assignment === null )
		{
			$assignment = $this->buildQuestionSkillAssignment(
				(int)$_GET['question_id'], (int)$_GET['skill_base_id'], (int)$_GET['skill_tref_id']
			);
		}
		
		if( $form === null )
		{
			$form = $this->buildSkillQuestionAssignmentPropertiesForm($questionGUI->object, $assignment);
		}

		$questionPageHTML = $this->buildQuestionPage($questionGUI);
		
		require_once 'Modules/TestQuestionPool/classes/questions/LogicalAnswerCompare/class.ilAssLacLegendGUI.php';
		$legend = new ilAssLacLegendGUI($this->lng, $this->tpl);
		$legend->setInitialVisibilityEnabled($assignment->hasEvalModeBySolution());

		$this->tpl->setContent( $this->ctrl->getHTML($form).'<br />'.$questionPageHTML.$this->ctrl->getHTML($legend) );
	}
	
	private function saveSkillQuestionAssignmentPropertiesFormCmd()
	{
		$this->ctrl->saveParameter($this, 'question_id');
		$this->ctrl->saveParameter($this, 'skill_base_id');
		$this->ctrl->saveParameter($this, 'skill_tref_id');

		require_once 'Modules/TestQuestionPool/classes/class.assQuestionGUI.php';
		$questionGUI = assQuestionGUI::_getQuestionGUI('', (int)$_GET['question_id']);

		$assignment = $this->buildQuestionSkillAssignment(
			(int)$_GET['question_id'], (int)$_GET['skill_base_id'], (int)$_GET['skill_tref_id']
		);

		$form = $this->buildSkillQuestionAssignmentPropertiesForm($questionGUI->object, $assignment);

		$form->setValuesByPost();
		
		if( !$form->checkInput() )
		{
			return $this->showSkillQuestionAssignmentPropertiesFormCmd($questionGUI, $assignment, $form);
		}
		
		$assignment->setEvalMode($form->getItemByPostVar('eval_mode')->getValue());
		
		if($assignment->hasEvalModeBySolution())
		{
			$solCmpExprInput = $form->getItemByPostVar('solution_compare_expressions');
			
			if( !$this->checkSolutionCompareExpressionInput($solCmpExprInput, $questionGUI->object) )
			{
				ilUtil::sendFailure($this->lng->txt("form_input_not_valid"));
				return $this->showSkillQuestionAssignmentPropertiesFormCmd($questionGUI, $assignment, $form);
			}

			$assignment->getSolutionComparisonExpressionList()->reset();
			
			foreach($solCmpExprInput->getValues() as $expression)
			{
				$assignment->getSolutionComparisonExpressionList()->add($expression);
			}
		}
		else
		{
			$assignment->setSkillPoints($form->getItemByPostVar('q_res_skill_points')->getValue());
		}
		
		$assignment->saveToDb();
		
		ilUtil::sendSuccess($this->lng->txt('qpl_qst_skl_assign_properties_modified'));
		$this->ctrl->redirect($this, self::CMD_SHOW_SKILL_QUEST_ASSIGNS);
	}
	
	private function buildSkillQuestionAssignmentPropertiesForm(assQuestion $question, ilAssQuestionSkillAssignment $assignment)
	{
		require_once 'Services/Form/classes/class.ilPropertyFormGUI.php';
		require_once 'Services/Form/classes/class.ilNonEditableValueGUI.php';
		require_once 'Services/Form/classes/class.ilRadioGroupInputGUI.php';
		
		require_once 'Modules/TestQuestionPool/classes/class.ilLogicalAnswerComparisonExpressionInputGUI.php';
		require_once 'Modules/TestQuestionPool/classes/class.ilAssQuestionSolutionComparisonExpressionList.php';
		
		$form = new ilPropertyFormGUI();

		$form->setFormAction($this->ctrl->getFormAction($this));
		$form->addCommandButton(self::CMD_SAVE_SKILL_QUEST_ASSIGN_PROPERTIES_FORM, $this->lng->txt('save'));
		$form->addCommandButton(self::CMD_SHOW_SKILL_QUEST_ASSIGNS, $this->lng->txt('cancel'));

		$form->setTitle($assignment->getSkillTitle());

		$questionTitle = new ilNonEditableValueGUI($this->lng->txt('question'));
		$questionTitle->setValue($question->getTitle());
		$form->addItem($questionTitle);

		$questionDesc = new ilNonEditableValueGUI($this->lng->txt('description'));
		$questionDesc->setValue($question->getComment());
		$form->addItem($questionDesc);
		
		$evaluationMode = new ilRadioGroupInputGUI($this->lng->txt('condition'), 'eval_mode');
		$evalOptionReachedQuestionPoints = new ilRadioOption(
			$this->lng->txt('qpl_skill_point_eval_by_quest_result'), 'result'
		);
		$evaluationMode->addOption($evalOptionReachedQuestionPoints);
		$evalOptionLogicalAnswerCompare = new ilRadioOption(
			$this->lng->txt('qpl_skill_point_eval_by_solution_compare'), 'solution'
		);
		$evaluationMode->addOption($evalOptionLogicalAnswerCompare);
		$evaluationMode->setRequired(true);
		$evaluationMode->setValue($assignment->getEvalMode());
		$form->addItem($evaluationMode);

		$questSolutionCompareExpressions = new ilLogicalAnswerComparisonExpressionInputGUI(
			$this->lng->txt('tst_solution_compare_cfg'), 'solution_compare_expressions'
		);
		$questSolutionCompareExpressions->setInfo($this->buildLacLegendToggleButton($assignment));
		$questSolutionCompareExpressions->setRequired(true);
		$questSolutionCompareExpressions->setAllowMove(true);
		$questSolutionCompareExpressions->setQuestionObject($question);
		$questSolutionCompareExpressions->setValues($assignment->getSolutionComparisonExpressionList()->get());
		$evalOptionLogicalAnswerCompare->addSubItem($questSolutionCompareExpressions);
		
		$questResultSkillPoints = new ilNumberInputGUI($this->lng->txt('tst_comp_points'), 'q_res_skill_points');
		$questResultSkillPoints->setRequired(true);
		$questResultSkillPoints->setSize(4);
		$questResultSkillPoints->setValue($assignment->getSkillPoints());
		$evalOptionReachedQuestionPoints->addSubItem($questResultSkillPoints);
		
		return $form;
	}
	
	private function buildLacLegendToggleButton(ilAssQuestionSkillAssignment $assignment)
	{
		if( $assignment->hasEvalModeBySolution() )
		{
			$langVar = 'ass_lac_hide_legend_btn';
		}
		else
		{
			$langVar = 'ass_lac_show_legend_btn';
		}
		
		return '<a id="lac_legend_toggle_btn" href="#">'.$this->lng->txt($langVar).'</a>';
	}

	private function showSkillQuestionAssignmentsCmd()
	{
		$table = $this->buildTableGUI();

		$assignmentList = $this->buildSkillQuestionAssignmentList();
		$assignmentList->loadFromDb();
		$assignmentList->loadAdditionalSkillData();
		$table->setSkillQuestionAssignmentList($assignmentList);

		$table->setData($this->questionList->getQuestionDataArray());

		$this->tpl->setContent($this->ctrl->getHTML($table));
	}

	private function buildTableGUI()
	{
		require_once 'Modules/TestQuestionPool/classes/tables/class.ilAssQuestionSkillAssignmentsTableGUI.php';
		$table = new ilAssQuestionSkillAssignmentsTableGUI($this, self::CMD_SHOW_SKILL_QUEST_ASSIGNS, $this->ctrl, $this->lng);

		return $table;
	}

	private function buildSkillQuestionAssignmentList()
	{
		require_once 'Modules/TestQuestionPool/classes/class.ilAssQuestionSkillAssignmentList.php';
		$assignmentList = new ilAssQuestionSkillAssignmentList($this->db);
		$assignmentList->setParentObjId($this->getParentObjId());

		return $assignmentList;
	}

	/**
	 * @return ilSkillSelectorGUI
	 */
	private function buildSkillSelectorExplorerGUI($assignments)
	{
		require_once 'Services/Skill/classes/class.ilSkillSelectorGUI.php';

		$skillSelectorExplorerGUI = new ilSkillSelectorGUI(
			$this, self::CMD_SHOW_SKILL_SELECT, $this, self::CMD_UPDATE_SKILL_QUEST_ASSIGNS, self::PARAM_SKILL_SELECTION
		);

		$skillSelectorExplorerGUI->setSelectMode(self::PARAM_SKILL_SELECTION, true);
		$skillSelectorExplorerGUI->setNodeOnclickEnabled(false);
		
		// parameter name for skill selection is actually taken from value passed to constructor,
		// but passing a non empty name to setSelectMode is neccessary to keep input fields enabled

		foreach($assignments as $assignment)
		{
			$id = "{$assignment->getSkillBaseId()}:{$assignment->getSkillTrefId()}";
			$skillSelectorExplorerGUI->setNodeSelected($id);
		}

		return $skillSelectorExplorerGUI;
	}

	/**
	 * @return ilToolbarGUI
	 */
	private function buildSkillSelectorToolbarGUI()
	{
		require_once 'Services/UIComponent/Toolbar/classes/class.ilToolbarGUI.php';

		$skillSelectorToolbarGUI = new ilToolbarGUI();

		$skillSelectorToolbarGUI->setFormAction($this->ctrl->getFormAction($this));
		$skillSelectorToolbarGUI->addFormButton($this->lng->txt('assign'), self::CMD_UPDATE_SKILL_QUEST_ASSIGNS);
		$skillSelectorToolbarGUI->addFormButton($this->lng->txt('cancel'), self::CMD_SHOW_SKILL_QUEST_ASSIGNS);
		
		return $skillSelectorToolbarGUI;
	}

	private function buildQuestionPage(assQuestionGUI $questionGUI)
	{
		$this->tpl->addCss('Services/COPage/css/content.css');

		include_once("./Modules/TestQuestionPool/classes/class.ilAssQuestionPageGUI.php");
		$pageGUI = new ilAssQuestionPageGUI($questionGUI->object->getId());

		$pageGUI->setOutputMode("presentation");
		$pageGUI->setRenderPageContainer(true);

		$pageGUI->setPresentationTitle($questionGUI->object->getTitle());

		$questionHTML = $questionGUI->getSolutionOutput(0, 0, false, false, true, false, true, false, true);
		$pageGUI->setQuestionHTML(array($questionGUI->object->getId() => $questionHTML));

		$pageHTML = $pageGUI->presentation();
		$pageHTML = preg_replace("/src=\"\\.\\//ims", "src=\"" . ILIAS_HTTP_PATH . "/", $pageHTML);

		return $pageHTML;
	}

	/**
	 * @return ilAssQuestionSkillAssignment
	 */
	private function buildQuestionSkillAssignment($questionId, $skillBaseId, $skillTrefId)
	{
		require_once 'Modules/TestQuestionPool/classes/class.ilAssQuestionSkillAssignment.php';
		
		$assignment = new ilAssQuestionSkillAssignment($this->db);
		
		$assignment->setParentObjId($this->getParentObjId());
		$assignment->setQuestionId($questionId);
		$assignment->setSkillBaseId($skillBaseId);
		$assignment->setSkillTrefId($skillTrefId);
		
		$assignment->loadFromDb();
		$assignment->loadAdditionalSkillData();
		
		return $assignment;
	}

	private function isTestQuestion($questionId)
	{
		foreach($this->questionList->getQuestionDataArray() as $question)
		{
			if( $question['question_id'] == $questionId )
			{
				return true;
			}
		}

		return false;
	}

	private function checkSolutionCompareExpressionInput(ilLogicalAnswerComparisonExpressionInputGUI $input, assQuestion $question)
	{
		$errors = array();

		foreach($input->getValues() as $expression)
		{
			$result = $this->validateSolutionCompareExpression($expression, $question);

			if( $result !== true )
			{
				$errors[] = "{$this->lng->txt('ass_lac_expression')} {$expression->getOrderIndex()}: {$result}";
			}
		}

		if( count($errors) )
		{
			$alert = $this->lng->txt('ass_lac_validation_error');
			$alert .= '<br />'.implode('<br />', $errors);
			$input->setAlert($alert);
			return false;
		}

		return true;
	}

	private function validateSolutionCompareExpression(ilAssQuestionSolutionComparisonExpression $expression, iQuestionCondition $question)
	{
		require_once 'Modules/TestQuestionPool/classes/questions/LogicalAnswerCompare/ilAssLacConditionParser.php';
		require_once 'Modules/TestQuestionPool/classes/questions/LogicalAnswerCompare/ilAssLacQuestionProvider.php';
		require_once 'Modules/TestQuestionPool/classes/questions/LogicalAnswerCompare/ilAssLacCompositeValidator.php';

		try
		{
			$conditionParser = new ilAssLacConditionParser();
			$conditionComposite = $conditionParser->parse($expression->getExpression());
			$questionProvider = new ilAssLacQuestionProvider();
			$questionProvider->setQuestion($question);
			$conditionValidator = new ilAssLacCompositeValidator($questionProvider);

			$conditionValidator->validate($conditionComposite);
		}
		catch (ilAssLacException $e)
		{
			if( $e instanceof ilAssLacFormAlertProvider )
			{
				return $e->getFormAlert($this->lng);
			}
			
			throw $e;
		}

		return true;
	}
}
