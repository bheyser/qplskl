<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */


/**
 * Application Step Interface
 *
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 * @ingroup		ServicesApplication
 */
interface ilApplicationStep
{
	/**
	 * processes step
	 */
	public function process(ilRequest $request, ilResponse $response, ilGlobals $globals);

}


?>