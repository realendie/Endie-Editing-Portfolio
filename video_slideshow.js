const videos = [
    "https://www.youtube.com/embed/dQw4w9WgXcQ",
    "https://www.youtube.com/embed/tgbNymZ7vqY",
    "https://www.youtube.com/embed/3JZ_D3ELwOQ"
];
let currentVideo = 0;
const videoFrame = document.getElementById("videoFrame");

document.getElementById("nextBtn").addEventListener("click", () => {
    currentVideo = (currentVideo + 1) % videos.length;
    videoFrame.src = videos[currentVideo] + "?autoplay=1";
});

document.getElementById("prevBtn").addEventListener("click", () => {
    currentVideo = (currentVideo - 1 + videos.length) % videos.length;
    videoFrame.src = videos[currentVideo] + "?autoplay=1";
});
