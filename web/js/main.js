var close = document.getElementsByClassName("closebtn");

for(var i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display="none"}, 600);
    }
}
