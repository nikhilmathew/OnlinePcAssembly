function updateCart(itm) {
     
    
    if (itm == "") {
        document.getElementById("noti").innerHTML = "";
        return;
    } else { 
        var qty = document.getElementById("qty"+itm).value;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //document.getElementById("tit").innerHTML = xmlhttp.responseText;
                window.alert("qty updated");
                location.reload(true);
                
            }
        }
        xmlhttp.open("GET","updatecart.php?id="+itm+"&qty="+qty,true);
        xmlhttp.send();
    }
    
}
function delCart(itm) {
     
    
    if (itm == "") {
        document.getElementById("noti").innerHTML = "";
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
                //document.getElementById("tit").innerHTML = xmlhttp.responseText;
                window.alert("Product Deleted from cart");
                location.reload(true);
            }
        }
        xmlhttp.open("GET","deletefromcart.php?delid="+itm,true);
        xmlhttp.send();
    }
    
}

function viewCart() {
     
    
    if (itm == "") {
        document.getElementById("cartdata").innerHTML = "";
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
                document.getElementById("cartdata").innerHTML = xmlhttp.responseText;
                
            }
        }
        xmlhttp.open("GET","cartview.php",true);
        xmlhttp.send();
    }
    
}