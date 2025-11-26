<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bitty - Main Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Load landing.css untuk header/navbar -->
    <link href="<?php echo base_url('public/assets/css/landing.css'); ?>" rel="stylesheet">
    <!-- Load mainpage.css untuk sections -->
    <link href="<?php echo base_url('public/assets/css/mainpage.css'); ?>" rel="stylesheet">

    <style>
        #section1 {
            background-image: url('<?php echo base_url("public/assets/background_mainpage.png"); ?>');
        }
        #section2 {
            background-image: url('<?php echo base_url("public/assets/background_sparkmyday.png"); ?>');
        }
    </style>
</head>
<body>
    <!-- Header yang sama seperti welcome message -->
    <header id="main-header">
        <div class="navbar">
            <div class="nav-left">
                <img src="<?php echo base_url('public/assets/bittylogo.png'); ?>" alt="Logo Bitty" class="header-logo">
            </div>
            <div class="nav-center">
                <a href="#section1">Homepage</a>
                <a href="#section2">SparkMyDay</a>
                <a href="#section3">LoveOMeter</a>
                <a href="#section4">SongPicks</a>
                <a href="#section5">YourLooks</a>
            </div>
            <div class="nav-right">
                <a href="#" class="login-btn">Profile</a>
            </div>
        </div>
    </header>

    <!-- Section 1 -->
<section id="section1" class="main-section">
    <div class="section1-top-content">
        <div class="section1-container">
            <!-- Bagian kiri untuk judul -->
            <div class="section1-left">
                <h1 class="section1-title">Hello, bright<br>spark! Let's make<br>today fun</h1>
                <p class="section1-subtitle">What vibe are we creating today?</p>
            </div>
            
            <!-- Bagian kanan untuk gambar -->
            <div class="section1-right">
                <img src="<?php echo base_url('public/assets/ENTP_char.transbg.png'); ?>" alt="Fun Image" class="section1-image">
            </div>
        </div>
    </div>
    
    <!-- Container feature DI BAWAH judul dan gambar -->
    <div class="feature-container-wrapper">
        <div class="feature-container">
            <div class="feature-card">
                <img src="<?php echo base_url('public/assets/ENTJ_char.transbg.png'); ?>" alt="Feature 1">
                <p>Spark My Day!</p>
            </div>
            <div class="feature-card">
                <img src="<?php echo base_url('public/assets/ENFP_char.transbg.png'); ?>" alt="Feature 2">
                <p>Love-o-Meter</p>
            </div>
            <div class="feature-card">
                <img src="<?php echo base_url('public/assets/ISTJ_char.transbg.png'); ?>" alt="Feature 3">
                <p>Song Picks</p>
            </div>
            <div class="feature-card">
                <img src="<?php echo base_url('public/assets/ESFJ_char.transbg.png'); ?>" alt="Feature 4">
                <p>ENTP Looks</p>
            </div>
        </div>
    </div>
</section>
    </section>

    <!-- Section 2 -->
    <section id="section2" class="main-section">
        <div class="phrase-box" id="phraseBox">
    <?= $phrase['text'] ?? 'No phrase found' ?>
</div>
<div class="right-box">
    <div class="spark-title">Spark My Day</div>
    <div class="spark-desc">A little spark to light your mood</div>
