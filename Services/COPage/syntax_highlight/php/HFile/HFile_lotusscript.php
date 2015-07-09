<?php
$BEAUT_PATH = realpath(".")."/Services/COPage/syntax_highlight/php";
if (!isset ($BEAUT_PATH)) return;
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_lotusscript extends HFile{
   function HFile_lotusscript(){
     $this->HFile();	
/*************************************/
// Beautifier Highlighting Configuration File 
// LotusScript
/*************************************/
// Flags

$this->nocase            	= "0";
$this->notrim            	= "0";
$this->perl              	= "0";

// Colours

$this->colours        	= array("blue", "purple", "gray", "brown");
$this->quotecolour       	= "blue";
$this->blockcommentcolour	= "green";
$this->linecommentcolour 	= "green";

// Indent Strings

$this->indent            	= array("{");
$this->unindent          	= array("}");

// String characters and delimiters

$this->stringchars       	= array();
$this->delimiters        	= array("~", "!", "@", "%", "^", "&", "*", "(", ")", "-", "+", "=", "|", "\\", "/", "{", "}", "[", "]", ":", ";", "\"", "'", "<", ">", " ", ",", "	", ".", "?");
$this->escchar           	= "";

// Comment settings

$this->linecommenton     	= array("'");
$this->blockcommenton    	= array("%REM");
$this->blockcommentoff   	= array("%END REM");

// Keywords (keyword mapping to colour number)

$this->keywords          	= array(
			"Abs" => "1", 
			"Access" => "1", 
			"ACos" => "1", 
			"ActivateApp" => "1", 
			"Alias" => "1", 
			"And" => "1", 
			"Any" => "1", 
			"Append" => "1", 
			"As" => "1", 
			"Asc" => "1", 
			"ASin" => "1", 
			"Atn" => "1", 
			"Atn2" => "1", 
			"Base" => "1", 
			"Beep" => "1", 
			"Bin" => "1", 
			"Bin$" => "1", 
			"Binary" => "1", 
			"Bind" => "1", 
			"ByVal" => "1", 
			"Call" => "1", 
			"CCur" => "1", 
			"CDat" => "1", 
			"CDbl" => "1", 
			"ChDir" => "1", 
			"ChDrive" => "1", 
			"Chr" => "1", 
			"Chr$" => "1", 
			"CInt" => "1", 
			"Class" => "1", 
			"CLng" => "1", 
			"Close" => "1", 
			"Command" => "1", 
			"Command$" => "1", 
			"Compare" => "1", 
			"Const" => "1", 
			"Cos" => "1", 
			"CSng" => "1", 
			"CStr" => "1", 
			"CurDir" => "1", 
			"CurDir$" => "1", 
			"CurDrive" => "1", 
			"CurDrive$" => "1", 
			"CVar" => "1", 
			"DataType" => "1", 
			"Date" => "1", 
			"Date$" => "1", 
			"DateNumber" => "1", 
			"DateValue" => "1", 
			"Day" => "1", 
			"Declare" => "1", 
			"DefCur" => "1", 
			"DefDbl" => "1", 
			"DefInt" => "1", 
			"DefLng" => "1", 
			"DefSng" => "1", 
			"DefStr" => "1", 
			"DefVar" => "1", 
			"Delete" => "1", 
			"Dim" => "1", 
			"Dir" => "1", 
			"Dir$" => "1", 
			"Environ" => "1", 
			"Environ$" => "1", 
			"EOF" => "1", 
			"Eqv" => "1", 
			"Erase" => "1", 
			"Erl" => "1", 
			"Err" => "1", 
			"Error" => "1", 
			"Error$" => "1", 
			"Evaluate" => "1", 
			"Event" => "1", 
			"Execute" => "1", 
			"Exit" => "1", 
			"Exp" => "1", 
			"FALSE" => "1", 
			"FileAttr" => "1", 
			"FileCopy" => "1", 
			"FileDateTime" => "1", 
			"FileLen" => "1", 
			"Fix" => "1", 
			"Format" => "1", 
			"Format$" => "1", 
			"Fraction" => "1", 
			"FreeFile" => "1", 
			"FromFunction" => "1", 
			"Get" => "1", 
			"GetFileAttr" => "1", 
			"Hex" => "1", 
			"Hex$" => "1", 
			"Hour" => "1", 
			"IMEStatus" => "1", 
			"Imp" => "1", 
			"In" => "1", 
			"Input" => "1", 
			"Input$" => "1", 
			"InputB" => "1", 
			"InputB$" => "1", 
			"InputBox" => "1", 
			"InputBox$" => "1", 
			"InputBP" => "1", 
			"InputBP$" => "1", 
			"InStr" => "1", 
			"InStrB" => "1", 
			"InStrBP" => "1", 
			"Int" => "1", 
			"Is" => "1", 
			"IsArray" => "1", 
			"IsDate" => "1", 
			"IsElement" => "1", 
			"IsEmpty" => "1", 
			"IsList" => "1", 
			"IsNull" => "1", 
			"IsNumeric" => "1", 
			"IsObject" => "1", 
			"IsScalar" => "1", 
			"IsUnknown" => "1", 
			"Kill" => "1", 
			"LBound" => "1", 
			"LCase" => "1", 
			"LCase$" => "1", 
			"Left" => "1", 
			"Left$" => "1", 
			"LeftB" => "1", 
			"LeftB$" => "1", 
			"LeftBP" => "1", 
			"LeftBP$" => "1", 
			"Len" => "1", 
			"LenB" => "1", 
			"LenBP" => "1", 
			"Let" => "1", 
			"Lib" => "1", 
			"Like" => "1", 
			"Line" => "1", 
			"List" => "1", 
			"ListTag" => "1", 
			"LMBCS" => "1", 
			"Loc" => "1", 
			"Lock" => "1", 
			"LOF" => "1", 
			"Log" => "1", 
			"Loop" => "1", 
			"LSet" => "1", 
			"LTrim" => "1", 
			"LTrim$" => "1", 
			"Me" => "1", 
			"MessageBox" => "1", 
			"Mid" => "1", 
			"Mid$" => "1", 
			"MidB" => "1", 
			"MidB$" => "1", 
			"Minute" => "1", 
			"MkDir" => "1", 
			"Mod" => "1", 
			"Month" => "1", 
			"Name" => "1", 
			"New" => "1", 
			"NoCase" => "1", 
			"NoPitch" => "1", 
			"Not" => "1", 
			"NOTHING" => "1", 
			"Now" => "1", 
			"NULL" => "1", 
			"Oct" => "1", 
			"Oct$" => "1", 
			"On" => "1", 
			"Open" => "1", 
			"Option" => "1", 
			"Or" => "1", 
			"Output" => "1", 
			"PI" => "1", 
			"Pitch" => "1", 
			"Preserve" => "1", 
			"Print" => "1", 
			"Private" => "1", 
			"Property" => "1", 
			"Public" => "1", 
			"Put" => "1", 
			"Random" => "1", 
			"Randomize" => "1", 
			"Read" => "1", 
			"ReDim" => "1", 
			"Rem" => "1", 
			"Remove" => "1", 
			"Reset" => "1", 
			"Resume" => "1", 
			"Return" => "1", 
			"Right" => "1", 
			"Right$" => "1", 
			"RightB" => "1", 
			"RightB$" => "1", 
			"RightBP" => "1", 
			"RightBP$" => "1", 
			"RmDir" => "1", 
			"Rnd" => "1", 
			"Round" => "1", 
			"RSet" => "1", 
			"RTrim" => "1", 
			"RTrim$" => "1", 
			"Second" => "1", 
			"Seek" => "1", 
			"SendKeys" => "1", 
			"Set" => "1", 
			"SetFileAttr" => "1", 
			"Sgn" => "1", 
			"Shared" => "1", 
			"Shell" => "1", 
			"Sin" => "1", 
			"Space" => "1", 
			"Space$" => "1", 
			"Spc" => "1", 
			"Sqr" => "1", 
			"Static" => "1", 
			"Step" => "1", 
			"Stop" => "1", 
			"Str" => "1", 
			"Str$" => "1", 
			"StrCompare" => "1", 
			"String$" => "1", 
			"Sub" => "1", 
			"Tab" => "1", 
			"Tan" => "1", 
			"Time" => "1", 
			"Time$" => "1", 
			"TimeNumber" => "1", 
			"Timer" => "1", 
			"TimeValue" => "1", 
			"To" => "1", 
			"Today" => "1", 
			"Trim" => "1", 
			"Trim$" => "1", 
			"TRUE" => "1", 
			"Type" => "1", 
			"TypeName" => "1", 
			"UBound" => "1", 
			"UCase" => "1", 
			"UCase$" => "1", 
			"UChr" => "1", 
			"UChr$" => "1", 
			"Uni" => "1", 
			"Unicode" => "1", 
			"Unlock" => "1", 
			"Use" => "1", 
			"UseLSX" => "1", 
			"UString" => "1", 
			"UString$" => "1", 
			"Val" => "1", 
			"With" => "1", 
			"Write" => "1", 
			"Xor" => "1", 
			"Year" => "1", 
			"Yield" => "1", 
			"Currency" => "2", 
			"Double" => "2", 
			"Integer" => "2", 
			"Long" => "2", 
			"Single" => "2", 
			"String" => "2", 
			"Variant" => "2", 
			"Case" => "3", 
			"Do" => "3", 
			"Else" => "3", 
			"End" => "3", 
			"ElseIf" => "3", 
			"For" => "3", 
			"Forall" => "3", 
			"If" => "3", 
			"Next" => "3", 
			"Select" => "3", 
			"Then" => "3", 
			"Until" => "3", 
			"Wend" => "3", 
			"While" => "3", 
			"GoSub" => "3", 
			"GoTo" => "3", 
			"NotesACLNotesACLEntry" => "4", 
			"NotesAgent" => "4", 
			"NotesDatabase" => "4", 
			"NotesDateRange" => "4", 
			"NotesDateTime" => "4", 
			"NotesDbDirectory" => "4", 
			"NotesDocument" => "4", 
			"NotesDocumentCollection" => "4", 
			"NotesEmbeddedObject" => "4", 
			"NotesForm" => "4", 
			"NotesInternational" => "4", 
			"NotesItem" => "4", 
			"NotesLog" => "4", 
			"NotesName" => "4", 
			"NotesNewsLetter" => "4", 
			"NotesRegistration" => "4", 
			"NotesRichTextItem" => "4", 
			"NotesRichTextStyle" => "4", 
			"NotesSession" => "4", 
			"NotesTimer" => "4", 
			"NotesView" => "4", 
			"NotesViewColumn" => "4", 
			"NotesUIDatabase" => "4", 
			"NotesUIDocument" => "4", 
			"NotesUIView" => "4", 
			"NotesUIWorkspace" => "4", 
			"Navigator" => "4", 
			"notesaclnotesaclentry" => "4", 
			"notesagent" => "4", 
			"notesdatabase" => "4", 
			"notesdaterange" => "4", 
			"notesdatetime" => "4", 
			"notesdbdirectory" => "4", 
			"notesdocument" => "4", 
			"notesdocumentcollection" => "4", 
			"notesembeddedobject" => "4", 
			"notesform" => "4", 
			"notesinternational" => "4", 
			"notesitem" => "4", 
			"noteslog" => "4", 
			"notesname" => "4", 
			"notesnewsletter" => "4", 
			"notesregistration" => "4", 
			"notesrichtextitem" => "4", 
			"notesrichtextstyle" => "4", 
			"notessession" => "4", 
			"notestimer" => "4", 
			"notesview" => "4", 
			"notesviewcolumn" => "4", 
			"notesuidatabase" => "4", 
			"notesuidocument" => "4", 
			"notesuiview" => "4", 
			"notesuiworkspace" => "4", 
			"navigator" => "4");

// Special extensions

// Each category can specify a PHP function that returns an altered
// version of the keyword.
        
        

$this->linkscripts    	= array(
			"1" => "donothing", 
			"2" => "donothing", 
			"3" => "donothing", 
			"4" => "donothing");
}


function donothing($keywordin)
{
	return $keywordin;
}

}?>
