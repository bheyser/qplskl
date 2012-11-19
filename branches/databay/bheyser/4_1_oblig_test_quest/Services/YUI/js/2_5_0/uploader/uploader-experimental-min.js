/*
Copyright (c) 2008, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
version: 2.5.0
*/
/*
 * SWFObject v1.5: Flash Player detection and embed - http://blog.deconcept.com/swfobject/
 *
 * SWFObject is (c) 2007 Geoff Stearns and is released under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 *
 */
if(typeof deconcept=="undefined"){var deconcept=new Object();}if(typeof deconcept.util=="undefined"){deconcept.util=new Object();}if(typeof deconcept.SWFObjectUtil=="undefined"){deconcept.SWFObjectUtil=new Object();}deconcept.SWFObject=function(E,C,K,F,H,J,L,G,A,D){if(!document.getElementById){return ;}this.DETECT_KEY=D?D:"detectflash";this.skipDetect=deconcept.util.getRequestParameter(this.DETECT_KEY);this.params=new Object();this.variables=new Object();this.attributes=new Array();if(E){this.setAttribute("swf",E);}if(C){this.setAttribute("id",C);}if(K){this.setAttribute("width",K);}if(F){this.setAttribute("height",F);}if(H){this.setAttribute("version",new deconcept.PlayerVersion(H.toString().split(".")));}this.installedVer=deconcept.SWFObjectUtil.getPlayerVersion();if(!window.opera&&document.all&&this.installedVer.major>7){deconcept.SWFObject.doPrepUnload=true;}if(J){this.addParam("bgcolor",J);}var B=L?L:"high";this.addParam("quality",B);this.setAttribute("useExpressInstall",false);this.setAttribute("doExpressInstall",false);var I=(G)?G:window.location;this.setAttribute("xiRedirectUrl",I);this.setAttribute("redirectUrl","");if(A){this.setAttribute("redirectUrl",A);}};deconcept.SWFObject.prototype={useExpressInstall:function(A){this.xiSWFPath=!A?"expressinstall.swf":A;this.setAttribute("useExpressInstall",true);},setAttribute:function(A,B){this.attributes[A]=B;},getAttribute:function(A){return this.attributes[A];},addParam:function(A,B){this.params[A]=B;},getParams:function(){return this.params;},addVariable:function(A,B){this.variables[A]=B;},getVariable:function(A){return this.variables[A];},getVariables:function(){return this.variables;},getVariablePairs:function(){var A=new Array();var B;var C=this.getVariables();for(B in C){A[A.length]=B+"="+C[B];}return A;},getSWFHTML:function(){var D="";if(navigator.plugins&&navigator.mimeTypes&&navigator.mimeTypes.length){if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","PlugIn");this.setAttribute("swf",this.xiSWFPath);}D='<embed type="application/x-shockwave-flash" src="'+this.getAttribute("swf")+'" width="'+this.getAttribute("width")+'" height="'+this.getAttribute("height")+'" style="'+this.getAttribute("style")+'"';D+=' id="'+this.getAttribute("id")+'" name="'+this.getAttribute("id")+'" ';var C=this.getParams();for(var A in C){D+=[A]+'="'+C[A]+'" ';}var B=this.getVariablePairs().join("&");if(B.length>0){D+='flashvars="'+B+'"';}D+="/>";}else{if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","ActiveX");this.setAttribute("swf",this.xiSWFPath);}D='<object id="'+this.getAttribute("id")+'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'+this.getAttribute("width")+'" height="'+this.getAttribute("height")+'" style="'+this.getAttribute("style")+'">';D+='<param name="movie" value="'+this.getAttribute("swf")+'" />';var C=this.getParams();for(var A in C){D+='<param name="'+A+'" value="'+C[A]+'" />';}var B=this.getVariablePairs().join("&");if(B.length>0){D+='<param name="flashvars" value="'+B+'" />';}D+="</object>";}return D;},write:function(A){if(this.getAttribute("useExpressInstall")){var B=new deconcept.PlayerVersion([6,0,65]);if(this.installedVer.versionIsValid(B)&&!this.installedVer.versionIsValid(this.getAttribute("version"))){this.setAttribute("doExpressInstall",true);this.addVariable("MMredirectURL",escape(this.getAttribute("xiRedirectUrl")));document.title=document.title.slice(0,47)+" - Flash Player Installation";this.addVariable("MMdoctitle",document.title);}}if(this.skipDetect||this.getAttribute("doExpressInstall")||this.installedVer.versionIsValid(this.getAttribute("version"))){var C=(typeof A=="string")?document.getElementById(A):A;C.innerHTML=this.getSWFHTML();return true;}else{if(this.getAttribute("redirectUrl")!=""){document.location.replace(this.getAttribute("redirectUrl"));}}return false;}};deconcept.SWFObjectUtil.getPlayerVersion=function(){var C=new deconcept.PlayerVersion([0,0,0]);if(navigator.plugins&&navigator.mimeTypes.length){var A=navigator.plugins["Shockwave Flash"];if(A&&A.description){C=new deconcept.PlayerVersion(A.description.replace(/([a-zA-Z]|\s)+/,"").replace(/(\s+r|\s+b[0-9]+)/,".").split("."));}}else{if(navigator.userAgent&&navigator.userAgent.indexOf("Windows CE")>=0){var D=1;var B=3;while(D){try{B++;D=new ActiveXObject("ShockwaveFlash.ShockwaveFlash."+B);C=new deconcept.PlayerVersion([B,0,0]);}catch(E){D=null;}}}else{try{var D=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");}catch(E){try{var D=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");C=new deconcept.PlayerVersion([6,0,21]);D.AllowScriptAccess="always";}catch(E){if(C.major==6){return C;}}try{D=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");}catch(E){}}if(D!=null){C=new deconcept.PlayerVersion(D.GetVariable("$version").split(" ")[1].split(","));}}}return C;};deconcept.PlayerVersion=function(A){this.major=A[0]!=null?parseInt(A[0]):0;this.minor=A[1]!=null?parseInt(A[1]):0;this.rev=A[2]!=null?parseInt(A[2]):0;};deconcept.PlayerVersion.prototype.versionIsValid=function(A){if(this.major<A.major){return false;}if(this.major>A.major){return true;}if(this.minor<A.minor){return false;}if(this.minor>A.minor){return true;}if(this.rev<A.rev){return false;}return true;};deconcept.util={getRequestParameter:function(D){var C=document.location.search||document.location.hash;if(D==null){return C;}if(C){var B=C.substring(1).split("&");for(var A=0;A<B.length;A++){if(B[A].substring(0,B[A].indexOf("="))==D){return B[A].substring((B[A].indexOf("=")+1));}}}return"";}};deconcept.SWFObjectUtil.cleanupSWFs=function(){var C=document.getElementsByTagName("OBJECT");for(var B=C.length-1;B>=0;B--){C[B].style.display="none";for(var A in C[B]){if(typeof C[B][A]=="function"){C[B][A]=function(){};
}}}};if(deconcept.SWFObject.doPrepUnload){if(!deconcept.unloadSet){deconcept.SWFObjectUtil.prepUnload=function(){__flash_unloadHandler=function(){};__flash_savedUnloadHandler=function(){};window.attachEvent("onunload",deconcept.SWFObjectUtil.cleanupSWFs);};window.attachEvent("onbeforeunload",deconcept.SWFObjectUtil.prepUnload);deconcept.unloadSet=true;}}if(!document.getElementById&&document.all){document.getElementById=function(A){return document.all[A];};}var getQueryParamValue=deconcept.util.getRequestParameter;var FlashObject=deconcept.SWFObject;var SWFObject=deconcept.SWFObject;YAHOO.widget.FlashAdapter=function(C,A,B){this._queue=this._queue||[];this._events=this._events||{};this._configs=this._configs||{};B=B||{};this._id=B.id=B.id||YAHOO.util.Dom.generateId(null,"yuigen");B.version=B.version||"9.0.45";B.backgroundColor=B.backgroundColor||"#ffffff";this._attributes=B;this._swfURL=C;this._embedSWF(this._swfURL,A,B.id,B.version,B.backgroundColor,B.expressInstall);this.createEvent("contentReady");};YAHOO.extend(YAHOO.widget.FlashAdapter,YAHOO.util.AttributeProvider,{_swfURL:null,_swf:null,_id:null,_attributes:null,toString:function(){return"FlashAdapter "+this._id;},_embedSWF:function(H,G,C,B,E,F){var D=new deconcept.SWFObject(H,C,"100%","100%",B,E,F);D.addParam("allowScriptAccess","always");D.addVariable("allowedDomain",document.location.hostname);D.addVariable("elementID",C);D.addVariable("eventHandler","YAHOO.widget.FlashAdapter.eventHandler");var A=YAHOO.util.Dom.get(G);var I=D.write(A);if(I){this._swf=YAHOO.util.Dom.get(C);this._swf.owner=this;}},_eventHandler:function(B){var A=B.type;switch(A){case"swfReady":this._loadHandler();return ;case"log":return ;}this.fireEvent(A,B);},_loadHandler:function(){this._initAttributes(this._attributes);this.setAttributes(this._attributes,true);this._attributes=null;this.fireEvent("contentReady");},_initAttributes:function(A){this.getAttributeConfig("swfURL",{method:this._getSWFURL});},_getSWFURL:function(){return this._swfURL;}});YAHOO.widget.FlashAdapter.eventHandler=function(A,C){var B=YAHOO.util.Dom.get(A);if(!B.owner){setTimeout(function(){YAHOO.widget.FlashAdapter.eventHandler(A,C);},0);}else{B.owner._eventHandler(C);}};YAHOO.widget.Uploader=function(A){YAHOO.widget.Uploader.superclass.constructor.call(this,YAHOO.widget.Uploader.SWFURL,A,null);this.createEvent("fileSelect");this.createEvent("uploadStart");this.createEvent("uploadProgress");this.createEvent("uploadCancel");this.createEvent("uploadComplete");this.createEvent("uploadCompleteData");this.createEvent("uploadError");};YAHOO.widget.Uploader.SWFURL="assets/uploader.swf";YAHOO.extend(YAHOO.widget.Uploader,YAHOO.widget.FlashAdapter,{browse:function(B,A){this._swf.browse(B,A);},upload:function(A,B,E,C,D){this._swf.upload(A,B,E,C,D);},uploadAll:function(A,D,B,C){this._swf.uploadAll(A,D,B,C);},cancel:function(A){this._swf.cancel(A);},clearFileList:function(){this._swf.clearFileList();},removeFile:function(A){this._swf.removeFile(A);}});YAHOO.register("uploader",YAHOO.widget.Uploader,{version:"2.5.0",build:"895"});