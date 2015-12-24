var media = document.getElementById('custom-player');
var controls = document.getElementById('controls');
var play = document.getElementById('play');
var stop = document.getElementById('stop');
var timer = document.getElementById('timer');
var rwd = document.getElementById('rwd');
var fwd = document.getElementById('fwd');

media.removeAttribute("controls");
controls.style.visibility = "visible";

play.addEventListener("click", playPauseMedia, false);
stop.addEventListener("click", stopMedia, false);
media.addEventListener("ended", stopMedia, false);
media.addEventListener("timeupdate", setTime, false);
rwd.addEventListener("mousedown", mediaBackward, false);
rwd.addEventListener("mouseup", normalPlay, false);
fwd.addEventListener("mousedown", mediaForward, false);
fwd.addEventListener("mouseup", normalPlay, false);

function playPauseMedia() {
  if(media.className==="" || media.className==="paused") {
    media.setAttribute("class","playing");
    play.setAttribute("data-icon","u");
    media.play();
  } else {
    media.setAttribute("class","paused");
    play.setAttribute("data-icon","P");
    media.pause();
  }
}

function stopMedia() {
  media.pause();
  media.currentTime = 0;
  media.setAttribute("class","");
  play.setAttribute("data-icon","P");
}

function setTime() {

  var minutes = Math.floor(media.currentTime / 60);
  var seconds = Math.floor(media.currentTime - minutes * 60);
  var minuteValue;
  var secondValue;
  
  if (minutes<10) {
    minuteValue = "0" + minutes;
  } else {
    minuteValue = minutes;
  }
  
  if (seconds<10) {
    secondValue = "0" + seconds;
  } else {
    secondValue = seconds;
  }
  
  mediaTime = minuteValue + ":" + secondValue;
  timer.innerHTML = mediaTime;
}

function mediaBackward() {
  media.pause();
  interval = setInterval('media.currentTime = media.currentTime - 3', 200);  
}

function mediaForward() {
  media.pause();
  interval = setInterval('media.currentTime = media.currentTime + 3', 200);
}

function normalPlay() {
  clearInterval(interval);
  media.play();
}

