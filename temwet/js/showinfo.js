function GetAbsPosition(obj) 
{ 
	var curleft = 0, curtop = 0; 
	do { 
		curleft += obj.offsetLeft; 
		curtop += obj.offsetTop; 
	} while (obj = obj.offsetParent); 
	return [curleft,curtop]; 
} 
function ShowFloatingImage(image, width, height) 
{ 
	var id = "showinfo"; 
	var newdiv = document.getElementById(id); 
	if(newdiv == null) 
	{ 
		newdiv = document.createElement('div'); 
		newdiv.setAttribute('id',id); 
		newdiv.setAttribute('onmouseout', "HideElement('"+id+"');"); 
		document.body.appendChild(newdiv); 
	} 
	newdiv.innerHTML = '<img src=images/headon.jpg width="30" height="40"/>'+'<h3>温度：'+(height-75)+'</h3>'; 
		
	var absPos = GetAbsPosition(image); 
		newdiv.style.position = "absolute"; 
		newdiv.style.posLeft = absPos[0] - width/2; 
		newdiv.style.posTop = absPos[1] - height/2; 
		newdiv.style.display="block"; 
} 
function HideElement(id) 
{ 
	var elem = document.getElementById(id); 
	elem.style.display="none"; 
} 

 function createTable2(obj,tem,wet,constraint) {
	var absPos = GetAbsPosition(obj); 
	var t=document.getElementById('table1'); 
	if(t == null) {
        	t = document.createElement('table');
		t.setAttribute('id','table1'); 
	}
	t.setAttribute('onMouseLeave', "HideElement('table1');"); 
	t.style.position="absolute";
	t.style.left=absPos[0];
	t.style.top=absPos[1];
	t.style.display="block"; 
	t.style.backgroundImage='url(images/table_bg.jpg)';
	var b = document.getElementById('tbb'); 
	if(b == null) {
        	b = document.createElement('tbody');
		b.setAttribute('id','tbb');
       		for (var i = 0; i < 2; i++) {
        	var r = document.createElement('tr');
        	for (var j = 0; j < 2; j++) {
        	 var c = document.createElement('td');
	 	if(i==0 && j==0){
         		var m = document.createTextNode('温度: ');
         		c.appendChild(m);
		}else if(i ==0 && j == 1) {
			if(tem > constraint)
				var m = document.createTextNode(tem+"°C > "+constraint+"°C");
			else
				var m = document.createTextNode(tem+"°C");
			//m.setAtrribute('id','temtd');
         		c.appendChild(m);
		}else if(i ==1 && j== 0) {
			var m = document.createTextNode('湿度');
         		c.appendChild(m);
		}else {
			var m = document.createTextNode(wet);
			//m.setAttribute('id','wettd');
         		c.appendChild(m);
		}
         	r.appendChild(c);
        	}
        	b.appendChild(r);
       		}
       
       		t.appendChild(b);
	}
	else {
		if(tem > constraint)
			b.rows[0].cells[1].innerText=tem+"°C > "+constraint+"°C"
		else
			b.rows[0].cells[1].innerText=tem+"°C";
		b.rows[1].cells[1].innerText=wet;
		//document.getElementById('temtd').innerText=tem; 
		//document.getElementById('wettd').innerText=wet; 
	}
       document.getElementById('div02').appendChild(t);
      //t.setAttribute('border', '1');
   }
