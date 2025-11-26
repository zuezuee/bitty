<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>bitty</title>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@400;700&display=swap" rel="stylesheet">
    
    <link href="<?php echo base_url('public/assets/css/landing.css'); ?>" rel="stylesheet">
    
    <style>
        #home {
            background-image: url('<?php echo base_url("public/assets/home_bg.png"); ?>');
        }
        
        .features-content-wrapper {
        background-image: url('<?php echo base_url("public/assets/.png"); ?>');
        background-size: cover;
        background-position: center bottom;
        background-repeat: no-repeat;
        min-height: 600px;
        margin-top: -100px; 
    }
    </style>
</head>
<body>
    <header id="main-header">
        <div class="navbar">
            <div class="nav-left">
                <img src="<?php echo base_url('public/assets/bittylogo.png'); ?>" alt="Logo Bitty" class="header-logo">
            </div>
            <div class="nav-center">
                <a href="#home">Home</a>
                <a href="#features">Features</a>
                <a href="#about">About</a>
            </div>
            <div class="nav-right">
                <a href="#" class="login-btn">Login</a>
            </div>
        </div>
    </header>

    <section id="home">
        <?php $this->load->view($home); ?> 
        <div class="home-bottom-gradient"></div>
    </section>

    <section id="features">
        <div class="carousel-container">
            <div class="carousel-track">
                <img src="<?php echo base_url('public/assets/carousel/ESTJ_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/ENFJ_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/ENTP_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/ISFJ_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/ENFP_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/ISTP_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/ESFP_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/ESFJ_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/ESTP_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/INTP_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/INTJ_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/ISTJ_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/ENTJ_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/ISFP_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/INFP_card.png'); ?>" class="carousel-img">
                <img src="<?php echo base_url('public/assets/carousel/INFJ_card.png'); ?>" class="carousel-img">
            </div>
        </div>
        <h2 class="features-title">FEATURES</h2>
        <div class="features-content-wrapper">
            <?php $this->load->view($features); ?>
        </div>
    </section>

    <section id="about">
        <?php $this->load->view($about); ?>
    </section>

    <!-- Footer Section -->
    <footer id="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="<?php echo base_url('public/assets/bittylogo.png'); ?>" alt="Logo Bitty">
                <p>Discover your personality vibes</p>
            </div>
            <div class="footer-links">
                <div class="footer-column">
                    <h4>Product</h4>
                    <a href="#features">Features</a>
                    <a href="#about">About</a>
                    <a href="#pricing">Pricing</a>
                </div>
                <div class="footer-column">
                    <h4>Support</h4>
                    <a href="#help">Help Center</a>
                    <a href="#contact">Contact</a>
                    <a href="#faq">FAQ</a>
                </div>
                <div class="footer-column">
                    <h4>Legal</h4>
                    <a href="#privacy">Privacy Policy</a>
                    <a href="#terms">Terms of Service</a>
                    <a href="#cookies">Cookies</a>
                </div>
            </div>
            <div class="footer-social">
                <h4>Follow Us</h4>
                <div class="social-icons">
                    <a href="#"><img src="<?php echo base_url('public/assets/instagram.png'); ?>" alt="Instagram"></a>
                    <a href="#"><img src="<?php echo base_url('public/assets/twitter.png'); ?>" alt="Twitter"></a>
                    <a href="#"><img src="<?php echo base_url('public/assets/facebook.png'); ?>" alt="Facebook"></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Bitty. All rights reserved.</p>
        </div>
    </footer>

    <!-- Login Popup -->
<div id="login-popup" class="popup-wrapper">
    <div class="login-box">
        <span class="close-login-popup">&times;</span>
        <h2>Login</h2>
        <form>
            <input type="text" placeholder="Enter your MBTI" required>
            <input type="email" placeholder="Enter your email" required>
            <input type="password" placeholder="Enter your password" required>
            
            <button type="button" class="login-submit-btn" onclick="window.location.href='<?php echo site_url('mainpage'); ?>'">
    Login</button>
            
            <div class="login-footer">
                <p>Don't have an account? <a href="#" id="go-to-signup">Sign Up</a></p>
                <a href="#" class="admin-login">Login as Admin</a>
            </div>
        </form>
    </div>
</div>
<script>
// Simple login popup functionality
document.addEventListener('DOMContentLoaded', function() {
    const loginBtn = document.querySelector('.login-btn');
    const loginPopup = document.getElementById('login-popup');
    const closeLoginBtn = document.querySelector('.close-login-popup');

    if (loginBtn && loginPopup && closeLoginBtn) {
        loginBtn.addEventListener('click', function(e) {
            e.preventDefault();
            loginPopup.style.display = 'flex';
        });

        closeLoginBtn.addEventListener('click', function() {
            loginPopup.style.display = 'none';
        });

        loginPopup.addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        });
    }
});
</script>

    <script src="<?php echo base_url('public/assets/js/landing.js'); ?>"></script>
</body>
</html>