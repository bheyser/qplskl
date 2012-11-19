<?php
/* Copyright (c) 1998-2012 ILIAS open source, Extended GPL, see docs/LICENSE */

include_once("./Services/DataSet/classes/class.ilDataSet.php");

/**
 * Calendar data set class.
 * 
 * @author Alex Killing <alex.killing@gmx.de>
 * @version $Id$
 * @ingroup ingroup ServicesCalendar
 */
class ilCalendarDataSet extends ilDataSet
{	
	/**
	 * Get supported versions
	 *
	 * @param
	 * @return
	 */
	public function getSupportedVersions()
	{
		return array("4.3.0");
	}
	
	/**
	 * Get xml namespace
	 *
	 * @param
	 * @return
	 */
	function getXmlNamespace($a_entity, $a_schema_version)
	{
		return "http://www.ilias.de/xml/Services/Calendar/".$a_entity;
	}
	
	/**
	 * Get field types for entity
	 *
	 * @param
	 * @return
	 */
	protected function getTypes($a_entity, $a_version)
	{
		// calendar
		if ($a_entity == "calendar")
		{
			switch ($a_version)
			{
				case "4.3.0":
					return array (
						"CatId" => "integer",
						"ObjId" => "text",
						"Title" => "text",
						"Color" => "text",
						"Type" => "integer"
					);
			}
		}
		
		// calendar entry
		if ($a_entity == "cal_entry")
		{
			switch ($a_version)
			{
				case "4.3.0":
					return array (
						"Id" => "integer",
						"Title" => "text",
						"Subtitle" => "text",
						"Description" => "text",
						"Location" => "text",
						"Fullday" => "integer",
						"Starta" => "text",
						"Enda" => "text",
						"Informations" => "text",
						"AutoGenerated" => "integer",
						"ContextId" => "integer",
						"TranslationType" => "integer",
						"IsMilestone" => "integer",
						"Completion" => "integer",
						"Notification" => "integer"
					);
			}
		}
		
		// calendar/entry assignment
		if ($a_entity == "cal_assignment")
		{
			switch ($a_version)
			{
				case "4.3.0":
					return array (
						"CatId" => "integer",
						"EntryId" => "integer"
					);
			}
		}
		
		// recurrence rule
		if ($a_entity == "recurrence_rule")
		{
			switch ($a_version)
			{
				case "4.3.0":
					return array (
						"RuleId" => "integer",
						"EntryId" => "integer",
						"CalRecurrence" => "integer",
						"FreqType" => "text",
						"FreqUntilDate" => "text",
						"FreqUntilCount" => "integer",
						"Intervall" => "integer",
						"Byday" => "text",
						"Byweekno" => "text",
						"Bymonth" => "text",
						"Bymonthday" => "text",
						"Byyearday" => "text",
						"Bysetpos" => "text",
						"Weekstart" => "text"
					);
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

		// calendar
		if ($a_entity == "calendar")
		{
			switch ($a_version)
			{
				case "4.3.0":
					$this->getDirectDataFromQuery("SELECT cat_id, obj_id, title, color, type ".
						" FROM cal_categories ".
						" WHERE ".
						$ilDB->in("cat_id", $a_ids, false, "integer"));
					break;
			}
		}
		
		// cal assignments
		if ($a_entity == "cal_assignment")
		{
			switch ($a_version)
			{
				case "4.3.0":
					$this->getDirectDataFromQuery("SELECT cat_id, cal_id entry_id ".
						" FROM cal_cat_assignments ".
						" WHERE ".
						$ilDB->in("cat_id", $a_ids, false, "integer"));
					break;
			}
		}
		
		// cal entries
		if ($a_entity == "cal_entry")
		{
			switch ($a_version)
			{
				case "4.3.0":
					$this->getDirectDataFromQuery("SELECT cal_id id, title, subtitle, description, location, fullday, ".
						" starta, enda, informations, auto_generated, context_id, translation_type, is_milestone, completion, notification ".
						" FROM cal_entries ".
						" WHERE ".
						$ilDB->in("cal_id", $a_ids, false, "integer"));
					break;
			}
		}			

		
		// recurrence_rule
		if ($a_entity == "recurrence_rule")
		{
			switch ($a_version)
			{
				case "4.3.0":
					$this->getDirectDataFromQuery("SELECT rule_id, cal_id entry_id, cal_recurrence, freq_type, freq_until_date, freq_until_count, ".
						" intervall, byday, byweekno, bymonth, bymonthday, byyearday, bysetpos, weekstart ".
						" FROM cal_recurrence_rules ".
						" WHERE ".
						$ilDB->in("cal_id", $a_ids, false, "integer"));
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
			case "calendar":
				include_once("./Services/Calendar/classes/class.ilCalendarCategoryAssignments.php");
				$assignmnts = ilCalendarCategoryAssignments::_getAssignedAppointments(array($a_rec["CatId"]));
				$entries = array();
				foreach ($assignmnts as $cal_id)
				{
					$entries[$cal_id] = $cal_id;
				}
				return array (
					"cal_entry" => array("ids" => $entries),
					"cal_assignment" => array("ids" => $a_rec["CatId"])
				);							
			case "cal_entry":
				return array (
					"recurrence_rule" => array("ids" => $a_rec["Id"])
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
		switch ($a_entity)
		{
			case "calendar":
				// please note: we currently only support private user calendars to
				// be imported
				if ($a_rec["Type"] == 1)
				{
					$usr_id = $a_mapping->getMapping("Services/User", "usr", $a_rec["ObjId"]);
					if ($usr_id > 0 && ilObject::_lookupType($usr_id) == "usr")
					{
						include_once('./Services/Calendar/classes/class.ilCalendarCategory.php');
						$category = new ilCalendarCategory(0);
						$category->setTitle($a_rec["Title"]);
						$category->setColor($a_rec["Color"]);
						$category->setType(ilCalendarCategory::TYPE_USR);
						$category->setObjId($usr_id);
						$category->add();
						$a_mapping->addMapping("Services/Calendar", "calendar", $a_rec["CatId"],
							$category->getCategoryID());
					}
				}
				break;

			case "cal_entry":
				// please note: we currently only support private user calendars to
				// be imported
				if ((int) $a_rec["ContextId"] == 0)
				{
					include_once('./Services/Calendar/classes/class.ilCalendarEntry.php');
					$entry = new ilCalendarEntry(0);
					$entry->setTitle($a_rec["Title"]);
					$entry->setSubtitle($a_rec["Subtitle"]);
					$entry->setDescription($a_rec["Description"]);
					$entry->setLocation($a_rec["Location"]);
					$entry->setFullday($a_rec["Fullday"]);
					if ($a_rec["Starta"] != "")
					{
						$entry->setStart(new ilDateTime($a_rec["Starta"], IL_CAL_DATETIME));
					}
					if ($a_rec["Enda"] != "")
					{
						$entry->setEnd(new ilDateTime($a_rec["Enda"], IL_CAL_DATETIME));
					}
					$entry->setFurtherInformations($a_rec["Informations"]);
					$entry->setAutoGenerated($a_rec["AutoGenerated"]);
					$entry->setContextId($a_rec["ContextId"]);
					$entry->setMilestone($a_rec["Milestone"]);
					$entry->setCompletion($a_rec["Completion"]);
					$entry->setTranslationType($a_rec["TranslationType"]);
					$entry->enableNotification($a_rec["Notification"]);
					$entry->save();
					$a_mapping->addMapping("Services/Calendar", "cal_entry", $a_rec["Id"],
						$entry->getEntryId());
				}
				break;
				
			case "cal_assignment":
				$cat_id = $a_mapping->getMapping("Services/Calendar", "calendar", $a_rec["CatId"]);
				$entry_id = $a_mapping->getMapping("Services/Calendar", "cal_entry", $a_rec["EntryId"]);
				if ($cat_id > 0 && $entry_id > 0)
				{
					include_once('./Services/Calendar/classes/class.ilCalendarCategoryAssignments.php');
					$ass = new ilCalendarCategoryAssignments($entry_id);
					$ass->addAssignment($cat_id);
				}
				break;
				
			case "recurrence_rule":
				$entry_id = $a_mapping->getMapping("Services/Calendar", "cal_entry", $a_rec["EntryId"]);
				if ($entry_id > 0)
				{
					include_once('./Services/Calendar/classes/class.ilCalendarRecurrence.php');
					$rec = new ilCalendarRecurrence();
					$rec->setEntryId($entry_id);
					$rec->setRecurrence($a_rec["CalRecurrence"]);
					$rec->setFrequenceType($a_rec["FreqType"]);
					if ($a_rec["FreqUntilDate"] != "")
					{
						$rec->setFrequenceUntilDate(new ilDateTime($a_rec["FreqUntilDate"], IL_CAL_DATETIME));
					}
					$rec->setFrequenceUntilCount($a_rec["FreqUntilCount"]);
					$rec->setInterval($a_rec["Interval"]);
					$rec->setBYDAY($a_rec["Byday"]);
					$rec->setBYWEEKNO($a_rec["Byweekno"]);
					$rec->setBYMONTH($a_rec["Bymonth"]);
					$rec->setBYMONTHDAY($a_rec["Bymonthday"]);
					$rec->setBYYEARDAY($a_rec["Byyearday"]);
					$rec->setBYSETPOS($a_rec["Bysetpos"]);
					$rec->setWeekstart($a_rec["Weekstart"]);
					$rec->save();
					$a_mapping->addMapping("Services/Calendar", "recurrence_rule", $a_rec["RuleId"],
						$rec->getRecurrenceId());
				}
				break;
		}
	}
}
?>