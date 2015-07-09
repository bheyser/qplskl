<?php
$BEAUT_PATH = realpath(".")."/Services/COPage/syntax_highlight/php";
if (!isset ($BEAUT_PATH)) return;
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_esprit extends HFile{
   function HFile_esprit(){
     $this->HFile();	
/*************************************/
// Beautifier Highlighting Configuration File 
// Esprit Post
/*************************************/
// Flags

$this->nocase            	= "1";
$this->notrim            	= "0";
$this->perl              	= "0";

// Colours

$this->colours        	= array("blue", "purple", "gray", "brown");
$this->quotecolour       	= "blue";
$this->blockcommentcolour	= "green";
$this->linecommentcolour 	= "green";

// Indent Strings

$this->indent            	= array();
$this->unindent          	= array();

// String characters and delimiters

$this->stringchars       	= array();
$this->delimiters        	= array(":", "*", "-", "+", "=", "/", "<", ">", "(", ")");
$this->escchar           	= "";

// Comment settings

$this->linecommenton     	= array("##");
$this->blockcommenton    	= array("\"");
$this->blockcommentoff   	= array("\"");

// Keywords (keyword mapping to colour number)

$this->keywords          	= array(
			"EX_ARCSEG" => "1", 
			"EX_AUXCYCLE" => "1", 
			"EX_BARFEED" => "1", 
			"EX_BORE2BODY" => "1", 
			"EX_BORE2CANCEL" => "1", 
			"EX_BORE2START" => "1", 
			"EX_BORE3BODY" => "1", 
			"EX_BORE3CANCEL" => "1", 
			"EX_BORE3START" => "1", 
			"EX_BORE4BODY" => "1", 
			"EX_BORE4CANCEL" => "1", 
			"EX_BORE4START" => "1", 
			"EX_BOREBODY" => "1", 
			"EX_BORECANCEL" => "1", 
			"EX_BORESTART" => "1", 
			"EX_CALL_SUBPROGRAM" => "1", 
			"EX_CALLSUBEND" => "1", 
			"EX_CALLSUBSTART" => "1", 
			"EX_CANNEDTHREAD" => "1", 
			"EX_CHANGEWORKSYSTEM" => "1", 
			"EX_CIRCLE" => "1", 
			"EX_CIRCLEYZ" => "1", 
			"EX_CIRCLEZX" => "1", 
			"EX_CNIBBLE" => "1", 
			"EX_CNIBBLE2" => "1", 
			"EX_COMP_LC" => "1", 
			"EX_COMP_LC_S" => "1", 
			"EX_COMPENSATION" => "1", 
			"EX_COMPENSATION_S" => "1", 
			"EX_COMPENSATIONOFF" => "1", 
			"EX_COMPENSATIONOFF_S" => "1", 
			"EX_COMPENSATIONOFF2" => "1", 
			"EX_COMPENSATIONOFF2S" => "1", 
			"EX_COMPOFF_R" => "1", 
			"EX_COMPOFF_R_S" => "1", 
			"EX_COMPOFF2_R" => "1", 
			"EX_COMPOFF2_R_S" => "1", 
			"EX_CONSTANTSURFACE" => "1", 
			"EX_CONSTANTTHREAD" => "1", 
			"EX_CPOCKETFINISH" => "1", 
			"EX_CPOCKETROUGH" => "1", 
			"EX_CUSTOM1" => "1", 
			"EX_CUSTOM2" => "1", 
			"EX_CUSTOM3" => "1", 
			"EX_CUSTOM4" => "1", 
			"EX_CUSTOM5" => "1", 
			"EX_CUTOFFEND" => "1", 
			"EX_CUTOFFSTART" => "1", 
			"EX_CYCLEDEFINITION" => "1", 
			"EX_CYCLEEND" => "1", 
			"EX_CYCLEEND2" => "1", 
			"EX_CYCLEEND3" => "1", 
			"EX_CYCLEEND4" => "1", 
			"EX_CYCLESTART" => "1", 
			"EX_CYCLESTART2" => "1", 
			"EX_CYCLESTART3" => "1", 
			"EX_CYCLESTART4" => "1", 
			"EX_DRILL2BODY" => "1", 
			"EX_DRILL2CANCEL" => "1", 
			"EX_DRILL2START" => "1", 
			"EX_DRILLBODY" => "1", 
			"EX_DRILLCANCEL" => "1", 
			"EX_DRILLJUMP" => "1", 
			"EX_DRILLSTART" => "1", 
			"EX_DUMMYCYCLE" => "1", 
			"EX_ENDCODE" => "1", 
			"EX_FACEARC" => "1", 
			"EX_FACEOFF" => "1", 
			"EX_FACEON" => "1", 
			"EX_FACESEG" => "1", 
			"EX_FINISH" => "1", 
			"EX_FIRSTRAPID" => "1", 
			"EX_FIRSTTHREADPOINT" => "1", 
			"EX_FIRSTTOOLCHANGE" => "1", 
			"EX_FIRSTTOOLCHANGE2" => "1", 
			"EX_FIRSTTOOLCHANGE3" => "1", 
			"EX_FIRSTTOOLCHANGE4" => "1", 
			"EX_GROOVE" => "1", 
			"EX_GROOVECANCEL" => "1", 
			"EX_HIT" => "1", 
			"EX_INLINENCCODE" => "1", 
			"EX_ISORADIUS" => "1", 
			"EX_LASTTOOLCHANGE" => "1", 
			"EX_LASTTOOLCHANGE2" => "1", 
			"EX_LASTTOOLCHANGE3" => "1", 
			"EX_LASTTOOLCHANGE4" => "1", 
			"EX_LENGTHCOMP" => "1", 
			"EX_LINEAR" => "1", 
			"EX_LINEAR_5AXIS" => "1", 
			"EX_LINEAR_LC" => "1", 
			"EX_LINEAR_LL" => "1", 
			"EX_LNIBBLE" => "1", 
			"EX_LNIBBLE2" => "1", 
			"EX_MACROCALL" => "1", 
			"EX_MACROEND" => "1", 
			"EX_MACROGROUPCALL" => "1", 
			"EX_MACROGROUPEND" => "1", 
			"EX_MACROGROUPRETURN" => "1", 
			"EX_MACROGROUPSTART" => "1", 
			"EX_MACRORETURN" => "1", 
			"EX_MACROSTART" => "1", 
			"EX_MAINEND" => "1", 
			"EX_MAINSTART" => "1", 
			"EX_MANUALCYCLEEND" => "1", 
			"EX_MANUALCYCLESTART" => "1", 
			"EX_MANUALFEED" => "1", 
			"EX_MANUALFEED2RAPID" => "1", 
			"EX_MANUALRAPID" => "1", 
			"EX_MANUALRAPID2FEED" => "1", 
			"EX_OTHERTOOLCHANGE" => "1", 
			"EX_OTHERTOOLCHANGE2" => "1", 
			"EX_OTHERTOOLCHANGE3" => "1", 
			"EX_OTHERTOOLCHANGE4" => "1", 
			"EX_PARK" => "1", 
			"EX_PARTPICKUP" => "1", 
			"EX_PARTRELEASE" => "1", 
			"EX_PCIRCLE" => "1", 
			"EX_PECK2BODY" => "1", 
			"EX_PECK2CANCEL" => "1", 
			"EX_PECK2START" => "1", 
			"EX_PECK3BODY" => "1", 
			"EX_PECK3CANCEL" => "1", 
			"EX_PECK3START" => "1", 
			"EX_PECKBODY" => "1", 
			"EX_PECKCANCEL" => "1", 
			"EX_PECKSTART" => "1", 
			"EX_PGRID" => "1", 
			"EX_PIVOT" => "1", 
			"EX_PLINE" => "1", 
			"EX_PROGRAMRADIUS" => "1", 
			"EX_PTOPCYCLESTART" => "1", 
			"EX_RAPID" => "1", 
			"EX_RAPID_5AXIS" => "1", 
			"EX_RAPID_SUBPROGRAM" => "1", 
			"EX_RECTPOCKET" => "1", 
			"EX_REMOVALCANCEL" => "1", 
			"EX_REPOSITION" => "1", 
			"EX_ROTARYSTART" => "1", 
			"EX_SEGARC" => "1", 
			"EX_SETORIGIN" => "1", 
			"EX_SETUP" => "1", 
			"EX_SIDEARC" => "1", 
			"EX_SIDEOFF" => "1", 
			"EX_SIDEON" => "1", 
			"EX_SPIRALPOCKET" => "1", 
			"EX_STARTCODE" => "1", 
			"EX_STOCKREMOVAL" => "1", 
			"EX_STOCKREMOVALFACE" => "1", 
			"EX_STOCKREMOVALTURN" => "1", 
			"EX_SUBEND" => "1", 
			"EX_SUBPROGRAM_END" => "1", 
			"EX_SUBPROGRAM_START" => "1", 
			"EX_SUBSTART" => "1", 
			"EX_TAP2BODY" => "1", 
			"EX_TAP2CANCEL" => "1", 
			"EX_TAP2START" => "1", 
			"EX_TAPBODY" => "1", 
			"EX_TAPCANCEL" => "1", 
			"EX_TAPSTART" => "1", 
			"EX_TECHNODEFINITION" => "1", 
			"EX_TECHNOLOGYCHANGE" => "1", 
			"EX_TECHNOLOGYCHANGE2" => "1", 
			"EX_TOOLCANCEL" => "1", 
			"EX_TOOLCANCEL2" => "1", 
			"EX_TOOLCANCEL3" => "1", 
			"EX_TOOLCANCEL4" => "1", 
			"EX_TOOLDEFINITION" => "1", 
			"EX_TOOLDEFINITION2" => "1", 
			"EX_VARIABLETHREAD" => "1", 
			"EX_VERTICAL" => "1", 
			"AAXIS" => "2", 
			"ABSOLUTE" => "2", 
			"ABSOLUTE2" => "2", 
			"ABSOLUTE360" => "2", 
			"ABSOLUTECENTER" => "2", 
			"ABSOLUTECENTERUV" => "2", 
			"ABSOLUTEZ" => "2", 
			"ACCIRCLE" => "2", 
			"ACLEARANCE" => "2", 
			"ACLINEAR" => "2", 
			"ACTUALDEPTH" => "2", 
			"ALLMILLCYCLES" => "2", 
			"ANGLEEND" => "2", 
			"ANGLELINEAR" => "2", 
			"ANGLENEXT" => "2", 
			"ANGLEOFLINE" => "2", 
			"ANGLESTART" => "2", 
			"ARCARCMODE" => "2", 
			"ASETOFF" => "2", 
			"ASETON" => "2", 
			"ASETOUTPUT" => "2", 
			"AUTOSKIMCODE" => "2", 
			"AUTOSKIMM37" => "2", 
			"AUTOSKIMM38" => "2", 
			"AUTOSKIMOFF" => "2", 
			"AUXSPINDLECCW" => "2", 
			"AUXSPINDLECW" => "2", 
			"AUXSPINDLEOFF" => "2", 
			"AVERAGEROUNDING" => "2", 
			"AXIS3CENTERMODE" => "2", 
			"AXIS3CIRCLEMODE" => "2", 
			"AXISEXCHANGECODE" => "2", 
			"AXISEXCHANGEOFF" => "2", 
			"AXISEXCHANGEON" => "2", 
			"AXISEXCHANGEXY" => "2", 
			"AXISEXCHANGEXZ" => "2", 
			"AXISEXCHANGEYZ" => "2", 
			"BARDIAMETER" => "2", 
			"BAXIS" => "2", 
			"BD" => "2", 
			"BLANKLINE" => "2", 
			"BLOCKDELETE" => "2", 
			"BORE1" => "2", 
			"BORE2" => "2", 
			"BORE3" => "2", 
			"BORE4" => "2", 
			"BORE5" => "2", 
			"BORE6" => "2", 
			"BORE7" => "2", 
			"BORECYCLECODE" => "2", 
			"BY180" => "2", 
			"BY360" => "2", 
			"BYARC" => "2", 
			"BYQUADRANT" => "2", 
			"BYRADIUS" => "2", 
			"BYSEGMENT" => "2", 
			"CALLMACRO" => "2", 
			"CANCEL" => "2", 
			"CANNEDTHREAD" => "2", 
			"CAXIS" => "2", 
			"CAXISCLOCKWISE" => "2", 
			"CENTERMODE" => "2", 
			"CGEARCODE" => "2", 
			"CGEARDISENGAGE" => "2", 
			"CGEARENGAGE" => "2", 
			"CHAMFERANGLE" => "2", 
			"CHAMFERCODE" => "2", 
			"CHAMFERDISTANCE" => "2", 
			"CHAMFEROFF" => "2", 
			"CHAMFERON" => "2", 
			"CHANGECURRENT" => "2", 
			"CHANGENEXT" => "2", 
			"CHIPFEEDRATE" => "2", 
			"CHUCKCLOSED" => "2", 
			"CHUCKOPEN" => "2", 
			"CHUTECLOSED" => "2", 
			"CHUTEOPEN" => "2", 
			"CHUTESPINDLECODE" => "2", 
			"CHUTETOAUX" => "2", 
			"CHUTETOMAIN" => "2", 
			"CHUTETOMID" => "2", 
			"CIRCLEDIRECTION" => "2", 
			"CIRCLEMODE" => "2", 
			"CIRCLERADIUS" => "2", 
			"CLAMPSOFF" => "2", 
			"CLCOMPRESSED" => "2", 
			"CLEARANCE" => "2", 
			"CLFILEMODE" => "2", 
			"CLNORMAL" => "2", 
			"CNEXT" => "2", 
			"CODED" => "2", 
			"COMMENT" => "2", 
			"COMMENTEND" => "2", 
			"COMMENTSTART" => "2", 
			"COMPENSATIONLEFT" => "2", 
			"COMPENSATIONMINUS" => "2", 
			"COMPENSATIONOFF" => "2", 
			"COMPENSATIONPLUS" => "2", 
			"COMPENSATIONRIGHT" => "2", 
			"COMPENSATIONSIDE" => "2", 
			"COMPENSATIONSIGNED" => "2", 
			"COMPENSATIONZ" => "2", 
			"CONSTANTFEED" => "2", 
			"CONSTANTROUNDING" => "2", 
			"CONSTANTSURFACE" => "2", 
			"CONSTANTTHREAD" => "2", 
			"COOLANTCODE" => "2", 
			"COOLANTFLOOD" => "2", 
			"COOLANTFLOOD2" => "2", 
			"COOLANTMIST" => "2", 
			"COOLANTOFF" => "2", 
			"COOLANTON" => "2", 
			"COOLANTSPFLOOD" => "2", 
			"COOLANTSPFLOOD2" => "2", 
			"COOLANTSPMIST" => "2", 
			"COOLANTSPON" => "2", 
			"COOLFLAUXSPCCW" => "2", 
			"COOLFLAUXSPCW" => "2", 
			"COOLFLLIVEAUXSPCCW" => "2", 
			"COOLFLLIVEAUXSPCW" => "2", 
			"COOLFLLIVESPCCW" => "2", 
			"COOLFLLIVESPCW" => "2", 
			"COOLFLSPCCW" => "2", 
			"COOLFLSPCW" => "2", 
			"COOLMISTAUXSPCCW" => "2", 
			"COOLMISTAUXSPCW" => "2", 
			"COOLMISTLIVEAUXSPCCW" => "2", 
			"COOLMISTLIVEAUXSPCW" => "2", 
			"COOLMISTLIVESPCCW" => "2", 
			"COOLMISTLIVESPCW" => "2", 
			"COOLMISTSPCCW" => "2", 
			"COOLMISTSPCW" => "2", 
			"COOLOFFSP" => "2", 
			"COOLONAUXSPCCW" => "2", 
			"COOLONAUXSPCW" => "2", 
			"COOLONLIVEAUXSPCCW" => "2", 
			"COOLONLIVEAUXSPCW" => "2", 
			"COOLONLIVESPCCW" => "2", 
			"COOLONLIVESPCW" => "2", 
			"COOLONSPCCW" => "2", 
			"COOLONSPCW" => "2", 
			"COOLSPCODE" => "2", 
			"COORDINATECODE" => "2", 
			"COORDINATEMODE" => "2", 
			"COORDINATEPRESET" => "2", 
			"COORDINATESYSTEMCODE" => "2", 
			"COORDINATESYSTEMOFF" => "2", 
			"COORDINATESYSTEMON" => "2", 
			"CORNERCONTROLCODE" => "2", 
			"CORNERCONTROLOFF" => "2", 
			"CORNERCONTROLON" => "2", 
			"CORNERRAD" => "2", 
			"CORNERRADIUS" => "2", 
			"CORNERRADIUSMODE" => "2", 
			"CORNERROUNDINGCODE" => "2", 
			"CORNERSLOWDOWNMODE" => "2", 
			"CORNERSLOWDOWNOFF" => "2", 
			"CORNERSLOWDOWNON" => "2", 
			"CURRENTEXAMPLE" => "2", 
			"CUTCONTINUOUS" => "2", 
			"CUTDUTY" => "2", 
			"CUTFREQUENCY" => "2", 
			"CUTGASCODE" => "2", 
			"CUTGASHIGH" => "2", 
			"CUTGASLOW" => "2", 
			"CUTGASMED" => "2", 
			"CUTGASOFF" => "2", 
			"CUTGATED" => "2", 
			"CUTHYPER" => "2", 
			"CUTMODE" => "2", 
			"CUTMODE57" => "2", 
			"CUTMODE58" => "2", 
			"CUTMODE59" => "2", 
			"CUTPOWER" => "2", 
			"CUTPOWERCODE" => "2", 
			"CUTPOWERNONE" => "2", 
			"CUTPOWEROFF" => "2", 
			"CUTPOWERON" => "2", 
			"CUTPULSE" => "2", 
			"CUTSUPER" => "2", 
			"CYCLECODE" => "2", 
			"CYCLETYPE" => "2", 
			"DEPTH" => "2", 
			"DIAMETERCOMPENSATION" => "2", 
			"DIAMETRAL" => "2", 
			"DIRECTION1" => "2", 
			"DIRECTION2" => "2", 
			"DIRECTIONA" => "2", 
			"DIRECTIONB" => "2", 
			"DISTANCE0POSITIONING" => "2", 
			"DISTANCE1" => "2", 
			"DISTANCE2" => "2", 
			"DISTANCEA" => "2", 
			"DISTANCEB" => "2", 
			"DISTANCELINEAR" => "2", 
			"DISTNEXT" => "2", 
			"DRILL1" => "2", 
			"DRILL2" => "2", 
			"DRILLCYCLECODE" => "2", 
			"DSETOFF" => "2", 
			"DSETON" => "2", 
			"DSETOUTPUT" => "2", 
			"DWELL" => "2", 
			"DWELLT" => "2", 
			"DWELLT2" => "2", 
			"DWELLTIME" => "2", 
			"DWELLTIME2" => "2", 
			"EDM4AXISOFFSET" => "2", 
			"EDM4COMPLEXSHAPE" => "2", 
			"EDM4FORMTOOL" => "2", 
			"EDM4MODE" => "2", 
			"EDM4NORMAL" => "2", 
			"EDMPOWERCODE" => "2", 
			"EDMPOWEROFF" => "2", 
			"EDMPOWERON" => "2", 
			"ELEMENTANGLE" => "2", 
			"ELEMENTSTEP" => "2", 
			"ENC" => "2", 
			"ENDEXP" => "2", 
			"ENDOFBLOCK" => "2", 
			"ENDPROGRAM" => "2", 
			"ENDSEQUENCENUMBER" => "2", 
			"EXACTSTOPCODE" => "2", 
			"EXACTSTOPOFF" => "2", 
			"EXACTSTOPON" => "2", 
			"FABCENTERWORKTYPE" => "2", 
			"FACE" => "2", 
			"FACEINTERPOLATECODE" => "2", 
			"FACEINTERPOLATEMODE" => "2", 
			"FACEINTERPOLATEOFF" => "2", 
			"FACEINTERPOLATEON" => "2", 
			"FCLEARANCE" => "2", 
			"FEEDCONTROLCODE" => "2", 
			"FEEDCONTROLOFF" => "2", 
			"FEEDCONTROLON" => "2", 
			"FEEDPERMINUTE" => "2", 
			"FEEDPERREVOLUTION" => "2", 
			"FEEDRATE" => "2", 
			"FEEDUNIT" => "2", 
			"FINISH" => "2", 
			"FINISH_FEEDRATE_PM" => "2", 
			"FINISH_FEEDRATE_PT" => "2", 
			"FINISH_SPINDLE_RPM" => "2", 
			"FINISH_SPINDLE_SPM" => "2", 
			"FINISHCODE" => "2", 
			"FINISHOFF" => "2", 
			"FINISHON" => "2", 
			"FINISHPASS" => "2", 
			"FINISHSTOCK" => "2", 
			"FIRSTRAPIDPOINT" => "2", 
			"FIRSTTOOL" => "2", 
			"FIRSTX" => "2", 
			"FIRSTXTC" => "2", 
			"FIRSTY" => "2", 
			"FIRSTYTC" => "2", 
			"FIRSTZTC" => "2", 
			"FIXTUREOFFSET" => "2", 
			"FLPRESSURECODE" => "2", 
			"FLPRESSUREHIGH" => "2", 
			"FLPRESSURESTD" => "2", 
			"FLUSHCODE" => "2", 
			"FLUSHHIGH" => "2", 
			"FLUSHING" => "2", 
			"FLUSHINGCODE" => "2", 
			"FLUSHINGLOWER" => "2", 
			"FLUSHINGNONE" => "2", 
			"FLUSHINGOFF" => "2", 
			"FLUSHINGON" => "2", 
			"FLUSHINGUPPER" => "2", 
			"FLUSHLOW" => "2", 
			"FLUSHMEDIUM" => "2", 
			"FLUSHOFF" => "2", 
			"FLUSHON" => "2", 
			"FORWARDTAPER" => "2", 
			"FREQUENCY120" => "2", 
			"FREQUENCY30" => "2", 
			"FREQUENCY60" => "2", 
			"FREQUENCYCODE" => "2", 
			"FREQUENCYNONE" => "2", 
			"FREQUENCYOFF" => "2", 
			"FREQUENCYSTRATEGY1" => "2", 
			"FREQUENCYSTRATEGY2" => "2", 
			"FRETURN" => "2", 
			"FROMOPERATION" => "2", 
			"FROMTOOL" => "2", 
			"FULL" => "2", 
			"FULLCIRCLE" => "2", 
			"G40OPTIONALSTOP" => "2", 
			"G40PROGRAMSTOP" => "2", 
			"G40STOPCODE" => "2", 
			"GASTYPE1" => "2", 
			"GASTYPE2" => "2", 
			"GASTYPE3" => "2", 
			"GASTYPECODE" => "2", 
			"GRADUAL" => "2", 
			"GRADUALTOCONIC" => "2", 
			"GROOVEALONGX" => "2", 
			"GROOVEALONGZ" => "2", 
			"GROOVECYCLECODE" => "2", 
			"HIGHRANGE" => "2", 
			"ID" => "2", 
			"INCH" => "2", 
			"INCHCONVFACTOR" => "2", 
			"INCREMENTAL" => "2", 
			"INCREMENTAL2" => "2", 
			"INCREMENTALZ" => "2", 
			"INCREMENTANGLE" => "2", 
			"INCREMENTCENTER" => "2", 
			"INCREMENTFROMCENTER" => "2", 
			"INCREMENTFROMCENTERUV" => "2", 
			"INCREMENTFROMCENTERXY" => "2", 
			"INCREMENTFROMSTART" => "2", 
			"INCREMENTFROMSTARTUV" => "2", 
			"INCREMENTFROMSTARTXY" => "2", 
			"INCRPFORCANNED" => "2", 
			"INCRPFORCUT" => "2", 
			"INDEPENDENTROUNDING" => "2", 
			"INITIALCLEARANCE" => "2", 
			"INITIALDEPTH" => "2", 
			"INITPECKINCREMENT" => "2", 
			"INLINENCSTRING" => "2", 
			"INTERPOLATENC" => "2", 
			"INTERSECTIONMODE" => "2", 
			"INVERSETIMEFEED" => "2", 
			"INZONEPOSITIONING" => "2", 
			"IPOWER" => "2", 
			"IRETURN" => "2", 
			"ISDIM" => "2", 
			"ISORADIUS" => "2", 
			"ITERATIVE" => "2", 
			"ITERATIVE2" => "2", 
			"ITERATIVE3" => "2", 
			"JSDIM" => "2", 
			"KSDIM" => "2", 
			"LARGERESTROUNDING" => "2", 
			"LASER" => "2", 
			"LASTCYCLE" => "2", 
			"LASTINITIALCLEARANCE" => "2", 
			"LASTTOOL" => "2", 
			"LASTXTC" => "2", 
			"LASTYTC" => "2", 
			"LASTZTC" => "2", 
			"LATHECYCLE" => "2", 
			"LATHEMILLCYCLE" => "2", 
			"LATHEWORKTYPE" => "2", 
			"LEAD" => "2", 
			"LEADVALUE" => "2", 
			"LEADVARIATION" => "2", 
			"LEFTINFEED" => "2", 
			"LENGTHCANCEL" => "2", 
			"LENGTHCOMPENSATION" => "2", 
			"LENGTHCOMPMODE" => "2", 
			"LENGTHCOMPMODECODE" => "2", 
			"LENGTHCOMPOUTMODE" => "2", 
			"LENGTHOFLINE" => "2", 
			"LIVEAUXSPINDLECCW" => "2", 
			"LIVEAUXSPINDLECW" => "2", 
			"LIVEAUXSPINDLEOFF" => "2", 
			"LIVESPINDLECCW" => "2", 
			"LIVESPINDLECW" => "2", 
			"LIVESPINDLEOFF" => "2", 
			"LOADPOSITION" => "2", 
			"LOWRANGE" => "2", 
			"MACHINETOLERANCE" => "2", 
			"MACHINETYPE" => "2", 
			"MACROEND" => "2", 
			"MACROFIRST" => "2", 
			"MACROGROUPNUMBER" => "2", 
			"MACROGROUPSTATUS" => "2", 
			"MACRONUMBER" => "2", 
			"MACROSTART" => "2", 
			"MANUFACTURER" => "2", 
			"MARKER" => "2", 
			"MAXCIRCLERADIUS" => "2", 
			"MAXIMUMRPM" => "2", 
			"MAXIMUMRPMVALUE" => "2", 
			"MAXNCODE" => "2", 
			"MAXRPM" => "2", 
			"MEASUREMENTCODE" => "2", 
			"MEASUREMENTMODE" => "2", 
			"METRIC" => "2", 
			"METRICCONVFACTOR" => "2", 
			"MIDRANGE" => "2", 
			"MILL4DRILL" => "2", 
			"MILLCYCLE" => "2", 
			"MILLPLUNGE" => "2", 
			"MILLRETRACTMODE" => "2", 
			"MILLTURNCODE" => "2", 
			"MILLUPDOWN" => "2", 
			"MILLZIGZAG" => "2", 
			"MIRRORABOUTXAXIS" => "2", 
			"MIRRORABOUTXYAXIS" => "2", 
			"MIRRORABOUTYAXIS" => "2", 
			"MIRRORCODE" => "2", 
			"MIRROROFF" => "2", 
			"MISCFORMAT1" => "2", 
			"MISCFORMAT10" => "2", 
			"MISCFORMAT11" => "2", 
			"MISCFORMAT12" => "2", 
			"MISCFORMAT13" => "2", 
			"MISCFORMAT14" => "2", 
			"MISCFORMAT15" => "2", 
			"MISCFORMAT16" => "2", 
			"MISCFORMAT17" => "2", 
			"MISCFORMAT18" => "2", 
			"MISCFORMAT19" => "2", 
			"MISCFORMAT2" => "2", 
			"MISCFORMAT20" => "2", 
			"MISCFORMAT21" => "2", 
			"MISCFORMAT22" => "2", 
			"MISCFORMAT23" => "2", 
			"MISCFORMAT24" => "2", 
			"MISCFORMAT25" => "2", 
			"MISCFORMAT26" => "2", 
			"MISCFORMAT27" => "2", 
			"MISCFORMAT28" => "2", 
			"MISCFORMAT29" => "2", 
			"MISCFORMAT3" => "2", 
			"MISCFORMAT30" => "2", 
			"MISCFORMAT31" => "2", 
			"MISCFORMAT32" => "2", 
			"MISCFORMAT33" => "2", 
			"MISCFORMAT34" => "2", 
			"MISCFORMAT35" => "2", 
			"MISCFORMAT36" => "2", 
			"MISCFORMAT37" => "2", 
			"MISCFORMAT38" => "2", 
			"MISCFORMAT39" => "2", 
			"MISCFORMAT4" => "2", 
			"MISCFORMAT40" => "2", 
			"MISCFORMAT5" => "2", 
			"MISCFORMAT6" => "2", 
			"MISCFORMAT7" => "2", 
			"MISCFORMAT8" => "2", 
			"MISCFORMAT9" => "2", 
			"MISCGCODE" => "2", 
			"MISCMCODE" => "2", 
			"MISCSYMBOLICCODE1" => "2", 
			"MISCSYMBOLICCODE10" => "2", 
			"MISCSYMBOLICCODE11" => "2", 
			"MISCSYMBOLICCODE12" => "2", 
			"MISCSYMBOLICCODE13" => "2", 
			"MISCSYMBOLICCODE14" => "2", 
			"MISCSYMBOLICCODE15" => "2", 
			"MISCSYMBOLICCODE16" => "2", 
			"MISCSYMBOLICCODE17" => "2", 
			"MISCSYMBOLICCODE18" => "2", 
			"MISCSYMBOLICCODE19" => "2", 
			"MISCSYMBOLICCODE2" => "2", 
			"MISCSYMBOLICCODE20" => "2", 
			"MISCSYMBOLICCODE3" => "2", 
			"MISCSYMBOLICCODE4" => "2", 
			"MISCSYMBOLICCODE5" => "2", 
			"MISCSYMBOLICCODE6" => "2", 
			"MISCSYMBOLICCODE7" => "2", 
			"MISCSYMBOLICCODE8" => "2", 
			"MISCSYMBOLICCODE9" => "2", 
			"MITSFIRSTCOMMENT" => "2", 
			"MOTION" => "2", 
			"MOTIONCCW" => "2", 
			"MOTIONCW" => "2", 
			"MOTIONLINEAR" => "2", 
			"MOTIONRAPID" => "2", 
			"MSETOFF" => "2", 
			"MSETON" => "2", 
			"MSETOUTPUT" => "2", 
			"NCODEDEFAULT" => "2", 
			"NCODEINCREMENT" => "2", 
			"NEXTCYCLECODE" => "2", 
			"NEXTCYCLETOOL" => "2", 
			"NEXTCYCLETYPE" => "2", 
			"NEXTTOOL" => "2", 
			"NIBBLEARC" => "2", 
			"NIBBLELINE" => "2", 
			"NIBBLEPUNCHARCCODE" => "2", 
			"NIBBLEPUNCHLINECODE" => "2", 
			"NMEMOVAL" => "2", 
			"NOFENTRIES" => "2", 
			"NONERESTRICTION" => "2", 
			"NORMAL" => "2", 
			"NOROUNDING" => "2", 
			"NUMBEROFHITS" => "2", 
			"NUMBEROFHITS1" => "2", 
			"NUMBEROFHITS2" => "2", 
			"NUMBEROFHITSA" => "2", 
			"NUMBEROFHITSB" => "2", 
			"OD" => "2", 
			"OFFINFEED" => "2", 
			"OFFSET" => "2", 
			"OFFSETNC" => "2", 
			"OPTIONALSTOP" => "2", 
			"OUTPUTFORMATCODE" => "2", 
			"OUTPUTSTANDARD" => "2", 
			"PARKRETURNCODE" => "2", 
			"PARKRETURNXYZ" => "2", 
			"PARKRETURNXZ" => "2", 
			"PARKRETURNYZ" => "2", 
			"PARKRETURNZ" => "2", 
			"PARTCHUTECODE" => "2", 
			"PARTPLANE" => "2", 
			"PCIRCLE" => "2", 
			"PCIRCLERADIUS" => "2", 
			"PCOMP0" => "2", 
			"PCOMP135" => "2", 
			"PCOMP180" => "2", 
			"PCOMP225" => "2", 
			"PCOMP270" => "2", 
			"PCOMP315" => "2", 
			"PCOMP45" => "2", 
			"PCOMP90" => "2", 
			"PCOMPCODE" => "2", 
			"PCOMPMODE" => "2", 
			"PCOMPOFF" => "2", 
			"PECK" => "2", 
			"PECK1" => "2", 
			"PECK2" => "2", 
			"PECKCYCLECODE" => "2", 
			"PECKINCREMENT" => "2", 
			"PERCENTSIGN" => "2", 
			"PGRIDX" => "2", 
			"PGRIDY" => "2", 
			"PIERCECONTINUOUS" => "2", 
			"PIERCEDUTY" => "2", 
			"PIERCEFREQUENCY" => "2", 
			"PIERCEGASCODE" => "2", 
			"PIERCEGASHIGH" => "2", 
			"PIERCEGASLOW" => "2", 
			"PIERCEGASMED" => "2", 
			"PIERCEGASOFF" => "2", 
			"PIERCEGATED" => "2", 
			"PIERCEHYPER" => "2", 
			"PIERCEMODE" => "2", 
			"PIERCEMODE57" => "2", 
			"PIERCEMODE58" => "2", 
			"PIERCEMODE59" => "2", 
			"PIERCEPOWER" => "2", 
			"PIERCEPULSE" => "2", 
			"PIERCESUPER" => "2", 
			"PIVOTDISTANCE" => "2", 
			"PIVOTTYPE" => "2", 
			"PLASMA" => "2", 
			"PLINE" => "2", 
			"PLINEDISTANCE" => "2", 
			"PLUNGE" => "2", 
			"POCKETANGLE" => "2", 
			"POCKETDEPTH" => "2", 
			"POCKETHEIGHT" => "2", 
			"POCKETRAD" => "2", 
			"POCKETRADIUS" => "2", 
			"POCKETWIDTH" => "2", 
			"POLARANGLE" => "2", 
			"POLARANGLEINCR" => "2", 
			"POLARDISTANCE" => "2", 
			"POLARLENGTH" => "2", 
			"POLARTHETA" => "2", 
			"POSTIONINGCODE" => "2", 
			"POSTNAME" => "2", 
			"POWER" => "2", 
			"POWERCODE" => "2", 
			"POWEROFF" => "2", 
			"POWERON" => "2", 
			"PRESENTDIAMETERCOMP" => "2", 
			"PRESENTLENGTHCOMP" => "2", 
			"PRESENTTOOL" => "2", 
			"PRESSEQNUM" => "2", 
			"PREVCYCLECODE" => "2", 
			"PREVCYCLETYPE" => "2", 
			"PREVIOUSTOOL" => "2", 
			"PREVIOUSXTC" => "2", 
			"PREVIOUSYTC" => "2", 
			"PREVIOUSZTC" => "2", 
			"PREVTOOLGROUP1" => "2", 
			"PRIMARYRADIUS" => "2", 
			"PROGNUMBER" => "2", 
			"PROGRAMMODE" => "2", 
			"PROGRAMNAME" => "2", 
			"PROGRAMNUMBER" => "2", 
			"PROGRAMNUMBERDEFAULT" => "2", 
			"PROGRAMRADIUS" => "2", 
			"PROGRAMSTOP" => "2", 
			"PROGRAMZERO" => "2", 
			"PUNCH" => "2", 
			"PUNCH_DIAMETER" => "2", 
			"PUNCH_LENGTH" => "2", 
			"PUNCH_WIDTH" => "2", 
			"PUNCHARC" => "2", 
			"PUNCHCYCLECODE" => "2", 
			"PUNCHLINE" => "2", 
			"PUNCHOFF" => "2", 
			"PUNCHON" => "2", 
			"RADIAL" => "2", 
			"RADIALDIFFERENCE" => "2", 
			"RADIALVALUEMODE" => "2", 
			"RAMP" => "2", 
			"RAPIDMODE" => "2", 
			"READNEXTCYCLE" => "2", 
			"RECTANGLE" => "2", 
			"RECTANGLECCW" => "2", 
			"RECTANGLECW" => "2", 
			"RECTANGLEDIRECTION" => "2", 
			"REFERENCEPLANER" => "2", 
			"REFERENCEPLANEW" => "2", 
			"REMOVESPACES" => "2", 
			"REPONORMAL" => "2", 
			"REPORESET" => "2", 
			"REPOSANGLE" => "2", 
			"REPOSDISTANCE" => "2", 
			"REPOSITION" => "2", 
			"REPOSITIONANGLE" => "2", 
			"REPOSITIONCOMMENT" => "2", 
			"REPOSITIONDISTANCE" => "2", 
			"REPOSITIONMODE" => "2", 
			"RESTRICTIONEDM4" => "2", 
			"RETRACTAMOUNT" => "2", 
			"RETURNPLANE" => "2", 
			"RETURNPLANECODE" => "2", 
			"RETURNPLANEMODE" => "2", 
			"REVISIONLEVEL" => "2", 
			"REVOLUTIONPERMINUTE" => "2", 
			"REWINDSTOP" => "2", 
			"RIGHTINFEED" => "2", 
			"ROTARYAXIS" => "2", 
			"ROTARYMODE" => "2", 
			"ROTARYMODECODE" => "2", 
			"ROTARYSTARTMODE" => "2", 
			"ROTARYTABLEANGLE" => "2", 
			"ROUGHEXCLUDEEP" => "2", 
			"ROUGHEXCLUDESP" => "2", 
			"RPLANE" => "2", 
			"RPLANEMODE" => "2", 
			"RPLANEMODECODE" => "2", 
			"RPLANERAPID" => "2", 
			"RPMATCURRENTDIAMETER" => "2", 
			"RPMATNEXTDIAMETER" => "2", 
			"RRETURN" => "2", 
			"RUNTIMECOMMENTS" => "2", 
			"SEARCHTURRET" => "2", 
			"SECONDARYRADIUS" => "2", 
			"SECONDTOOL" => "2", 
			"SEGARCMODE" => "2", 
			"SEGSEGMODE" => "2", 
			"SEQUENCENUMBER" => "2", 
			"SEQUENCENUMBER2" => "2", 
			"SERVOFEED" => "2", 
			"SETORIGIN" => "2", 
			"SETORIGINCOMMENT" => "2", 
			"SFPMSPINDLESPEED" => "2", 
			"SHARPCORNERMODE" => "2", 
			"SIDEINTERPOLATECODE" => "2", 
			"SIDEINTERPOLATEMODE" => "2", 
			"SIDEINTERPOLATEOFF" => "2", 
			"SIDEINTERPOLATEON" => "2", 
			"SIDETAPER" => "2", 
			"SIGNEDABSOLUTE360" => "2", 
			"SIGNEDABSOLUTEREV" => "2", 
			"SIGNEDDIAMETRAL" => "2", 
			"SIGNEDRADIAL" => "2", 
			"SKIMSPACING" => "2", 
			"SLOWDOWN0" => "2", 
			"SLOWDOWN1" => "2", 
			"SLOWDOWN2" => "2", 
			"SLOWDOWN3" => "2", 
			"SLOWDOWNCODE" => "2", 
			"SMALLARCHMODE" => "2", 
			"SMALLESTROUNDING" => "2", 
			"SNC" => "2", 
			"SODICKRESTRICTION1" => "2", 
			"SPECIALPOST" => "2", 
			"SPECIFICATIONEDM4" => "2", 
			"SPINDLEAUX" => "2", 
			"SPINDLECCW" => "2", 
			"SPINDLECODE" => "2", 
			"SPINDLECW" => "2", 
			"SPINDLEDIRECTION" => "2", 
			"SPINDLEMAIN" => "2", 
			"SPINDLEOFF" => "2", 
			"SPINDLEPRIORITY" => "2", 
			"SPINDLERANGE" => "2", 
			"SPINDLESPEED" => "2", 
			"SPINDLEUNIT" => "2", 
			"SPIRAL" => "2", 
			"SPIRALCCW" => "2", 
			"SPIRALCW" => "2", 
			"SPIRALDIRECTION" => "2", 
			"SPRANGE4" => "2", 
			"SSETOFF" => "2", 
			"SSETON" => "2", 
			"SSETOUTPUT" => "2", 
			"STANDARDCONIC" => "2", 
			"STARTEXP" => "2", 
			"STARTINGANGLE" => "2", 
			"STARTPOINTMODE" => "2", 
			"STARTPROGRAM" => "2", 
			"STARTSEQUENCENUMBER" => "2", 
			"STARTSUBPROGRAMNUM" => "2", 
			"STEP" => "2", 
			"STEPTOLERANCE" => "2", 
			"STOCKALLOW" => "2", 
			"STOCKALLOWANCE" => "2", 
			"STOCKREMOVALCODE" => "2", 
			"STOCKREMOVALFACING" => "2", 
			"STOCKREMOVALTURNING" => "2", 
			"STRINGCHARACTER" => "2", 
			"SUBPROGRAMNUM" => "2", 
			"SUBPROGRAMON" => "2", 
			"SUPPRESSSPACE" => "2", 
			"SUPSPACESYMBOLCODE0" => "2", 
			"SUPSPACESYMBOLCODE1" => "2", 
			"SUPSPACESYMBOLCODE2" => "2", 
			"SUPSPACESYMBOLCODE3" => "2", 
			"SUPSPACESYMBOLCODE4" => "2", 
			"SYNCCODE" => "2", 
			"SYNCCODETC" => "2", 
			"SYNCOFF" => "2", 
			"SYNCORIEN" => "2", 
			"SYNCSPEEDDIR" => "2", 
			"SYNCSPINDLECODE" => "2", 
			"T2RADIALVALUEMODE" => "2", 
			"TAILSTOCK" => "2", 
			"TAILSTOCKIN" => "2", 
			"TAILSTOCKOUT" => "2", 
			"TANGENTFLAG" => "2", 
			"TANKCONTROLCODE" => "2", 
			"TANKCONTROLDRAIN" => "2", 
			"TANKCONTROLFILL" => "2", 
			"TANKCONTROLNOCHANGE" => "2", 
			"TAP1" => "2", 
			"TAP2" => "2", 
			"TAPCYCLECODE" => "2", 
			"TAPER" => "2", 
			"TAPERLEFT" => "2", 
			"TAPERMODE" => "2", 
			"TAPEROFF" => "2", 
			"TAPERREGISTER" => "2", 
			"TAPERRIGHT" => "2", 
			"TAPERSIDE" => "2", 
			"TCANDROTARYSTART" => "2", 
			"THICKNESS" => "2", 
			"THREADCUTCODE" => "2", 
			"THREADEXCLUDEEP" => "2", 
			"THREADEXCLUDESP" => "2", 
			"THREADEXCLUDESRAPID" => "2", 
			"THREADPATTERN1" => "2", 
			"THREADPATTERN2" => "2", 
			"THREADPATTERN3" => "2", 
			"THREADPATTERNCODE" => "2", 
			"TOOLANGLE" => "2", 
			"TOOLCHANGE" => "2", 
			"TOOLCHANGE1COMMENT" => "2", 
			"TOOLCHANGE2COMMENT" => "2", 
			"TOOLCHANGE3COMMENT" => "2", 
			"TOOLCHANGE4COMMENT" => "2", 
			"TOOLCHANGECOMMENT" => "2", 
			"TOOLCHANGEONLY" => "2", 
			"TOOLDIAMETER" => "2", 
			"TOOLLENGTH" => "2", 
			"TOOLNUMBER" => "2", 
			"TOOLTIP" => "2", 
			"TORCHOFF" => "2", 
			"TORCHON" => "2", 
			"TOTALREPODISTX" => "2", 
			"TOUCHSENSORCODE" => "2", 
			"TOUCHSENSOROFF" => "2", 
			"TOUCHSENSORON" => "2", 
			"TURNCYCLE" => "2", 
			"TURRET1" => "2", 
			"TURRET2" => "2", 
			"TURRETCODE" => "2", 
			"TURRETNUMBER" => "2", 
			"TWISTHEIGHT" => "2", 
			"TWISTROTATE" => "2", 
			"TWISTSCALE" => "2", 
			"TWISTX" => "2", 
			"TWISTY" => "2", 
			"TWOPOINTS" => "2", 
			"UABSOLUTE" => "2", 
			"UCENTERABSOLUTE" => "2", 
			"UCENTERINCREMENTAL" => "2", 
			"UINCREMENTAL" => "2", 
			"UNIDIRECTIONAL" => "2", 
			"USERPLANE" => "2", 
			"USTROKE" => "2", 
			"UVABSOLUTE" => "2", 
			"UVCENTERMODE" => "2", 
			"UVINCREMENTFROMUV" => "2", 
			"UVINCREMENTFROMXY" => "2", 
			"UVMODE" => "2", 
			"UVPLANE" => "2", 
			"VABSOLUTE" => "2", 
			"VARIABLETHREAD" => "2", 
			"VCENTERABSOLUTE" => "2", 
			"VCENTERINCREMENTAL" => "2", 
			"VINCREMENTAL" => "2", 
			"WABSOLUTE" => "2", 
			"WCENTERABSOLUTE" => "2", 
			"WCENTERINCREMENTAL" => "2", 
			"WHENTOCHANGE" => "2", 
			"WINCREMENTAL" => "2", 
			"WIRECONTROLCODE" => "2", 
			"WIRECONTROLCUT" => "2", 
			"WIRECONTROLNOCHANGE" => "2", 
			"WIRECONTROLTHREAD" => "2", 
			"WIRECUT" => "2", 
			"WIREFEEDCODE" => "2", 
			"WIREFEEDOFF" => "2", 
			"WIREFEEDON" => "2", 
			"WIREGUIDES" => "2", 
			"WIREOFF" => "2", 
			"WIREON" => "2", 
			"WIREPROGMODE" => "2", 
			"WIRETHREAD" => "2", 
			"WORKINGDIAMETER" => "2", 
			"WORKPLANECODE" => "2", 
			"WORKPLANEMODE" => "2", 
			"WORKSYSTEM" => "2", 
			"WORKSYSTEM1" => "2", 
			"WORKSYSTEM2" => "2", 
			"WORKSYSTEM3" => "2", 
			"WORKSYSTEM4" => "2", 
			"WORKSYSTEM5" => "2", 
			"WORKSYSTEM6" => "2", 
			"WORKSYSTEMCODE" => "2", 
			"XABSOLUTE" => "2", 
			"XCENTERABSOLUTE" => "2", 
			"XCENTERINCREMENTAL" => "2", 
			"XCLAMP1" => "2", 
			"XCLAMP2" => "2", 
			"XCLAMP3" => "2", 
			"XCLAMP4" => "2", 
			"XCOMPENSATIONVECTOR" => "2", 
			"XEXCLUDEGAGELENGTH" => "2", 
			"XGROOVE" => "2", 
			"XHOME" => "2", 
			"XHOMEFORTURRET" => "2", 
			"XHOMESECONDARY" => "2", 
			"XINCREMENTAL" => "2", 
			"XLAST" => "2", 
			"XNEXT" => "2", 
			"XPARK" => "2", 
			"XPIVOTABSOLUTE" => "2", 
			"XPLANE" => "2", 
			"XPLANEP0" => "2", 
			"XPRESENT" => "2", 
			"XRAPID" => "2", 
			"XSAME" => "2", 
			"XSDIM" => "2", 
			"XSTART" => "2", 
			"XSTOCK" => "2", 
			"XSTOCKPARAMETER" => "2", 
			"XTC" => "2", 
			"XTRAVEL" => "2", 
			"XYCHIPFEEDRATE" => "2", 
			"XYFEEDRATE" => "2", 
			"XYPLANE" => "2", 
			"XYRAPIDRATE" => "2", 
			"YABSOLUTE" => "2", 
			"YCENTERABSOLUTE" => "2", 
			"YCENTERINCREMENTAL" => "2", 
			"YCOMPENSATIONVECTOR" => "2", 
			"YHOME" => "2", 
			"YHOMESECONDARY" => "2", 
			"YINCREMENTAL" => "2", 
			"YLAST" => "2", 
			"YNEXT" => "2", 
			"YPARK" => "2", 
			"YPIVOTABSOLUTE" => "2", 
			"YPLANEP0" => "2", 
			"YPRESENT" => "2", 
			"YRAPID" => "2", 
			"YSAME" => "2", 
			"YSDIM" => "2", 
			"YSTART" => "2", 
			"YSTOCK" => "2", 
			"YSTOCKPARAMETER" => "2", 
			"YTC" => "2", 
			"YTRAVEL" => "2", 
			"YZPLANE" => "2", 
			"ZABSOLUTE" => "2", 
			"ZCENTERABSOLUTE" => "2", 
			"ZCENTERINCREMENTAL" => "2", 
			"ZCHIPFEEDRATE" => "2", 
			"ZERORETURN" => "2", 
			"ZEXCLUDEGAGELENGTH" => "2", 
			"ZFEEDRATE" => "2", 
			"ZGROOVE" => "2", 
			"ZHOME" => "2", 
			"ZHOMEFORTURRET" => "2", 
			"ZHOMESECONDARY" => "2", 
			"ZIGZAGINFEED" => "2", 
			"ZINCREMENTAL" => "2", 
			"ZLAST" => "2", 
			"ZLOWERCONTOUR" => "2", 
			"ZLOWERGUIDE" => "2", 
			"ZNEXT" => "2", 
			"ZPARK" => "2", 
			"ZPIVOTABSOLUTE" => "2", 
			"ZPLANE" => "2", 
			"ZPLANEP0" => "2", 
			"ZPLANERAPID" => "2", 
			"ZPRESENT" => "2", 
			"ZPROGRAMMODE" => "2", 
			"ZRAPID" => "2", 
			"ZRAPIDRATE" => "2", 
			"ZSAME" => "2", 
			"ZSDIM" => "2", 
			"ZSTART" => "2", 
			"ZSTOCKPARAMETER" => "2", 
			"ZSURFACE" => "2", 
			"ZTC" => "2", 
			"ZTRAVEL" => "2", 
			"ZUPPERCONTOUR" => "2", 
			"ZUPPERGUIDE" => "2", 
			"ZXPLANE" => "2", 
			"ABS" => "3", 
			"ASN" => "3", 
			"ATN" => "3", 
			"COS" => "3", 
			"DEFINE" => "3", 
			"ELSE" => "3", 
			"END" => "3", 
			"ENDDEFINE" => "3", 
			"ENDIF" => "3", 
			"EXITEXAMPLE" => "3", 
			"EXP" => "3", 
			"LN" => "3", 
			"IF" => "3", 
			"INT" => "3", 
			"NCOUTPUTOFF" => "3", 
			"NCOUTPUTON" => "3", 
			"SETBLOCKDELETE" => "3", 
			"SETNMEMO" => "3", 
			"SQR" => "3", 
			"SQRT" => "3", 
			"SIN" => "3", 
			"TAN" => "3", 
			"VARIABLE" => "3", 
			"||" => "3", 
			"&&" => "3", 
			"DREGDIFF" => "4", 
			"MREGDIFF" => "4", 
			"MDIFF" => "4", 
			"NEXTDIM" => "4", 
			"NEXTMISC" => "4", 
			"NEXTCLFILE" => "4", 
			"PRESDIM" => "4", 
			"PRESMISC" => "4", 
			"PREVCLFILE" => "4");

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
