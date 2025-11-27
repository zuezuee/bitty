document.addEventListener("DOMContentLoaded", function () {
  const header = document.getElementById("main-header");
  const navLinks = document.querySelectorAll(".nav-center a");

  function updateOnScroll() {
    if (window.scrollY > 50) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }

    if (window.scrollY < 50) {
      navLinks.forEach((link) => link.classList.remove("active"));
      return;
    }

    const section1 = document.getElementById("section1");
    const section2 = document.getElementById("section2");
    const section3 = document.getElementById("section3");
    const section4 = document.getElementById("section4");
    const section5 = document.getElementById("section5");

    navLinks.forEach((link) => link.classList.remove("active"));

    const mark = 150;

    if (
      section1 &&
      section1.getBoundingClientRect().top <= mark &&
      section1.getBoundingClientRect().bottom >= mark
    ) {
      document.querySelector('a[href="#section1"]').classList.add("active");
    } else if (
      section2 &&
      section2.getBoundingClientRect().top <= mark &&
      section2.getBoundingClientRect().bottom >= mark
    ) {
      document.querySelector('a[href="#section2"]').classList.add("active");
    } else if (
      section3 &&
      section3.getBoundingClientRect().top <= mark &&
      section3.getBoundingClientRect().bottom >= mark
    ) {
      document.querySelector('a[href="#section3"]').classList.add("active");
    } else if (
      section4 &&
      section4.getBoundingClientRect().top <= mark &&
      section4.getBoundingClientRect().bottom >= mark
    ) {
      document.querySelector('a[href="#section4"]').classList.add("active");
    } else if (
      section5 &&
      section5.getBoundingClientRect().top <= mark &&
      section5.getBoundingClientRect().bottom >= mark
    ) {
      document.querySelector('a[href="#section5"]').classList.add("active");
    }
  }

  window.addEventListener("scroll", updateOnScroll);
  updateOnScroll();
});

/* ===================================== */
/* MUSIC PLAYER LOGIC - VERSION FIXED */
/* ===================================== */

// Global function untuk initialize music player
window.initMusicPlayer = function () {
  const audioPlayer = document.getElementById("audio-player");
  const playPauseBtn = document.getElementById("play-btn");
  const playIcon = document.getElementById("play-icon");
  const pauseIcon = document.getElementById("pause-icon");
  const prevBtn = document.getElementById("prev-btn");
  const nextBtn = document.getElementById("next-btn");

  // Cek apakah elemen dan data tersedia
  if (audioPlayer && playPauseBtn && window.songsData) {
    console.log("Initializing music player...");

    const songs = songsData;
    let currentSongIndex = 0;
    let isPlaying = false;

    const progressBar = document.getElementById("progress-bar");
    const trackTitleElement = document.getElementById("track-title");
    const trackArtistElement = document.getElementById("track-artist");
    const albumArt = document.getElementById("current-album-art");
    const currentTimeSpan = document.getElementById("current-time");
    const durationSpan = document.getElementById("duration");

    // Helper function untuk format waktu
    function formatTime(seconds) {
      if (isNaN(seconds) || seconds < 0) return "0:00";
      const mins = Math.floor(seconds / 60);
      const secs = Math.floor(seconds % 60);
      return `${mins}:${secs < 10 ? "0" : ""}${secs}`;
    }

    // Load song
    function loadSong(song) {
      console.log("Loading song:", song);

      if (trackTitleElement) trackTitleElement.textContent = song.title;
      if (trackArtistElement) trackArtistElement.textContent = song.artist;

      // Set cover image
      if (albumArt) {
        albumArt.src = song.cover;
        albumArt.onerror = function () {
          console.error("Failed to load album art:", song.cover);
          // Fallback image atau hide
          this.style.display = "none";
        };
      }

      // Set audio source
      audioPlayer.src = song.src;

      // Reset tampilan
      if (progressBar) progressBar.value = 0;
      if (currentTimeSpan) currentTimeSpan.textContent = "0:00";
      if (durationSpan) durationSpan.textContent = "0:00";

      // Reset play/pause state
      playIcon.style.display = "block";
      pauseIcon.style.display = "none";
      isPlaying = false;

      // Preload audio
      audioPlayer.load();
    }

    // Play song
    function playSong() {
      console.log("Attempting to play:", audioPlayer.src);

      audioPlayer
        .play()
        .then(() => {
          console.log("Playback started successfully");
          playIcon.style.display = "none";
          pauseIcon.style.display = "block";
          isPlaying = true;
        })
        .catch((error) => {
          console.error("Play failed:", error);
          alert(
            "Cannot play audio. Please check if the audio file exists and is accessible."
          );
          playIcon.style.display = "block";
          pauseIcon.style.display = "none";
          isPlaying = false;
        });
    }

    // Pause song
    function pauseSong() {
      audioPlayer.pause();
      playIcon.style.display = "block";
      pauseIcon.style.display = "none";
      isPlaying = false;
    }

    // Event listeners
    playPauseBtn.addEventListener("click", () => {
      if (audioPlayer.paused || audioPlayer.ended) {
        playSong();
      } else {
        pauseSong();
      }
    });

    nextBtn.addEventListener("click", () => {
      currentSongIndex = (currentSongIndex + 1) % songs.length;
      loadSong(songs[currentSongIndex]);
      if (isPlaying) {
        setTimeout(playSong, 100);
      }
    });

    prevBtn.addEventListener("click", () => {
      currentSongIndex = (currentSongIndex - 1 + songs.length) % songs.length;
      loadSong(songs[currentSongIndex]);
      if (isPlaying) {
        setTimeout(playSong, 100);
      }
    });

    // Progress bar update
    audioPlayer.addEventListener("timeupdate", function () {
      const currentTime = audioPlayer.currentTime;
      const duration = audioPlayer.duration;

      if (duration && !isNaN(duration)) {
        const progressPercent = (currentTime / duration) * 100;
        if (progressBar) progressBar.value = progressPercent;
        if (currentTimeSpan)
          currentTimeSpan.textContent = formatTime(currentTime);
      }
    });

    // Progress bar seek
    if (progressBar) {
      progressBar.addEventListener("input", function () {
        const duration = audioPlayer.duration;
        if (duration && !isNaN(duration)) {
          const seekTime = (progressBar.value / 100) * duration;
          audioPlayer.currentTime = seekTime;
        }
      });
    }

    // Update duration
    audioPlayer.addEventListener("loadedmetadata", function () {
      if (durationSpan && !isNaN(audioPlayer.duration)) {
        durationSpan.textContent = formatTime(audioPlayer.duration);
      }
    });

    // Audio ended
    audioPlayer.addEventListener("ended", function () {
      pauseSong();
    });

    // Audio error handling
    audioPlayer.addEventListener("error", function (e) {
      console.error("Audio error:", audioPlayer.error);
      console.error("Audio source:", audioPlayer.src);
    });

    // Load initial song
    loadSong(songs[currentSongIndex]);
  } else {
    console.log(
      "Music player elements or data not found, skipping initialization"
    );
    console.log("audioPlayer:", audioPlayer);
    console.log("playPauseBtn:", playPauseBtn);
    console.log("window.songsData:", window.songsData);
  }
};
