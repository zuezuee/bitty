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
            <p>&copy; 2025 Bitty. All rights reserved.</p>
        </div>
    </footer>

    <!-- Flash Messages -->
    <?php if($this->session->flashdata('error')): ?>
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; text-align: center; position: fixed; top: 0; width: 100%; z-index: 1000;">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('success')): ?>
        <div style="background-color: #d4edda; color: #155724; padding: 10px; text-align: center; position: fixed; top: 0; width: 100%; z-index: 1000;">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Login Popup -->
    <div id="login-popup" class="popup-wrapper">
        <div class="login-box">
            <span class="close-login-popup">&times;</span>
            <h2>Login</h2>
            <?php echo form_open('bittycontroller/login'); ?>

                <div class="form-group">
                    <input type="email" name="email" placeholder="Enter your email" value="<?php echo set_value('email'); ?>" required>
                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                </div>
                
                <div class="form-group">
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                </div>
                
                <button type="submit" class="login-submit-btn">Login</button>
                
                <div class="login-footer">
                    <p>Don't have an account? <a href="#" id="go-to-signup">Sign Up</a></p>

                </div>
            <?php echo form_close(); ?>
        </div>
    </div>

    <!-- Signup Popup -->
    <div id="signup-popup" class="popup-wrapper" style="display:none;">
        <div class="login-box">
            <span class="close-login-popup">&times;</span> 
            <h2>Sign Up</h2>
            <?php echo form_open('bittycontroller/register'); ?>
                <div class="form-group">
                    <input type="text" name="name" placeholder="Enter your Name" value="<?php echo set_value('name'); ?>" required>
                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" name="mbti" placeholder="Enter your MBTI" value="<?php echo set_value('mbti'); ?>" required>
                    <?php echo form_error('mbti', '<div class="error">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <input type="email" name="email" placeholder="Enter your email" value="<?php echo set_value('email'); ?>" required>
                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                </div>
                
                <div class="form-group">
                    <input type="password" name="password" placeholder="Create a password" required>
                    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                </div>
                
                <button type="submit" class="login-submit-btn">Sign Up</button>
                
                <div class="login-footer">
                    <p>Already have an account? <a href="#" id="go-to-login">Login</a></p>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
<script>
// Simple login popup functionality
document.addEventListener('DOMContentLoaded', function() {
    const loginBtn = document.querySelector('.login-btn');
    const loginPopup = document.getElementById('login-popup');
    const closeLoginBtn = document.querySelector('.close-login-popup');
    
    // Signup elements
    const signupPopup = document.getElementById('signup-popup');
    const closeSignupBtn = signupPopup ? signupPopup.querySelector('.close-login-popup') : null;
    const goToSignupBtn = document.getElementById('go-to-signup');
    const goToLoginBtn = document.getElementById('go-to-login');

    // Open Login
    if (loginBtn && loginPopup) {
        loginBtn.addEventListener('click', function(e) {
            e.preventDefault();
            loginPopup.style.display = 'flex';
        });
    }

    // Close Login
    if (closeLoginBtn) {
        closeLoginBtn.addEventListener('click', function() {
            loginPopup.style.display = 'none';
        });
    }

    // Close Signup
    if (closeSignupBtn) {
        closeSignupBtn.addEventListener('click', function() {
            signupPopup.style.display = 'none';
        });
    }

    // Switch to Signup
    if (goToSignupBtn) {
        goToSignupBtn.addEventListener('click', function(e) {
            e.preventDefault();
            loginPopup.style.display = 'none';
            signupPopup.style.display = 'flex';
        });
    }

    // Switch to Login
    if (goToLoginBtn) {
        goToLoginBtn.addEventListener('click', function(e) {
            e.preventDefault();
            signupPopup.style.display = 'none';
            loginPopup.style.display = 'flex';
        });
    }

    // Close on outside click
    window.addEventListener('click', function(e) {
        if (e.target === loginPopup) {
            loginPopup.style.display = 'none';
        }
        if (e.target === signupPopup) {
            signupPopup.style.display = 'none';
        }
    });
});
</script>

    <script src="<?php echo base_url('public/assets/js/landing.js'); ?>"></script>
</body>
</html>