<button id="sparkBtn">Spark Me</button>
</div>
    </section>

    <!-- Section 3 -->
    <section id="section3" class="main-section">
    <div class="loveometer-container">
        
        <div class="loveometer-header">
            <h1 class="loveometer-title">Love-O-Meter</h1>
            <p class="loveometer-subtitle">Love vibes loading...</p>
        </div>
        <div class="loveometer-content">
            <div class="loveometer-left">
                <input type="text" id="name1" placeholder="ENTP" class="loveometer-input" readonly>
                <input type="text" id="name2" placeholder="Enter MBTI" class="loveometer-input">
                <button class="loveometer-calculate-btn">Calculate</button>
            </div>
            
            <div class="loveometer-right">
                <div class="loveometer-heart-box">
                    <span class="loveometer-percentage">100%</span>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Section 4 -->
    <section id="section4" class="main-section">
        <div class="songpicks-container">
            <!-- Left Side -->
            <div class="songpicks-left">
                <h1 class="songpicks-title">Song Picks</h1>
                <p class="songpicks-subtitle">Your ENTP-approved jam for today!</p>
                
                <!-- Music Player Card -->
                <div class="music-player-card">
                    <div class="player-content">
                        <div class="album-art">
                            <!-- Placeholder image, user to replace -->
                            <img src="<?php echo base_url('public/assets/songcover_dualipa.jpg'); ?>" id="current-album-art" alt="Album Art" onerror="this.style.display='none';">
                        </div>
                        <div class="track-info">
                            <h2 id="track-title">Levitating</h2>
                            <p id="track-artist">Dua Lipa</p>
                            
                            <div class="player-controls">
                                <button id="prev-btn" class="control-btn">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="white"><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg>
                                </button>
                                <button id="play-btn" class="control-btn play-btn">
                                    <svg id="play-icon" width="24" height="24" viewBox="0 0 24 24" fill="white"><path d="M8 5v14l11-7z"/></svg>
                                    <svg id="pause-icon" width="24" height="24" viewBox="0 0 24 24" fill="white" style="display:none;"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                </button>
                                <button id="next-btn" class="control-btn">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="white"><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg>
                                </button>
                            </div>
                            
                            <div class="progress-container">
                                <span id="current-time">0:00</span>
                                <input type="range" id="progress-bar" value="0" min="0" max="100">
                                <span id="duration">3:25</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Other Albums Grid -->
                <div class="other-albums">
                    <div class="album-small">
                        <img src="<?php echo base_url('public/assets/albumcover_onedirection.jpg'); ?>" alt="Album 2" onerror="this.style.display='none';">
                    </div>
                    <div class="album-small">
                        <img src="<?php echo base_url('public/assets/albumcover_neckdeep.jpg'); ?>" alt="Album 3" onerror="this.style.display='none';">
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="songpicks-right">
                <h1 class="playlist-title">Playlist</h1>
                <div class="playlist-list">
                    <!-- 6 Empty Slots as per design -->
                    <div class="playlist-item"></div>
                    <div class="playlist-item"></div>
                    <div class="playlist-item"></div>
                    <div class="playlist-item"></div>
                    <div class="playlist-item"></div>
                    <div class="playlist-item"></div>
                </div>
            </div>
        </div>
        
        <!-- Hidden Audio Element -->
        <audio id="audio-player"></audio>
    </section>

    <!-- Data songs yang dipassing dari PHP ke JavaScript -->
    <script>
    // Explicitly define as window property to ensure global scope
    window.songsData = [
        {
            title: "Levitating",
            artist: "Dua Lipa",
            cover: "<?php echo base_url('public/assets/songcover_dualipa.jpg'); ?>",
            src: "<?php echo base_url('public/assets/Dualipa_Levitating.mp3'); ?>"
        },
        {
            title: "Midnight Memories", 
            artist: "One Direction",
            cover: "<?php echo base_url('public/assets/albumcover_onedirection.jpg'); ?>",
            src: "<?php echo base_url('public/assets/midnight-preview.mp3'); ?>"
        }
    ];
    
    // Base URL untuk JavaScript
    window.baseUrl = "<?php echo base_url(); ?>";
    
    console.log('songsData defined:', window.songsData);
    
    // Initialize music player setelah DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOMContentLoaded fired, calling initMusicPlayer');
            if (typeof initMusicPlayer === 'function') {
                initMusicPlayer();
            } else {
                console.error('initMusicPlayer function not found!');
            }
        });
    } else {
        // DOM already loaded
        console.log('DOM already loaded, calling initMusicPlayer immediately');
        if (typeof initMusicPlayer === 'function') {
            initMusicPlayer();
        } else {
            console.error('initMusicPlayer function not found!');
        }
    }
    </script>

   <!-- Section 5 -->
<section id="section5" class="main-section">
    <div class="yourlooks-container">
        <div class="yourlooks-header">
            <h1 class="yourlooks-title">Your MBTI, Your Style</h1>
            <p class="yourlooks-subtitle">Style recommendations made uniquely for you</p>
        </div>
        
        <div class="yourlooks-images">
            <div class="style-image-item">
                <img src="<?php echo base_url('public/assets/entplooks_1.png'); ?>" alt="Style 1" class="style-img">
            </div>
            <div class="style-image-item">
                <img src="<?php echo base_url('public/assets/entplooks_2.png'); ?>" alt="Style 2" class="style-img">
            </div>
            <div class="style-image-item">
                <img src="<?php echo base_url('public/assets/entplooks_3.png'); ?>" alt="Style 3" class="style-img">
            </div>
        </div>
        <div class="yourlooks-button">
            <button class="more-looks-btn">More Looks</button>
        </div>
    </div>
</section>

    <!-- Load mainpage.js (tidak perlu landing.js) -->
    <script src="<?php echo base_url('public/assets/js/mainpage.js'); ?>"></script>
</body>
</html>