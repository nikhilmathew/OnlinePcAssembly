function addToCart(itm) {
     qtycheck = /^\d{1,2}$/;
    do
    {
        qty = prompt("Please enter quantity","");
        if(qty == "" || qty == 0){
            return;
        }
    }
        while(!qtycheck.test(qty));

    if(qty != null){
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
                //document.getElementById("noti").innerHTML = xmlhttp.responseText;
                alert("Item added to Cart....");
            }
        }
        xmlhttp.open("GET","addtocart.php?id="+itm+"&qty="+qty,true);
        xmlhttp.send();
    }
    }
}