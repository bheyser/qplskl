<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */


require_once('Services/Application/interfaces/interface.ilResponse.php');


/**
 * Http Response Class
 *
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 * @ingroup		ServicesApplication
 */
class ilHttpResponse implements ilResponse
{
	/**
	 * array of headers
	 *
	 * @var	array	$headers
	 */
	private $headers = array();

	/**
	 * response body
	 * 
	 * @var	string	$body 
	 */
	private $body = '';

	/**
	 * adds a header to array of headers to be sent
	 *
	 * @param	string		$name
	 * @param	string		$header
 	 * @return	ilRequest	$this
	 */
	public function addHeader($name, $header)
	{
		$this->headers[$name] = $header;
	}

	/**
	 * adds output to the body to be sent
	 *
	 * @param	string		$output
	 * @return	ilRequest	$this
	 */
	public function addOutput($output)
	{
		$this->body .= $output;
	}

	/**
	 * flushs response (headers and body) to client
	 *
	 * @return	ilRequest	$this
	 */
	public function flush()
	{
		foreach($this->headers as $name => $value)
		{
			header($name.': '.$value);
		}

		echo $this->body;
	}


}


?>