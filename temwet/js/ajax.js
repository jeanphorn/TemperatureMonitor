// create the XMLHttpRequest object, according browser
function get_XmlHttp() {
  // create the variable that will contain the instance of the XMLHttpRequest object (initially with null value)
  var xmlHttp = null;

  if(window.XMLHttpRequest) {		// for Forefox, IE7+, Opera, Safari, ...
    xmlHttp = new XMLHttpRequest();
  }
  else if(window.ActiveXObject) {	// for Internet Explorer 5 or 6
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  return xmlHttp;
}

// sends data to a php file, via POST, and displays the received answer
function refresh() {
  var request =  get_XmlHttp();		// call the function for the XMLHttpRequest instance

  var  the_data = '';       // here you can set data to be send to the server (pairs index=value)

  request.open("POST", "refreshstate.php", true);			// set the request

  // adds  a header to tell the PHP script to recognize the data as is sent via POST
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(the_data);		// calls the send() method with data as parameter

  // Check request status
  // If the response is received completely, will be transferred to the HTML tag with tagID
  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      var resp = request.responseText;        // get the response from php
      document.getElementById("div02").innerHTML = resp;       // add the response into the tag with the ID from "tagID"
	//document.write(resp);
      // calls the parseScript() function, with the response from PHP as argument
      parseScript(resp);
    }
  }
}

// this function create an Array that contains the JS code of every <script> tag in parameter
// then apply the eval() to execute the code in every script collected
function parseScript(strcode) {
/* www.webdeveloper.com */
  var scripts = new Array();         // Array which will store the script's code
  
  // Strip out tags
  while(strcode.indexOf("<script") > -1 || strcode.indexOf("</script") > -1) {
    var s = strcode.indexOf("<script");
    var s_e = strcode.indexOf(">", s);
    var e = strcode.indexOf("</script", s);
    var e_e = strcode.indexOf(">", e);
    
    // Add to scripts array
    scripts.push(strcode.substring(s_e+1, e));
    // Strip from strcode
    strcode = strcode.substring(0, s) + strcode.substring(e_e+1);
  }
  
  // Loop through every script collected and eval it
  for(var i=0; i<scripts.length; i++) {
    try {
      eval(scripts[i]);
    }
    catch(ex) {
      // do what you want here when a script fails
    }
  }
}
