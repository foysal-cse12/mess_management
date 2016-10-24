function member_list(str) {
  //alert("hello");
  var xhttp;

  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();

    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

if (str.length == 0) { 
    document.getElementById("list").innerHTML = "";
    return;
  }
  
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("list").innerHTML = xhttp.responseText;

    }
  };

  xhttp.open("GET", "http://localhost/mess/home/member_list_info_meal/"+str, true);
  xhttp.send();
}