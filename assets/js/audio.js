var audio = new Audio();
var isPlaying = false;
var storedTime = 0;
var oldSource = "";
var oldId = "";
var currentBtn = null;
var currentTimeElement = document.getElementById('current-time');
var durationElement = document.getElementById('duration');
var seekBar = document.getElementById('seek-bar');
var music_name = document.getElementById('music_name');

function playAudio(id, source) {
    var btn = document.getElementById(id);

    // Set the audio name in the music_name variable
    var audioName = getAudioName(source);
    music_name.textContent = audioName;

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

        audio.addEventListener('timeupdate', updateCurrentTime);
        audio.addEventListener('loadedmetadata', updateDuration);
        seekBar.addEventListener('input', seekAudio);
    } else {
        audio.pause();
        storedTime = audio.currentTime; // Store the current time 
        isPlaying = false;
        console.log("Audio is now paused.");
        btn.classList.remove('bi-pause-circle');
        btn.classList.add('bi-play-circle');
        currentBtn = null;

        audio.removeEventListener('timeupdate', updateCurrentTime);
        audio.removeEventListener('loadedmetadata', updateDuration);
        seekBar.removeEventListener('input', seekAudio);
    }

    oldId = id;
}


function getAudioName(source) {
    var parts = source.split('/');
    var fileNameWithExtension = parts[parts.length - 1];
    var fileName = fileNameWithExtension.split('.')[0];

    return fileName;
}


function updateCurrentTime() {
    var currentTime = audio.currentTime;
    currentTimeElement.textContent = formatTime(currentTime);
    seekBar.value = currentTime;
}

function updateDuration() {
    var duration = audio.duration;
    durationElement.textContent = formatTime(duration);
    seekBar.max = duration;
}

function formatTime(time) {
    var minutes = Math.floor(time / 60);
    var seconds = Math.floor(time % 60);
    return (minutes < 10 ? '0' : '') + minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
}


function seekAudio() {
    var seekTime = parseFloat(seekBar.value);
    audio.currentTime = seekTime;
}
