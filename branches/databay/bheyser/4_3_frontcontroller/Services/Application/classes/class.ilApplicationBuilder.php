<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */


/**
 * Application Builder Class
 *
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 * @ingroup		ServicesApplication
 * 
 * @final
 */
final class ilApplicationBuilder
{
	/**
	 * @var ilRequest
	 */
	private $request = null;

	/**
	 * @var ilResponse
	 */
	private $response = null;

	/**
	 * Constructor
	 * 
	 * @param ilRequest $request
	 * @param ilResponse $response 
	 */
	public function __construct(ilRequest $request, ilResponse $response)
	{
		
	}
	
	/**
	 * @return	ilApplication	$application
	 */
	public function getApplication()
	{
		// determine and intantiate base class
		// determine init/shutdown steps for base class
		// build application instance
		// return application
	}
}

