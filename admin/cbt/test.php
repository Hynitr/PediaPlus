<!DOCTYPE html>
<html>
<head>
<script src="jquery.js"></script>

</head>
<body>

<div id="content"></div>

</body>
</html>


<p id="display"><p>


<button id="start">Start</button>


<script>

</script>
<script>
 window.addEventListener("load",  myfun);

 function myfun() {

var start = document.getElementById("start");
var dis = document.getElementById("display");
var finishTime;
var timerLength = 10800;
var timeoutID;
dis.innerHTML = timerLength.toLocaleTimeString();

if(localStorage.getItem('myTime')){
    Update();
}
start.onclick = function () {
    localStorage.setItem('myTime', ((new Date()).getTime() + timerLength * 1000));
    if (timeoutID != undefined) window.clearTimeout(timeoutID);
    Update();
}

function Update() {
    finishTime = localStorage.getItem('myTime');
    var timeLeft = (finishTime - new Date());
    dis.innerHTML = Math.floor(timeLeft/1000);
    timeoutID = window.setTimeout(Update, 100);
}

 }
</script>