
// Hide all on load
il.Util.addOnLoad(ilFormHideAll)

/** 
* Hide all ilFormHelpLink elements
*/
function ilFormHideAll()
{
	var obj,nextspan,anchor,content

	// get all spans
	obj=document.getElementsByTagName('span')
	
	// run through them
	for (var i=0;i<obj.length;i++)
	{
		// if it has a class of helpLink
		if(/ilFormHelpLink/.test(obj[i].className))
		{
		
			// get the adjacent span
			nextspan=obj[i].nextSibling
			while(nextspan.nodeType!=1) nextspan=nextspan.nextSibling
			
			// hide it
			nextspan.style.display='none'
			
			//create a new link
			anchor=document.createElement('a')
			
			// copy original helpLink text and add attributes
			//content=document.createTextNode(obj[i].firstChild.nodeValue)
			nnode = obj[i].firstChild.cloneNode(false);
			//anchor.appendChild(content)
			anchor.appendChild(nnode)
			anchor.href='#help'
			//anchor.title='Click to show help'
			anchor.className=obj[i].className
			anchor.nextspan=nextspan
			anchor.onclick=function(){ilFormShowHide(this.nextspan);ilFormChangeTitle(this);return false}
			
			// replace span with created link
			obj[i].replaceChild(anchor,obj[i].firstChild)
		}
	}
}

// used to flip helpLink title
function ilFormChangeTitle(obj){
  //if(obj)
  //  obj.title = obj.title== 'Click to show help' ? 'Click to hide help' : 'Click to show help'
}

/** 
* Show/Hide single element
*/
function ilFormShowHide(obj)
{
	if(obj)
	{
		obj.style.display = obj.style.display=='none' ? 'inline' : 'none'
	}
}

var ilFormSubActive = Array();

/**
* Hide Subform
*/
function ilFormHideSubForm(id)
{
	obj = document.getElementById(id);
	if (obj)
	{
		obj.style.overflow = 'hidden';
		obj.style.height = '0px';
		obj.style.display = 'none';
	}
}

/**
 * Show all input fields in a div
 */
function ilShowInputs(t)
{
	var inputs = YAHOO.util.Dom.getElementsBy(ilFormCheckInput, "input", t, null, null, null);
	for (var i in inputs)
	{
		inputs[i].style.visibility = 'visible';
	}
}

function ilFormCheckInput(e)
{
	return true;
}

/**
 * Hide all input fields in a div
 */
function ilHideInputs(t)
{
	var inputs = YAHOO.util.Dom.getElementsBy(ilFormCheckInput, "input", t, null, null, null);
	for (i in inputs)
	{
		inputs[i].style.visibility = 'hidden';
	}
}

/** 
* Show Subform
*/
function ilFormShowSubForm(id, cont_id, cb)
{
	if (cb == null)
	{
		ilFormSubActive[cont_id] = id;
	}
	else
	{
		if (cb.checked)
		{
			ilFormSubActive[cont_id] = id;
		}
		else
		{
			ilFormSubActive[cont_id] = null;
		}
	}

	var subforms = YAHOO.util.Dom.getElementsByClassName('ilSubForm', 'div', cont_id);
	for (k in subforms)
	{
		if (subforms[k].id != id)
		{
			subforms[k].style.overflow = 'hidden';
			var myAnim = new YAHOO.util.Anim(subforms[k], { 
				height: { to: 0 }  
				}, 1, YAHOO.util.Easing.easeOut);
			myAnim.onStart.subscribe(function(a, b, t) {
					ilHideInputs(t);
				}, subforms[k]);
			myAnim.onComplete.subscribe(function(a, b, t) {
					t.style.display = 'none';
					// activated in the meantime?
					for(k in ilFormSubActive)
					{
						if (t.id == ilFormSubActive[k])
						{
							t.style.display = '';
						}
					}
					t.style.height = 'auto';
					//	t.style.overflow = '';
				}, subforms[k]);
			myAnim.duration = 0.4;
			myAnim.animate();
		}

		/* subforms[k].style.display = 'none'; */
	}

	// activate subform
	obj = document.getElementById(id);
	if (obj && obj.style.display == 'none' && (cb == null || cb.checked == true))
	{
		obj.style.display = '';
		obj.style.position = 'relative';
		obj.style.left = '-1000px';
		obj.style.display = 'block';
		var nh = obj.scrollHeight
		obj.style.height = '0px';
		obj.style.position = '';
		obj.style.left = '';
		obj.style.overflow = 'hidden';
		var myAnim = new YAHOO.util.Anim(obj, { 
			height: {
				from: 0,
				to: nh }  
			}, 1, YAHOO.util.Easing.easeOut);
		myAnim.onStart.subscribe(function(a, b, t) {
				t.style.display = '';
				ilHideInputs(t);
			}, obj);
		myAnim.onComplete.subscribe(function(a, b, t) {
				t.style.height = 'auto';
				ilShowInputs(t);
				// t.style.overflow = '';

			}, obj);
		myAnim.duration = 0.4;
		myAnim.animate();
	}

	// deactivate subform of checkbox
	if (obj && (cb != null && cb.checked == false))
	{
		obj.style.overflow = 'hidden';
		var myAnim = new YAHOO.util.Anim(obj, { 
			height: { to: 0 }  
			}, 1, YAHOO.util.Easing.easeOut);
		myAnim.onStart.subscribe(function(a, b, t) {
				ilHideInputs(t);
			}, obj);
		myAnim.onComplete.subscribe(function(a, b, t) {
				t.style.display = 'none';
				// activated in the meantime?
				for(k in ilFormSubActive)
				{
					if (t.id == ilFormSubActive[k])
					{
						t.style.display = '';
					}
				}
				t.style.height = 'auto';
				ilShowInputs(t);
//				t.style.overflow = '';
			}, obj);
		myAnim.duration = 0.4;
		myAnim.animate();
	}
}


function ilFormInitNumericCheck(id, decimals_allowed)
{
	$('#'+id).keydown(function(event) {						
		if (event.keyCode == 190)
		{
			// decimals are not allowed
			if(decimals_allowed == undefined || decimals_allowed == 0)
			{
				event.preventDefault(); 
			}
			else
			{
				// decimal point is only allowed once
				var current = $('#'+id).val();
				if (current.indexOf('.') > -1) 
				{
					event.preventDefault(); 
				}
			}
		}
        // Allow: backspace, delete, tab, escape, and enter
        else if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }		
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });

}

function addInternalLink(link,title,input_id) 
{	
	var part = link.substr(5);
	part = part.split('=');
	var type = part[0];
	var id = part[1].substr(1, part[1].length-3);
	
	$("input[name="+input_id+"_ajax_type]").val(type);
	$("input[name="+input_id+"_ajax_id]").val(id);
}
