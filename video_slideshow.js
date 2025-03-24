const videos = [
    "https://www.youtube.com/embed/w_GjBGwlPCU?si=COU1MZARLfwda7mC",
    "https://www.youtube.com/embed/GxzfC56Hl30",
];

let currentVideo = 0;
const videoFrame = document.getElementById("videoFrame");

videoFrame.src = videos[currentVideo];

document.getElementById("nextBtn").addEventListener("click", () => {
    currentVideo = (currentVideo + 1) % videos.length;
    videoFrame.src = videos[currentVideo] + "?autoplay=1";
});

document.getElementById("prevBtn").addEventListener("click", () => {
    currentVideo = (currentVideo - 1 + videos.length) % videos.length;
    videoFrame.src = videos[currentVideo] + "?autoplay=1";
});
