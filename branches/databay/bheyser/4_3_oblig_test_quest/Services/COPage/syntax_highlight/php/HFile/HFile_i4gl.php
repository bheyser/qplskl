<?php
$BEAUT_PATH = realpath(".")."/Services/COPage/syntax_highlight/php";
if (!isset ($BEAUT_PATH)) return;
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_i4gl extends HFile{
   function HFile_i4gl(){
     $this->HFile();	
/*************************************/
// Beautifier Highlighting Configuration File 
// INFORMIX
/*************************************/
// Flags

$this->nocase            	= "1";
$this->notrim            	= "0";
$this->perl              	= "0";

// Colours

$this->colours        	= array("blue", "purple", "gray");
$this->quotecolour       	= "blue";
$this->blockcommentcolour	= "green";
$this->linecommentcolour 	= "green";

// Indent Strings

$this->indent            	= array();
$this->unindent          	= array();

// String characters and delimiters

$this->stringchars       	= array();
$this->delimiters        	= array("~", "!", "@", "%", "^", "&", "*", "(", ")", "-", "+", "=", "|", "\\", "/", "[", "]", ":", ";", "\"", "'", "<", ">", " ", ",", "	", ".", "?");
$this->escchar           	= "";

// Comment settings

$this->linecommenton     	= array("#");
$this->blockcommenton    	= array("{");
$this->blockcommentoff   	= array("}");

// Keywords (keyword mapping to colour number)

$this->keywords          	= array(
			"ADD" => "1", 
			"AFTER" => "1", 
			"ALL" => "1", 
			"ALLOWING" => "1", 
			"AND" => "1", 
			"ANY" => "1", 
			"ARG_VAL" => "1", 
			"ARRAY" => "1", 
			"ARR_COUNT" => "1", 
			"ARR_CURR" => "1", 
			"AS" => "1", 
			"ASC" => "1", 
			"AT" => "1", 
			"ATTRIBUTE" => "1", 
			"ATTRIBUTES" => "1", 
			"AUTO" => "1", 
			"AUTONEXT" => "1", 
			"AVERAGE" => "1", 
			"AVG" => "1", 
			"BEFORE" => "1", 
			"BETWEEN" => "1", 
			"BOTTOM" => "1", 
			"BY" => "1", 
			"CALL" => "1", 
			"CASE" => "1", 
			"CHECK" => "1", 
			"CLEAR" => "1", 
			"CLIPPED" => "1", 
			"CLOSE" => "1", 
			"COLUMN" => "1", 
			"COLUMNS" => "1", 
			"COMMAND" => "1", 
			"COMMENT" => "1", 
			"COMMENTS" => "1", 
			"COMMIT" => "1", 
			"COMPOSITES" => "1", 
			"CONNECT" => "1", 
			"CONSTRUCT" => "1", 
			"CONTINUE" => "1", 
			"CORRECT" => "1", 
			"COUNT" => "1", 
			"CURRENT" => "1", 
			"CURSOR" => "1", 
			"DATABASE" => "1", 
			"DECLARE" => "1", 
			"DEFAULT" => "1", 
			"DEFER" => "1", 
			"DEFINE" => "1", 
			"DELIMITERS" => "1", 
			"DESC" => "1", 
			"DESCRIBE" => "1", 
			"DISPLAY" => "1", 
			"DISPLAYONLY" => "1", 
			"DISTINCT" => "1", 
			"DO" => "1", 
			"DOWN" => "1", 
			"DOWNSHIFT" => "1", 
			"ELSE" => "1", 
			"END" => "1", 
			"ENTRY" => "1", 
			"EVERY" => "1", 
			"EXECUTE" => "1", 
			"EXISTS" => "1", 
			"EXIT" => "1", 
			"EXTERN" => "1", 
			"FALSE" => "1", 
			"FETCH" => "1", 
			"FIELD" => "1", 
			"FINISH" => "1", 
			"FIRST" => "1", 
			"FOR" => "1", 
			"FOREACH" => "1", 
			"FORM" => "1", 
			"FORMAT" => "1", 
			"FORMONLY" => "1", 
			"FOUND" => "1", 
			"FROM" => "1", 
			"FUNCTION" => "1", 
			"GLOGALS" => "1", 
			"GROUP" => "1", 
			"HAVING" => "1", 
			"HEADER" => "1", 
			"HELP" => "1", 
			"IF" => "1", 
			"IN" => "1", 
			"INCLUDE" => "1", 
			"INPUT" => "1", 
			"INSERT" => "1", 
			"INSTRUCTIONS" => "1", 
			"INTO" => "1", 
			"IS" => "1", 
			"JOINING" => "1", 
			"KEY" => "1", 
			"LABEL" => "1", 
			"LAST" => "1", 
			"LENGHT" => "1", 
			"LET" => "1", 
			"LINE" => "1", 
			"LINENO" => "1", 
			"LINES" => "1", 
			"LOG" => "1", 
			"MAIN" => "1", 
			"MARGIN" => "1", 
			"MASTER" => "1", 
			"MATCHES" => "1", 
			"MAX" => "1", 
			"MDY" => "1", 
			"MENU" => "1", 
			"MESSAGE" => "1", 
			"MIN" => "1", 
			"MODE" => "1", 
			"NAME" => "1", 
			"NEED" => "1", 
			"NEXT" => "1", 
			"NEXTFIELD" => "1", 
			"NO" => "1", 
			"NORMAL" => "1", 
			"NOT" => "1", 
			"NOTFOUND" => "1", 
			"NULL" => "1", 
			"NUM_ARGS" => "1", 
			"OF" => "1", 
			"ON" => "1", 
			"OPEN" => "1", 
			"OPTION" => "1", 
			"OPTIONS" => "1", 
			"OR" => "1", 
			"ORDER" => "1", 
			"OTHERWISE" => "1", 
			"OUTER" => "1", 
			"OUTPUT" => "1", 
			"PAGE" => "1", 
			"PAGENO" => "1", 
			"PREPARE" => "1", 
			"PREVIOUS" => "1", 
			"PRINT" => "1", 
			"PRINTER" => "1", 
			"PRIVILEGES" => "1", 
			"PROGRAM" => "1", 
			"PROMPT" => "1", 
			"QUERY" => "1", 
			"QUERYCLEAR" => "1", 
			"QUIT" => "1", 
			"RECORD" => "1", 
			"REGISTER" => "1", 
			"REPORT" => "1", 
			"RESOURCE" => "1", 
			"RETURN" => "1", 
			"RETURNING" => "1", 
			"REVERSE" => "1", 
			"RIGHT" => "1", 
			"ROW" => "1", 
			"ROWID" => "1", 
			"RUN" => "1", 
			"SCREEN" => "1", 
			"SCROLL" => "1", 
			"SCR_LINE" => "1", 
			"SELECT" => "1", 
			"SET" => "1", 
			"SET_COUNT" => "1", 
			"SHARE" => "1", 
			"SIZEOF" => "1", 
			"SKIP" => "1", 
			"SOME" => "1", 
			"SQLCA" => "1", 
			"START" => "1", 
			"STARTLOG" => "1", 
			"STATIC" => "1", 
			"STATISTICS" => "1", 
			"STATUS" => "1", 
			"STEP" => "1", 
			"STOP" => "1", 
			"SUM" => "1", 
			"SWITCH" => "1", 
			"SYNONYM" => "1", 
			"SYSTABLES" => "1", 
			"THEN" => "1", 
			"THROUGH" => "1", 
			"THRU" => "1", 
			"TO" => "1", 
			"TOP" => "1", 
			"TRAILER" => "1", 
			"TRUE" => "1", 
			"UNION" => "1", 
			"UNIQUE" => "1", 
			"UNLOCK" => "1", 
			"UP" => "1", 
			"UBeautifierIFT" => "1", 
			"USER" => "1", 
			"USING" => "1", 
			"VALIDATE" => "1", 
			"VALUE" => "1", 
			"VALUES" => "1", 
			"VERIFY" => "1", 
			"VIEW" => "1", 
			"WAITING" => "1", 
			"WARNING" => "1", 
			"WHEN" => "1", 
			"WHENEVER" => "1", 
			"WHERE" => "1", 
			"WHILE" => "1", 
			"WITH" => "1", 
			"WITHOUT" => "1", 
			"WORK" => "1", 
			"WRAP" => "1", 
			"ALTER" => "2", 
			"BREAK" => "2", 
			"CREATE" => "2", 
			"DELETE" => "2", 
			"DROP" => "2", 
			"EDITADD" => "2", 
			"EDITUPDATE" => "2", 
			"ERROR" => "2", 
			"ERRORLOG" => "2", 
			"ERR_GET" => "2", 
			"ERR_PRINT" => "2", 
			"ERR_QUIT" => "2", 
			"EXCLUSIVE" => "2", 
			"EXITNOW" => "2", 
			"GOTO" => "2", 
			"GRANT" => "2", 
			"INITIALIZE" => "2", 
			"INTERRUPT" => "2", 
			"LOCK" => "2", 
			"MODIFY" => "2", 
			"PAUSE" => "2", 
			"PIPE" => "2", 
			"PUBLIC" => "2", 
			"RECOVER" => "2", 
			"REMOVE" => "2", 
			"RENAME" => "2", 
			"REVOKE" => "2", 
			"ROLLBACK" => "2", 
			"ROLLFORWARD" => "2", 
			"SLEEP" => "2", 
			"SQLERRD" => "2", 
			"TABLE" => "2", 
			"TABLES" => "2", 
			"TEMP" => "2", 
			"UPDATE" => "2", 
			"CHAR" => "3", 
			"DATE" => "3", 
			"DAY" => "3", 
			"DBA" => "3", 
			"DECIMAL" => "3", 
			"DOUBLE" => "3", 
			"FLOAT" => "3", 
			"INDEX" => "3", 
			"INT" => "3", 
			"INTEGER" => "3", 
			"LIKE" => "3", 
			"LONG" => "3", 
			"LOOKUP" => "3", 
			"MONEY" => "3", 
			"MONTH" => "3", 
			"NOENTRY" => "3", 
			"NOUPDATE" => "3", 
			"PERCENT" => "3", 
			"PICTURE" => "3", 
			"REQUIRED" => "3", 
			"SHORT" => "3", 
			"SMALLFLOAT" => "3", 
			"SMALLINT" => "3", 
			"STRUCT" => "3", 
			"SERIAL" => "3", 
			"SPACE" => "3", 
			"SPACES" => "3", 
			"TIME" => "3", 
			"TODAY" => "3", 
			"TYPE" => "3", 
			"TYPEDEF" => "3", 
			"UNSIGNED" => "3", 
			"WEEKDAY" => "3", 
			"YEAR" => "3", 
			"ZEROFILL" => "3");

// Special extensions

// Each category can specify a PHP function that returns an altered
// version of the keyword.
        
        

$this->linkscripts    	= array(
			"1" => "donothing", 
			"2" => "donothing", 
			"3" => "donothing");
}


function donothing($keywordin)
{
	return $keywordin;
}

}?>
