<?php
$BEAUT_PATH = realpath(".")."/Services/COPage/syntax_highlight/php";
if (!isset ($BEAUT_PATH)) return;
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_xsl extends HFile{
   function HFile_xsl(){
     $this->HFile();	
/*************************************/
// Beautifier Highlighting Configuration File 
// XSL
/*************************************/
// Flags

$this->nocase            	= "1";
$this->notrim            	= "0";
$this->perl              	= "0";

// Colours

$this->colours        	= array("blue", "purple", "gray", "blue", "brown");
$this->quotecolour       	= "blue";
$this->blockcommentcolour	= "green";
$this->linecommentcolour 	= "green";

// Indent Strings

$this->indent            	= array();
$this->unindent          	= array();

// String characters and delimiters

$this->stringchars       	= array();
$this->delimiters        	= array("~", "!", "@", "$", "%", "^", "&", "*", "(", ")", "+", "=", "|", "\\", "{", "}", "[", "]", ";", "\"", "'", "<", ">", " ", ",", "	", ".");
$this->escchar           	= "";

// Comment settings

$this->linecommenton     	= array("");
$this->blockcommenton    	= array("<!--");
$this->blockcommentoff   	= array("-->");

// Keywords (keyword mapping to colour number)

$this->keywords          	= array(
			"<a>" => "1", 
			"<a" => "1", 
			"</a>" => "1", 
			"<abbr>" => "1", 
			"<abbr" => "1", 
			"</abbr>" => "1", 
			"<above>" => "1", 
			"<acronym>" => "1", 
			"<acronym" => "1", 
			"</acronym>" => "1", 
			"<address>" => "1", 
			"<address" => "1", 
			"</address>" => "1", 
			"<area" => "1", 
			"<b>" => "1", 
			"<b" => "1", 
			"</b>" => "1", 
			"<base" => "1", 
			"<bdo>" => "1", 
			"<bdo" => "1", 
			"</bdo>" => "1", 
			"<big>" => "1", 
			"<big" => "1", 
			"</big>" => "1", 
			"<blockquote>" => "1", 
			"<blockquote" => "1", 
			"</blockquote>" => "1", 
			"<body" => "1", 
			"<body>" => "1", 
			"</body>" => "1", 
			"<br" => "1", 
			"<button>" => "1", 
			"</button>" => "1", 
			"<caption>" => "1", 
			"<caption" => "1", 
			"</caption>" => "1", 
			"<cite>" => "1", 
			"<cite" => "1", 
			"</cite>" => "1", 
			"<code>" => "1", 
			"<code" => "1", 
			"</code>" => "1", 
			"<col" => "1", 
			"<colgroup>" => "1", 
			"</colgroup>" => "1", 
			"<dd>" => "1", 
			"<dd" => "1", 
			"</dd>" => "1", 
			"<del>" => "1", 
			"<del" => "1", 
			"</del>" => "1", 
			"<dfn>" => "1", 
			"<dfn" => "1", 
			"</dfn>" => "1", 
			"<div>" => "1", 
			"<div" => "1", 
			"</div>" => "1", 
			"<dl>" => "1", 
			"<dl" => "1", 
			"</dl>" => "1", 
			"<dt>" => "1", 
			"<dt" => "1", 
			"</dt>" => "1", 
			"<em>" => "1", 
			"<em" => "1", 
			"</em>" => "1", 
			"<fieldset>" => "1", 
			"<fieldset" => "1", 
			"</fieldset>" => "1", 
			"<font" => "1", 
			"</font>" => "1", 
			"<form>" => "1", 
			"<form" => "1", 
			"</form>" => "1", 
			"<frame" => "1", 
			"<frameset" => "1", 
			"</frameset>" => "1", 
			"<h1>" => "1", 
			"<h1" => "1", 
			"</h1>" => "1", 
			"<h2>" => "1", 
			"<h2" => "1", 
			"</h2>" => "1", 
			"<h3>" => "1", 
			"<h3" => "1", 
			"</h3>" => "1", 
			"<h4>" => "1", 
			"<h4" => "1", 
			"</h4>" => "1", 
			"<h5>" => "1", 
			"<h5" => "1", 
			"</h5>" => "1", 
			"<h6>" => "1", 
			"<h6" => "1", 
			"</h6>" => "1", 
			"<head>" => "1", 
			"<head" => "1", 
			"</head>" => "1", 
			"<hr" => "1", 
			"<html>" => "1", 
			"<html" => "1", 
			"</html>" => "1", 
			"<i>" => "1", 
			"<i" => "1", 
			"</i>" => "1", 
			"<iframe>" => "1", 
			"</iframe>" => "1", 
			"<ilayer>" => "1", 
			"</ilayer>" => "1", 
			"<img" => "1", 
			"<input" => "1", 
			"<ins>" => "1", 
			"<ins" => "1", 
			"</ins>" => "1", 
			"<isindex" => "1", 
			"<kbd>" => "1", 
			"<kbd" => "1", 
			"</kbd>" => "1", 
			"<label>" => "1", 
			"<label" => "1", 
			"</label>" => "1", 
			"<legend>" => "1", 
			"<legend" => "1", 
			"</legend>" => "1", 
			"<li>" => "1", 
			"<li" => "1", 
			"</li>" => "1", 
			"<link" => "1", 
			"<map" => "1", 
			"</map>" => "1", 
			"<meta" => "1", 
			"<noframes>" => "1", 
			"</noframes>" => "1", 
			"<noscript>" => "1", 
			"</noscript>" => "1", 
			"<object>" => "1", 
			"<object" => "1", 
			"<ol>" => "1", 
			"<ol" => "1", 
			"</ol>" => "1", 
			"<optgroup>" => "1", 
			"<optgroup" => "1", 
			"</optgroup>" => "1", 
			"<option>" => "1", 
			"<option" => "1", 
			"</option>" => "1", 
			"<p" => "1", 
			"<p>" => "1", 
			"</p>" => "1", 
			"<param" => "1", 
			"<pre>" => "1", 
			"<pre" => "1", 
			"</pre>" => "1", 
			"<q>" => "1", 
			"<q" => "1", 
			"</q>" => "1", 
			"<samp>" => "1", 
			"<samp" => "1", 
			"</samp>" => "1", 
			"<script" => "1", 
			"<script>" => "1", 
			"</script>" => "1", 
			"<select" => "1", 
			"</select>" => "1", 
			"<small>" => "1", 
			"<small" => "1", 
			"</small>" => "1", 
			"<span>" => "1", 
			"<span" => "1", 
			"</span>" => "1", 
			"<strong>" => "1", 
			"<strong" => "1", 
			"</strong>" => "1", 
			"<style>" => "1", 
			"<style" => "1", 
			"</style>" => "1", 
			"<sub>" => "1", 
			"<sub" => "1", 
			"</sub>" => "1", 
			"<sup>" => "1", 
			"<sup" => "1", 
			"</sup>" => "1", 
			"<table>" => "1", 
			"<table" => "1", 
			"</table>" => "1", 
			"<tbody>" => "1", 
			"<tbody" => "1", 
			"</tbody>" => "1", 
			"<td" => "1", 
			"<td>" => "1", 
			"</td>" => "1", 
			"<textarea" => "1", 
			"<textarea>" => "1", 
			"</textarea>" => "1", 
			"<tfoot>" => "1", 
			"<tfoot" => "1", 
			"</tfoot>" => "1", 
			"<th" => "1", 
			"<th>" => "1", 
			"</th>" => "1", 
			"<thead>" => "1", 
			"<thead" => "1", 
			"</thead>" => "1", 
			"<title>" => "1", 
			"</title>" => "1", 
			"<tr" => "1", 
			"<tr>" => "1", 
			"</tr>" => "1", 
			"<tt>" => "1", 
			"</tt>" => "1", 
			"<tt" => "1", 
			"<ul>" => "1", 
			"<ul" => "1", 
			"</ul>" => "1", 
			"<var>" => "1", 
			"</var>" => "1", 
			"<var" => "1", 
			"//" => "1", 
			"/>" => "1", 
			">" => "1", 
			"NaN" => "2", 
			"abbr" => "2", 
			"accept" => "2", 
			"accept-charset" => "2", 
			"accesskey" => "2", 
			"action" => "2", 
			"align" => "2", 
			"alink" => "2", 
			"alt" => "2", 
			"archive" => "2", 
			"axis" => "2", 
			"background" => "3", 
			"behavior" => "2", 
			"below" => "5", 
			"bgcolor" => "2", 
			"border" => "3", 
			"case-order" => "2", 
			"cdata-section-elements" => "2", 
			"cellpadding" => "2", 
			"cellspacing" => "2", 
			"char" => "2", 
			"charoff" => "2", 
			"charset" => "2", 
			"checked" => "2", 
			"cite" => "2", 
			"class" => "2", 
			"classid" => "2", 
			"clear" => "3", 
			"code" => "5", 
			"codebase" => "2", 
			"codetype" => "2", 
			"color" => "3", 
			"cols" => "2", 
			"colspan" => "2", 
			"compact" => "2", 
			"content" => "2", 
			"coords" => "2", 
			"count" => "2", 
			"data" => "2", 
			"data-type" => "2", 
			"datetime" => "2", 
			"decimal-separator" => "2", 
			"declare" => "2", 
			"defer" => "2", 
			"digit" => "2", 
			"dir" => "2", 
			"disable-output-escaping" => "2", 
			"disabled" => "2", 
			"doctype-public" => "2", 
			"doctype-system" => "2", 
			"elements" => "2", 
			"encoding" => "2", 
			"enctype" => "2", 
			"exclude-result-prefixes" => "2", 
			"extension-element-prefixes" => "2", 
			"face" => "2", 
			"for" => "2", 
			"format" => "3", 
			"frame" => "2", 
			"frameborder" => "2", 
			"framespacing" => "2", 
			"from" => "2", 
			"grouping-separator" => "3", 
			"grouping-size" => "3", 
			"headers" => "2", 
			"height" => "3", 
			"hidden" => "5", 
			"href" => "3", 
			"hreflang" => "2", 
			"hspace" => "2", 
			"http-equiv" => "2", 
			"id" => "3", 
			"indent" => "2", 
			"infinity" => "2", 
			"ismap" => "2", 
			"label" => "2", 
			"lang" => "2", 
			"language" => "3", 
			"letter-value" => "3", 
			"level" => "5", 
			"link" => "2", 
			"longdesc" => "2", 
			"loop" => "2", 
			"mailto" => "2", 
			"marginheight" => "2", 
			"marginwidth" => "2", 
			"match" => "2", 
			"maxlength" => "2", 
			"media" => "2", 
			"media-type" => "2", 
			"method" => "2", 
			"minus-sign" => "2", 
			"mode" => "2", 
			"multiple" => "2", 
			"name" => "2", 
			"namespace" => "2", 
			"nohref" => "2", 
			"noresize" => "2", 
			"noshade" => "2", 
			"object" => "2", 
			"omit-xml-declaration" => "2", 
			"onblur" => "2", 
			"onchange" => "2", 
			"onclick" => "2", 
			"ondblclick" => "2", 
			"onfocus" => "2", 
			"onkeydown" => "2", 
			"onkeypress" => "2", 
			"onkeyup" => "2", 
			"onload" => "2", 
			"onmousedown" => "2", 
			"onmousemove" => "2", 
			"onmouseout" => "2", 
			"onmouseover" => "2", 
			"onmouseup" => "2", 
			"onreset" => "2", 
			"onselect" => "2", 
			"onsubmit" => "2", 
			"onunload" => "2", 
			"order" => "2", 
			"pattern-separator" => "2", 
			"per-mille" => "2", 
			"percent" => "2", 
			"priority" => "2", 
			"profile" => "2", 
			"prompt" => "2", 
			"readonly" => "2", 
			"rel" => "2", 
			"result-prefix" => "2", 
			"rev" => "2", 
			"rows" => "2", 
			"rowspan" => "2", 
			"rules" => "2", 
			"scheme" => "2", 
			"scope" => "2", 
			"scrolling" => "2", 
			"select" => "2", 
			"selected" => "2", 
			"shape" => "2", 
			"size" => "3", 
			"span" => "3", 
			"src" => "2", 
			"standalone" => "2", 
			"standby" => "2", 
			"start" => "5", 
			"style" => "2", 
			"stylesheet-prefix" => "2", 
			"summary" => "2", 
			"tabindex" => "2", 
			"target" => "2", 
			"terminate" => "2", 
			"test" => "2", 
			"text" => "2", 
			"title" => "2", 
			"topmargin" => "2", 
			"type" => "2", 
			"url" => "2", 
			"use" => "2", 
			"use-attribute-sets" => "2", 
			"usemap" => "2", 
			"valign" => "2", 
			"value" => "2", 
			"valuetype" => "2", 
			"version" => "2", 
			"vlink" => "2", 
			"vspace" => "2", 
			"width" => "3", 
			"xmlns:fo" => "2", 
			"xmlns:xsl" => "2", 
			"zero-digit" => "2", 
			"=" => "2", 
			"apply-word-spacing" => "3", 
			"auto-restore" => "3", 
			"azimuth" => "3", 
			"background-attachment" => "3", 
			"background-color" => "3", 
			"background-image" => "3", 
			"background-position" => "3", 
			"background-repeat" => "3", 
			"baseline-shift" => "3", 
			"blank-page" => "3", 
			"block-progression-dimension" => "3", 
			"border-after-color" => "3", 
			"border-after-style" => "3", 
			"border-after-width" => "3", 
			"border-before-color" => "3", 
			"border-before-style" => "3", 
			"border-before-width" => "3", 
			"border-bottom" => "3", 
			"border-bottom-color" => "3", 
			"border-bottom-style" => "3", 
			"border-bottom-width" => "3", 
			"border-collapse" => "3", 
			"border-color" => "3", 
			"border-end-color" => "3", 
			"border-end-style" => "3", 
			"border-end-width" => "3", 
			"border-left" => "3", 
			"border-left-color" => "3", 
			"border-left-style" => "3", 
			"border-left-width" => "3", 
			"border-right" => "3", 
			"border-right-color" => "3", 
			"border-right-style" => "3", 
			"border-right-width" => "3", 
			"border-spacing" => "3", 
			"border-start-color" => "3", 
			"border-start-style" => "3", 
			"border-start-width" => "3", 
			"border-style" => "3", 
			"border-top" => "3", 
			"border-top-color" => "3", 
			"border-top-style" => "3", 
			"border-top-width" => "3", 
			"border-width" => "3", 
			"bottom" => "5", 
			"break-after" => "3", 
			"break-before" => "3", 
			"caption-side" => "3", 
			"case-name" => "3", 
			"case-title" => "3", 
			"character" => "3", 
			"clip" => "3", 
			"column-count" => "3", 
			"column-gap" => "3", 
			"column-number" => "3", 
			"column-width" => "3", 
			"country" => "3", 
			"cue" => "3", 
			"cue-after" => "3", 
			"cue-before" => "3", 
			"destination-placement-offset" => "3", 
			"direction" => "3", 
			"dom-state" => "3", 
			"elevation" => "3", 
			"empty-cells" => "3", 
			"end-indent" => "3", 
			"ends-row" => "3", 
			"extent" => "3", 
			"external-destination" => "3", 
			"float" => "3", 
			"flow-name" => "3", 
			"font" => "3", 
			"font-family" => "3", 
			"font-height-override-after" => "3", 
			"font-height-override-before" => "3", 
			"font-size" => "3", 
			"font-size-adjust" => "3", 
			"font-stretch" => "3", 
			"font-style" => "3", 
			"font-variant" => "3", 
			"font-weight" => "3", 
			"force-page-count" => "3", 
			"glyph-orientation-horizontal" => "3", 
			"glyph-orientation-vertical" => "3", 
			"hyphenate" => "3", 
			"hyphenation-character" => "3", 
			"hyphenation-keep" => "3", 
			"hyphenation-ladder-count" => "3", 
			"hyphenation-push-character-count" => "3", 
			"hyphenation-remain-character-count" => "3", 
			"indicate-destination" => "3", 
			"inhibit-line-breaks" => "3", 
			"initial-page-number" => "3", 
			"inline-progression-dimension" => "3", 
			"internal-destination" => "3", 
			"keep" => "3", 
			"keep-with-next" => "3", 
			"keep-with-previous" => "3", 
			"last-line-end-indent" => "3", 
			"leader-alignment" => "3", 
			"leader-length" => "3", 
			"leader-pattern" => "3", 
			"leader-pattern-width" => "3", 
			"left" => "5", 
			"letter-spacing" => "3", 
			"linefeed-treatment" => "3", 
			"line-height" => "5", 
			"line-height-shift-adjustment" => "3", 
			"line-stacking-strategy" => "3", 
			"margin" => "3", 
			"margin-bottom" => "3", 
			"margin-left" => "3", 
			"margin-right" => "3", 
			"margin-top" => "3", 
			"master-name" => "3", 
			"max-height" => "5", 
			"maximum-block-progression-dimension" => "3", 
			"maximum-inline-progression-dimension" => "3", 
			"maximum-repeats" => "3", 
			"max-width" => "3", 
			"may-break-after-row" => "3", 
			"may-break-before-row" => "3", 
			"min-height" => "3", 
			"minimum-block-progression-dimension" => "3", 
			"minimum-inline-progression-dimension" => "3", 
			"min-width" => "3", 
			"number-columns-repeated" => "3", 
			"number-columns-spanned" => "3", 
			"number-rows-spanned" => "3", 
			"odd-or-even" => "3", 
			"orphans" => "3", 
			"overflow" => "3", 
			"padding" => "3", 
			"padding-after" => "3", 
			"padding-before" => "3", 
			"padding-bottom" => "3", 
			"padding-end" => "3", 
			"padding-left" => "3", 
			"padding-right" => "3", 
			"padding-start" => "3", 
			"padding-top" => "3", 
			"page-break-after" => "3", 
			"page-break-before" => "3", 
			"page-break-inside" => "3", 
			"page-height" => "3", 
			"page-position" => "3", 
			"page-width" => "3", 
			"pause" => "3", 
			"pause-after" => "3", 
			"pause-before" => "3", 
			"pitch" => "3", 
			"pitch-range" => "3", 
			"play-during" => "3", 
			"position" => "3", 
			"precedence" => "3", 
			"provisional-distance-between-starts" => "3", 
			"provisional-label-separation" => "3", 
			"reference-orientation" => "3", 
			"ref-id" => "3", 
			"region-name" => "3", 
			"richness" => "3", 
			"right" => "5", 
			"role" => "3", 
			"rule-style" => "3", 
			"rule-thickness" => "3", 
			"scale" => "3", 
			"score-spaces" => "3", 
			"script" => "3", 
			"show-destination" => "3", 
			"source-document" => "3", 
			"space-after" => "3", 
			"space-before" => "3", 
			"space-end" => "3", 
			"space-start" => "3", 
			"space-treatment" => "3", 
			"speak" => "3", 
			"speak-header" => "3", 
			"speak-numeral" => "3", 
			"speak-punctuation" => "3", 
			"speech-rate" => "3", 
			"start-indent" => "3", 
			"starting-state" => "3", 
			"starts-row" => "3", 
			"stress" => "3", 
			"suppress-at-eol" => "3", 
			"switch-to" => "3", 
			"table-layout" => "3", 
			"table-omit-footer-at-break" => "3", 
			"table-omit-header-at-break" => "3", 
			"text-align" => "3", 
			"text-align-last" => "3", 
			"text-decoration" => "3", 
			"text-indent" => "3", 
			"text-shadow" => "3", 
			"text-transform" => "3", 
			"top" => "5", 
			"unicode-bidi" => "3", 
			"vertical-align" => "3", 
			"visibility" => "3", 
			"voice-family" => "3", 
			"volume" => "3", 
			"white-space" => "3", 
			"white-space-collapse" => "3", 
			"white-space-treatment" => "3", 
			"widows" => "3", 
			"word-spacing" => "3", 
			"wrap-option" => "3", 
			"writing-mode" => "3", 
			"xmllang" => "3", 
			"z-index" => "3", 
			"<fo:bidi-override>" => "4", 
			"<fo:bidi-override" => "4", 
			"</fo:bidi-override>" => "4", 
			"<fo:block>" => "4", 
			"<fo:block" => "4", 
			"</fo:block>" => "4", 
			"<fo:block-container>" => "4", 
			"<fo:block-container" => "4", 
			"</fo:block-container>" => "4", 
			"<fo:character>" => "4", 
			"<fo:character" => "4", 
			"</fo:character>" => "4", 
			"<fo:conditional-page-master-reference>" => "4", 
			"<fo:conditional-page-master-reference" => "4", 
			"</fo:conditional-page-master-reference>" => "4", 
			"<fo:external-graphic>" => "4", 
			"<fo:external-graphic" => "4", 
			"</fo:external-graphic>" => "4", 
			"<fo:float>" => "4", 
			"<fo:float" => "4", 
			"</fo:float>" => "4", 
			"<fo:flow>" => "4", 
			"<fo:flow" => "4", 
			"</fo:flow>" => "4", 
			"<fo:footnote>" => "4", 
			"<fo:footnote" => "4", 
			"</fo:footnote>" => "4", 
			"<fo:footnote-citation>" => "4", 
			"<fo:footnote-citation" => "4", 
			"</fo:footnote-citation>" => "4", 
			"<fo:initial-property-set>" => "4", 
			"<fo:initial-property-set" => "4", 
			"</fo:initial-property-set>" => "4", 
			"<fo:inline>" => "4", 
			"<fo:inline" => "4", 
			"</fo:inline>" => "4", 
			"<fo:inline-container>" => "4", 
			"<fo:inline-container" => "4", 
			"</fo:inline-container>" => "4", 
			"<fo:instream-graphic>" => "4", 
			"<fo:instream-graphic" => "4", 
			"</fo:instream-graphic>" => "4", 
			"<fo:layout-master-set>" => "4", 
			"<fo:layout-master-set" => "4", 
			"</fo:layout-master-set>" => "4", 
			"<fo:leader>" => "4", 
			"<fo:leader" => "4", 
			"</fo:leader>" => "4", 
			"<fo:list-block>" => "4", 
			"<fo:list-block" => "4", 
			"</fo:list-block>" => "4", 
			"<fo:list-item>" => "4", 
			"<fo:list-item" => "4", 
			"</fo:list-item>" => "4", 
			"<fo:list-item-body>" => "4", 
			"<fo:list-item-body" => "4", 
			"</fo:list-item-body>" => "4", 
			"<fo:list-item-label>" => "4", 
			"<fo:list-item-label" => "4", 
			"</fo:list-item-label>" => "4", 
			"<fo:multi-case>" => "4", 
			"<fo:multi-case" => "4", 
			"</fo:multi-case>" => "4", 
			"<fo:multi-properties>" => "4", 
			"<fo:multi-properties" => "4", 
			"</fo:multi-properties>" => "4", 
			"<fo:multi-property-set>" => "4", 
			"<fo:multi-property-set" => "4", 
			"</fo:multi-property-set>" => "4", 
			"<fo:multi-switch>" => "4", 
			"<fo:multi-switch" => "4", 
			"</fo:multi-switch>" => "4", 
			"<fo:multi-toggle>" => "4", 
			"<fo:multi-toggle" => "4", 
			"</fo:multi-toggle>" => "4", 
			"<fo:page-number>" => "4", 
			"<fo:page-number" => "4", 
			"</fo:page-number>" => "4", 
			"<fo:page-number-citation>" => "4", 
			"<fo:page-number-citation" => "4", 
			"</fo:page-number-citation>" => "4", 
			"<fo:page-sequence>" => "4", 
			"<fo:page-sequence" => "4", 
			"</fo:page-sequence>" => "4", 
			"<fo:page-sequence-master>" => "4", 
			"<fo:page-sequence-master" => "4", 
			"</fo:page-sequence-master>" => "4", 
			"<fo:region-after>" => "4", 
			"<fo:region-after" => "4", 
			"</fo:region-after>" => "4", 
			"<fo:region-before>" => "4", 
			"<fo:region-before" => "4", 
			"</fo:region-before>" => "4", 
			"<fo:region-body>" => "4", 
			"<fo:region-body" => "4", 
			"</fo:region-body>" => "4", 
			"<fo:region-end>" => "4", 
			"<fo:region-end" => "4", 
			"</fo:region-end>" => "4", 
			"<fo:region-start>" => "4", 
			"<fo:region-start" => "4", 
			"</fo:region-start>" => "4", 
			"<fo:repeatable-page-master-alternatives>" => "4", 
			"<fo:repeatable-page-master-alternatives" => "4", 
			"</fo:repeatable-page-master-alternatives>" => "4", 
			"<fo:repeatable-page-master-reference>" => "4", 
			"<fo:repeatable-page-master-reference" => "4", 
			"</fo:repeatable-page-master-reference>" => "4", 
			"<fo:root>" => "4", 
			"<fo:root" => "4", 
			"</fo:root>" => "4", 
			"<fo:simple-link>" => "4", 
			"<fo:simple-link" => "4", 
			"</fo:simple-link>" => "4", 
			"<fo:simple-page-master>" => "4", 
			"<fo:simple-page-master" => "4", 
			"</fo:simple-page-master>" => "4", 
			"<fo:single-page-master-reference>" => "4", 
			"<fo:single-page-master-reference" => "4", 
			"</fo:single-page-master-reference>" => "4", 
			"<fo:static-content>" => "4", 
			"<fo:static-content" => "4", 
			"</fo:static-content>" => "4", 
			"<fo:table>" => "4", 
			"<fo:table" => "4", 
			"</fo:table>" => "4", 
			"<fo:table-and-caption>" => "4", 
			"<fo:table-and-caption" => "4", 
			"</fo:table-and-caption>" => "4", 
			"<fo:table-body>" => "4", 
			"<fo:table-body" => "4", 
			"</fo:table-body>" => "4", 
			"<fo:table-caption>" => "4", 
			"<fo:table-caption" => "4", 
			"</fo:table-caption>" => "4", 
			"<fo:table-cell>" => "4", 
			"<fo:table-cell" => "4", 
			"</fo:table-cell>" => "4", 
			"<fo:table-column>" => "4", 
			"<fo:table-column" => "4", 
			"</fo:table-column>" => "4", 
			"<fo:table-footer>" => "4", 
			"<fo:table-footer" => "4", 
			"</fo:table-footer>" => "4", 
			"<fo:table-header>" => "4", 
			"<fo:table-header" => "4", 
			"</fo:table-header>" => "4", 
			"<fo:table-row>" => "4", 
			"<fo:table-row" => "4", 
			"</fo:table-row>" => "4", 
			"<fo:wrapper>" => "4", 
			"<fo:wrapper" => "4", 
			"</fo:wrapper>" => "4", 
			"<xsl:apply-imports" => "4", 
			"<xsl:apply-templates" => "4", 
			"<xsl:apply-templates/>" => "4", 
			"</xsl:apply-templates>" => "4", 
			"<xsl:attribute" => "4", 
			"</xsl:attribute>" => "4", 
			"<xsl:attribute-set" => "4", 
			"</xsl:attribute-set>" => "4", 
			"<xsl:call-template" => "4", 
			"</xsl:call-template>" => "4", 
			"<xsl:choose>" => "4", 
			"</xsl:choose>" => "4", 
			"<xsl:comment>" => "4", 
			"</xsl:comment>" => "4", 
			"<xsl:copy" => "4", 
			"</xsl:copy>" => "4", 
			"<xsl:copy-of" => "4", 
			"<xsl:decimal-format" => "4", 
			"<xsl:element" => "4", 
			"</xsl:element>" => "4", 
			"<xsl:fallback>" => "4", 
			"</xsl:fallback>" => "4", 
			"<xsl:for-each" => "4", 
			"</xsl:for-each>" => "4", 
			"<xsl:if" => "4", 
			"</xsl:if>" => "4", 
			"<xsl:import" => "4", 
			"<xsl:include" => "4", 
			"<xsl:key" => "4", 
			"<xsl:message" => "4", 
			"</xsl:message>" => "4", 
			"<xsl:namespace-alias" => "4", 
			"<xsl:number" => "4", 
			"<xsl:otherwise>" => "4", 
			"</xsl:otherwise>" => "4", 
			"<xsl:output" => "4", 
			"<xsl:param" => "4", 
			"</xsl:param>" => "4", 
			"<xsl:preserve-space" => "4", 
			"<xsl:processing-instruction" => "4", 
			"</xsl:processing-instruction>" => "4", 
			"<xsl:sort" => "4", 
			"<xsl:strip-space" => "4", 
			"<xsl:stylesheet" => "4", 
			"</xsl:stylesheet>" => "4", 
			"<xsl:template" => "4", 
			"</xsl:template>" => "4", 
			"<xsl:text>" => "4", 
			"<xsl:text" => "4", 
			"</xsl:text>" => "4", 
			"<xsl:transform" => "4", 
			"</xsl:transform>" => "4", 
			"<xsl:value-of" => "4", 
			"<xsl:variable" => "4", 
			"</xsl:variable>" => "4", 
			"<xsl:when" => "4", 
			"</xsl:when>" => "4", 
			"<xsl:with-param" => "4", 
			"</xsl:with-param>" => "4", 
			"<?phpxml" => "4", 
			"?>" => "4", 
			"-180" => "5", 
			"-270" => "5", 
			"-90" => "5", 
			"0" => "5", 
			"100" => "5", 
			"180" => "5", 
			"200" => "5", 
			"270" => "5", 
			"300" => "5", 
			"400" => "5", 
			"500" => "5", 
			"600" => "5", 
			"700" => "5", 
			"800" => "5", 
			"90" => "5", 
			"900" => "5", 
			"above" => "5", 
			"absolute" => "5", 
			"after" => "5", 
			"all" => "5", 
			"alpabetic" => "5", 
			"always" => "5", 
			"any" => "5", 
			"auto" => "5", 
			"avoid" => "5", 
			"backslant" => "5", 
			"baseline" => "5", 
			"before" => "5", 
			"behind" => "5", 
			"bidi-override" => "5", 
			"blank" => "5", 
			"blink" => "5", 
			"bold" => "5", 
			"bolder" => "5", 
			"both" => "5", 
			"capitalize" => "5", 
			"caption" => "5", 
			"center" => "5", 
			"center-left" => "5", 
			"center-right" => "5", 
			"collapse" => "5", 
			"column" => "5", 
			"condensed" => "5", 
			"consider-shifts" => "5", 
			"continuous" => "5", 
			"dashed" => "5", 
			"digits" => "5", 
			"disregard-shifts" => "5", 
			"dots" => "5", 
			"dotted" => "5", 
			"double" => "5", 
			"embed" => "5", 
			"end" => "5", 
			"even" => "5", 
			"even-page" => "5", 
			"expanded" => "5", 
			"extra-condensed" => "5", 
			"extra-expanded" => "5", 
			"false" => "5", 
			"far-left" => "5", 
			"far-right" => "5", 
			"fast" => "5", 
			"faster" => "5", 
			"first" => "5", 
			"fixed" => "5", 
			"font-height" => "5", 
			"groove" => "5", 
			"hide" => "5", 
			"high" => "5", 
			"higher" => "5", 
			"icon" => "5", 
			"ignore" => "5", 
			"indefinite" => "5", 
			"inherit" => "5", 
			"inside" => "5", 
			"italic" => "5", 
			"justify" => "5", 
			"landscape" => "5", 
			"last" => "5", 
			"left-side" => "5", 
			"leftwards" => "5", 
			"lighter" => "5", 
			"line-through" => "5", 
			"loud" => "5", 
			"low" => "5", 
			"lower" => "5", 
			"lowercase" => "5", 
			"lr" => "5", 
			"lr-tb" => "5", 
			"ltr" => "5", 
			"medium" => "5", 
			"menu" => "5", 
			"message-box" => "5", 
			"middle" => "5", 
			"mix?" => "5", 
			"narrower" => "5", 
			"new" => "5", 
			"no" => "5", 
			"no-force" => "5", 
			"no-limit" => "5", 
			"no-repeat" => "5", 
			"no-wrap" => "5", 
			"nonblank" => "5", 
			"none" => "5", 
			"normal" => "5", 
			"nowrap" => "5", 
			"oblique" => "5", 
			"odd" => "5", 
			"odd-page" => "5", 
			"once" => "5", 
			"outside" => "5", 
			"overline" => "5", 
			"page" => "5", 
			"portrait" => "5", 
			"pre" => "5", 
			"preserve" => "5", 
			"reference-area" => "5", 
			"relative" => "5", 
			"repeat" => "5", 
			"repeat-x" => "5", 
			"repeat-y" => "5", 
			"repeat?" => "5", 
			"replace" => "5", 
			"rest" => "5", 
			"retain" => "5", 
			"ridge" => "5", 
			"right-side" => "5", 
			"rightwards" => "5", 
			"rl" => "5", 
			"rl-tb" => "5", 
			"rtl" => "5", 
			"rule" => "5", 
			"scroll" => "5", 
			"semi-condensed" => "5", 
			"semi-expanded" => "5", 
			"separate" => "5", 
			"show" => "5", 
			"slow" => "5", 
			"slower" => "5", 
			"small-caps" => "5", 
			"small-caption" => "5", 
			"soft" => "5", 
			"solid" => "5", 
			"space" => "5", 
			"spell-out" => "5", 
			"spread" => "5", 
			"static" => "5", 
			"status-bar" => "5", 
			"sub" => "5", 
			"super" => "5", 
			"suppress" => "5", 
			"tb" => "5", 
			"tb-rl" => "5", 
			"text-bottom" => "5", 
			"text-top" => "5", 
			"traditional" => "5", 
			"transparent" => "5", 
			"treat-as-space" => "5", 
			"true" => "5", 
			"ultra-condensed" => "5", 
			"ultra-expanded" => "5", 
			"underline" => "5", 
			"uppercase" => "5", 
			"use-content" => "5", 
			"use-font-metrics" => "5", 
			"visible" => "5", 
			"wider" => "5", 
			"wrap" => "5", 
			"x-fast" => "5", 
			"x-high" => "5", 
			"x-loud" => "5", 
			"x-low" => "5", 
			"x-slow" => "5", 
			"x-soft" => "5", 
			"xsl-any" => "5", 
			"xsl-following" => "5", 
			"xsl-preceding" => "5", 
			"xsl-region-after" => "5", 
			"xsl-region-before" => "5", 
			"xsl-region-body" => "5", 
			"xsl-region-end" => "5", 
			"xsl-region-start" => "5", 
			"yes" => "5");

// Special extensions

// Each category can specify a PHP function that returns an altered
// version of the keyword.
        
        

$this->linkscripts    	= array(
			"1" => "donothing", 
			"2" => "donothing", 
			"3" => "donothing", 
			"5" => "donothing", 
			"4" => "donothing");
}


function donothing($keywordin)
{
	return $keywordin;
}

}?>
