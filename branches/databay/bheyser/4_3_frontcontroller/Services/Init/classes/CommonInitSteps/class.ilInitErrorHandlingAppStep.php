<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */

require_once 'Services/Application/interfaces/interface.ilApplicationStep.php';

/**
 * Init Error Handling App Step Class
 *
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 * @ingroup		ServicesInit
 */
class ilInitErrorHandlingAppStep implements ilApplicationStep
{
	public function process(ilRequest $request, ilResponse $response, ilGlobals $globals)
	{
		// error reporting
		// remove notices from error reporting
		if (version_compare(PHP_VERSION, '5.3.0', '>='))
		{
			error_reporting((ini_get("error_reporting") & ~E_NOTICE) & ~E_DEPRECATED);
		}
		else
		{
			error_reporting(ini_get('error_reporting') & ~E_NOTICE);
		}
	}
}

