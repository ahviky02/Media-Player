// var toogle = true;
// var audio = new Audio();
// var isPlaying = false;
// var storedTime = 0;
// var oldSource = "";

// function playAudio(source) {
//     if (oldSource !== source) {
//         oldSource = source;
//         storedTime = 0; // Reset storedTime to 0 when audio source is changed
//         isPlaying = false;
//     }

//     if (!isPlaying) {
//         audio.src = source; // Set the source path dynamically
//         audio.currentTime = storedTime; // Set the stored time
//         audio.play();
//         isPlaying = true;
//         console.log("Audio is now playing.");
//         toogle = false;

//     } else {
//         audio.pause();
//         storedTime = audio.currentTime; // Store the current time
//         isPlaying = false;
//         console.log("Audio is now paused.");
//         toogle = true;
//     }
// }

var audio = new Audio();
var isPlaying = false;
var storedTime = 0;
var oldSource = "";

function playAudio(source) {
    if (oldSource !== source) {
        oldSource = source;
        storedTime = 0; // Reset storedTime to 0 when audio source is changed
        isPlaying = false;
    }

    if (!isPlaying) {
        audio.src = source; // Set the source path dynamically
        audio.currentTime = storedTime; // Set the stored time
        audio.play();
        isPlaying = true;
        console.log("Audio is now playing.");
    } else {
        audio.pause();
        storedTime = audio.currentTime; // Store the current time
        isPlaying = false;
        console.log("Audio is now paused.");
    }
}

// Save audio state to localStorage when the page is unloaded or refreshed
window.addEventListener('beforeunload', function () {
    localStorage.setItem('audioState', JSON.stringify({
        source: oldSource,
        isPlaying: isPlaying,
        storedTime: storedTime
    }));
});

// Load audio state from localStorage when the page is loaded
window.addEventListener('DOMContentLoaded', function () {
    var audioState = localStorage.getItem('audioState');
    if (audioState) {
        audioState = JSON.parse(audioState);
        oldSource = audioState.source;
        isPlaying = audioState.isPlaying;
        storedTime = audioState.storedTime;

        if (isPlaying) {
            audio.src = oldSource;
            audio.currentTime = storedTime;
            audio.play();
            console.log("Resumed audio playback.");
        }
    }
});
