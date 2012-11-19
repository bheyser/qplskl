<?php

$BEAUT_PATH = realpath(".")."/Services/COPage/syntax_highlight/php";
if (!isset ($BEAUT_PATH)) return;
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_lisp extends HFile{
   function HFile_lisp(){
     $this->HFile();
     
/*************************************/
// Beautifier Highlighting Configuration File 
// LISP
/*************************************/
// Flags

$this->nocase            	= "0";
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

$this->stringchars       	= array("\"");
$this->delimiters        	= array("~", "!", "@", "%", "^", "&", "(", ")", "|", "{", "}", "[", "]", ";", "\"", "'", " ", ",", "	", ".", "?");
$this->escchar           	= "";

// Comment settings

$this->linecommenton     	= array(";");
$this->blockcommenton    	= array("#|");
$this->blockcommentoff   	= array("|#");

// Keywords (keyword mapping to colour number)

$this->keywords          	= array(
			"~a" => "1", 
			"~A" => "1", 
			"~b" => "1", 
			"~B" => "1", 
			"~d" => "1", 
			"~D" => "1", 
			"~e" => "1", 
			"~E" => "1", 
			"~o" => "1", 
			"~O" => "1", 
			"~s" => "1", 
			"~S" => "1", 
			"~x" => "1", 
			"~X" => "1", 
			"~%" => "1", 
			"#\\" => "2", 
			"#|" => "2", 
			"#=" => "2", 
			"#-" => "2", 
			"#+" => "2", 
			"#(" => "2", 
			"#." => "2", 
			"#\'" => "2", 
			"#:" => "2", 
			"##" => "2", 
			"#a" => "2", 
			"#A" => "2", 
			"#b" => "2", 
			"#B" => "2", 
			"#c" => "2", 
			"#o" => "2", 
			"#O" => "2", 
			"#r" => "2", 
			"#R" => "2", 
			"#s" => "2", 
			"#S" => "2", 
			"#x" => "2", 
			"#X" => "2", 
			"&allow-other-keys" => "3", 
			"&aux" => "3", 
			"&key" => "3", 
			"&optional" => "3", 
			"&rest" => "3", 
			"*features*" => "4", 
			"*load-verbose*" => "4", 
			"*modules*" => "4", 
			"*package*" => "4", 
			"*print-array*" => "4", 
			"*print-base*" => "4", 
			"*print-case*" => "4", 
			"*print-circle*" => "4", 
			"*printescape*" => "4", 
			"*printgensym*" => "4", 
			"*print-length*" => "4", 
			"*print-level*" => "4", 
			"*print-pretty*" => "4", 
			"*print-radix*" => "4", 
			"*read-base*" => "4", 
			"*readtable*" => "4", 
			"*standard-input*" => "4", 
			"*standard-output*" => "4", 
			"*terminal-io*" => "4", 
			":allow-other-keys" => "5", 
			":append" => "5", 
			":array" => "5", 
			":base" => "5", 
			":capitalize" => "5", 
			":case" => "5", 
			":circle" => "5", 
			":count" => "5", 
			":direction" => "5", 
			":downcase" => "5", 
			":element-type" => "5", 
			":escape" => "5", 
			":external" => "5", 
			":from-end" => "5", 
			":gensym" => "5", 
			":if-exists" => "5", 
			":inherited" => "5", 
			":initial-element" => "5", 
			":input" => "5", 
			":internal" => "5", 
			":key" => "5", 
			":length" => "5", 
			":level" => "5", 
			":output" => "5", 
			":output-file" => "5", 
			":pretty" => "5", 
			":print" => "5", 
			":radix" => "5", 
			":stream" => "5", 
			":test" => "5", 
			":test-not" => "5", 
			":upcase" => "5", 
			":verbose" => "5", 
			"abs" => "6", 
			"acons" => "6", 
			"acos" => "6", 
			"alpha-char-p" => "6", 
			"alphanumericp" => "6", 
			"and" => "6", 
			"append" => "6", 
			"apply" => "6", 
			"apropos" => "6", 
			"aref" => "6", 
			"array-dimensions" => "6", 
			"array-rank" => "6", 
			"arrayp" => "6", 
			"asin" => "6", 
			"assoc" => "6", 
			"atan" => "6", 
			"atom" => "6", 
			"block" => "6", 
			"boundp" => "6", 
			"break" => "6", 
			"by" => "6", 
			"bye" => "6", 
			"car" => "6", 
			"case" => "6", 
			"catch" => "6", 
			"cdr" => "6", 
			"ceiling" => "6", 
			"char" => "6", 
			"char=" => "6", 
			"char/=" => "6", 
			"char>" => "6", 
			"char>=" => "6", 
			"char<" => "6", 
			"char<=" => "6", 
			"char-code" => "6", 
			"char-downcase" => "6", 
			"char-upcase" => "6", 
			"char-acterp" => "6", 
			"close" => "6", 
			"code-char" => "6", 
			"compile" => "6", 
			"compile-file" => "6", 
			"compiler-let" => "6", 
			"complexp" => "6", 
			"concatenate" => "6", 
			"cond" => "6", 
			"cons" => "6", 
			"consp" => "6", 
			"copy-seq" => "6", 
			"cos" => "6", 
			"decf" => "6", 
			"declare" => "6", 
			"defconstant" => "6", 
			"defmacro" => "6", 
			"defparameter" => "6", 
			"defstruct" => "6", 
			"defun" => "6", 
			"defvar" => "6", 
			"delete" => "6", 
			"delete-file" => "6", 
			"delete-if" => "6", 
			"delete-if-not" => "6", 
			"describe" => "6", 
			"digit-char-p" => "6", 
			"do" => "6", 
			"do*" => "6", 
			"do-all-symbols" => "6", 
			"do-external-symbols" => "6", 
			"do-symbols" => "6", 
			"documentation" => "6", 
			"dolist" => "6", 
			"dotimes" => "6", 
			"ed" => "6", 
			"eighth" => "6", 
			"eq" => "6", 
			"eql" => "6", 
			"equal" => "6", 
			"error" => "6", 
			"eval" => "6", 
			"eval-when" => "6", 
			"exp" => "6", 
			"export" => "6", 
			"expt" => "6", 
			"fifth" => "6", 
			"find-package" => "6", 
			"find-symbol" => "6", 
			"finish-output" => "6", 
			"first" => "6", 
			"flet" => "6", 
			"floatp" => "6", 
			"floor" => "6", 
			"format" => "6", 
			"fourth" => "6", 
			"fresh-line" => "6", 
			"funcall" => "6", 
			"function" => "6", 
			"gcd" => "6", 
			"gensym" => "6", 
			"gentemp" => "6", 
			"get" => "6", 
			"getf" => "6", 
			"get-macro-character" => "6", 
			"get-properties" => "6", 
			"go" => "6", 
			"if" => "6", 
			"import" => "6", 
			"in-package" => "6", 
			"incf" => "6", 
			"inspect" => "6", 
			"integerp" => "6", 
			"intern" => "6", 
			"isqrt" => "6", 
			"labels" => "6", 
			"lanbda" => "6", 
			"last" => "6", 
			"lcm" => "6", 
			"length" => "6", 
			"let" => "6", 
			"let*" => "6", 
			"list" => "6", 
			"list*" => "6", 
			"list-all-packages" => "6", 
			"listp" => "6", 
			"load" => "6", 
			"log" => "6", 
			"loop" => "6", 
			"lower-case-p" => "6", 
			"macroexpand" => "6", 
			"macro-function" => "6", 
			"macrolet" => "6", 
			"make-array" => "6", 
			"make-list" => "6", 
			"make-string" => "6", 
			"makunbound" => "6", 
			"mapc" => "6", 
			"mapcan" => "6", 
			"mapcar" => "6", 
			"mapcon" => "6", 
			"mapl" => "6", 
			"maplist" => "6", 
			"max" => "6", 
			"member" => "6", 
			"member-if" => "6", 
			"member-if-not" => "6", 
			"min" => "6", 
			"mod" => "6", 
			"multiple-value-bind" => "6", 
			"multiple-value-call" => "6", 
			"multiple-value-list" => "6", 
			"multiple-value-prog1" => "6", 
			"multiple-value-setq" => "6", 
			"nconc" => "6", 
			"nil" => "6", 
			"ninth" => "6", 
			"not" => "6", 
			"nreverse" => "6", 
			"nstring-downcase" => "6", 
			"nstring-upcase" => "6", 
			"nth" => "6", 
			"nthcdr" => "6", 
			"null" => "6", 
			"numberp" => "6", 
			"open" => "6", 
			"or" => "6", 
			"otherwise" => "6", 
			"peek-char" => "6", 
			"pi" => "6", 
			"pop" => "6", 
			"pprint" => "6", 
			"prin1" => "6", 
			"princ" => "6", 
			"print" => "6", 
			"probe-file" => "6", 
			"proclaim" => "6", 
			"prog" => "6", 
			"prog*" => "6", 
			"prog1" => "6", 
			"progn" => "6", 
			"progv" => "6", 
			"provide" => "6", 
			"psetf" => "6", 
			"psetq" => "6", 
			"push" => "6", 
			"quote" => "6", 
			"random" => "6", 
			"rationalp" => "6", 
			"read" => "6", 
			"read-char" => "6", 
			"read-preserving-whitespace" => "6", 
			"rem" => "6", 
			"remf" => "6", 
			"remove" => "6", 
			"remove-if" => "6", 
			"remove-if-not" => "6", 
			"remprop" => "6", 
			"rename-file" => "6", 
			"require" => "6", 
			"rest" => "6", 
			"return" => "6", 
			"return-from" => "6", 
			"reverse" => "6", 
			"round" => "6", 
			"rplace" => "6", 
			"rplacd" => "6", 
			"second" => "6", 
			"set" => "6", 
			"set-macro-character" => "6", 
			"setf" => "6", 
			"setq" => "6", 
			"seventh" => "6", 
			"shadow" => "6", 
			"sin" => "6", 
			"sixth" => "6", 
			"special" => "6", 
			"special-form-p" => "6", 
			"sqrt" => "6", 
			"step" => "6", 
			"string" => "6", 
			"string=" => "6", 
			"string/=" => "6", 
			"string>" => "6", 
			"string<" => "6", 
			"string>=" => "6", 
			"string<=" => "6", 
			"string-char" => "6", 
			"string-downcase" => "6", 
			"string-upcase" => "6", 
			"stringp" => "6", 
			"subseq" => "6", 
			"symbol-name" => "6", 
			"symbol-package" => "6", 
			"symbol-values" => "6", 
			"t" => "6", 
			"tagbody" => "6", 
			"tan" => "6", 
			"tenth" => "6", 
			"terpri" => "6", 
			"the" => "6", 
			"third" => "6", 
			"throw" => "6", 
			"time" => "6", 
			"trace" => "6", 
			"truncate" => "6", 
			"typep" => "6", 
			"unless" => "6", 
			"unread-char" => "6", 
			"untrace" => "6", 
			"unwind-protect" => "6", 
			"upper-case-p" => "6", 
			"use-package" => "6", 
			"values" => "6", 
			"values-list" => "6", 
			"variable" => "6", 
			"vector" => "6", 
			"vectorp" => "6", 
			"when" => "6", 
			"with-input-from-string" => "6", 
			"with-open-file" => "6", 
			"with-output-to-string" => "6", 
			"write" => "6", 
			"write-char" => "6", 
			"write-to-string" => "6", 
			"=" => "7", 
			"//" => "7", 
			"/=" => "7", 
			"/" => "7", 
			">" => "7", 
			">=" => "7", 
			"<" => "7", 
			"<=" => "7", 
			"+" => "7", 
			"-" => "7", 
			"*" => "7", 
			"1+" => "7", 
			"1-" => "7", 
			"evenp" => "7", 
			"minusp" => "7", 
			"oddp" => "7", 
			"plusp" => "7", 
			"zerop" => "7");

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

}

?>
