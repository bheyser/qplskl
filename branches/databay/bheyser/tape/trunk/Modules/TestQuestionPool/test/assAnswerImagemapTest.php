<?php
/*
	+-----------------------------------------------------------------------------+
	| ILIAS open source                                                           |
	+-----------------------------------------------------------------------------+
	| Copyright (c) 1998-2006 ILIAS open source, University of Cologne            |
	|                                                                             |
	| This program is free software; you can redistribute it and/or               |
	| modify it under the terms of the GNU General Public License                 |
	| as published by the Free Software Foundation; either version 2              |
	| of the License, or (at your option) any later version.                      |
	|                                                                             |
	| This program is distributed in the hope that it will be useful,             |
	| but WITHOUT ANY WARRANTY; without even the implied warranty of              |
	| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the               |
	| GNU General Public License for more details.                                |
	|                                                                             |
	| You should have received a copy of the GNU General Public License           |
	| along with this program; if not, write to the Free Software                 |
	| Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA. |
	+-----------------------------------------------------------------------------+
*/

/** 
* Unit tests
* 
* @author Maximilian Becker <mbecker@databay.de>
*
* @ingroup ModulesTestQuestionPool
*/
class assAnswerImagemapTest extends PHPUnit_Framework_TestCase
{
	protected $backupGlobals = FALSE;

	protected function setUp()
	{
		if (defined('ILIAS_PHPUNIT_CONTEXT'))
		{
			include_once("./Services/PHPUnit/classes/class.ilUnitUtil.php");
			ilUnitUtil::performInitialisation();
		}
		else
		{
			chdir( dirname( __FILE__ ) );
			chdir('../../../');
		}
	}
	
	public function test_instantiateObjectSimple()
	{
		// Arrange
		require_once './Modules/TestQuestionPool/classes/class.assAnswerImagemap.php';

		// Act
		$instance = new ASS_AnswerImagemap();

		// Assert
		$this->assertInstanceOf('ASS_AnswerImagemap', $instance);
	}
	
	public function test_setGetCoords()
	{
		// Arrange
		require_once './Modules/TestQuestionPool/classes/class.assAnswerImagemap.php';
		$instance = new ASS_AnswerImagemap();
		
		// Act
		$expected = "12345";
		$instance->setCoords($expected);
		$actual = $instance->getCoords();

		// Assert
		$this->assertEquals($expected, $actual);		
	}

	public function test_setGetArea()
	{
		// Arrange
		require_once './Modules/TestQuestionPool/classes/class.assAnswerImagemap.php';
		$instance = new ASS_AnswerImagemap();

		// Act
		$expected = "12345";
		$instance->setArea($expected);
		$actual = $instance->getArea();

		// Assert
		$this->assertEquals($expected, $actual);
	}
}
