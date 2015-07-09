<?php

require_once "Services/ADT/classes/Bridges/class.ilADTPresentationBridge.php";

class ilADTIntegerPresentationBridge extends ilADTPresentationBridge
{
	protected function isValidADT(ilADT $a_adt)
	{
		return ($a_adt instanceof ilADTInteger);
	}
	
	public function getHTML()
	{
		if(!$this->getADT()->isNull())
		{
			$def = $this->getADT()->getCopyOfDefinition();	
			$suffix = $def->getSuffix() ? " ".$def->getSuffix() : null;
			return $this->getADT()->getNumber().$suffix;
		}
	}
	
	public function getSortable()
	{
		if(!$this->getADT()->isNull())
		{
			return $this->getADT()->getNumber();
		}
	}
}

?>