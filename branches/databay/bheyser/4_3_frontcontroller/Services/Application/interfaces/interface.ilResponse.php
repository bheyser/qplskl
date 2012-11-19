<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */


/**
 * Response Interface
 *
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 * @ingroup		ServicesApplication
 */
interface ilResponse
{
	/**
	 * adds a header to array of headers to be sent
	 *
	 * @param	string		$name
	 * @param	string		$header
 	 * @return	ilRequest	$this
	 */
	public function addHeader($name, $header);

	/**
	 * adds output to the body to be sent
	 *
	 * @param	string		$output
	 * @return	ilRequest	$this
	 */
	public function addOutput($output);

	/**
	 * flushs response (headers and body) to client
	 *
	 * @return	ilRequest	$this
	 */
	public function flush();

}


?>