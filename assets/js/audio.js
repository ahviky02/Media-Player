var audio = new Audio();
var isPlaying = false;
var storedTime = 0;
var oldSource = "";
var oldId = "";
var currentBtn = null;


function playAudio(id, source) {
    var btn = document.getElementById(id);


    if (oldId !== id) {
        if (currentBtn) {
            currentBtn.classList.remove('bi-pause-circle');
            currentBtn.classList.add('bi-play-circle');
        }
    }

    if (oldSource !== source) {
        oldSource = source;
        storedTime = 0; // Reset storedTime to 0 when audio source is changed
        isPlaying = false;
    }

    if (isPlaying && currentBtn !== btn) {
        currentBtn.classList.remove('bi-pause-circle');
        currentBtn.classList.add('bi-play-circle');
        audio.pause();
    }

    if (!isPlaying) {
        audio.src = source; // Set the source path dynamically
        audio.currentTime = storedTime; // Set the stored time
        audio.play();
        isPlaying = true;
        console.log("Audio is now playing.");
        btn.classList.remove('bi-play-circle');
        btn.classList.add('bi-pause-circle');
        currentBtn = btn;
    } else {
        audio.pause();
        storedTime = audio.currentTime; // Store the current time 
        isPlaying = false;
        console.log("Audio is now paused.");
        btn.classList.remove('bi-pause-circle');
        btn.classList.add('bi-play-circle');
        currentBtn = null;
    }

    oldId = id;
}

