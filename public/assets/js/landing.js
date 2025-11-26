document.addEventListener('DOMContentLoaded', function () {

    const header = document.getElementById('main-header');
    const navLinks = document.querySelectorAll('.nav-center a');

    // SIGNUP POPUP
    const openBtn = document.getElementById("open-signup");
    const popup = document.getElementById("signup-popup");
    const closeBtn = popup ? popup.querySelector(".close-popup") : null;

    function updateOnScroll() {

        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        if (window.scrollY < 50) {
            navLinks.forEach(link => link.classList.remove('active'));
            return;
        }

        const home = document.getElementById('home').getBoundingClientRect();
        const features = document.getElementById('features').getBoundingClientRect();
        const about = document.getElementById('about').getBoundingClientRect();

        navLinks.forEach(link => link.classList.remove('active'));

        const mark = 150;

        if (home.top <= mark && home.bottom >= mark) {
            document.querySelector('a[href="#home"]').classList.add('active');
        }
        else if (features.top <= mark && features.bottom >= mark) {
            document.querySelector('a[href="#features"]').classList.add('active');
        }
        else if (about.top <= mark && about.bottom >= mark) {
            document.querySelector('a[href="#about"]').classList.add('active');
        }
    }

    window.addEventListener('scroll', updateOnScroll);
    updateOnScroll();


    // SIGN UP POPUP
    if (openBtn && popup && closeBtn) {

        openBtn.addEventListener("click", function (e) {
            e.preventDefault();
            popup.style.display = "flex";
        });

        closeBtn.addEventListener("click", function () {
            popup.style.display = "none";
        });

        window.addEventListener("click", function (e) {
            if (e.target === popup) {
                popup.style.display = "none";
            }
        });
    }

});
