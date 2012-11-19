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
class ilCommonIncludesAppStep implements ilApplicationStep
{
	public function process(ilRequest $request, ilResponse $response, ilGlobals $globals)
	{
		global $ilBench;

		//include class.util first to start StopWatch
		require_once "./Services/Utilities/classes/class.ilUtil.php";

		// BEGIN Usability: Measure response time until footer is displayed on form
		// The stop statement is in class.ilTemplate.php function addILIASfooter()
		$ilBench->start("Core", "ElapsedTimeUntilFooter");
		// END Usability: Measure response time until footer is displayed on form

		$ilBench->start("Core", "HeaderInclude");

		// start the StopWatch
		$GLOBALS['t_pagestart'] = ilUtil::StopWatch();

		$ilBench->start("Core", "HeaderInclude_IncludeFiles");
		
		require_once "classes/class.ilTemplate.php";

		//include classes and function libraries
		require_once "include/inc.db_session_handler.php";
		require_once "./Services/Database/classes/class.ilDB.php";
		require_once "./Services/AuthShibboleth/classes/class.ilShibboleth.php";
		require_once "classes/class.ilias.php";
		require_once './Services/User/classes/class.ilObjUser.php';
		require_once "classes/class.ilFormat.php";
		require_once "./Services/Calendar/classes/class.ilDatePresentation.php";
		require_once "classes/class.ilSaxParser.php";
		require_once "./Services/Object/classes/class.ilObjectDefinition.php";
		require_once "./Services/Style/classes/class.ilStyleDefinition.php";
		require_once "./Services/Tree/classes/class.ilTree.php";
		require_once "./Services/Language/classes/class.ilLanguage.php";
		require_once "./Services/Logging/classes/class.ilLog.php";
		require_once "classes/class.ilCtrl2.php";
		require_once "./Services/AccessControl/classes/class.ilConditionHandler.php";
		require_once "classes/class.ilBrowser.php";
		require_once "classes/class.ilFrameTargetInfo.php";
		require_once "Services/Navigation/classes/class.ilNavigationHistory.php";
		require_once "Services/Help/classes/class.ilHelp.php";
		require_once "include/inc.ilias_version.php";

		//include role based access control system
		require_once "./Services/AccessControl/classes/class.ilAccessHandler.php";
		require_once "./Services/AccessControl/classes/class.ilRbacAdmin.php";
		require_once "./Services/AccessControl/classes/class.ilRbacSystem.php";
		require_once "./Services/AccessControl/classes/class.ilRbacReview.php";

		// include object_data cache
		require_once "classes/class.ilObjectDataCache.php";
		require_once 'Services/Tracking/classes/class.ilOnlineTracking.php';

		//include LocatorGUI
		require_once "./Services/Locator/classes/class.ilLocatorGUI.php";

		// include error_handling
		require_once "classes/class.ilErrorHandling.php";

		$ilBench->stop("Core", "HeaderInclude_IncludeFiles");
	}
}

