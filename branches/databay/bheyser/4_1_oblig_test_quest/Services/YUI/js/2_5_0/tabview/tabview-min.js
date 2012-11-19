/*
Copyright (c) 2008, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
version: 2.5.0
*/
(function(){YAHOO.widget.TabView=function(K,J){J=J||{};if(arguments.length==1&&!YAHOO.lang.isString(K)&&!K.nodeName){J=K;K=J.element||null;}if(!K&&!J.element){K=I.call(this,J);}YAHOO.widget.TabView.superclass.constructor.call(this,K,J);};YAHOO.extend(YAHOO.widget.TabView,YAHOO.util.Element);var F=YAHOO.widget.TabView.prototype;var E=YAHOO.util.Dom;var H=YAHOO.util.Event;var D=YAHOO.widget.Tab;F.CLASSNAME="yui-navset";F.TAB_PARENT_CLASSNAME="yui-nav";F.CONTENT_PARENT_CLASSNAME="yui-content";F._tabParent=null;F._contentParent=null;F.addTab=function(M,O){var P=this.get("tabs");if(!P){this._queue[this._queue.length]=["addTab",arguments];return false;}O=(O===undefined)?P.length:O;var R=this.getTab(O);var T=this;var L=this.get("element");var S=this._tabParent;var Q=this._contentParent;var J=M.get("element");var K=M.get("contentEl");if(R){S.insertBefore(J,R.get("element"));}else{S.appendChild(J);}if(K&&!E.isAncestor(Q,K)){Q.appendChild(K);}if(!M.get("active")){M.set("contentVisible",false,true);}else{this.set("activeTab",M,true);}var N=function(V){YAHOO.util.Event.preventDefault(V);var U=false;if(this==T.get("activeTab")){U=true;}T.set("activeTab",this,U);};M.addListener(M.get("activationEvent"),N);M.addListener("activationEventChange",function(U){if(U.prevValue!=U.newValue){M.removeListener(U.prevValue,N);M.addListener(U.newValue,N);}});P.splice(O,0,M);};F.DOMEventHandler=function(P){var K=this.get("element");var Q=YAHOO.util.Event.getTarget(P);var S=this._tabParent;if(E.isAncestor(S,Q)){var L;var M=null;var J;var R=this.get("tabs");for(var N=0,O=R.length;N<O;N++){L=R[N].get("element");J=R[N].get("contentEl");if(Q==L||E.isAncestor(L,Q)){M=R[N];break;}}if(M){M.fireEvent(P.type,P);}}};F.getTab=function(J){return this.get("tabs")[J];};F.getTabIndex=function(N){var K=null;var M=this.get("tabs");for(var L=0,J=M.length;L<J;++L){if(N==M[L]){K=L;break;}}return K;};F.removeTab=function(M){var L=this.get("tabs").length;var K=this.getTabIndex(M);var J=K+1;if(M==this.get("activeTab")){if(L>1){if(K+1==L){this.set("activeIndex",K-1);}else{this.set("activeIndex",K+1);}}}this._tabParent.removeChild(M.get("element"));this._contentParent.removeChild(M.get("contentEl"));this._configs.tabs.value.splice(K,1);};F.toString=function(){var J=this.get("id")||this.get("tagName");return"TabView "+J;};F.contentTransition=function(K,J){K.set("contentVisible",true);J.set("contentVisible",false);};F.initAttributes=function(J){YAHOO.widget.TabView.superclass.initAttributes.call(this,J);if(!J.orientation){J.orientation="top";}var L=this.get("element");if(!YAHOO.util.Dom.hasClass(L,this.CLASSNAME)){YAHOO.util.Dom.addClass(L,this.CLASSNAME);}this.setAttributeConfig("tabs",{value:[],readOnly:true});this._tabParent=this.getElementsByClassName(this.TAB_PARENT_CLASSNAME,"ul")[0]||G.call(this);this._contentParent=this.getElementsByClassName(this.CONTENT_PARENT_CLASSNAME,"div")[0]||C.call(this);this.setAttributeConfig("orientation",{value:J.orientation,method:function(M){var N=this.get("orientation");this.addClass("yui-navset-"+M);if(N!=M){this.removeClass("yui-navset-"+N);}switch(M){case"bottom":this.appendChild(this._tabParent);break;}}});this.setAttributeConfig("activeIndex",{value:J.activeIndex,method:function(M){this.set("activeTab",this.getTab(M));},validator:function(M){return !this.getTab(M).get("disabled");}});this.setAttributeConfig("activeTab",{value:J.activeTab,method:function(N){var M=this.get("activeTab");if(N){N.set("active",true);this._configs["activeIndex"].value=this.getTabIndex(N);}if(M&&M!=N){M.set("active",false);}if(M&&N!=M){this.contentTransition(N,M);}else{if(N){N.set("contentVisible",true);}}},validator:function(M){return !M.get("disabled");}});if(this._tabParent){B.call(this);}this.DOM_EVENTS.submit=false;this.DOM_EVENTS.focus=false;this.DOM_EVENTS.blur=false;for(var K in this.DOM_EVENTS){if(YAHOO.lang.hasOwnProperty(this.DOM_EVENTS,K)){this.addListener.call(this,K,this.DOMEventHandler);}}};var B=function(){var Q,L,P;var O=this.get("element");var N=A(this._tabParent);var K=A(this._contentParent);for(var M=0,J=N.length;M<J;++M){L={};if(K[M]){L.contentEl=K[M];}Q=new YAHOO.widget.Tab(N[M],L);this.addTab(Q);if(Q.hasClass(Q.ACTIVE_CLASSNAME)){this._configs.activeTab.value=Q;this._configs.activeIndex.value=this.getTabIndex(Q);}}};var I=function(J){var K=document.createElement("div");if(this.CLASSNAME){K.className=this.CLASSNAME;}return K;};var G=function(J){var K=document.createElement("ul");if(this.TAB_PARENT_CLASSNAME){K.className=this.TAB_PARENT_CLASSNAME;}this.get("element").appendChild(K);return K;};var C=function(J){var K=document.createElement("div");if(this.CONTENT_PARENT_CLASSNAME){K.className=this.CONTENT_PARENT_CLASSNAME;}this.get("element").appendChild(K);return K;};var A=function(M){var K=[];var N=M.childNodes;for(var L=0,J=N.length;L<J;++L){if(N[L].nodeType==1){K[K.length]=N[L];}}return K;};})();(function(){var E=YAHOO.util.Dom,J=YAHOO.util.Event;var B=function(L,K){K=K||{};if(arguments.length==1&&!YAHOO.lang.isString(L)&&!L.nodeName){K=L;L=K.element;}if(!L&&!K.element){L=H.call(this,K);}this.loadHandler={success:function(M){this.set("content",M.responseText);},failure:function(M){}};B.superclass.constructor.call(this,L,K);this.DOM_EVENTS={};};YAHOO.extend(B,YAHOO.util.Element);var F=B.prototype;F.LABEL_TAGNAME="em";F.ACTIVE_CLASSNAME="selected";F.ACTIVE_TITLE="active";F.DISABLED_CLASSNAME="disabled";F.LOADING_CLASSNAME="loading";F.dataConnection=null;F.loadHandler=null;F._loading=false;F.toString=function(){var K=this.get("element");var L=K.id||K.tagName;return"Tab "+L;};F.initAttributes=function(K){K=K||{};B.superclass.initAttributes.call(this,K);var M=this.get("element");this.setAttributeConfig("activationEvent",{value:K.activationEvent||"click"});this.setAttributeConfig("labelEl",{value:K.labelEl||G.call(this),method:function(N){var O=this.get("labelEl");if(O){if(O==N){return false;}this.replaceChild(N,O);}else{if(M.firstChild){this.insertBefore(N,M.firstChild);}else{this.appendChild(N);}}}});this.setAttributeConfig("label",{value:K.label||D.call(this),method:function(O){var N=this.get("labelEl");
if(!N){this.set("labelEl",I.call(this));}C.call(this,O);}});this.setAttributeConfig("contentEl",{value:K.contentEl||document.createElement("div"),method:function(N){var O=this.get("contentEl");if(O){if(O==N){return false;}this.replaceChild(N,O);}}});this.setAttributeConfig("content",{value:K.content,method:function(N){this.get("contentEl").innerHTML=N;}});var L=false;this.setAttributeConfig("dataSrc",{value:K.dataSrc});this.setAttributeConfig("cacheData",{value:K.cacheData||false,validator:YAHOO.lang.isBoolean});this.setAttributeConfig("loadMethod",{value:K.loadMethod||"GET",validator:YAHOO.lang.isString});this.setAttributeConfig("dataLoaded",{value:false,validator:YAHOO.lang.isBoolean,writeOnce:true});this.setAttributeConfig("dataTimeout",{value:K.dataTimeout||null,validator:YAHOO.lang.isNumber});this.setAttributeConfig("active",{value:K.active||this.hasClass(this.ACTIVE_CLASSNAME),method:function(N){if(N===true){this.addClass(this.ACTIVE_CLASSNAME);this.set("title",this.ACTIVE_TITLE);}else{this.removeClass(this.ACTIVE_CLASSNAME);this.set("title","");}},validator:function(N){return YAHOO.lang.isBoolean(N)&&!this.get("disabled");}});this.setAttributeConfig("disabled",{value:K.disabled||this.hasClass(this.DISABLED_CLASSNAME),method:function(N){if(N===true){E.addClass(this.get("element"),this.DISABLED_CLASSNAME);}else{E.removeClass(this.get("element"),this.DISABLED_CLASSNAME);}},validator:YAHOO.lang.isBoolean});this.setAttributeConfig("href",{value:K.href||this.getElementsByTagName("a")[0].getAttribute("href",2)||"#",method:function(N){this.getElementsByTagName("a")[0].href=N;},validator:YAHOO.lang.isString});this.setAttributeConfig("contentVisible",{value:K.contentVisible,method:function(N){if(N){this.get("contentEl").style.display="block";if(this.get("dataSrc")){if(!this._loading&&!(this.get("dataLoaded")&&this.get("cacheData"))){A.call(this);}}}else{this.get("contentEl").style.display="none";}},validator:YAHOO.lang.isBoolean});};var H=function(K){var O=document.createElement("li");var L=document.createElement("a");L.href=K.href||"#";O.appendChild(L);var N=K.label||null;var M=K.labelEl||null;if(M){if(!N){N=D.call(this,M);}}else{M=I.call(this);}L.appendChild(M);return O;};var G=function(){return this.getElementsByTagName(this.LABEL_TAGNAME)[0];};var I=function(){var K=document.createElement(this.LABEL_TAGNAME);return K;};var C=function(K){var L=this.get("labelEl");L.innerHTML=K;};var D=function(){var K,L=this.get("labelEl");if(!L){return undefined;}return L.innerHTML;};var A=function(){if(!YAHOO.util.Connect){return false;}E.addClass(this.get("contentEl").parentNode,this.LOADING_CLASSNAME);this._loading=true;this.dataConnection=YAHOO.util.Connect.asyncRequest(this.get("loadMethod"),this.get("dataSrc"),{success:function(K){this.loadHandler.success.call(this,K);this.set("dataLoaded",true);this.dataConnection=null;E.removeClass(this.get("contentEl").parentNode,this.LOADING_CLASSNAME);this._loading=false;},failure:function(K){this.loadHandler.failure.call(this,K);this.dataConnection=null;E.removeClass(this.get("contentEl").parentNode,this.LOADING_CLASSNAME);this._loading=false;},scope:this,timeout:this.get("dataTimeout")});};YAHOO.widget.Tab=B;})();YAHOO.register("tabview",YAHOO.widget.TabView,{version:"2.5.0",build:"895"});