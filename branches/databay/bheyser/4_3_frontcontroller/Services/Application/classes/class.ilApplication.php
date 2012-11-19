<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */


/**
 * Application Class
 *
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 * @ingroup		ServicesApplication
 * 
 * @final
 */
final class ilApplication
{
	private $request = null;
	private $response = null;
	
	private $initStepChain = null;
	private $shutdownStepChain = null;

	private $baseClass = null;

	public function __construct(ilRequest $request, ilResponse $response, $baseClass)
	{
		$this->initStepChain = new ilApplicationStepChain();
		$this->shutdownStepChain = new ilApplicationStepChain();

		$this->request = $request;
		$this->response = $response;
		
		$this->baseClass = $baseClass;
	}
	
	public function setBaseClass($baseClass)
	{
		$this->baseClass = $baseClass
	}

	public function execute()
	{
		// Execute Base Class
	}
	
	public function addInitStep(ilApplicationStep $initStep)
	{
		$this->initStepChain->addStep($initStep);
	}

	public function init()
	{
		$this->initStepChain->processSteps($this->request, $this->response);
	}

	public function addShutdownStep(ilApplicationStep $shutdownStep)
	{
		$this->shutdownStepChain->addStep($shutdownStep);
	}

	public function shutdown();
	{
		$this->initStepChain->processSteps($this->request, $this->response);
	}

}

