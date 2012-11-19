<?php
$BEAUT_PATH = realpath(".")."/Services/COPage/syntax_highlight/php";
if (!isset ($BEAUT_PATH)) return;
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_microchp extends HFile{
   function HFile_microchp(){
     $this->HFile();	
/*************************************/
// Beautifier Highlighting Configuration File 
// Microchip PIC Asm
/*************************************/
// Flags

$this->nocase            	= "1";
$this->notrim            	= "0";
$this->perl              	= "0";

// Colours

$this->colours        	= array("blue", "purple", "gray", "brown", "blue", "purple", "gray");
$this->quotecolour       	= "blue";
$this->blockcommentcolour	= "green";
$this->linecommentcolour 	= "green";

// Indent Strings

$this->indent            	= array();
$this->unindent          	= array();

// String characters and delimiters

$this->stringchars       	= array();
$this->delimiters        	= array("~", "!", "@", "$", "%", "^", "&", "*", "(", ")", "-", "+", "=", "|", "\\", "{", "}", "[", "]", ":", ";", "\"", "'", "<", ">", " ", ",", "	", ".", "?");
$this->escchar           	= "";

// Comment settings

$this->linecommenton     	= array(";");
$this->blockcommenton    	= array("");
$this->blockcommentoff   	= array("");

// Keywords (keyword mapping to colour number)

$this->keywords          	= array(
			"#DEFINE" => "1", 
			"#INCLUDE" => "1", 
			"#UNDEFINE" => "1", 
			"BANKISEL" => "1", 
			"BANKSEL" => "1", 
			"CBLOCK" => "1", 
			"CODE" => "1", 
			"CONSTANT" => "1", 
			"DATA" => "1", 
			"DB" => "1", 
			"DE" => "1", 
			"DT" => "1", 
			"DW" => "1", 
			"ELSE" => "1", 
			"END" => "1", 
			"ENDC" => "1", 
			"ENDIF" => "1", 
			"ENDM" => "1", 
			"ENDW" => "1", 
			"EQU" => "1", 
			"ERROR" => "1", 
			"ERRORLEVEL" => "1", 
			"EXITM" => "1", 
			"EXPAND" => "1", 
			"EXTERN" => "1", 
			"FILL" => "1", 
			"GLOBAL" => "1", 
			"IDATA" => "1", 
			"IF" => "1", 
			"IFDEF" => "1", 
			"IFNDEF" => "1", 
			"LIST" => "1", 
			"LOCAL" => "1", 
			"MACRO" => "1", 
			"MESSG" => "1", 
			"NOEXPAND" => "1", 
			"NOLIST" => "1", 
			"ORG" => "1", 
			"PAGE" => "1", 
			"PAGESEL" => "1", 
			"PROCESSOR" => "1", 
			"RADIX" => "1", 
			"RES" => "1", 
			"SET" => "1", 
			"SPACE" => "1", 
			"SUBTITLE" => "1", 
			"TITLE" => "1", 
			"UDATA" => "1", 
			"UDATA_OVR" => "1", 
			"UDATA_SHR" => "1", 
			"VARIABLE" => "1", 
			"WHILE" => "1", 
			"__BADRAM" => "1", 
			"__CONFIG" => "1", 
			"__IDLOCS" => "1", 
			"__MAXRAM" => "1", 
			"=" => "1", 
			"addwf" => "2", 
			"andlw" => "2", 
			"andwf" => "2", 
			"bcf" => "2", 
			"bsf" => "2", 
			"btfsc" => "2", 
			"btfss" => "2", 
			"call" => "2", 
			"clrf" => "2", 
			"clrw" => "2", 
			"clrwdt" => "2", 
			"comf" => "2", 
			"decf" => "2", 
			"decfsz" => "2", 
			"goto" => "2", 
			"incf" => "2", 
			"incfsz" => "2", 
			"iorlw" => "2", 
			"iorwf" => "2", 
			"movf" => "2", 
			"movlw" => "2", 
			"movwf" => "2", 
			"nop" => "2", 
			"option" => "2", 
			"retlw" => "2", 
			"rlf" => "2", 
			"rrf" => "2", 
			"sleep" => "2", 
			"subwf" => "2", 
			"swapf" => "2", 
			"tris" => "2", 
			"xorlw" => "2", 
			"xorwf" => "2", 
			"addlw" => "3", 
			"retfie" => "3", 
			"return" => "3", 
			"sublw" => "3", 
			"addwfc" => "4", 
			"btg" => "4", 
			"cpfseq" => "4", 
			"cpfsgt" => "4", 
			"cpfslt" => "4", 
			"daw" => "4", 
			"dcfsnz" => "4", 
			"infsnz" => "4", 
			"lcall" => "4", 
			"movfp" => "4", 
			"movlb" => "4", 
			"movlr" => "4", 
			"movpf" => "4", 
			"mullw" => "4", 
			"mulwf" => "4", 
			"negw" => "4", 
			"rlcf" => "4", 
			"rlncf" => "4", 
			"rrcf" => "4", 
			"rrncf" => "4", 
			"setf" => "4", 
			"subwfb" => "4", 
			"tablrd" => "4", 
			"tablwt" => "4", 
			"tlrd" => "4", 
			"tlwt" => "4", 
			"tstfsz" => "4", 
			"ADCON0" => "5", 
			"ADCON1" => "5", 
			"ADRES" => "5", 
			"CCP1CON" => "5", 
			"CCP2CON" => "5", 
			"CCPR1H" => "5", 
			"CCPR1L" => "5", 
			"CCPR2H" => "5", 
			"CCPR2L" => "5", 
			"CMCON" => "5", 
			"EEADR" => "5", 
			"EECON1" => "5", 
			"EECON2" => "5", 
			"EEDATA" => "5", 
			"F" => "5", 
			"FSR" => "5", 
			"GPIO" => "5", 
			"INDF" => "5", 
			"INTCON" => "5", 
			"LCDCON" => "5", 
			"LCDD00" => "5", 
			"LCDD01" => "5", 
			"LCDD02" => "5", 
			"LCDD03" => "5", 
			"LCDD04" => "5", 
			"LCDD05" => "5", 
			"LCDD06" => "5", 
			"LCDD07" => "5", 
			"LCDD08" => "5", 
			"LCDD09" => "5", 
			"LCDD10" => "5", 
			"LCDD11" => "5", 
			"LCDD12" => "5", 
			"LCDD13" => "5", 
			"LCDD14" => "5", 
			"LCDD15" => "5", 
			"LCDPS" => "5", 
			"LCDSE" => "5", 
			"OSCCAL" => "5", 
			"PCL" => "5", 
			"PCLATH" => "5", 
			"PCON" => "5", 
			"PIE1" => "5", 
			"PIE2" => "5", 
			"PIR1" => "5", 
			"PIR2" => "5", 
			"PORTA" => "5", 
			"PORTB" => "5", 
			"PORTC" => "5", 
			"PORTD" => "5", 
			"PORTE" => "5", 
			"PORTF" => "5", 
			"PORTG" => "5", 
			"PR2" => "5", 
			"RCREG" => "5", 
			"RCSTA" => "5", 
			"RTCC" => "5", 
			"SPBRG" => "5", 
			"SSPADD" => "5", 
			"SSPBUF" => "5", 
			"SSPCON" => "5", 
			"SSPSTAT" => "5", 
			"STATUS" => "5", 
			"T1CON" => "5", 
			"T2CON" => "5", 
			"TMR0" => "5", 
			"TMR1H" => "5", 
			"TMR1L" => "5", 
			"TMR2" => "5", 
			"TRISA" => "5", 
			"TRISB" => "5", 
			"TRISC" => "5", 
			"TRISD" => "5", 
			"TRISE" => "5", 
			"TRISF" => "5", 
			"TRISG" => "5", 
			"TXREG" => "5", 
			"TXSTA" => "5", 
			"VRCON" => "5", 
			"W" => "5", 
			"WREG" => "5", 
			"ADCS0" => "6", 
			"ADCS1" => "6", 
			"ADIE" => "6", 
			"ADIF" => "6", 
			"ADON" => "6", 
			"BF" => "6", 
			"BO" => "6", 
			"BRGH" => "6", 
			"C" => "6", 
			"C1OUT" => "6", 
			"C2OUT" => "6", 
			"CAL0" => "6", 
			"CAL1" => "6", 
			"CAL2" => "6", 
			"CAL3" => "6", 
			"CAL4" => "6", 
			"CAL5" => "6", 
			"CCP1IE" => "6", 
			"CCP1IF" => "6", 
			"CCP1M0" => "6", 
			"CCP1M1" => "6", 
			"CCP1M2" => "6", 
			"CCP1M3" => "6", 
			"CCP1X" => "6", 
			"CCP1Y" => "6", 
			"CCP2IE" => "6", 
			"CCP2IF" => "6", 
			"CCP2M0" => "6", 
			"CCP2M1" => "6", 
			"CCP2M2" => "6", 
			"CCP2M3" => "6", 
			"CCP2X" => "6", 
			"CCP2Y" => "6", 
			"CHS0" => "6", 
			"CHS1" => "6", 
			"CHS2" => "6", 
			"CKE" => "6", 
			"CKP" => "6", 
			"CM0" => "6", 
			"CM1" => "6", 
			"CM2" => "6", 
			"CIS" => "6", 
			"CMIE" => "6", 
			"CMIF" => "6", 
			"CREN" => "6", 
			"CS0" => "6", 
			"CS1" => "6", 
			"CSRC" => "6", 
			"DA" => "6", 
			"DC" => "6", 
			"EEIE" => "6", 
			"EEIF" => "6", 
			"FERR" => "6", 
			"GIE" => "6", 
			"GO_DONE" => "6", 
			"IBF" => "6", 
			"IBOV" => "6", 
			"INTE" => "6", 
			"INTEDG" => "6", 
			"INTF" => "6", 
			"IRP" => "6", 
			"LCDEN" => "6", 
			"LCDIE" => "6", 
			"LCDIF" => "6", 
			"LMUX0" => "6", 
			"LMUX1" => "6", 
			"LP0" => "6", 
			"LP1" => "6", 
			"LP2" => "6", 
			"LP3" => "6", 
			"NOT_PD" => "6", 
			"NOT_RBPU" => "6", 
			"NOT_RBWU" => "6", 
			"NOT_TO" => "6", 
			"OBF" => "6", 
			"OERR" => "6", 
			"P" => "6", 
			"PA0" => "6", 
			"PA1" => "6", 
			"PCFG0" => "6", 
			"PCFG1" => "6", 
			"PCFG2" => "6", 
			"PEIE" => "6", 
			"POR" => "6", 
			"PS0" => "6", 
			"PS1" => "6", 
			"PS2" => "6", 
			"PSA" => "6", 
			"PSPIE" => "6", 
			"PSPIF" => "6", 
			"PSPMODE" => "6", 
			"RBIE" => "6", 
			"RBIF" => "6", 
			"RBWUF" => "6", 
			"RCIE" => "6", 
			"RCIF" => "6", 
			"RD" => "6", 
			"RP0" => "6", 
			"RP1" => "6", 
			"RW" => "6", 
			"RX9" => "6", 
			"RX9D" => "6", 
			"S" => "6", 
			"SE0" => "6", 
			"SE5" => "6", 
			"SE9" => "6", 
			"SE12" => "6", 
			"SE16" => "6", 
			"SE20" => "6", 
			"SE27" => "6", 
			"SE29" => "6", 
			"SLPEN" => "6", 
			"SMP" => "6", 
			"SPEN" => "6", 
			"SREN" => "6", 
			"SSPEN" => "6", 
			"SSPIE" => "6", 
			"SSPIF" => "6", 
			"SSPM0" => "6", 
			"SSPM1" => "6", 
			"SSPM2" => "6", 
			"SSPM3" => "6", 
			"SSPOV" => "6", 
			"SYNC" => "6", 
			"T0CS" => "6", 
			"T0IE" => "6", 
			"T0IF" => "6", 
			"T0SE" => "6", 
			"T1CKPS0" => "6", 
			"T1CKPS1" => "6", 
			"T1OSCEN" => "6", 
			"T2CKPS0" => "6", 
			"T2CKPS1" => "6", 
			"TMR1CS" => "6", 
			"TMR1IE" => "6", 
			"TMR1IF" => "6", 
			"TMR1ON" => "6", 
			"TMR2IE" => "6", 
			"TMR2IF" => "6", 
			"TMR2ON" => "6", 
			"TOUTPS3" => "6", 
			"TOUTPS2" => "6", 
			"TOUTPS1" => "6", 
			"TOUTPS0" => "6", 
			"TRISE0" => "6", 
			"TRISE1" => "6", 
			"TRISE2" => "6", 
			"TRMT" => "6", 
			"TX89" => "6", 
			"TX9" => "6", 
			"TX9D" => "6", 
			"TXD8" => "6", 
			"TXEN" => "6", 
			"TXIE" => "6", 
			"TXIF" => "6", 
			"UA" => "6", 
			"VGEN" => "6", 
			"VR0" => "6", 
			"VR1" => "6", 
			"VR2" => "6", 
			"VR3" => "6", 
			"VREN" => "6", 
			"VROE" => "6", 
			"VRR" => "6", 
			"WCOL" => "6", 
			"WR" => "6", 
			"WREN" => "6", 
			"WRERR" => "6", 
			"Z" => "6", 
			"+" => "7", 
			"," => "7", 
			"-" => "7", 
			"/" => "7", 
			"<" => "7", 
			">" => "7");

// Special extensions

// Each category can specify a PHP function that returns an altered
// version of the keyword.
        
        

$this->linkscripts    	= array(
			"1" => "donothing", 
			"2" => "donothing", 
			"3" => "donothing", 
			"4" => "donothing", 
			"5" => "donothing", 
			"6" => "donothing", 
			"7" => "donothing");
}


function donothing($keywordin)
{
	return $keywordin;
}

}?>
