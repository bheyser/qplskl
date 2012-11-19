<?php
$BEAUT_PATH = realpath(".")."/Services/COPage/syntax_highlight/php";
if (!isset ($BEAUT_PATH)) return;
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_clearbasic extends HFile{
   function HFile_clearbasic(){
     $this->HFile();	
/*************************************/
// Beautifier Highlighting Configuration File 
// ClearBasic
/*************************************/
// Flags

$this->nocase            	= "1";
$this->notrim            	= "0";
$this->perl              	= "0";

// Colours

$this->colours        	= array("blue", "gray", "purple", "gray", "brown", "blue", "purple");
$this->quotecolour       	= "blue";
$this->blockcommentcolour	= "green";
$this->linecommentcolour 	= "green";

// Indent Strings

$this->indent            	= array("Then", "Do");
$this->unindent          	= array("End", "Next", "End If", "End Select", "Loop");

// String characters and delimiters

$this->stringchars       	= array("\"");
$this->delimiters        	= array("~", "!", "@", "%", "^", "&", "*", "(", ")", "-", "+", "=", "|", "\\", "/", "{", "}", "[", "]", ":", ";", "\"", "'", "<", ">", " ", ",", "	", "?");
$this->escchar           	= "";

// Comment settings

$this->linecommenton     	= array("'");
$this->blockcommenton    	= array("/*");
$this->blockcommentoff   	= array("*/");

// Keywords (keyword mapping to colour number)

$this->keywords          	= array(
			"AppMenu" => "1", 
			"Boolean" => "1", 
			"BulkRetrieve" => "1", 
			"BulkSave" => "1", 
			"Form" => "1", 
			"Integer" => "7", 
			"List" => "1", 
			"Long" => "7", 
			"Record" => "1", 
			"SQLDB" => "1", 
			"String" => "7", 
			"AND" => "2", 
			"As" => "2", 
			"ByRef" => "2", 
			"ByVal" => "2", 
			"Case" => "2", 
			"Declare" => "2", 
			"Dim" => "2", 
			"Else" => "2", 
			"ElseIf" => "2", 
			"End" => "2", 
			"For" => "2", 
			"Function" => "2", 
			"Global" => "2", 
			"If" => "2", 
			"Next" => "2", 
			"New" => "2", 
			"NOT" => "2", 
			"OR" => "2", 
			"Sub" => "2", 
			"Select" => "2", 
			"Set" => "2", 
			"Step" => "2", 
			"To" => "2", 
			"Type" => "2", 
			"Then" => "2", 
			"While" => "2", 
			"cbAbortRetryIgnore" => "3", 
			"cbAscending" => "3", 
			"cbByRef" => "3", 
			"cbByValue" => "3", 
			"cbCloseChildren" => "3", 
			"cbCloseMessage" => "3", 
			"cbDescending" => "3", 
			"cbDefClosedWindow" => "3", 
			"cbEqual" => "3", 
			"cbFirstMessage" => "3", 
			"cbFrontIfUp" => "3", 
			"cbGreater" => "3", 
			"cbGreaterorEqual" => "3", 
			"cbIdAbort" => "3", 
			"cbIdCancel" => "3", 
			"cbIdDiscard" => "3", 
			"cbIdIgnore" => "3", 
			"cbIdNo" => "3", 
			"cbIdOK" => "3", 
			"cbIdRetry" => "3", 
			"cbIdSave" => "3", 
			"cbIdYes" => "3", 
			"cbIn" => "3", 
			"cbLess" => "3", 
			"cbLessOrEqual" => "3", 
			"cbLike" => "3", 
			"cbNoDefault" => "3", 
			"cbNotEqual" => "3", 
			"cbNotLike" => "3", 
			"cbOK" => "3", 
			"cbOKCancel" => "3", 
			"cbRefreshMessage" => "3", 
			"cbRetryCancel" => "3", 
			"cbSaveDiscardCancel" => "3", 
			"cbSoundsLike" => "3", 
			"cbYesNo" => "3", 
			"cbYesNoCancel" => "3", 
			"ebCritical" => "3", 
			"ebExclamation" => "3", 
			"ebInformation" => "3", 
			"ebQuestion" => "3", 
			"ebApplicationModal" => "3", 
			"ebSystemModal" => "3", 
			"False" => "3", 
			"True" => "3", 
			"*" => "4", 
			"+" => "4", 
			"-" => "4", 
			"." => "4", 
			"/" => "4", 
			":" => "4", 
			"<" => "4", 
			"<=" => "4", 
			"=" => "4", 
			">" => "4", 
			">=" => "4", 
			"&" => "4", 
			"AddItem" => "5", 
			"AllSpaces" => "5", 
			"AllowDuplicates" => "5", 
			"AppendFilter" => "5", 
			"AppendItem" => "5", 
			"AppendSeparator" => "5", 
			"AppendSort" => "5", 
			"Caption" => "5", 
			"CancelRecord" => "5", 
			"ChangeRecord" => "5", 
			"ChangeToNew" => "5", 
			"Clear" => "5", 
			"Close" => "5", 
			"CLTransition" => "5", 
			"ColorCells" => "5", 
			"Concat" => "5", 
			"Connect" => "5", 
			"Contains" => "5", 
			"Contents" => "5", 
			"Copy" => "5", 
			"CopyFields" => "5", 
			"Count" => "5", 
			"CountByType" => "5", 
			"CreateColorScheme" => "5", 
			"DeleteRecord" => "5", 
			"DeleteRecordById" => "5", 
			"DisableControls" => "5", 
			"DisableControlsDeep" => "5", 
			"Disconnect" => "5", 
			"DoDefault" => "5", 
			"Down" => "5", 
			"EmployeeObjid" => "5", 
			"Empty" => "5", 
			"Enable" => "5", 
			"EnableControlDeep" => "5", 
			"EnableControls" => "5", 
			"EndDoc" => "5", 
			"EntryCount" => "5", 
			"Execute" => "5", 
			"ExecuteCB" => "5", 
			"ExecuteMenu" => "5", 
			"ExecuteProc" => "5", 
			"ExitApp" => "5", 
			"ExtractList" => "5", 
			"Fill" => "5", 
			"FindFirstIndex" => "5", 
			"ForceRedraw" => "5", 
			"Format" => "5", 
			"GetByIndex" => "5", 
			"GetContents" => "5", 
			"GetContext" => "5", 
			"GetControlByName" => "5", 
			"GetCurrentDB" => "5", 
			"GetField" => "5", 
			"GetFormat" => "5", 
			"GetFormInstance" => "5", 
			"GetItemByIndex" => "5", 
			"GetList" => "5", 
			"GetRecordByIndex" => "5", 
			"GetRecordList" => "5", 
			"GetRelatedRecordList" => "5", 
			"GetSelected" => "5", 
			"GetString" => "5", 
			"GetText" => "5", 
			"InputBox" => "5", 
			"InsertRecord" => "5", 
			"IsDirty" => "5", 
			"IsEnabled" => "5", 
			"IsExactly" => "5", 
			"IsNew" => "5", 
			"ItemType" => "5", 
			"ItemByIndex" => "5", 
			"Line" => "5", 
			"ListByIndex" => "5", 
			"Login" => "5", 
			"Logout" => "5", 
			"LogSQL" => "5", 
			"Move" => "5", 
			"MsgBox" => "5", 
			"NewPage" => "5", 
			"Notify" => "5", 
			"NotifyById" => "5", 
			"NotifyByKey" => "5", 
			"NotifyChild" => "5", 
			"NotifyParent" => "5", 
			"NotifyTab" => "5", 
			"NotifyTabParent" => "5", 
			"Print" => "5", 
			"RecordType" => "5", 
			"Refresh" => "5", 
			"RelateRecords" => "5", 
			"RelateRecordsFromID" => "5", 
			"RelateRecordsFromToID" => "5", 
			"RelateRecordsToID" => "5", 
			"RemoveByIndex" => "5", 
			"RemoveByItem" => "5", 
			"RemoveItem" => "5", 
			"RemoveSelected" => "5", 
			"RenameItem" => "5", 
			"ReplaceByIndex" => "5", 
			"ReplaceItem" => "5", 
			"RetrieveRecords" => "5", 
			"Save" => "5", 
			"SelectedIndexes" => "5", 
			"SelectedList" => "5", 
			"SetCellColoring" => "5", 
			"SetColorScheme" => "5", 
			"SetField" => "5", 
			"SetFocus" => "5", 
			"SetFunction" => "5", 
			"SetParent" => "5", 
			"SetRoot" => "5", 
			"SetRootById" => "5", 
			"SetSelected" => "5", 
			"SetText" => "5", 
			"SetValue" => "5", 
			"Show" => "5", 
			"ShowAttachments" => "5", 
			"ShowCase" => "5", 
			"ShowContact" => "5", 
			"ShowContract" => "5", 
			"ShowControls" => "5", 
			"ShowControlsDeep" => "5", 
			"ShowCR" => "5", 
			"ShowDebugWindow" => "5", 
			"ShowDefaultMenu" => "5", 
			"ShowEmployee" => "5", 
			"ShowFTS" => "5", 
			"ShowSelect" => "5", 
			"ShowSite" => "5", 
			"ShowSubcase" => "5", 
			"SimpleQuery" => "5", 
			"Sort" => "5", 
			"TextHeight" => "5", 
			"TextWidth" => "5", 
			"TransferPart" => "5", 
			"TraverseFromParent" => "5", 
			"TraverseFromRoot" => "5", 
			"UnrelateRecords" => "5", 
			"Unselect" => "5", 
			"Up" => "5", 
			"UpdateRecord" => "5", 
			"UserName" => "5", 
			"UserObjid" => "5", 
			"Value" => "5", 
			"App" => "6", 
			"Basic" => "6", 
			"Debug" => "6", 
			"Err" => "6", 
			"Me" => "6", 
			"Msg" => "6", 
			"Net" => "6", 
			"Printer" => "6", 
			"System" => "6", 
			"Abs" => "7", 
			"ActivateControl" => "7", 
			"AddCon" => "7", 
			"AnswerBox" => "7", 
			"AppActivate" => "7", 
			"AppClose" => "7", 
			"AppFileName" => "7", 
			"AppFind" => "7", 
			"AppGetActive" => "7", 
			"AppGetPosition" => "7", 
			"AppGetState" => "7", 
			"AppHide" => "7", 
			"AppList" => "7", 
			"AppMaximize" => "7", 
			"AppMinimize" => "7", 
			"AppMove" => "7", 
			"AppRestore" => "7", 
			"AppSetState" => "7", 
			"AppShow" => "7", 
			"AppSize" => "7", 
			"AppType" => "7", 
			"Architecture" => "7", 
			"ArrangeIcons" => "7", 
			"ArrayDims" => "7", 
			"Arrays" => "7", 
			"ArraySort" => "7", 
			"Asc" => "7", 
			"AscB" => "7", 
			"AscW" => "7", 
			"AskBox" => "7", 
			"AskPasssword" => "7", 
			"Atn" => "7", 
			"Base" => "7", 
			"BasicScript" => "7", 
			"Beep" => "7", 
			"Begin" => "7", 
			"Dialog" => "7", 
			"Browse" => "7", 
			"ButtonEnabled" => "7", 
			"ButtonExists" => "7", 
			"Call" => "7", 
			"CancelCon" => "7", 
			"Capability" => "7", 
			"Cascade" => "7", 
			"CBool" => "7", 
			"CCur" => "7", 
			"CDate" => "7", 
			"CDbl" => "7", 
			"ChDir" => "7", 
			"ChDrive" => "7", 
			"CheckBox" => "7", 
			"CheckBoxEnabled" => "7", 
			"CheckBoxExists" => "7", 
			"Choose" => "7", 
			"Chr" => "7", 
			"ChrB" => "7", 
			"ChrW" => "7", 
			"CInt" => "7", 
			"CLng" => "7", 
			"CodePage" => "7", 
			"ComboBox" => "7", 
			"ComboBoxEnabled" => "7", 
			"ComboBoxExists" => "7", 
			"Command" => "7", 
			"Comments" => "7", 
			"Compare" => "7", 
			"Const" => "7", 
			"Conversion" => "7", 
			"Cos" => "7", 
			"CreateObject" => "7", 
			"CSng" => "7", 
			"CStr" => "7", 
			"CStrings" => "7", 
			"CurDir" => "7", 
			"Currency" => "7", 
			"CVar" => "7", 
			"CVDate" => "7", 
			"CVErr" => "7", 
			"Date" => "7", 
			"DateAdd" => "7", 
			"DateDiff" => "7", 
			"DatePart" => "7", 
			"DateSerial" => "7", 
			"DateValue" => "7", 
			"Day" => "7", 
			"DDB" => "7", 
			"DDEExecute" => "7", 
			"DDEInitate" => "7", 
			"DDEPoke" => "7", 
			"DDERequest" => "7", 
			"DDESend" => "7", 
			"DDETermiateAll" => "7", 
			"DDETerminate" => "7", 
			"DDETimeOut" => "7", 
			"Default" => "7", 
			"DefBool" => "7", 
			"DefCur" => "7", 
			"DefDate" => "7", 
			"DefDbl" => "7", 
			"DefInt" => "7", 
			"DefLng" => "7", 
			"DefObj" => "7", 
			"DefSng" => "7", 
			"DefStr" => "7", 
			"DefVar" => "7", 
			"DeleteSettings" => "7", 
			"Description" => "7", 
			"Dir" => "7", 
			"DiskDrives" => "7", 
			"DiskFree" => "7", 
			"DlgBaseUnitsX" => "7", 
			"DlgBaseUnitsY" => "7", 
			"DlgCaption" => "7", 
			"DlgControlID" => "7", 
			"DlgEnable" => "7", 
			"DlgFocus" => "7", 
			"DlgListBoxArray" => "7", 
			"DlgSetPicture" => "7", 
			"DlgText" => "7", 
			"DlgValue" => "7", 
			"DlgVisible" => "7", 
			"Do" => "7", 
			"DoEvents" => "7", 
			"DoKeys" => "7", 
			"Double" => "7", 
			"DropListBox" => "7", 
			"EditEnabled" => "7", 
			"EditExists" => "7", 
			"Environ" => "7", 
			"Eof" => "7", 
			"Eoln$" => "7", 
			"Eqv" => "7", 
			"Erase" => "7", 
			"Erl" => "7", 
			"Error" => "7", 
			"Exit" => "7", 
			"Exp" => "7", 
			"Explicit" => "7", 
			"FileAttr" => "7", 
			"FileCopy" => "7", 
			"FileDateTime" => "7", 
			"FileDirs" => "7", 
			"FileExists" => "7", 
			"FileLen" => "7", 
			"FileList" => "7", 
			"FileParse" => "7", 
			"FileType" => "7", 
			"Financial" => "7", 
			"Fix" => "7", 
			"FreeFile" => "7", 
			"FreeMemory" => "7", 
			"FreeResources" => "7", 
			"FV" => "7", 
			"Get" => "7", 
			"GetAllSettings" => "7", 
			"GetAttr" => "7", 
			"GetCaps" => "7", 
			"GetCheckBox" => "7", 
			"GetComboBoxItem" => "7", 
			"GetComboBoxItemCount" => "7", 
			"GetCon" => "7", 
			"GetEditText" => "7", 
			"GetListBoxItem" => "7", 
			"GetListBoxItemCount" => "7", 
			"GetObject" => "7", 
			"GetOption" => "7", 
			"GetSetting" => "7", 
			"GoSub" => "7", 
			"Goto" => "7", 
			"GroupBox" => "7", 
			"Height" => "7", 
			"HelpContext" => "7", 
			"HelpFIle" => "7", 
			"Hex" => "7", 
			"HLine" => "7", 
			"HomeDir" => "7", 
			"Hour" => "7", 
			"HPage" => "7", 
			"HScroll" => "7", 
			"HWND" => "7", 
			"IIf" => "7", 
			"IMEStatus" => "7", 
			"Imp" => "7", 
			"Inline" => "7", 
			"Input" => "7", 
			"InputB" => "7", 
			"InStr" => "7", 
			"InStrB" => "7", 
			"Int" => "7", 
			"IPmt" => "7", 
			"IRR" => "7", 
			"Is" => "7", 
			"IsDate" => "7", 
			"IsEmpty" => "7", 
			"IsError" => "7", 
			"IsMissing" => "7", 
			"IsNull" => "7", 
			"IsNumeric" => "7", 
			"IsObject" => "7", 
			"Item" => "7", 
			"ItemCount" => "7", 
			"Kill" => "7", 
			"LastDLLError" => "7", 
			"LBound" => "7", 
			"LCase" => "7", 
			"Left" => "7", 
			"LeftB" => "7", 
			"Len" => "7", 
			"LenB" => "7", 
			"Let" => "7", 
			"Like" => "7", 
			"LineCount" => "7", 
			"ListBox" => "7", 
			"ListBoxEnabled" => "7", 
			"ListBoxExists" => "7", 
			"Loc" => "7", 
			"Locale" => "7", 
			"Lock" => "7", 
			"Lof" => "7", 
			"Log" => "7", 
			"Loop" => "7", 
			"LSet" => "7", 
			"LTrim" => "7", 
			"MacID" => "7", 
			"MacScript" => "7", 
			"Main" => "7", 
			"Mci" => "7", 
			"Menu" => "7", 
			"MenuItemChecked" => "7", 
			"MenuItemEnabled" => "7", 
			"MenuItemExists" => "7", 
			"Mid" => "7", 
			"MidB" => "7", 
			"Minute" => "7", 
			"MIRR" => "7", 
			"Miscellaneous" => "7", 
			"MkDir" => "7", 
			"Mod" => "7", 
			"Month" => "7", 
			"MouseTrails" => "7", 
			"Msg.Close" => "7", 
			"Msg.Open" => "7", 
			"Msg.SetText" => "7", 
			"Msg.SetThermometer" => "7", 
			"Name" => "7", 
			"Networks" => "7", 
			"Nothing" => "7", 
			"Now" => "7", 
			"NPer" => "7", 
			"NPV" => "7", 
			"Number" => "7", 
			"Oct" => "7", 
			"On" => "7", 
			"Open" => "7", 
			"OpenFilename" => "7", 
			"OperatingSystem" => "7", 
			"OperatingSystemVendor" => "7", 
			"OperatingSystemVersion" => "7", 
			"Option" => "7", 
			"OptionButton" => "7", 
			"OptionEnabled" => "7", 
			"OptionExists" => "7", 
			"OptionGroup" => "7", 
			"OS" => "7", 
			"PathSeparator" => "7", 
			"Picture" => "7", 
			"PictureButton" => "7", 
			"Pmt" => "7", 
			"PopupMenu" => "7", 
			"PPmt" => "7", 
			"Predefined" => "7", 
			"PrinterGetOrientation" => "7", 
			"PrinterSetOrientation" => "7", 
			"PrintFile" => "7", 
			"Printing" => "7", 
			"Private" => "7", 
			"Processor" => "7", 
			"ProcessorCount" => "7", 
			"Public" => "7", 
			"PushButton" => "7", 
			"Put" => "7", 
			"PV" => "7", 
			"QueEmpty" => "7", 
			"QueFlush" => "7", 
			"QueKeyDn" => "7", 
			"QueKeys" => "7", 
			"QueKeyUp" => "7", 
			"QueMouseClick" => "7", 
			"QueMouseDblClick" => "7", 
			"QueMouseDblDn" => "7", 
			"QueMouseDn" => "7", 
			"QueMouseMove" => "7", 
			"QueMouseMoveBatch" => "7", 
			"QueMouseUp" => "7", 
			"QueSetRelativeWindow" => "7", 
			"Raise" => "7", 
			"Random" => "7", 
			"Randomize" => "7", 
			"Rate" => "7", 
			"ReadIni" => "7", 
			"ReadIniSection" => "7", 
			"ReDim" => "7", 
			"Reset" => "7", 
			"Restart" => "7", 
			"Resume" => "7", 
			"Return" => "7", 
			"Right" => "7", 
			"RightB" => "7", 
			"RmDir" => "7", 
			"Rnd" => "7", 
			"RSet" => "7", 
			"RTrim" => "7", 
			"SaveFilename" => "7", 
			"SaveSetting" => "7", 
			"Second" => "7", 
			"Seek" => "7", 
			"statement" => "7", 
			"SelectBox" => "7", 
			"SelectButton" => "7", 
			"SelectComboBoxItem" => "7", 
			"SelectListBoxItem" => "7", 
			"SendKeys" => "7", 
			"SetAttr" => "7", 
			"SetCheckBox" => "7", 
			"SetColors" => "7", 
			"SetEditText" => "7", 
			"SetOption" => "7", 
			"SetWallpaper" => "7", 
			"Sgn" => "7", 
			"Shell" => "7", 
			"Sin" => "7", 
			"Single" => "7", 
			"Sleep" => "7", 
			"SLN" => "7", 
			"SnaHFileot" => "7", 
			"Source" => "7", 
			"Space" => "7", 
			"Spc" => "7", 
			"SQLBind" => "7", 
			"SQLClose" => "7", 
			"SQLError" => "7", 
			"SQLExecQuery" => "7", 
			"SQLGetSchema" => "7", 
			"SQLOpen" => "7", 
			"SQLRequest" => "7", 
			"SQLRetrieve" => "7", 
			"SQLRetrieveToFile" => "7", 
			"Sqr" => "7", 
			"Stop" => "7", 
			"Str" => "7", 
			"StrComp" => "7", 
			"StrConv" => "7", 
			"Switch" => "7", 
			"SYD" => "7", 
			"Tab" => "7", 
			"Tan" => "7", 
			"Text" => "7", 
			"TextBox" => "7", 
			"Tile" => "7", 
			"Time" => "7", 
			"Timer" => "7", 
			"TimeSerial" => "7", 
			"TimeValue" => "7", 
			"TotalMemory" => "7", 
			"Trim" => "7", 
			"TwipsPerPixelX" => "7", 
			"TwipsPerPixelY" => "7", 
			"UBound" => "7", 
			"UCase" => "7", 
			"Unlock" => "7", 
			"User" => "7", 
			"Val" => "7", 
			"Variants" => "7", 
			"Varient" => "7", 
			"VarType" => "7", 
			"Version" => "7", 
			"Viewport" => "7", 
			"ViewportClear" => "7", 
			"ViewportClose" => "7", 
			"ViewportOpen" => "7", 
			"VLine" => "7", 
			"VPage" => "7", 
			"VScroll" => "7", 
			"Weekday" => "7", 
			"Wend" => "7", 
			"Width" => "7", 
			"Width#" => "7", 
			"WinActivate" => "7", 
			"WinClose" => "7", 
			"WindowsDirectory" => "7", 
			"WindowsVersion" => "7", 
			"WinFind" => "7", 
			"WinList" => "7", 
			"WinMaximize" => "7", 
			"WinMinimize" => "7", 
			"WinMove" => "7", 
			"WinRestore" => "7", 
			"WinSize" => "7", 
			"Word" => "7", 
			"WordCount" => "7", 
			"Write" => "7", 
			"WriteIni" => "7", 
			"Xor" => "7", 
			"Year" => "7");

// Special extensions

// Each category can specify a PHP function that returns an altered
// version of the keyword.
        
        

$this->linkscripts    	= array(
			"1" => "donothing", 
			"7" => "donothing", 
			"2" => "donothing", 
			"3" => "donothing", 
			"4" => "donothing", 
			"5" => "donothing", 
			"6" => "donothing");
}


function donothing($keywordin)
{
	return $keywordin;
}

}?>
