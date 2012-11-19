<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */


/**
 * Request Interface
 *
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 * @ingroup		ServicesApplication
 */
interface ilRequest
{
	/**
	 * returns an array of parameter names
	 *
	 * @return	array	parameter names
	 */
	public function getParameterNames();

	/**
	 * returns the parameter identified by name
	 *
	 * @param	string/integer	$name
	 * @return	string			parameter
	 */
	public function getParameter($name);

	/**
	 * returns the headerfield identified by name
	 *
	 * @param	string	$name
	 * @return	string	header
	 */
	public function getHeader($name);

	/**
	 * returns the server variable identified by name
	 *
	 * @param	string	$name
	 * @return	string	server_variable
	 */
	public function getSrvVar($name);

	/**
	 * returns the enviromemnt variable identified by name
	 *
	 * @param	string	$name
	 * @return	string	enviromemnt__variable
	 */
	public function getEnvVar($name);

}


?>