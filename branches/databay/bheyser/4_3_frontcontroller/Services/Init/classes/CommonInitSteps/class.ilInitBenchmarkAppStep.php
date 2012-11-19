<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */

require_once 'Services/Application/interfaces/interface.ilApplicationStep.php';

/**
 * Common Includes App Step Class
 *
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 * @ingroup		ServicesInit
 */
class ilInitBenchmarkAppStep implements ilApplicationStep
{
	public function process(ilRequest $request, ilResponse $response, ilGlobals $globals)
	{
		require_once "classes/class.ilBenchmark.php";
		
		$ilBench = new ilBenchmark();
		
		$globals->ilBench($ilBench);
		
		$GLOBALS['ilBench'] = $ilBench;
	}
}

