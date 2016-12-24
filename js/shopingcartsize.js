function Cart(id) {
     
    if (itm == "") {
        document.getElementById("cartn").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("cartn").innerHTML = xmlhttp.responseText;
                
            }
        }
        xmlhttp.open("GET","cartcount.php?id="+id,true);
        xmlhttp.send();
    }
}
