// Array to hold YouTube video URLs
const videos = [
    "https://www.youtube.com/embed/dQw4w9WgXcQ", // Example YouTube video 1
    "https://www.youtube.com/embed/tgbNymZ7vqY", // Example YouTube video 2
    "https://www.youtube.com/embed/3JZ_D3ELwOQ"  // Example YouTube video 3
];
let currentVideo = 0;
const videoFrame = document.getElementById("videoFrame");

// When the next button is clicked, move to the next video
document.getElementById("nextBtn").addEventListener("click", () => {
    currentVideo = (currentVideo + 1) % videos.length;
    videoFrame.src = videos[currentVideo] + "?autoplay=1"; // Update iframe source
});

// When the previous button is clicked, move to the previous video
document.getElementById("prevBtn").addEventListener("click", () => {
    currentVideo = (currentVideo - 1 + videos.length) % videos.length;
    videoFrame.src = videos[currentVideo] + "?autoplay=1"; // Update iframe source
});