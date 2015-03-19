var xmlHTTP;
//判断浏览器是IE 还是别的
function xmlhttprequest(){
    if(window.ActiveXObject){
        xmlHTTP= new ActiveXObject('Microsoft.XMLHTTP');
    }else if(window.XMLHttpRequest) {
        xmlHTTP= new XMLHttpRequest();
    }
}
//开始发送数据
function  refreshevent(){

    xmlhttprequest();

    xmlHTTP.open("GET","event.php",true);

    xmlHTTP.onreadystatechange = byphp2;

    xmlHTTP.send(null);   
}
//接受数据并显示  分为5个状态0,1,2,3,4,5
function byphp2(){
    
    if(xmlHTTP.readyState==4){
      var bygwyy=xmlHTTP.responseText;
      document.getElementById('msg').innerHTML="<font size=\"2px\"><br><br><br>"+bygwyy+"<br><br><br></font>";
	
    }
}

