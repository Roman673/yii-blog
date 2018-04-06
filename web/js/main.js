/* Alerts */
var close = document.getElementsByClassName("closebtn");

for(var i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display="none"}, 600);
    }
}

/* Modal Boxes */
var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");

var closeModal = document.getElementsByClassName("closeModal");

btn.onclick = function(){ modal.style.display = "block" }

for(var j = 0; j < closeModal.length; j++) {
    closeModal[j].onclick = function(){
        modal.style.display = "none"
    }
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
