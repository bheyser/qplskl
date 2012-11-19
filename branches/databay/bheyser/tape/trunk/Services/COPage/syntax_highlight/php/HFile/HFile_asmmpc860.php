<?php
$BEAUT_PATH = realpath(".")."/Services/COPage/syntax_highlight/php";
if (!isset ($BEAUT_PATH)) return;
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_asmmpc860 extends HFile{
   function HFile_asmmpc860(){
     $this->HFile();	
/*************************************/
// Beautifier Highlighting Configuration File 
// Asm8xx
/*************************************/
// Flags

$this->nocase            	= "0";
$this->notrim            	= "0";
$this->perl              	= "0";

// Colours

$this->colours        	= array("blue", "blue", "purple", "gray", "brown", "purple");
$this->quotecolour       	= "blue";
$this->blockcommentcolour	= "green";
$this->linecommentcolour 	= "green";

// Indent Strings

$this->indent            	= array();
$this->unindent          	= array();

// String characters and delimiters

$this->stringchars       	= array();
$this->delimiters        	= array("~", "!", "@", "%", "^", "&", "*", "(", ")", "-", "+", "=", "|", "\\", "/", "{", "}", "[", "]", ":", ";", "\"", "'", "<", ">", " ", ",", "	", ".", "?");
$this->escchar           	= "";

// Comment settings

$this->linecommenton     	= array("");
$this->blockcommenton    	= array("");
$this->blockcommentoff   	= array("");

// Keywords (keyword mapping to colour number)

$this->keywords          	= array(
			"/Line" => "", 
			"Comment" => "", 
			"=" => "5", 
			"//" => "", 
			"Line" => "", 
			"Alt" => "", 
			";" => "", 
			"/Block" => "", 
			"On" => "", 
			"/*" => "", 
			"Block" => "", 
			"Off" => "", 
			"*/" => "", 
			"/String" => "", 
			"Chars" => "", 
			"\'\"" => "", 
			"/Marker" => "", 
			"Characters" => "", 
			"\"fs\"" => "", 
			"_ASMLANGUAGE" => "1", 
			"__asm__" => "1", 
			"__cplusplus" => "1", 
			"align" => "1", 
			"ascii" => "1", 
			"auto" => "1", 
			"break" => "1", 
			"byte" => "1", 
			"case" => "1", 
			"continue" => "1", 
			"char" => "1", 
			"const" => "1", 
			"data" => "1", 
			"default" => "1", 
			"do" => "1", 
			"double" => "1", 
			"EXPORT" => "1", 
			"else" => "1", 
			"enum" => "1", 
			"equ" => "1", 
			"extern" => "1", 
			"FAST" => "1", 
			"float" => "1", 
			"for" => "1", 
			"global" => "1", 
			"globl" => "1", 
			"goto" => "1", 
			"HI" => "1", 
			"HIADJ" => "1", 
			"IMPORT" => "1", 
			"if" => "1", 
			"int" => "1", 
			"include" => "1", 
			"LO" => "1", 
			"LOADPTR" => "1", 
			"LOADVAR" => "1", 
			"local" => "1", 
			"long" => "1", 
			"NULL" => "1", 
			"register" => "1", 
			"return" => "1", 
			"set" => "1", 
			"short" => "1", 
			"signed" => "1", 
			"sizeof" => "1", 
			"struct" => "1", 
			"switch" => "1", 
			"static" => "1", 
			"text" => "1", 
			"typedef" => "1", 
			"union" => "1", 
			"unsigned" => "1", 
			"void" => "1", 
			"volatile" => "1", 
			"while" => "1", 
			"beq" => "2", 
			"bdnz" => "2", 
			"bdnzlr" => "2", 
			"bgt" => "2", 
			"blr" => "2", 
			"blrl" => "2", 
			"blt" => "2", 
			"bltctr" => "2", 
			"bltlr" => "2", 
			"bne" => "2", 
			"bnectr" => "2", 
			"bnelr" => "2", 
			"clrlslwi" => "2", 
			"clrlwi" => "2", 
			"clrrwi" => "2", 
			"cmpd" => "2", 
			"cmpdi" => "2", 
			"cmpld" => "2", 
			"cmpldir" => "2", 
			"cmplw" => "2", 
			"cmplwi" => "2", 
			"cmpw" => "2", 
			"cmpwi" => "2", 
			"crb" => "2", 
			"crclr" => "2", 
			"crmove" => "2", 
			"crnot" => "2", 
			"crset" => "2", 
			"extlwi" => "2", 
			"extrwi" => "2", 
			"inslwi" => "2", 
			"insrwi" => "2", 
			"la" => "2", 
			"li" => "2", 
			"lis" => "2", 
			"mfctr" => "2", 
			"mflr" => "2", 
			"mfxer" => "2", 
			"mftbu" => "2", 
			"mr" => "2", 
			"mtcr" => "2", 
			"mtctr" => "2", 
			"mtlr" => "2", 
			"mtxer" => "2", 
			"nop" => "2", 
			"not" => "2", 
			"rotlw" => "2", 
			"rotlwi" => "2", 
			"rotrwi" => "2", 
			"slwi" => "2", 
			"srwi" => "2", 
			"sub" => "2", 
			"subc" => "2", 
			"subi" => "2", 
			"subic" => "2", 
			"subis" => "2", 
			"trap" => "2", 
			"tweq" => "2", 
			"twgti" => "2", 
			"twlge" => "2", 
			"twllei" => "2", 
			"add" => "3", 
			"addo" => "3", 
			"addc" => "3", 
			"addco" => "3", 
			"adde" => "3", 
			"addeo" => "3", 
			"addi" => "3", 
			"addic" => "3", 
			"addis" => "3", 
			"addme" => "3", 
			"addmeo" => "3", 
			"addze" => "3", 
			"addzeo" => "3", 
			"and" => "3", 
			"andc" => "3", 
			"andis" => "3", 
			"b" => "3", 
			"ba" => "3", 
			"bl" => "3", 
			"bla" => "3", 
			"bc" => "3", 
			"bca" => "3", 
			"bcl" => "3", 
			"bcla" => "3", 
			"bcctr" => "3", 
			"bcctrl" => "3", 
			"bclr" => "3", 
			"bclrl" => "3", 
			"cmp" => "3", 
			"cmpi" => "3", 
			"cmpl" => "3", 
			"cmpli" => "3", 
			"cntlzw" => "3", 
			"crand" => "3", 
			"crandc" => "3", 
			"creqv" => "3", 
			"crnand" => "3", 
			"crnor" => "3", 
			"cror" => "3", 
			"crorc" => "3", 
			"crxor" => "3", 
			"dcbf" => "3", 
			"dcbi" => "3", 
			"dcbst" => "3", 
			"dcbt" => "3", 
			"dcbtst" => "3", 
			"dcbz" => "3", 
			"divw" => "3", 
			"divwo" => "3", 
			"divwu" => "3", 
			"divwuo" => "3", 
			"eciwx" => "3", 
			"ecowx" => "3", 
			"eieio" => "3", 
			"eqv" => "3", 
			"extsb" => "3", 
			"extsh" => "3", 
			"icbi" => "3", 
			"isync" => "3", 
			"lbz" => "3", 
			"lbzu" => "3", 
			"lbzux" => "3", 
			"lbzx" => "3", 
			"lha" => "3", 
			"lhau" => "3", 
			"lhaux" => "3", 
			"lhax" => "3", 
			"lhbrx" => "3", 
			"lhz" => "3", 
			"lhzu" => "3", 
			"lhzux" => "3", 
			"lhzx" => "3", 
			"lmw" => "3", 
			"lswi" => "3", 
			"lswx" => "3", 
			"lwarx" => "3", 
			"lwbrx" => "3", 
			"lwz" => "3", 
			"lwzu" => "3", 
			"lwzux" => "3", 
			"lwzx" => "3", 
			"mcrf" => "3", 
			"mcrxr" => "3", 
			"mfcr" => "3", 
			"mfmsr" => "3", 
			"mfspr" => "3", 
			"mfsr" => "3", 
			"mfsrin" => "3", 
			"mftb" => "3", 
			"mtcrf" => "3", 
			"mtmsr" => "3", 
			"mtspr" => "3", 
			"mtsr" => "3", 
			"mtsrin" => "3", 
			"mulhw" => "3", 
			"mulhwu" => "3", 
			"mulli" => "3", 
			"mullw" => "3", 
			"mullwo" => "3", 
			"nand" => "3", 
			"neg" => "3", 
			"nego" => "3", 
			"nor" => "3", 
			"or" => "3", 
			"orc" => "3", 
			"ori" => "3", 
			"oris" => "3", 
			"rfi" => "3", 
			"rlwimi" => "3", 
			"rlwinm" => "3", 
			"rlwnm" => "3", 
			"sc" => "3", 
			"slw" => "3", 
			"sraw" => "3", 
			"srawi" => "3", 
			"srw" => "3", 
			"stb" => "3", 
			"stbu" => "3", 
			"stbux" => "3", 
			"stbx" => "3", 
			"sth" => "3", 
			"sthbrx" => "3", 
			"sthu" => "3", 
			"sthux" => "3", 
			"sthx" => "3", 
			"stmw" => "3", 
			"stswi" => "3", 
			"stswx" => "3", 
			"stw" => "3", 
			"stwbrx" => "3", 
			"stwu" => "3", 
			"stwux" => "3", 
			"stwx" => "3", 
			"subf" => "3", 
			"subfo" => "3", 
			"subfc" => "3", 
			"subfco" => "3", 
			"subfe" => "3", 
			"subfeo" => "3", 
			"subfic" => "3", 
			"subfme" => "3", 
			"subfmeo" => "3", 
			"subfze" => "3", 
			"subfzeo" => "3", 
			"sync" => "3", 
			"tlbia" => "3", 
			"tlbie" => "3", 
			"tlbsync" => "3", 
			"tw" => "3", 
			"twi" => "3", 
			"xor" => "3", 
			"xori" => "3", 
			"xoris" => "3", 
			"#define" => "4", 
			"#elif" => "4", 
			"#else" => "4", 
			"#endif" => "4", 
			"#error" => "4", 
			"#if" => "4", 
			"#ifdef" => "4", 
			"#ifndef" => "4", 
			"#include" => "4", 
			"#line" => "4", 
			"#pragma" => "4", 
			"#undef" => "4", 
			"!" => "5", 
			"%" => "5", 
			"&" => "5", 
			"+" => "5", 
			"-" => "5", 
			"<" => "5", 
			">" => "5", 
			"^" => "5", 
			"|" => "5", 
			"BAR" => "6", 
			"BR0" => "6", 
			"BR1" => "6", 
			"BR2" => "6", 
			"BR3" => "6", 
			"BR4" => "6", 
			"BR5" => "6", 
			"BR6" => "6", 
			"BR7" => "6", 
			"BRGC1" => "6", 
			"BRGC2" => "6", 
			"BRGC3" => "6", 
			"BRGC4" => "6", 
			"CAM" => "6", 
			"CICR" => "6", 
			"CIMR" => "6", 
			"CIPR" => "6", 
			"CISR" => "6", 
			"CIVR" => "6", 
			"CPCR" => "6", 
			"CMPA" => "6", 
			"CMPB" => "6", 
			"CMPC" => "6", 
			"CMPD" => "6", 
			"CMPE" => "6", 
			"CMPF" => "6", 
			"CMPG" => "6", 
			"CMPH" => "6", 
			"COUNTA" => "6", 
			"COUNTB" => "6", 
			"CR" => "6", 
			"CR0" => "6", 
			"CR1" => "6", 
			"CR2" => "6", 
			"CR3" => "6", 
			"CR4" => "6", 
			"CR5" => "6", 
			"CR6" => "6", 
			"CR7" => "6", 
			"CST" => "6", 
			"DAR" => "6", 
			"DC_ADR" => "6", 
			"DC_CST" => "6", 
			"DC_DAT" => "6", 
			"DEC" => "6", 
			"DER" => "6", 
			"DPDR" => "6", 
			"DPIR" => "6", 
			"DSISR" => "6", 
			"DSR1" => "6", 
			"DSR2" => "6", 
			"DSR3" => "6", 
			"DSR4" => "6", 
			"EID" => "6", 
			"EIE" => "6", 
			"GSMR_H1" => "6", 
			"GSMR_H2" => "6", 
			"GSMR_H3" => "6", 
			"GSMR_H4" => "6", 
			"GSMR_L1" => "6", 
			"GSMR_L2" => "6", 
			"GSMR_L3" => "6", 
			"GSMR_L4" => "6", 
			"I2ADD" => "6", 
			"I2BRG" => "6", 
			"I2CER" => "6", 
			"I2CMR" => "6", 
			"I2COM" => "6", 
			"I2MOD" => "6", 
			"ICR" => "6", 
			"ICTRL" => "6", 
			"IC_ADR" => "6", 
			"IC_CST" => "6", 
			"IC_DAT" => "6", 
			"IDMR1" => "6", 
			"IDMR2" => "6", 
			"IDSR1" => "6", 
			"IDSR2" => "6", 
			"IMMR" => "6", 
			"LCTRL1" => "6", 
			"LCTRL2" => "6", 
			"LR" => "6", 
			"MAMR" => "6", 
			"MAR" => "6", 
			"MBMR" => "6", 
			"MCR" => "6", 
			"M_TW" => "6", 
			"M_TWB" => "6", 
			"MD_AP" => "6", 
			"M_CASID" => "6", 
			"MD_CTR" => "6", 
			"MD_DBCAM" => "6", 
			"MD_DBRAM0" => "6", 
			"MD_DBRAM1" => "6", 
			"MD_EPN" => "6", 
			"MD_RAM1" => "6", 
			"MD_RPN" => "6", 
			"MD_TWC" => "6", 
			"MDR" => "6", 
			"MI_AP" => "6", 
			"MI_CAM" => "6", 
			"MI_CTR" => "6", 
			"MI_DBCAM" => "6", 
			"MI_DBRAM0" => "6", 
			"MI_DBRAM1" => "6", 
			"MI_EPN" => "6", 
			"MI_RAM0" => "6", 
			"MI_RAM1" => "6", 
			"MI_RPN" => "6", 
			"MI_TWC" => "6", 
			"MPTPR" => "6", 
			"MSR" => "6", 
			"MSTAT" => "6", 
			"NRI" => "6", 
			"OR0" => "6", 
			"OR1" => "6", 
			"OR2" => "6", 
			"OR3" => "6", 
			"OR4" => "6", 
			"OR5" => "6", 
			"OR6" => "6", 
			"OR7" => "6", 
			"PADAT" => "6", 
			"PADIR" => "6", 
			"PAODR" => "6", 
			"PAPAR" => "6", 
			"PBDAT" => "6", 
			"PBDIR" => "6", 
			"PBODR" => "6", 
			"PBPAR" => "6", 
			"PBR0" => "6", 
			"PBR1" => "6", 
			"PBR2" => "6", 
			"PBR3" => "6", 
			"PBR4" => "6", 
			"PBR5" => "6", 
			"PBR6" => "6", 
			"PBR7" => "6", 
			"PCDAT" => "6", 
			"PCDIR" => "6", 
			"PCINT" => "6", 
			"PCPAR" => "6", 
			"PCSO" => "6", 
			"PDDAT" => "6", 
			"PDDIR" => "6", 
			"PDPAR" => "6", 
			"PER" => "6", 
			"PGCRA" => "6", 
			"PGCRB" => "6", 
			"PIPC" => "6", 
			"PIPR" => "6", 
			"PISCR" => "6", 
			"PISCRK" => "6", 
			"PITC" => "6", 
			"PITCK" => "6", 
			"PITR" => "6", 
			"PLPRCR" => "6", 
			"PLPRCRK" => "6", 
			"POR0" => "6", 
			"POR1" => "6", 
			"POR2" => "6", 
			"POR3" => "6", 
			"POR4" => "6", 
			"POR5" => "6", 
			"POR6" => "6", 
			"POR7" => "6", 
			"PSCR" => "6", 
			"PSMR1" => "6", 
			"PSMR2" => "6", 
			"PSMR3" => "6", 
			"PSMR4" => "6", 
			"PTPR" => "6", 
			"PVR" => "6", 
			"r0" => "6", 
			"r1" => "6", 
			"r2" => "6", 
			"r3" => "6", 
			"r4" => "6", 
			"r5" => "6", 
			"r6" => "6", 
			"r7" => "6", 
			"r8" => "6", 
			"r9" => "6", 
			"r10" => "6", 
			"r11" => "6", 
			"r12" => "6", 
			"r13" => "6", 
			"r14" => "6", 
			"r15" => "6", 
			"r16" => "6", 
			"r17" => "6", 
			"r18" => "6", 
			"r19" => "6", 
			"r20" => "6", 
			"r21" => "6", 
			"r22" => "6", 
			"r23" => "6", 
			"r24" => "6", 
			"r25" => "6", 
			"r26" => "6", 
			"r27" => "6", 
			"r28" => "6", 
			"r29" => "6", 
			"r30" => "6", 
			"r31" => "6", 
			"RAM0" => "6", 
			"RCCR" => "6", 
			"RCTR1" => "6", 
			"RCTR2" => "6", 
			"RCTR3" => "6", 
			"RCTR4" => "6", 
			"RMDR" => "6", 
			"RMDS" => "6", 
			"RSR" => "6", 
			"RSRK" => "6", 
			"RTC" => "6", 
			"RTCAL" => "6", 
			"RTCALK" => "6", 
			"RTCK" => "6", 
			"RTCSC" => "6", 
			"RTCSCK" => "6", 
			"RTER" => "6", 
			"RTMR" => "6", 
			"RTSEC" => "6", 
			"RTSECK" => "6", 
			"SCCE1" => "6", 
			"SCCE2" => "6", 
			"SCCE3" => "6", 
			"SCCE4" => "6", 
			"SCCM1" => "6", 
			"SCCM2" => "6", 
			"SCCM3" => "6", 
			"SCCM4" => "6", 
			"SCCR" => "6", 
			"SCCRK" => "6", 
			"SCCS1" => "6", 
			"SCCS2" => "6", 
			"SCCS3" => "6", 
			"SCCS4" => "6", 
			"SDAR" => "6", 
			"SDCR" => "6", 
			"SDMR" => "6", 
			"SDSR" => "6", 
			"SICMR" => "6", 
			"SICR" => "6", 
			"SIEL" => "6", 
			"SIGMR" => "6", 
			"SIMASK" => "6", 
			"SIMODE" => "6", 
			"SIPEND" => "6", 
			"SIRAM" => "6", 
			"SIRP" => "6", 
			"SISTR" => "6", 
			"SIUMCR" => "6", 
			"SIVEC" => "6", 
			"SMCE1" => "6", 
			"SMCE2" => "6", 
			"SMCM1" => "6", 
			"SMCM2" => "6", 
			"SMCMR1" => "6", 
			"SMCMR2" => "6", 
			"sp" => "6", 
			"SPCOM" => "6", 
			"SPIE" => "6", 
			"SPIM" => "6", 
			"SPMODE" => "6", 
			"SPRG0" => "6", 
			"SPRG1" => "6", 
			"SPRG2" => "6", 
			"SPRG3" => "6", 
			"SRR0" => "6", 
			"SRR1" => "6", 
			"SWSR" => "6", 
			"SWT" => "6", 
			"SYPCR" => "6", 
			"TBL" => "6", 
			"TBK" => "6", 
			"TBREFF0" => "6", 
			"TBREFF0K" => "6", 
			"TBREFF1" => "6", 
			"TBREFF1K" => "6", 
			"TBREFA" => "6", 
			"TBREFAK" => "6", 
			"TBREFBK" => "6", 
			"TBREFL" => "6", 
			"TBSCR" => "6", 
			"TBSCRK" => "6", 
			"TBU" => "6", 
			"TCN1" => "6", 
			"TCN2" => "6", 
			"TCN3" => "6", 
			"TCN4" => "6", 
			"TCR1" => "6", 
			"TCR2" => "6", 
			"TCR3" => "6", 
			"TCR4" => "6", 
			"TER1" => "6", 
			"TER2" => "6", 
			"TER3" => "6", 
			"TER4" => "6", 
			"TESR" => "6", 
			"TGCR" => "6", 
			"TMR1" => "6", 
			"TMR2" => "6", 
			"TMR3" => "6", 
			"TMR4" => "6", 
			"TODR1" => "6", 
			"TODR2" => "6", 
			"TODR3" => "6", 
			"TODR4" => "6", 
			"TRR1" => "6", 
			"TRR2" => "6", 
			"TRR3" => "6", 
			"TRR4" => "6", 
			"XER" => "6");

// Special extensions

// Each category can specify a PHP function that returns an altered
// version of the keyword.
        
        

$this->linkscripts    	= array(
			"" => "donothing", 
			"5" => "donothing", 
			"1" => "donothing", 
			"2" => "donothing", 
			"3" => "donothing", 
			"4" => "donothing", 
			"6" => "donothing");
}


function donothing($keywordin)
{
	return $keywordin;
}

}?>
