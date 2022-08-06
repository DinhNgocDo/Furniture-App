$("#search").keyup(function(e) {
    var key = e.target.value;
    var route = e.target.name;
    var url = $('#url').text() + route;
    var xmlhttp=new XMLHttpRequest();

    if (key.length==0) {
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.zIndex="9999";
        document.getElementById("livesearch").style.display = "none";
        document.getElementById("tableContent").style.display = "block";

        return;
    }
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            document.getElementById("livesearch").innerHTML=this.responseText;
            document.getElementById("livesearch").style.display = "block";
            document.getElementById("tableContent").style.display = "none";
        }
    }

    xmlhttp.open("POST", url, true);
    xmlhttp.send(JSON.stringify(key));
});