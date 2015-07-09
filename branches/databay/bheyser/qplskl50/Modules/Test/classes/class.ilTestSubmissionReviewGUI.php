<?php
/* Copyright (c) 1998-2013 ILIAS open source, Extended GPL, see docs/LICENSE */

require_once 'Modules/Test/classes/class.ilTestServiceGUI.php';

/**
 * Class ilTestSubmissionReviewGUI
 * 
 * @author Maximilian Becker <mbecker@databay.de>
 * @version $Id$
 * 
 * @ctrl_calls 	  ilTestSubmissionReviewGUI: ilAssQuestionPageGUI
 */
class ilTestSubmissionReviewGUI extends ilTestServiceGUI
{
	/** @var ilTestOutputGUI */
	protected $testOutputGUI = null;

	/** @var \ilTestSession */
	protected $testSession;

	public function __construct(ilTestOutputGUI $testOutputGUI, ilObjTest $testOBJ, ilTestSession $testSession)
	{
		$this->testOutputGUI = $testOutputGUI;
		$this->testSession = $testSession;
		
		parent::ilTestServiceGUI($testOBJ);
	}
	
	function executeCommand()
	{
		$next_class = $this->ctrl->getNextClass($this);

		switch($next_class)
		{
			default:
				$ret = $this->dispatchCommand();
				break;
		}
		return $ret;
	}
	
	protected function dispatchCommand()
	{
		$cmd = $this->ctrl->getCmd();
		switch ($cmd)
		{
			default:
				$ret = $this->show();
		}
		
		return $ret;
	}
	
	/**
	 * Returns the name of the current content block (depends on the kiosk mode setting)
	 *
	 * @return string The name of the content block
	 * @access public
	 */
	private function getContentBlockName()
	{
		if ($this->object->getKioskMode())
		{
			$this->tpl->setBodyClass("kiosk");
			$this->tpl->setAddFooter(FALSE);
			return "CONTENT";
		}
		else
		{
			return "ADM_CONTENT";
		}
	}
	
	public function show()
	{
		require_once 'class.ilTestEvaluationGUI.php';
		require_once './Services/PDFGeneration/classes/class.ilPDFGeneration.php';
		
		global $ilUser, $ilObjDataCache;
		
		$template = new ilTemplate("tpl.il_as_tst_submission_review.html", TRUE, TRUE, "Modules/Test");

		$this->ctrl->setParameter($this, "skipfinalstatement", 1);
		$template->setVariable("FORMACTION", $this->ctrl->getFormAction($this->testOutputGUI, 'redirectBack').'&reviewed=1');
		
		$template->setVariable("BUTTON_CONTINUE", $this->lng->txt("btn_next"));
		$template->setVariable("BUTTON_BACK", $this->lng->txt("btn_previous"));

		if($this->object->getListOfQuestionsEnd())
		{
			$template->setVariable("CANCEL_CMD", 'outQuestionSummary');
		}
		else
		{
			$template->setVariable("CANCEL_CMD", 'backFromSummary');
		}

		$active = $this->object->getActiveIdOfUser($ilUser->getId());

		require_once 'Modules/Test/classes/class.ilTestResultHeaderLabelBuilder.php';
		$testResultHeaderLabelBuilder = new ilTestResultHeaderLabelBuilder($this->lng, $ilObjDataCache);

		$objectivesList = null;

		if( $this->getObjectiveOrientedContainer()->isObjectiveOrientedPresentationRequired() )
		{
			$testSequence = $this->testSequenceFactory->getSequenceByActiveIdAndPass($this->testSession->getActiveId(), $this->testSession->getPass());
			$testSequence->loadFromDb();
			$testSequence->loadQuestions();

			require_once 'Modules/Course/classes/Objectives/class.ilLOTestQuestionAdapter.php';
			$objectivesAdapter = ilLOTestQuestionAdapter::getInstance($this->testSession);

			$objectivesList = $this->buildQuestionRelatedObjectivesList($objectivesAdapter, $testSequence);
			$objectivesList->loadObjectivesTitles();

			$testResultHeaderLabelBuilder->setObjectiveOrientedContainerId($this->testSession->getObjectiveOrientedContainerId());
			$testResultHeaderLabelBuilder->setUserId($this->testSession->getUserId());
			$testResultHeaderLabelBuilder->setTestObjId($this->object->getId());
			$testResultHeaderLabelBuilder->setTestRefId($this->object->getRefId());
			$testResultHeaderLabelBuilder->initObjectiveOrientedMode();
		}

		$results = $this->object->getTestResult(
			$active, $this->testSession->getPass(), false,
			!$this->getObjectiveOrientedContainer()->isObjectiveOrientedPresentationRequired()
		);
		
		$testevaluationgui = new ilTestEvaluationGUI($this->object);
		$results_output = $testevaluationgui->getPassListOfAnswers(
			$results, $active, $this->testSession->getPass(), false, false, false, false, false,
			$objectivesList, $testResultHeaderLabelBuilder
		);
	
		if ($this->object->getShowExamviewPdf())
		{
			$template->setCurrentBlock("pdf_export");
			$template->setVariable("PDF_TEXT", $this->lng->txt("pdf_export"));
			global $ilSetting;
			$inst_id = $ilSetting->get('inst_id', null);
			$path =  ilUtil::getWebspaceDir() . '/assessment/'. $this->testOutputGUI->object->getId() . '/exam_pdf';
			if (!is_dir($path))
			{
				ilUtil::makeDirParents($path);
			}
			$filename = $path . '/exam_N' . $inst_id . '-' . $this->testOutputGUI->object->getId() . '-' . $active . '-' . $this->testSession->getPass() . '.pdf';
			require_once 'class.ilTestPDFGenerator.php';
			ilTestPDFGenerator::generatePDF($results_output, ilTestPDFGenerator::PDF_OUTPUT_FILE, $filename);
			$template->setVariable("PDF_FILE_LOCATION", $filename);
		}

		if($this->object->getShowExamviewHtml())
		{
			if($this->object->getListOfQuestionsEnd())
			{
				$template->setVariable("CANCEL_CMD_BOTTOM", 'outQuestionSummary');
			}
			else
			{
				$template->setVariable("CANCEL_CMD_BOTTOM", 'backFromSummary');
			}
			$template->setVariable("BUTTON_CONTINUE_BOTTOM", $this->lng->txt("btn_next"));
			$template->setVariable("BUTTON_BACK_BOTTOM", $this->lng->txt("btn_previous"));

			$template->setVariable('HTML_REVIEW', $results_output);
		}

		$this->tpl->setVariable($this->getContentBlockName(), $template->get() );
	}
}