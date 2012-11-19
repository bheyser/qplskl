<?php
$BEAUT_PATH = realpath(".")."/Services/COPage/syntax_highlight/php";
if (!isset ($BEAUT_PATH)) return;
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_masm extends HFile{
   function HFile_masm(){
     $this->HFile();	
/*************************************/
// Beautifier Highlighting Configuration File 
// Assembly for MASM
/*************************************/
// Flags

$this->nocase            	= "1";
$this->notrim            	= "0";
$this->perl              	= "0";

// Colours

$this->colours        	= array("blue", "purple", "gray", "brown", "blue", "purple");
$this->quotecolour       	= "blue";
$this->blockcommentcolour	= "green";
$this->linecommentcolour 	= "green";

// Indent Strings

$this->indent            	= array();
$this->unindent          	= array();

// String characters and delimiters

$this->stringchars       	= array();
$this->delimiters        	= array("~", "!", "%", "&", "^", "*", "(", ")", "-", "+", "=", "|", "\\", "/", "{", "}", "[", "]", ":", ";", "\"", "'", "<", ">", " ", ",", " ", " ", " ", " ", " ", " ", " ", " ");
$this->escchar           	= "";

// Comment settings

$this->linecommenton     	= array(";");
$this->blockcommenton    	= array("");
$this->blockcommentoff   	= array("");

// Keywords (keyword mapping to colour number)

$this->keywords          	= array(
			".break" => "1", 
			".breakif" => "1", 
			".continue" => "1", 
			".else" => "1", 
			".elseif" => "1", 
			".endif" => "1", 
			".exit" => "1", 
			".if" => "1", 
			".repeat" => "1", 
			".startup" => "1", 
			".until" => "1", 
			".untilcxz" => "1", 
			".while" => "1", 
			"aaa" => "1", 
			"aad" => "1", 
			"aam" => "1", 
			"aas" => "1", 
			"adc" => "1", 
			"add" => "1", 
			"and" => "2", 
			"arpl" => "1", 
			"bound" => "1", 
			"bsf" => "1", 
			"bsr" => "1", 
			"bswap" => "1", 
			"bt" => "1", 
			"btc" => "1", 
			"btr" => "1", 
			"bts" => "1", 
			"call" => "1", 
			"cbw" => "1", 
			"cdq" => "1", 
			"clc" => "1", 
			"cld" => "1", 
			"cli" => "1", 
			"clts" => "1", 
			"cmc" => "1", 
			"cmov" => "1", 
			"cmp" => "1", 
			"cmps" => "1", 
			"cmpsb" => "1", 
			"cmpsd" => "1", 
			"cmpsw" => "1", 
			"cmpxchg" => "1", 
			"cmpxchg8b" => "1", 
			"cpuid" => "1", 
			"cwd" => "1", 
			"cwde" => "1", 
			"daa" => "1", 
			"das" => "1", 
			"dec" => "1", 
			"div" => "1", 
			"enter" => "1", 
			"esc" => "1", 
			"hlt" => "1", 
			"idiv" => "1", 
			"imul" => "1", 
			"in" => "1", 
			"inc" => "1", 
			"ins" => "1", 
			"insb" => "1", 
			"insd" => "1", 
			"insw" => "1", 
			"int" => "1", 
			"into" => "1", 
			"invd" => "1", 
			"invlpg" => "1", 
			"invoke" => "1", 
			"iret" => "1", 
			"iretd" => "1", 
			"ja" => "1", 
			"jae" => "1", 
			"jb" => "1", 
			"jbe" => "1", 
			"jc" => "1", 
			"jcxz" => "1", 
			"je" => "1", 
			"jecxz" => "1", 
			"jg" => "1", 
			"jge" => "1", 
			"jl" => "1", 
			"jle" => "1", 
			"jmp" => "1", 
			"jna" => "1", 
			"jnae" => "1", 
			"jnb" => "1", 
			"jnbe" => "1", 
			"jnc" => "1", 
			"jne" => "1", 
			"jng" => "1", 
			"jnge" => "1", 
			"jnl" => "1", 
			"jnle" => "1", 
			"jno" => "1", 
			"jnp" => "1", 
			"jns" => "1", 
			"jnz" => "1", 
			"jo" => "1", 
			"jp" => "1", 
			"jpe" => "1", 
			"jpo" => "1", 
			"js" => "1", 
			"jz" => "1", 
			"lahf" => "1", 
			"lar" => "1", 
			"lds" => "1", 
			"lea" => "1", 
			"leave" => "1", 
			"les" => "1", 
			"lfs" => "1", 
			"lgdt" => "1", 
			"lgs" => "1", 
			"lidt" => "1", 
			"lldt" => "1", 
			"lmsw" => "1", 
			"lock" => "1", 
			"lods" => "1", 
			"lodsb" => "1", 
			"lodsd" => "1", 
			"lodsw" => "1", 
			"loop" => "1", 
			"loope" => "1", 
			"loopne" => "1", 
			"loopnz" => "1", 
			"loopz" => "1", 
			"lsl" => "1", 
			"lss" => "1", 
			"ltr" => "1", 
			"mov" => "1", 
			"movs" => "1", 
			"movsb" => "1", 
			"movsd" => "1", 
			"movsw" => "1", 
			"movsx" => "1", 
			"movzx" => "1", 
			"mul" => "1", 
			"neg" => "1", 
			"nop" => "1", 
			"not" => "2", 
			"oio" => "1", 
			"or" => "2", 
			"out" => "1", 
			"outs" => "1", 
			"outsb" => "1", 
			"outsd" => "1", 
			"outsw" => "1", 
			"pop" => "1", 
			"popa" => "1", 
			"popad" => "1", 
			"popf" => "1", 
			"popfd" => "1", 
			"push" => "1", 
			"pusha" => "1", 
			"pushad" => "1", 
			"pushf" => "1", 
			"pushfd" => "1", 
			"pushw" => "1", 
			"rcl" => "1", 
			"rcr" => "1", 
			"rdmsr" => "1", 
			"rdtsc" => "1", 
			"rep" => "1", 
			"repe" => "1", 
			"repne" => "1", 
			"repnz" => "1", 
			"repz" => "1", 
			"ret" => "1", 
			"retf" => "1", 
			"retn" => "1", 
			"rol" => "1", 
			"ror" => "1", 
			"rsdc" => "1", 
			"rsldt" => "1", 
			"rsm" => "1", 
			"rsts" => "1", 
			"sahf" => "1", 
			"sal" => "1", 
			"sar" => "1", 
			"sbb" => "1", 
			"scas" => "1", 
			"scasb" => "1", 
			"scasd" => "1", 
			"scasw" => "1", 
			"seta" => "1", 
			"setae" => "1", 
			"setb" => "1", 
			"setbe" => "1", 
			"setc" => "1", 
			"sete" => "1", 
			"setg" => "1", 
			"setge" => "1", 
			"setl" => "1", 
			"setle" => "1", 
			"setna" => "1", 
			"setnae" => "1", 
			"setnb" => "1", 
			"setnc" => "1", 
			"setne" => "1", 
			"setng" => "1", 
			"setnge" => "1", 
			"setnl" => "1", 
			"setnle" => "1", 
			"setno" => "1", 
			"setnp" => "1", 
			"setns" => "1", 
			"setnz" => "1", 
			"seto" => "1", 
			"setp" => "1", 
			"setpe" => "1", 
			"setpo" => "1", 
			"sets" => "1", 
			"setz" => "1", 
			"sgdt" => "1", 
			"shl" => "2", 
			"shld" => "1", 
			"shr" => "2", 
			"shrd" => "1", 
			"sidt" => "1", 
			"sldt" => "1", 
			"smsw" => "1", 
			"stc" => "1", 
			"std" => "1", 
			"sti" => "1", 
			"stos" => "1", 
			"stosb" => "1", 
			"stosd" => "1", 
			"stosw" => "1", 
			"str" => "1", 
			"sub" => "1", 
			"svdc" => "1", 
			"svldt" => "1", 
			"svts" => "1", 
			"test" => "1", 
			"verr" => "1", 
			"verw" => "1", 
			"wait" => "1", 
			"wbinvd" => "1", 
			"wrmsr" => "1", 
			"xadd" => "1", 
			"xchg" => "1", 
			"xlat" => "1", 
			"xlatb" => "1", 
			"xor" => "2", 
			"%cond" => "2", 
			"%out" => "2", 
			".186" => "2", 
			".286" => "2", 
			".286c" => "2", 
			".286p" => "2", 
			".287" => "2", 
			".386" => "2", 
			".386p" => "2", 
			".387" => "2", 
			".486" => "2", 
			".486c" => "2", 
			".486p" => "2", 
			".586" => "2", 
			".586p" => "2", 
			".686" => "2", 
			".686p" => "2", 
			".8086" => "2", 
			".8087" => "2", 
			".alpha" => "2", 
			".dosseg" => "2", 
			".code" => "2", 
			".const" => "2", 
			".cref" => "2", 
			".data" => "2", 
			".data?" => "2", 
			".err" => "2", 
			".err1" => "2", 
			".err2" => "2", 
			".errb" => "2", 
			".errdef" => "2", 
			".errdif" => "2", 
			".erre" => "2", 
			".fardata" => "2", 
			".fardata?" => "2", 
			".k3d" => "2", 
			".lall" => "2", 
			".lfcond" => "2", 
			".list" => "2", 
			".mmx" => "2", 
			".model" => "2", 
			".msfloat" => "2", 
			".nolist" => "2", 
			".nolistmacro" => "2", 
			".radix" => "2", 
			".sall" => "2", 
			".seq" => "2", 
			".sfcond" => "2", 
			".stack" => "2", 
			".type" => "2", 
			".xall" => "2", 
			".xcref" => "2", 
			".xlist" => "2", 
			"@catstr" => "2", 
			"@code" => "2", 
			"@codesize" => "2", 
			"@cpu" => "2", 
			"@curseg" => "2", 
			"@data" => "2", 
			"@data?" => "2", 
			"@datasize" => "2", 
			"@date" => "2", 
			"@environ" => "2", 
			"@fardata" => "2", 
			"@fardata?" => "2", 
			"@filename" => "2", 
			"@instr" => "2", 
			"@interface" => "2", 
			"@model" => "2", 
			"@sizestr" => "2", 
			"@stack" => "2", 
			"@startup" => "2", 
			"@substr" => "2", 
			"@time" => "2", 
			"@version" => "2", 
			"@wordsize" => "2", 
			"addr" => "2", 
			"align" => "2", 
			"arg" => "2", 
			"assume" => "2", 
			"at" => "2", 
			"basic" => "2", 
			"byte" => "2", 
			"c" => "2", 
			"casemap" => "2", 
			"catstr" => "2", 
			"codeptr" => "2", 
			"codeseg" => "2", 
			"comm" => "2", 
			"comment" => "2", 
			"common" => "2", 
			"compact" => "2", 
			"dataptr" => "2", 
			"db" => "2", 
			"dd" => "2", 
			"df" => "2", 
			"dosseg" => "2", 
			"dup" => "2", 
			"dq" => "2", 
			"dt" => "2", 
			"dw" => "2", 
			"dword" => "2", 
			"echo" => "2", 
			"else" => "2", 
			"elseif" => "2", 
			"elseifdef" => "2", 
			"elseifidn" => "2", 
			"elseifidni" => "2", 
			"end" => "2", 
			"endif" => "2", 
			"endm" => "2", 
			"endp" => "2", 
			"ends" => "2", 
			"epilogue" => "2", 
			"epiloguedef" => "2", 
			"eq" => "2", 
			"equ" => "2", 
			"even" => "2", 
			"exitm" => "2", 
			"export" => "2", 
			"expr32" => "2", 
			"extern" => "2", 
			"externdef" => "2", 
			"extrn" => "2", 
			"far" => "2", 
			"far16" => "2", 
			"far32" => "2", 
			"farstack" => "2", 
			"flat" => "2", 
			"for" => "2", 
			"forc" => "2", 
			"fortran" => "2", 
			"fword" => "2", 
			"ge" => "2", 
			"global" => "2", 
			"goto" => "2", 
			"group" => "2", 
			"gt" => "2", 
			"high" => "2", 
			"highword" => "2", 
			"huge" => "2", 
			"ideal" => "2", 
			"if" => "2", 
			"if1" => "2", 
			"if2" => "2", 
			"ifb" => "2", 
			"ifdef" => "2", 
			"ifdif" => "2", 
			"ifdifi" => "2", 
			"ifidn" => "2", 
			"ifidni" => "2", 
			"ife" => "2", 
			"ifnb" => "2", 
			"ifndef" => "2", 
			"include" => "2", 
			"includelib" => "2", 
			"instr" => "2", 
			"integer" => "2", 
			"irp" => "2", 
			"irpc" => "2", 
			"jumps" => "2", 
			"label" => "2", 
			"large" => "2", 
			"le" => "2", 
			"length" => "2", 
			"lengthof" => "2", 
			"listing" => "2", 
			"local" => "2", 
			"locals" => "2", 
			"lroffset" => "2", 
			"low" => "2", 
			"lowword" => "2", 
			"lt" => "2", 
			"macro" => "2", 
			"mask" => "2", 
			"masm" => "2", 
			"masm51" => "2", 
			"medium" => "2", 
			"memory" => "2", 
			"mm2word" => "2", 
			"mmword" => "2", 
			"model" => "2", 
			"multerrs" => "2", 
			"name" => "2", 
			"near" => "2", 
			"near32" => "2", 
			"nle" => "2", 
			"nokeyword" => "2", 
			"nolist" => "2", 
			"nolocals" => "2", 
			"noljmp" => "2", 
			"nomasm51" => "2", 
			"none" => "2", 
			"nonunique" => "2", 
			"noscoped" => "2", 
			"nosmart" => "2", 
			"nothing" => "2", 
			"offset" => "2", 
			"opattr" => "2", 
			"option" => "2", 
			"org" => "2", 
			"page" => "2", 
			"para" => "2", 
			"pascal" => "2", 
			"popcontext" => "2", 
			"private" => "2", 
			"proc" => "2", 
			"prologue" => "2", 
			"prologuedef" => "2", 
			"proto" => "2", 
			"ptr" => "2", 
			"public" => "2", 
			"publicdll" => "2", 
			"purge" => "2", 
			"pushcontext" => "2", 
			"pword" => "2", 
			"quirks" => "2", 
			"qword" => "2", 
			"readonly" => "2", 
			"real4" => "2", 
			"real8" => "2", 
			"real10" => "2", 
			"record" => "2", 
			"rept" => "2", 
			"req" => "2", 
			"sbyte" => "2", 
			"sdword" => "2", 
			"seg" => "2", 
			"segment" => "2", 
			"short" => "2", 
			"size" => "2", 
			"sizeof" => "2", 
			"small" => "2", 
			"smart" => "2", 
			"stack" => "2", 
			"stdcall" => "2", 
			"struc" => "2", 
			"struct" => "2", 
			"substr" => "2", 
			"subtitle" => "2", 
			"subttl" => "2", 
			"sword" => "2", 
			"symtype" => "2", 
			"tbyte" => "2", 
			"textequ" => "2", 
			"this" => "2", 
			"tiny" => "2", 
			"title" => "2", 
			"tword" => "2", 
			"type" => "2", 
			"typedef" => "2", 
			"use16" => "2", 
			"use32" => "2", 
			"uses" => "2", 
			"union" => "2", 
			"vararg" => "2", 
			"width" => "2", 
			"word" => "2", 
			"\\" => "2", 
			"f2xm1" => "3", 
			"fabs" => "3", 
			"fadd" => "3", 
			"faddp" => "3", 
			"fbld" => "3", 
			"fbstp" => "3", 
			"fchs" => "3", 
			"fclex" => "3", 
			"fcmov" => "3", 
			"fcom" => "3", 
			"fcomp" => "3", 
			"fcompp" => "3", 
			"fcos" => "3", 
			"fdecstp" => "3", 
			"fdiv" => "3", 
			"fdivp" => "3", 
			"fdivr" => "3", 
			"fdivrp" => "3", 
			"ffree" => "3", 
			"fiadd" => "3", 
			"ficom" => "3", 
			"ficomp" => "3", 
			"fidiv" => "3", 
			"fidivr" => "3", 
			"fild" => "3", 
			"fimul" => "3", 
			"fincstp" => "3", 
			"finit" => "3", 
			"fist" => "3", 
			"fistp" => "3", 
			"fisub" => "3", 
			"fisubr" => "3", 
			"fld" => "3", 
			"fld1" => "3", 
			"fldcw" => "3", 
			"fldenv" => "3", 
			"fldl2e" => "3", 
			"fldl2t" => "3", 
			"fldlg2" => "3", 
			"fldln2" => "3", 
			"fldpi" => "3", 
			"fldz" => "3", 
			"fly2x" => "3", 
			"fly2xp1" => "3", 
			"fmul" => "3", 
			"fmulp" => "3", 
			"fnclex" => "3", 
			"fninit" => "3", 
			"fnop" => "3", 
			"fnsave" => "3", 
			"fnstcw" => "3", 
			"fnstenv" => "3", 
			"fnstsw" => "3", 
			"fpatan" => "3", 
			"fprem" => "3", 
			"fprem1" => "3", 
			"fptan" => "3", 
			"fqrt" => "3", 
			"frndint" => "3", 
			"frstor" => "3", 
			"fsave" => "3", 
			"fscale" => "3", 
			"fsin" => "3", 
			"fsincos" => "3", 
			"fst" => "3", 
			"fstcw" => "3", 
			"fstenv" => "3", 
			"fstp" => "3", 
			"fstsw" => "3", 
			"fsub" => "3", 
			"fsubp" => "3", 
			"fsubr" => "3", 
			"fsubrb" => "3", 
			"ftst" => "3", 
			"fucom" => "3", 
			"fucomp" => "3", 
			"fucompp" => "3", 
			"fwait" => "3", 
			"fxam" => "3", 
			"fxch" => "3", 
			"fxtract" => "3", 
			"!" => "4", 
			"%" => "4", 
			"&" => "4", 
			"*" => "4", 
			"+" => "4", 
			"," => "4", 
			"-" => "4", 
			"//" => "4", 
			"/" => "4", 
			">" => "4", 
			"=" => "4", 
			"<" => "4", 
			"|" => "4", 
			"$" => "5", 
			"?" => "5", 
			"@@" => "5", 
			"@b" => "5", 
			"@f" => "5", 
			"ah" => "5", 
			"al" => "5", 
			"ax" => "5", 
			"bh" => "5", 
			"bl" => "5", 
			"bp" => "5", 
			"bx" => "5", 
			"carry?" => "5", 
			"ch" => "5", 
			"cl" => "5", 
			"cr0" => "5", 
			"cr2" => "5", 
			"cr3" => "5", 
			"cr4" => "5", 
			"cs" => "5", 
			"cx" => "5", 
			"dh" => "5", 
			"di" => "5", 
			"dl" => "5", 
			"dr0" => "5", 
			"dr1" => "5", 
			"dr2" => "5", 
			"dr3" => "5", 
			"dr4" => "5", 
			"dr5" => "5", 
			"dr6" => "5", 
			"dr7" => "5", 
			"ds" => "5", 
			"dx" => "5", 
			"eax" => "5", 
			"ebx" => "5", 
			"ebp" => "5", 
			"ecx" => "5", 
			"edi" => "5", 
			"edx" => "5", 
			"es" => "5", 
			"esi" => "5", 
			"esp" => "5", 
			"ext0" => "5", 
			"ext1" => "5", 
			"ext2" => "5", 
			"ext3" => "5", 
			"ext4" => "5", 
			"ext5" => "5", 
			"ext6" => "5", 
			"ext7" => "5", 
			"extb0" => "5", 
			"extb1" => "5", 
			"extb2" => "5", 
			"extb3" => "5", 
			"fs" => "5", 
			"gs" => "5", 
			"mm" => "5", 
			"mm0" => "5", 
			"mm1" => "5", 
			"mm2" => "5", 
			"mm3" => "5", 
			"mm4" => "5", 
			"mm5" => "5", 
			"mm6" => "5", 
			"mm7" => "5", 
			"overflow?" => "5", 
			"parity?" => "5", 
			"si" => "5", 
			"sign?" => "5", 
			"sp" => "5", 
			"ss" => "5", 
			"tr3" => "5", 
			"tr4" => "5", 
			"tr5" => "5", 
			"tr6" => "5", 
			"tr7" => "5", 
			"xmm" => "5", 
			"xmm0" => "5", 
			"xmm1" => "5", 
			"xmm2" => "5", 
			"xmm3" => "5", 
			"xmm4" => "5", 
			"xmm5" => "5", 
			"xmm6" => "5", 
			"xmm7" => "5", 
			"zero?" => "5", 
			"addps" => "6", 
			"addss" => "6", 
			"andnps" => "6", 
			"andps" => "6", 
			"cmpeqps" => "6", 
			"cmpeqss" => "6", 
			"cmpleps" => "6", 
			"cmpless" => "6", 
			"cmpltps" => "6", 
			"cmpltss" => "6", 
			"cmpneqps" => "6", 
			"cmpneqss" => "6", 
			"cmpnleps" => "6", 
			"cmpnless" => "6", 
			"cmpnltps" => "6", 
			"cmpnltss" => "6", 
			"cmpordps" => "6", 
			"cmpordss" => "6", 
			"cmpps" => "6", 
			"cmpss" => "6", 
			"cmpunordps" => "6", 
			"cmpunordss" => "6", 
			"comiss" => "6", 
			"cvtpi2ps" => "6", 
			"cvtps2pi" => "6", 
			"cvtsi2ss" => "6", 
			"cvttps2pi" => "6", 
			"cvttss2si" => "6", 
			"cvtss2si" => "6", 
			"divps" => "6", 
			"divss" => "6", 
			"emms" => "6", 
			"femms" => "6", 
			"fxrstor" => "6", 
			"fxsave" => "6", 
			"ldmxcsr" => "6", 
			"maskmovq" => "6", 
			"maxps" => "6", 
			"maxss" => "6", 
			"minps" => "6", 
			"minss" => "6", 
			"movaps" => "6", 
			"movd" => "6", 
			"movdf" => "6", 
			"movdt" => "6", 
			"movhps" => "6", 
			"movhlps" => "6", 
			"movlhps" => "6", 
			"movlps" => "6", 
			"movmskps" => "6", 
			"movntps" => "6", 
			"movntq" => "6", 
			"movq" => "6", 
			"movss" => "6", 
			"movups" => "6", 
			"mulps" => "6", 
			"mulss" => "6", 
			"orps" => "6", 
			"packssdw" => "6", 
			"packsswb" => "6", 
			"packuswb" => "6", 
			"paddb" => "6", 
			"paddd" => "6", 
			"paddsb" => "6", 
			"paddsw" => "6", 
			"paddusb" => "6", 
			"paddusw" => "6", 
			"paddw" => "6", 
			"pand" => "6", 
			"pandn" => "6", 
			"pavgb" => "6", 
			"pavgusb" => "6", 
			"pavgw" => "6", 
			"pcmpeqb" => "6", 
			"pcmpeqd" => "6", 
			"pcmpeqw" => "6", 
			"pcmpgtb" => "6", 
			"pcmpgtd" => "6", 
			"pcmpgtw" => "6", 
			"pextrw" => "6", 
			"pf2id" => "6", 
			"pfacc" => "6", 
			"pfadd" => "6", 
			"pfcmpeq" => "6", 
			"pfcmpge" => "6", 
			"pfcmpgt" => "6", 
			"pfmax" => "6", 
			"pfmin" => "6", 
			"pfmul" => "6", 
			"pfrcp" => "6", 
			"pfrcpit1" => "6", 
			"pfrcpit2" => "6", 
			"pfsqit1" => "6", 
			"pfrsqrt" => "6", 
			"pfsub" => "6", 
			"pfsubr" => "6", 
			"pi2fd" => "6", 
			"pinsrw" => "6", 
			"pmaddwd" => "6", 
			"pmaxsw" => "6", 
			"pmaxub" => "6", 
			"pminsw" => "6", 
			"pminub" => "6", 
			"pmovmskb" => "6", 
			"pmulhrw" => "6", 
			"pmulhuw" => "6", 
			"pmulhw" => "6", 
			"pmullw" => "6", 
			"por" => "6", 
			"prefetch" => "6", 
			"prefetchw" => "6", 
			"prefetchnta" => "6", 
			"prefetcht0" => "6", 
			"prefetcht1" => "6", 
			"prefetcht2" => "6", 
			"psadbw" => "6", 
			"pslld" => "6", 
			"psllq" => "6", 
			"psllw" => "6", 
			"psrad" => "6", 
			"psraw" => "6", 
			"psrld" => "6", 
			"psrlq" => "6", 
			"psrlw" => "6", 
			"psubb" => "6", 
			"psubd" => "6", 
			"psubsb" => "6", 
			"psubsw" => "6", 
			"psubusb" => "6", 
			"psubusw" => "6", 
			"psubw" => "6", 
			"punpckhbw" => "6", 
			"punpckhdq" => "6", 
			"punpckhwd" => "6", 
			"punpcklbw" => "6", 
			"punpckldq" => "6", 
			"punpcklwd" => "6", 
			"pxor" => "6", 
			"HFileufw" => "6", 
			"rcpps" => "6", 
			"rcpss" => "6", 
			"rdpmc" => "6", 
			"rsqrtps" => "6", 
			"rsqrtss" => "6", 
			"sfence" => "6", 
			"shufps" => "6", 
			"sqrtps" => "6", 
			"sqrtss" => "6", 
			"stmxcsr" => "6", 
			"subps" => "6", 
			"subss" => "6", 
			"syscall" => "6", 
			"sysret" => "6", 
			"ucomiss" => "6", 
			"unpckhps" => "6", 
			"unpckps" => "6", 
			"unpcklps" => "6", 
			"xmmword" => "6", 
			"xorps" => "6");

// Special extensions

// Each category can specify a PHP function that returns an altered
// version of the keyword.
        
        

$this->linkscripts    	= array(
			"1" => "donothing", 
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
