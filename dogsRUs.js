function description(name){
    //alert(name);
	window.location = name + '.html';
};
var small = '<div class="row" id="smallDogs"><div class= "col-md-3" id="sortList"><div class ="row" id="size"><h4>Refine by</h4><h5>Size<br>' +
	'<input type="checkbox" id="small" value="Small" onclick="refine()"> Small<br><input type="checkbox" id="medium" value="Medium" onclick="refine()"> Medium<br><input type="checkbox" id="large" value="Large" onclick="refine()"> Large<br></h5>' +
	'</div><div class ="row"></div></div><div class= "col-md-3" name="sarah" onclick="description(\"sarah\")"><img src="http://www.cutestpaw.com/wp-content/uploads/2011/11/cute-puppy1.jpg" ><h4>Sarah</h4>' +
	'<p>Lived in tiny cups for 90% of her life.<br><em>One mile away</em></p></div><div class="col-md-3"><img src="http://i.imgur.com/fWuAnsA.jpg"><h4>Sindy with a S</h4><p>Very tiny fluff of life<br><em>2 miles away</em></p></div><div class= "col-md-3" name="willow" onclick="description(\"willow\")"><img src="http://i.imgur.com/wOvig8T.gif"><h4>Willow</h4>' +
	'<p>Will not stay still, need energetic owner<br><em>Right behind you </em></p></div></div>';
var large = '<div class= "col-md-3" ></div><div class="col-md-3"><img src="http://i.imgur.com/oT4qU.jpg"><h4>Britnee</h4><p>Very good replacement for comforter' +
	'<br><em>0.5 miles away</em></p></div><div class="col-md-3"><img src="http://i.imgur.com/yyyyPUq.jpg"><h4>Godfrey</h4><p>100% Guaranteed Alive, sleeps in warm spots<br><em>One mile away</em></p>' +
	'</div><div class= "col-md-3" ><img src="http://i.imgur.com/qNoTX.jpg"><h4>Bruno</h4><p>Tilts for days<br><em>1.5 miles away</em></p></div>';
var none = '<div class= "col-md-3" id=\"sortList\"><div class =\"row\" id=\"size\"><h4>Refine by</h4><h5>Size<br><input type=\"checkbox\" id=\"small\" value=\"Small\" onclick=\"refine()\"> Small<br><input type=\"checkbox\" id=\"medium\" value=\"Medium\" onclick=\"refine\()\"> Medium<br>' +
			'<input type="checkbox" id="large" value="Large" onclick="refine()"> Large<br></h5></div><div class ="row"></div></div>';

function refine(){
	if(document.getElementById("small").checked){
		var largeChecked = document.getElementById("large").checked;	
		document.getElementById("smallDogs").innerHTML = small;
		document.getElementById("large").checked = largeChecked;
		document.getElementById("small").checked = true;
	}
	if(document.getElementById("large").checked){
		document.getElementById("largeDogs").innerHTML = large;
		document.getElementById("large").checked = true;
	}
	if(!document.getElementById("small").checked){
		document.getElementById("small").checked = false;
		var largeChecked = document.getElementById("large").checked;
		document.getElementById("smallDogs").innerHTML = none;
		document.getElementById("large").checked = largeChecked;
	}
	if(!document.getElementById("large").checked){
		document.getElementById("large").checked = false;
		document.getElementById("largeDogs").innerHTML = " ";	
	}
	if((!document.getElementById("large").checked) && (!document.getElementById("small").checked) && (!document.getElementById("medium").checked)){
		var largeChecked = document.getElementById("large").checked;	
		document.getElementById("largeDogs").innerHTML = large;
		document.getElementById("smallDogs").innerHTML = small;
		document.getElementById("large").checked = largeChecked;
	}
}
