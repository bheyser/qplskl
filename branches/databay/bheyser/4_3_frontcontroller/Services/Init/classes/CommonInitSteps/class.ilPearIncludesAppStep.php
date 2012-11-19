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
class ilPearIncludesAppStep implements ilApplicationStep
{
	public function process(ilRequest $request, ilResponse $response, ilGlobals $globals)
	{
		require_once("include/inc.get_pear.php");
		require_once("include/inc.check_pear.php");

		// Major PEAR Includes
		require_once "PEAR.php";
		//require_once "DB.php";
		require_once "Auth/Auth.php";

		// HTML_Template_IT support
		// (location changed with 4.3.2 & higher)
/*		@include_once "HTML/ITX.php";		// old implementation
		if (!class_exists("IntegratedTemplateExtension"))
		{
			include_once "HTML/Template/ITX.php";
			include_once "classes/class.ilTemplateHTMLITX.php";
		}
		else
		{
			include_once "classes/class.ilTemplateITX.php";
		}*/
		
		@include_once "HTML/Template/ITX.php";		// new implementation
		if (class_exists("HTML_Template_ITX"))
		{
			include_once "classes/class.ilTemplateHTMLITX.php";
		}
		else
		{
			include_once "HTML/ITX.php";		// old implementation
			include_once "classes/class.ilTemplateITX.php";
		}
	}
}

