(function(){var a=tinymce.each;tinymce.create("tinymce.plugins.MediaPlugin",{init:function(b,c){var e=this;e.editor=b;e.url=c;function f(g){return/^(mceItemFlash|mceItemShockWave|mceItemWindowsMedia|mceItemQuickTime|mceItemRealMedia)$/.test(g.className)}b.onPreInit.add(function(){b.serializer.addRules("param[name|value|_mce_value]")});b.addCommand("mceMedia",function(){b.windowManager.open({file:c+"/media.htm",width:430+parseInt(b.getLang("media.delta_width",0)),height:470+parseInt(b.getLang("media.delta_height",0)),inline:1},{plugin_url:c})});b.addButton("media",{title:"media.desc",cmd:"mceMedia"});b.onNodeChange.add(function(h,g,i){g.setActive("media",i.nodeName=="IMG"&&f(i))});b.onInit.add(function(){var g={mceItemFlash:"flash",mceItemShockWave:"shockwave",mceItemWindowsMedia:"windowsmedia",mceItemQuickTime:"quicktime",mceItemRealMedia:"realmedia"};b.selection.onSetContent.add(function(){e._spansToImgs(b.getBody())});b.selection.onBeforeSetContent.add(e._objectsToSpans,e);if(b.settings.content_css!==false){b.dom.loadCSS(c+"/css/content.css")}if(b.theme&&b.theme.onResolveName){b.theme.onResolveName.add(function(h,i){if(i.name=="img"){a(g,function(l,j){if(b.dom.hasClass(i.node,j)){i.name=l;i.title=b.dom.getAttrib(i.node,"title");return false}})}})}if(b&&b.plugins.contextmenu){b.plugins.contextmenu.onContextMenu.add(function(i,h,j){if(j.nodeName=="IMG"&&/mceItem(Flash|ShockWave|WindowsMedia|QuickTime|RealMedia)/.test(j.className)){h.add({title:"media.edit",icon:"media",cmd:"mceMedia"})}})}});b.onBeforeSetContent.add(e._objectsToSpans,e);b.onSetContent.add(function(){e._spansToImgs(b.getBody())});b.onPreProcess.add(function(g,i){var h=g.dom;if(i.set){e._spansToImgs(i.node);a(h.select("IMG",i.node),function(k){var j;if(f(k)){j=e._parse(k.title);h.setAttrib(k,"width",h.getAttrib(k,"width",j.width||100));h.setAttrib(k,"height",h.getAttrib(k,"height",j.height||100))}})}if(i.get){a(h.select("IMG",i.node),function(m){var l,j,k;if(g.getParam("media_use_script")){if(f(m)){m.className=m.className.replace(/mceItem/g,"mceTemp")}return}switch(m.className){case"mceItemFlash":l="d27cdb6e-ae6d-11cf-96b8-444553540000";j="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0";k="application/x-shockwave-flash";break;case"mceItemShockWave":l="166b1bca-3f9c-11cf-8075-444553540000";j="http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=8,5,1,0";k="application/x-director";break;case"mceItemWindowsMedia":l=g.getParam("media_wmp6_compatible")?"05589fa1-c356-11ce-bf01-00aa0055595a":"6bf52a52-394a-11d3-b153-00c04f79faa6";j="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701";k="application/x-mplayer2";break;case"mceItemQuickTime":l="02bf25d5-8c17-4b23-bc80-d3488abddc6b";j="http://www.apple.com/qtactivex/qtplugin.cab#version=6,0,2,0";k="video/quicktime";break;case"mceItemRealMedia":l="cfcdaa03-8be4-11cf-b84b-0020afbbccfa";j="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0";k="audio/x-pn-realaudio-plugin";break}if(l){h.replace(e._buildObj({classid:l,codebase:j,type:k},m),m)}})}});b.onPostProcess.add(function(g,h){h.content=h.content.replace(/_mce_value=/g,"value=")});function d(g,h){h=new RegExp(h+'="([^"]+)"',"g").exec(g);return h?b.dom.decode(h[1]):""}b.onPostProcess.add(function(g,h){if(g.getParam("media_use_script")){h.content=h.content.replace(/<img[^>]+>/g,function(j){var i=d(j,"class");if(/^(mceTempFlash|mceTempShockWave|mceTempWindowsMedia|mceTempQuickTime|mceTempRealMedia)$/.test(i)){at=e._parse(d(j,"title"));at.width=d(j,"width");at.height=d(j,"height");j='<script type="text/javascript">write'+i.substring(7)+"({"+e._serialize(at)+"});<\/script>"}return j})}})},getInfo:function(){return{longname:"Media",author:"Moxiecode Systems AB",authorurl:"http://tinymce.moxiecode.com",infourl:"http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/media",version:tinymce.majorVersion+"."+tinymce.minorVersion}},_objectsToSpans:function(b,e){var c=this,d=e.content;d=d.replace(/<script[^>]*>\s*write(Flash|ShockWave|WindowsMedia|QuickTime|RealMedia)\(\{([^\)]*)\}\);\s*<\/script>/gi,function(g,f,i){var h=c._parse(i);return'<img class="mceItem'+f+'" title="'+b.dom.encode(i)+'" src="'+c.url+'/img/trans.gif" width="'+h.width+'" height="'+h.height+'" />'});d=d.replace(/<object([^>]*)>/gi,'<span class="mceItemObject" $1>');d=d.replace(/<embed([^>]*)\/?>/gi,'<span class="mceItemEmbed" $1></span>');d=d.replace(/<embed([^>]*)>/gi,'<span class="mceItemEmbed" $1>');d=d.replace(/<\/(object)([^>]*)>/gi,"</span>");d=d.replace(/<\/embed>/gi,"");d=d.replace(/<param([^>]*)>/gi,function(g,f){return"<span "+f.replace(/value=/gi,"_mce_value=")+' class="mceItemParam"></span>'});d=d.replace(/\/ class=\"mceItemParam\"><\/span>/gi,'class="mceItemParam"></span>');e.content=d},_buildObj:function(g,h){var d,c=this.editor,f=c.dom,e=this._parse(h.title),b;b=c.getParam("media_strict",true)&&g.type=="application/x-shockwave-flash";e.width=g.width=f.getAttrib(h,"width")||100;e.height=g.height=f.getAttrib(h,"height")||100;if(e.src){e.src=c.convertURL(e.src,"src",h)}if(b){d=f.create("span",{id:e.id,_mce_name:"object",type:"application/x-shockwave-flash",data:e.src,style:f.getAttrib(h,"style"),width:g.width,height:g.height})}else{d=f.create("span",{id:e.id,_mce_name:"object",classid:"clsid:"+g.classid,style:f.getAttrib(h,"style"),codebase:g.codebase,width:g.width,height:g.height})}a(e,function(j,i){if(!/^(width|height|codebase|classid|id|_cx|_cy)$/.test(i)){if(g.type=="application/x-mplayer2"&&i=="src"&&!e.url){i="url"}if(j){f.add(d,"span",{_mce_name:"param",name:i,_mce_value:j})}}});if(!b){f.add(d,"span",tinymce.extend({_mce_name:"embed",type:g.type,style:f.getAttrib(h,"style")},e))}return d},_spansToImgs:function(e){var d=this,f=d.editor.dom,b,c;a(f.select("span",e),function(g){if(f.getAttrib(g,"class")=="mceItemObject"){c=f.getAttrib(g,"classid").toLowerCase().replace(/\s+/g,"");switch(c){case"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000":f.replace(d._createImg("mceItemFlash",g),g);break;case"clsid:166b1bca-3f9c-11cf-8075-444553540000":f.replace(d._createImg("mceItemShockWave",g),g);break;case"clsid:6bf52a52-394a-11d3-b153-00c04f79faa6":case"clsid:22d6f312-b0f6-11d0-94ab-0080c74c7e95":case"clsid:05589fa1-c356-11ce-bf01-00aa0055595a":f.replace(d._createImg("mceItemWindowsMedia",g),g);break;case"clsid:02bf25d5-8c17-4b23-bc80-d3488abddc6b":f.replace(d._createImg("mceItemQuickTime",g),g);break;case"clsid:cfcdaa03-8be4-11cf-b84b-0020afbbccfa":f.replace(d._createImg("mceItemRealMedia",g),g);break;default:f.replace(d._createImg("mceItemFlash",g),g)}return}if(f.getAttrib(g,"class")=="mceItemEmbed"){switch(f.getAttrib(g,"type")){case"application/x-shockwave-flash":f.replace(d._createImg("mceItemFlash",g),g);break;case"application/x-director":f.replace(d._createImg("mceItemShockWave",g),g);break;case"application/x-mplayer2":f.replace(d._createImg("mceItemWindowsMedia",g),g);break;case"video/quicktime":f.replace(d._createImg("mceItemQuickTime",g),g);break;case"audio/x-pn-realaudio-plugin":f.replace(d._createImg("mceItemRealMedia",g),g);break;default:f.replace(d._createImg("mceItemFlash",g),g)}}})},_createImg:function(c,h){var b,g=this.editor.dom,f={},e="",d;d=["id","name","width","height","bgcolor","align","flashvars","src","wmode","allowfullscreen","quality","data"];b=g.create("img",{src:this.url+"/img/trans.gif",width:g.getAttrib(h,"width")||100,height:g.getAttrib(h,"height")||100,style:g.getAttrib(h,"style"),"class":c});a(d,function(i){var j=g.getAttrib(h,i);if(j){f[i]=j}});a(g.select("span",h),function(i){if(g.hasClass(i,"mceItemParam")){f[g.getAttrib(i,"name")]=g.getAttrib(i,"_mce_value")}});if(f.movie){f.src=f.movie;delete f.movie}if(!f.src){f.src=f.data;delete f.data}h=g.select(".mceItemEmbed",h)[0];if(h){a(d,function(i){var j=g.getAttrib(h,i);if(j&&!f[i]){f[i]=j}})}delete f.width;delete f.height;b.title=this._serialize(f);return b},_parse:function(b){return tinymce.util.JSON.parse("{"+b+"}")},_serialize:function(b){return tinymce.util.JSON.serialize(b).replace(/[{}]/g,"")}});tinymce.PluginManager.add("media",tinymce.plugins.MediaPlugin)})();