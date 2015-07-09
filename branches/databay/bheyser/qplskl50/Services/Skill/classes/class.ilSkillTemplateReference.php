<?php

/* Copyright (c) 1998-2010 ILIAS open source, Extended GPL, see docs/LICENSE */

include_once("./Services/Skill/classes/class.ilSkillTreeNode.php");

/**
 * Skill Template Reference
 *
 * @author Alex Killing <alex.killing@gmx.de>
 * @version $Id$
 *
 * @ingroup ServicesSkill
 */
class ilSkillTemplateReference extends ilSkillTreeNode
{
	var $id;

	/**
	 * Constructor
	 * @access	public
	 */
	function __construct($a_id = 0)
	{
		parent::ilSkillTreeNode($a_id);
		$this->setType("sktr");
	}

	/**
	 * Set skill template id
	 *
	 * @param int $a_val skill template id	
	 */
	function setSkillTemplateId($a_val)
	{
		$this->skill_template_id = $a_val;
	}
	
	/**
	 * Get skill template id
	 *
	 * @return int skill template id
	 */
	function getSkillTemplateId()
	{
		return $this->skill_template_id;
	}
	
	/**
	 * Read data from database
	 */
	function read()
	{
		global $ilDB;
		
		parent::read();
		
		$set = $ilDB->query("SELECT * FROM skl_templ_ref ".
			" WHERE skl_node_id = ".$ilDB->quote($this->getId(), "integer")
			);
		$rec  = $ilDB->fetchAssoc($set);
		$this->setSkillTemplateId((int) $rec["templ_id"]);
	}

	/**
	 * Create skill template reference
	 */
	function create()
	{
		global $ilDB;
		
		parent::create();
		
		$ilDB->manipulate("INSERT INTO skl_templ_ref ".
			"(skl_node_id, templ_id) VALUES (".
			$ilDB->quote($this->getId(), "integer").",".
			$ilDB->quote($this->getSkillTemplateId(), "integer").
			")");
	}
	
	/**
	 * Update node
	 */
	function update()
	{
		global $ilDB;
		
		parent::update();
		
		$ilDB->manipulate("UPDATE skl_templ_ref SET ".
			" templ_id = ".$ilDB->quote($this->getSkillTemplateId(), "integer").
			" WHERE skl_node_id = ".$ilDB->quote($this->getId(), "integer")
			);
	}
	

	/**
	 * Delete skill
	 */
	function delete()
	{
		global $ilDB;

		$ilDB->manipulate("DELETE FROM skl_templ_ref WHERE "
			." skl_node_id = ".$ilDB->quote($this->getId(), "integer")
			);

		parent::delete();
	}

	/**
	 * Copy basic skill template
	 */
	function copy()
	{
		$sktr = new ilSkillTemplateReference();
		$sktr->setTitle($this->getTitle());
		$sktr->setType($this->getType());
		$sktr->setSkillTemplateId($this->getSkillTemplateId());
		$sktr->setSelfEvaluation($this->getSelfEvaluation());
		$sktr->setOrderNr($this->getOrderNr());
		$sktr->create();

		return $sktr;
	}
	
	/**
	 * Lookup template ID
	 *
	 * @param	int			node ID
	 * @return	string		template ID
	 */
	static function _lookupTemplateId($a_obj_id)
	{
		global $ilDB;

		$query = "SELECT templ_id FROM skl_templ_ref WHERE skl_node_id = ".
			$ilDB->quote($a_obj_id, "integer");
		$obj_set = $ilDB->query($query);
		$obj_rec = $ilDB->fetchAssoc($obj_set);

		return $obj_rec["templ_id"];
	}

	/**
	 * Lookup tref ids for template id
	 *
	 * @param $a_template_id (top) template node id
	 * @return array array of integer tref ids
	 */
	function _lookupTrefIdsForTopTemplateId($a_template_id)
	{
		global $ilDB;

		$set = $ilDB->query("SELECT * FROM skl_templ_ref ".
			" WHERE templ_id = ".$ilDB->quote($a_template_id, "integer")
			);
		$trefs = array();
		while ($rec = $ilDB->fetchAssoc($set))
		{
			$trefs[] = $rec["skl_node_id"];
		}
		return $trefs;
	}


	/**
	 * Get all tref ids for a template id
	 *
	 * @param int $a_tid template node id (node id in template tree)
	 * @return array of ids
	 */
	static function _lookupTrefIdsForTemplateId($a_tid)
	{
		include_once("./Services/Skill/classes/class.ilSkillTree.php");
		$tree = new ilSkillTree();
		$top_template_id = $tree->getTopParentNodeId($a_tid);
		return self::_lookupTrefIdsForTopTemplateId($top_template_id);
	}

}
?>
