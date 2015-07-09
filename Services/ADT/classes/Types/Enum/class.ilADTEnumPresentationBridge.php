<?php

require_once "Services/ADT/classes/Bridges/class.ilADTPresentationBridge.php";

class ilADTEnumPresentationBridge extends ilADTPresentationBridge
{
	protected function isValidADT(ilADT $a_adt)
	{
		return ($a_adt instanceof ilADTEnum);
	}
	
	public function getHTML()
	{
		if(!$this->getADT()->isNull())
		{
			$options = $this->getADT()->getCopyOfDefinition()->getOptions();			
			return $options[$this->getADT()->getSelection()];
		}
	}
	
	public function getSortable()
	{
		if(!$this->getADT()->isNull())
		{
			return $this->getADT()->getSelection();
		}
	}
}

?>