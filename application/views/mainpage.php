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
        <div class="section-content">
            <h1>Section 4</h1>
            <p>Content for section 4</p>
        </div>
    </section>

    <!-- Section 5 -->
    <section id="section5" class="main-section">
        <div class="section-content">
            <h1>Section 5</h1>
            <p>Content for section 5</p>
        </div>
    </section>

    <!-- Load mainpage.js (tidak perlu landing.js) -->
    <script src="<?php echo base_url('public/assets/js/mainpage.js'); ?>"></script>
</body>
</html>