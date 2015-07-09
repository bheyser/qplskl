/*
Copyright (c) 2010, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.com/yui/license.html
version: 2.8.1
*/
/*
 * SWFObject v1.5: Flash Player detection and embed - http://blog.deconcept.com/swfobject/
 *
 * SWFObject is (c) 2007 Geoff Stearns and is released under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 * @namespace YAHOO
 */
YAHOO.namespace("deconcept");YAHOO.deconcept=YAHOO.deconcept||{};if(typeof YAHOO.deconcept.util=="undefined"||!YAHOO.deconcept.util){YAHOO.deconcept.util={};}if(typeof YAHOO.deconcept.SWFObjectUtil=="undefined"||!YAHOO.deconcept.SWFObjectUtil){YAHOO.deconcept.SWFObjectUtil={};}YAHOO.deconcept.SWFObject=function(E,C,K,F,H,J,L,G,A,D){if(!document.getElementById){return;}this.DETECT_KEY=D?D:"detectflash";this.skipDetect=YAHOO.deconcept.util.getRequestParameter(this.DETECT_KEY);this.params={};this.variables={};this.attributes=[];if(E){this.setAttribute("swf",E);}if(C){this.setAttribute("id",C);}if(K){this.setAttribute("width",K);}if(F){this.setAttribute("height",F);}if(H){this.setAttribute("version",new YAHOO.deconcept.PlayerVersion(H.toString().split(".")));}this.installedVer=YAHOO.deconcept.SWFObjectUtil.getPlayerVersion();if(!window.opera&&document.all&&this.installedVer.major>7){YAHOO.deconcept.SWFObject.doPrepUnload=true;}if(J){this.addParam("bgcolor",J);}var B=L?L:"high";this.addParam("quality",B);this.setAttribute("useExpressInstall",false);this.setAttribute("doExpressInstall",false);var I=(G)?G:window.location;this.setAttribute("xiRedirectUrl",I);this.setAttribute("redirectUrl","");if(A){this.setAttribute("redirectUrl",A);}};YAHOO.deconcept.SWFObject.prototype={useExpressInstall:function(A){this.xiSWFPath=!A?"expressinstall.swf":A;this.setAttribute("useExpressInstall",true);},setAttribute:function(A,B){this.attributes[A]=B;},getAttribute:function(A){return this.attributes[A];},addParam:function(A,B){this.params[A]=B;},getParams:function(){return this.params;},addVariable:function(A,B){this.variables[A]=B;},getVariable:function(A){return this.variables[A];},getVariables:function(){return this.variables;},getVariablePairs:function(){var A=[];var B;var C=this.getVariables();for(B in C){if(C.hasOwnProperty(B)){A[A.length]=B+"="+C[B];}}return A;},getSWFHTML:function(){var D="";var C={};var A="";var B="";if(navigator.plugins&&navigator.mimeTypes&&navigator.mimeTypes.length){if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","PlugIn");this.setAttribute("swf",this.xiSWFPath);}D='<embed type="application/x-shockwave-flash" src="'+this.getAttribute("swf")+'" width="'+this.getAttribute("width")+'" height="'+this.getAttribute("height")+'" style="'+this.getAttribute("style")+'"';D+=' id="'+this.getAttribute("id")+'" name="'+this.getAttribute("id")+'" ';C=this.getParams();for(A in C){if(C.hasOwnProperty(A)){D+=[A]+'="'+C[A]+'" ';}}B=this.getVariablePairs().join("&");if(B.length>0){D+='flashvars="'+B+'"';}D+="/>";}else{if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","ActiveX");this.setAttribute("swf",this.xiSWFPath);}D='<object id="'+this.getAttribute("id")+'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'+this.getAttribute("width")+'" height="'+this.getAttribute("height")+'" style="'+this.getAttribute("style")+'">';D+='<param name="movie" value="'+this.getAttribute("swf")+'" />';C=this.getParams();for(A in C){if(C.hasOwnProperty(A)){D+='<param name="'+A+'" value="'+C[A]+'" />';}}B=this.getVariablePairs().join("&");if(B.length>0){D+='<param name="flashvars" value="'+B+'" />';}D+="</object>";}return D;},write:function(A){if(this.getAttribute("useExpressInstall")){var B=new YAHOO.deconcept.PlayerVersion([6,0,65]);if(this.installedVer.versionIsValid(B)&&!this.installedVer.versionIsValid(this.getAttribute("version"))){this.setAttribute("doExpressInstall",true);this.addVariable("MMredirectURL",escape(this.getAttribute("xiRedirectUrl")));document.title=document.title.slice(0,47)+" - Flash Player Installation";this.addVariable("MMdoctitle",document.title);}}if(this.skipDetect||this.getAttribute("doExpressInstall")||this.installedVer.versionIsValid(this.getAttribute("version"))){var C=(typeof A=="string")?document.getElementById(A):A;C.innerHTML=this.getSWFHTML();return true;}else{if(this.getAttribute("redirectUrl")!==""){document.location.replace(this.getAttribute("redirectUrl"));}}return false;}};YAHOO.deconcept.SWFObjectUtil.getPlayerVersion=function(){var D=null;var C=new YAHOO.deconcept.PlayerVersion([0,0,0]);if(navigator.plugins&&navigator.mimeTypes.length){var A=navigator.plugins["Shockwave Flash"];if(A&&A.description){C=new YAHOO.deconcept.PlayerVersion(A.description.replace(/([a-zA-Z]|\s)+/,"").replace(/(\s+r|\s+b[0-9]+)/,".").split("."));}}else{if(navigator.userAgent&&navigator.userAgent.indexOf("Windows CE")>=0){var B=3;while(D){try{B++;D=new ActiveXObject("ShockwaveFlash.ShockwaveFlash."+B);C=new YAHOO.deconcept.PlayerVersion([B,0,0]);}catch(E){D=null;}}}else{try{D=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");}catch(E){try{D=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");C=new YAHOO.deconcept.PlayerVersion([6,0,21]);D.AllowScriptAccess="always";}catch(E){if(C.major==6){return C;}}try{D=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");}catch(E){}}if(D!==null){C=new YAHOO.deconcept.PlayerVersion(D.GetVariable("$version").split(" ")[1].split(","));}}}return C;};YAHOO.deconcept.PlayerVersion=function(A){this.major=A[0]!==null?parseInt(A[0],0):0;this.minor=A[1]!==null?parseInt(A[1],0):0;this.rev=A[2]!==null?parseInt(A[2],0):0;};YAHOO.deconcept.PlayerVersion.prototype.versionIsValid=function(A){if(this.major<A.major){return false;}if(this.major>A.major){return true;}if(this.minor<A.minor){return false;}if(this.minor>A.minor){return true;}if(this.rev<A.rev){return false;}return true;};YAHOO.deconcept.util={getRequestParameter:function(D){var C=document.location.search||document.location.hash;if(D===null){return C;}if(C){var B=C.substring(1).split("&");for(var A=0;A<B.length;A++){if(B[A].substring(0,B[A].indexOf("="))==D){return B[A].substring((B[A].indexOf("=")+1));}}}return"";
}};YAHOO.deconcept.SWFObjectUtil.cleanupSWFs=function(){var C=document.getElementsByTagName("OBJECT");for(var B=C.length-1;B>=0;B--){C[B].style.display="none";for(var A in C[B]){if(typeof C[B][A]=="function"){C[B][A]=function(){};}}}};if(YAHOO.deconcept.SWFObject.doPrepUnload){if(!YAHOO.deconcept.unloadSet){YAHOO.deconcept.SWFObjectUtil.prepUnload=function(){__flash_unloadHandler=function(){};__flash_savedUnloadHandler=function(){};window.attachEvent("onunload",YAHOO.deconcept.SWFObjectUtil.cleanupSWFs);};window.attachEvent("onbeforeunload",YAHOO.deconcept.SWFObjectUtil.prepUnload);YAHOO.deconcept.unloadSet=true;}}if(!document.getElementById&&document.all){document.getElementById=function(A){return document.all[A];};}YAHOO.widget.FlashAdapter=function(E,A,B,C){this._queue=this._queue||[];this._events=this._events||{};this._configs=this._configs||{};B=B||{};this._id=B.id=B.id||YAHOO.util.Dom.generateId(null,"yuigen");B.version=B.version||"9.0.45";B.backgroundColor=B.backgroundColor||"#ffffff";this._attributes=B;this._swfURL=E;this._containerID=A;this._embedSWF(this._swfURL,this._containerID,B.id,B.version,B.backgroundColor,B.expressInstall,B.wmode,C);try{this.createEvent("contentReady");}catch(D){}};YAHOO.widget.FlashAdapter.owners=YAHOO.widget.FlashAdapter.owners||{};YAHOO.extend(YAHOO.widget.FlashAdapter,YAHOO.util.AttributeProvider,{_swfURL:null,_containerID:null,_swf:null,_id:null,_initialized:false,_attributes:null,toString:function(){return"FlashAdapter "+this._id;},destroy:function(){if(this._swf){var B=YAHOO.util.Dom.get(this._containerID);B.removeChild(this._swf);}var A=this._id;for(var C in this){if(YAHOO.lang.hasOwnProperty(this,C)){this[C]=null;}}},_embedSWF:function(J,I,E,C,F,G,B,H){var D=new YAHOO.deconcept.SWFObject(J,E,"100%","100%",C,F);if(G){D.useExpressInstall(G);}D.addParam("allowScriptAccess","always");if(B){D.addParam("wmode",B);}D.addParam("menu","false");D.addVariable("allowedDomain",document.location.hostname);D.addVariable("YUISwfId",E);D.addVariable("YUIBridgeCallback","YAHOO.widget.FlashAdapter.eventHandler");if(H){D.addVariable("buttonSkin",H);}var A=YAHOO.util.Dom.get(I);var K=D.write(A);if(K){this._swf=YAHOO.util.Dom.get(E);YAHOO.widget.FlashAdapter.owners[E]=this;}else{}},_eventHandler:function(B){var A=B.type;switch(A){case"swfReady":this._loadHandler();return;case"log":return;}this.fireEvent(A,B);},_loadHandler:function(){this._initialized=false;this._initAttributes(this._attributes);this.setAttributes(this._attributes,true);this._initialized=true;this.fireEvent("contentReady");},set:function(A,B){this._attributes[A]=B;YAHOO.widget.FlashAdapter.superclass.set.call(this,A,B);},_initAttributes:function(A){this.getAttributeConfig("altText",{method:this._getAltText});this.setAttributeConfig("altText",{method:this._setAltText});this.getAttributeConfig("swfURL",{method:this._getSWFURL});},_getSWFURL:function(){return this._swfURL;},_getAltText:function(){return this._swf.getAltText();},_setAltText:function(A){return this._swf.setAltText(A);}});YAHOO.widget.FlashAdapter.eventHandler=function(A,B){if(!YAHOO.widget.FlashAdapter.owners[A]){setTimeout(function(){YAHOO.widget.FlashAdapter.eventHandler(A,B);},0);}else{YAHOO.widget.FlashAdapter.owners[A]._eventHandler(B);}};YAHOO.widget.FlashAdapter.proxyFunctionCount=0;YAHOO.widget.FlashAdapter.createProxyFunction=function(B){var A=YAHOO.widget.FlashAdapter.proxyFunctionCount;YAHOO.widget.FlashAdapter["proxyFunction"+A]=function(){return B.apply(null,arguments);};YAHOO.widget.FlashAdapter.proxyFunctionCount++;return"YAHOO.widget.FlashAdapter.proxyFunction"+A.toString();};YAHOO.widget.FlashAdapter.removeProxyFunction=function(A){if(!A||A.indexOf("YAHOO.widget.FlashAdapter.proxyFunction")<0){return;}A=A.substr(26);YAHOO.widget.FlashAdapter[A]=null;};YAHOO.widget.Uploader=function(A,B,D){var C="window";if(!(B)||(B&&D)){C="transparent";}YAHOO.widget.Uploader.superclass.constructor.call(this,YAHOO.widget.Uploader.SWFURL,A,{wmode:C},B);this.createEvent("mouseDown");this.createEvent("mouseUp");this.createEvent("rollOver");this.createEvent("rollOut");this.createEvent("click");this.createEvent("fileSelect");this.createEvent("uploadStart");this.createEvent("uploadProgress");this.createEvent("uploadCancel");this.createEvent("uploadComplete");this.createEvent("uploadCompleteData");this.createEvent("uploadError");};YAHOO.widget.Uploader.SWFURL="assets/uploader.swf";YAHOO.extend(YAHOO.widget.Uploader,YAHOO.widget.FlashAdapter,{upload:function(A,B,E,C,D){this._swf.upload(A,B,E,C,D);},uploadThese:function(B,A,E,C,D){this._swf.uploadThese(B,A,E,C,D);},uploadAll:function(A,D,B,C){this._swf.uploadAll(A,D,B,C);},cancel:function(A){this._swf.cancel(A);},clearFileList:function(){this._swf.clearFileList();},removeFile:function(A){this._swf.removeFile(A);},setAllowLogging:function(A){this._swf.setAllowLogging(A);},setSimUploadLimit:function(A){this._swf.setSimUploadLimit(A);},setAllowMultipleFiles:function(A){this._swf.setAllowMultipleFiles(A);},setFileFilters:function(A){this._swf.setFileFilters(A);},enable:function(){this._swf.enable();},disable:function(){this._swf.disable();}});YAHOO.register("uploader",YAHOO.widget.Uploader,{version:"2.8.1",build:"19"});