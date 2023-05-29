var audio = new Audio();

function audio(source) {
    audio.src = source;  // Set the source path dynamically
    console.log("playing");
    audio.play();
}

function pauseAudio() {
    audio.pause();
}