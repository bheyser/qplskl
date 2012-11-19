<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */


/**
 * Application Step Chain Class
 *
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 * @ingroup		ServicesApplication
 */
class ilApplicationStepChain
{
	private  $steps = array();

	public function __construct()
	{

	}

	public function addStep(ilApplicationStep $step)
	{
		$this->steps[] = $step;
	}

	public function processSteps(ilRequest $request, ilResponse $response, ilGlobals $globals)
	{
		foreach($this->steps as $step)
		{
			$step->process($request, $response, $globals);
		}
	}
}


?>