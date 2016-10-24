function check(str) {

  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  if (str.length == 0) { 
    document.getElementById("check_username").innerHTML = "";
    return;
  }


  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      
      document.getElementById("check_username").innerHTML = xhttp.responseText;

    }
  };

  xhttp.open("GET","http://localhost/mess/home/check_username/"+str, true);
  xhttp.send(); 
}
