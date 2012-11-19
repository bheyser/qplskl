<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */


/**
 * bootstrap file for ilias application
 *
 * @author		Björn Heyser <bheyser@databay.de>
 */



/**
 * set path enviroment
 */

define('PATH_SEPARATOR', ':');

// First use local pear
set_include_path("./Services/PEAR/lib".PATH_SEPARATOR.ini_get('include_path'));

// Than look for embedded pear
if (is_dir("./pear"))
{
	set_include_path("./pear".PATH_SEPARATOR.ini_get('include_path'));
}



/**
 * prepare request components
 * according to request context
 *
 * - command line (php-cli)
 * - webserver (php-apache)
 */

switch( PHP_SAPI )
{
	case 'cli';
	
		/// command line context ///

		die('Error: cli not supported yet!');

	case 'apache':
	default:
		
		/// webserver context ///
		
		require_once('Services/Application/classes/class.ilHttpRequest.php');
		$request = new ilHttpRequest();
		
		require_once('Services/Application/classes/class.ilHttpResponse.php');
		$response = new ilHttpResponse();
		
		break;
}



/**
 * run application
 */

require_once('Services/Application/classes/class.ilApplicationController.php');
$applicationController = new ilApplicationController($request, $response);
$applicationController->handleRequest();
exit;

?>