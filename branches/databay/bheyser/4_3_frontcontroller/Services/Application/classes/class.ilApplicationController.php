<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */


/**
 * Application Controller Class
 *
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 * @ingroup		ServicesApplication
 * 
 * @final
 */
final class ilApplicationController
{
	/**
	 * @var ilApplicationStepChain
	 */
	private $applicationBuilder = null;
	
	/**
	 * @var ilApplicationStepChain
	 */
	private $commonInitStepChain = null;

	public function __construct(ilRequest $request, ilResponse $response)
	{
		$this->request = $request;
		$this->response = $response;
		
		require_once 'Services/Application/classes/class.ilGlobals.php';
		$this->globals = new ilGlobals();
		
		require_once 'Services/Application/classes/class.ilApplicationBuilder.php';
		$this->applicationBuilder = new ilApplicationBuilder($request, $response, $this->globals);

		require_once 'Services/Application/classes/class.ilApplicationStepChain.php';
		$this->commonInitStepChain = new ilApplicationStepChain();

		$this->buildCommonInitStepChain();
	}

	public function handleRequest()
	{var_dump($this->commonInitStepChain);
		$this->commonInitStepChain->processSteps($this->request, $this->response, $this->globals);
		
		$application = $this->applicationBuilder->getApplication();

		//$application->init();
		//$application->execute();
		//$application->shutdown();
		
		$this->response->addOutput('hello ilias as application ^^');

		$this->response->flush();
	}

	private function buildCommonInitStepChain()
	{
		require_once 'Services/Init/classes/CommonInitSteps/class.ilInitBenchmarkAppStep.php';
		$this->commonInitStepChain->addStep( new ilInitBenchmarkAppStep() );
		
		require_once 'Services/Init/classes/CommonInitSteps/class.ilInitErrorHandlingAppStep.php';
		$this->commonInitStepChain->addStep( new ilInitErrorHandlingAppStep() );
		
		require_once 'Services/Init/classes/CommonInitSteps/class.ilPearIncludesAppStep.php';
		$this->commonInitStepChain->addStep( new ilPearIncludesAppStep() );
		
		require_once 'Services/Init/classes/CommonInitSteps/class.ilCommonIncludesAppStep.php';
		$this->commonInitStepChain->addStep( new ilCommonIncludesAppStep() );
	}
}

