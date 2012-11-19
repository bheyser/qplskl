<?php
/* Copyright (c) 1998-2010 ILIAS open source, Extended GPL, see docs/LICENSE */

include_once("./Services/DataSet/classes/class.ilDataSet.php");

/**
 * Wiki Data set class
 * 
 * This class implements the following entities:
 * - wiki: data from il_wiki_data
 *
 * @author Alex Killing <alex.killing@gmx.de>
 * @version $Id$
 * @ingroup ingroup ModulesWiki
 */
class ilWikiDataSet extends ilDataSet
{	
	/**
	 * Get supported versions
	 *
	 * @param
	 * @return
	 */
	public function getSupportedVersions($a_entity)
	{
		switch ($a_entity)
		{
			case "wiki":
				return array("4.1.0");

			case "wpg":
				return array("4.1.0");
		}
	}
	
	/**
	 * Get xml namespace
	 *
	 * @param
	 * @return
	 */
	function getXmlNamespace($a_entity, $a_target_release)
	{
		return "http://www.ilias.de/xml/Modules/Wiki/".$a_entity;
	}
	
	/**
	 * Get field types for entity
	 *
	 * @param
	 * @return
	 */
	protected function getTypes($a_entity, $a_version)
	{
		if ($a_entity == "wiki")
		{
			switch ($a_version)
			{
				case "4.1.0":
					return array(
						"Id" => "integer",
						"Title" => "text",
						"Description" => "text",
						"StartPage" => "text",
						"Short" => "text",
						"Introduction" => "text",
						"Rating" => "integer");
			}
		}

		if ($a_entity == "wpg")
		{
			switch ($a_version)
			{
				case "4.1.0":
					return array(
						"Id" => "integer",
						"Title" => "text",
						"WikiId" => "integer");
			}
		}

	}

	/**
	 * Read data
	 *
	 * @param
	 * @return
	 */
	function readData($a_entity, $a_version, $a_ids, $a_field = "")
	{
		global $ilDB;

		if (!is_array($a_ids))
		{
			$a_ids = array($a_ids);
		}
				
		if ($a_entity == "wiki")
		{
			switch ($a_version)
			{
				case "4.1.0":
					$this->getDirectDataFromQuery("SELECT id, title, description, ".
						" startpage start_page, short, rating, introduction".
						" FROM il_wiki_data JOIN object_data ON (il_wiki_data.id = object_data.obj_id) ".
						"WHERE ".
						$ilDB->in("id", $a_ids, false, "integer"));
					break;
			}
		}

		if ($a_entity == "wpg")
		{
			switch ($a_version)
			{
				case "4.1.0":
					$this->getDirectDataFromQuery("SELECT id, title, wiki_id ".
						" FROM il_wiki_page ".
						"WHERE ".
						$ilDB->in("wiki_id", $a_ids, false, "integer"));
					break;
			}
		}

	}
	
	/**
	 * Determine the dependent sets of data 
	 */
	protected function getDependencies($a_entity, $a_version, $a_rec, $a_ids)
	{
		switch ($a_entity)
		{
			case "wiki":
				return array (
					"wpg" => array("ids" => $a_rec["Id"])
				);
		}

		return false;
	}
	
	
	/**
	 * Import record
	 *
	 * @param
	 * @return
	 */
	function importRecord($a_entity, $a_types, $a_rec, $a_mapping, $a_schema_version)
	{
//echo $a_entity;
//var_dump($a_rec);

		switch ($a_entity)
		{
			case "wiki":
				
				include_once("./Modules/Wiki/classes/class.ilObjWiki.php");
				if($new_id = $a_mapping->getMapping('Services/Container','objs',$a_rec['Id']))
				{
					$newObj = ilObjectFactory::getInstanceByObjId($new_id,false);
				}
				else
				{
					$newObj = new ilObjWiki();
					$newObj->setType("wiki");
					$newObj->create(true);
				}
					
				$newObj->setTitle($a_rec["Title"]);
				$newObj->setDescription($a_rec["Description"]);
				$newObj->setShortTitle($a_rec["Short"]);
				$newObj->setStartPage($a_rec["StartPage"]);
				$newObj->setRating($a_rec["Rating"]);
				$newObj->setIntroduction($a_rec["Introduction"]);
				$newObj->update(true);
				$this->current_obj = $newObj;
				$a_mapping->addMapping("Modules/Wiki", "wiki", $a_rec["Id"], $newObj->getId());
				break;

			case "wpg":
				$wiki_id = $a_mapping->getMapping("Modules/Wiki", "wiki", $a_rec["WikiId"]);
				include_once("./Modules/Wiki/classes/class.ilWikiPage.php");
				$wpage = new ilWikiPage();
				$wpage->setWikiId($wiki_id);
				$wpage->setTitle($a_rec["Title"]);
				$wpage->create(true);
				
				$a_mapping->addMapping("Modules/Wiki", "wpg", $a_rec["Id"], $wpage->getId());
				$a_mapping->addMapping("Services/COPage", "pg", "wpg:".$a_rec["Id"], "wpg:".$wpage->getId());
				break;
		}
	}
}
?>