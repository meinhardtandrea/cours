</div>
<script>
function onClickIng() {
    var x = document.getElementById("Ing");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }   
}
function onClickRec() {
    var y = document.getElementById("Rec");
    if (y.className.indexOf("w3-show") == -1) {
        y.className += " w3-show";
    } else { 
        y.className = y.className.replace(" w3-show", "");
    }   
}
function onClickAdmin() {
    var z = document.getElementById("Admin");
    if (z.className.indexOf("w3-show") == -1) {
        z.className += " w3-show";
    } else { 
        z.className = z.className.replace(" w3-show", "");
    }   
}
</script>
</body>
</html>