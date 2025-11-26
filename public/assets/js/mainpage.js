document.addEventListener('DOMContentLoaded', function () {
    const header = document.getElementById('main-header');
    const navLinks = document.querySelectorAll('.nav-center a');

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

        const section1 = document.getElementById('section1');
        const section2 = document.getElementById('section2');
        const section3 = document.getElementById('section3');
        const section4 = document.getElementById('section4');
        const section5 = document.getElementById('section5');

        navLinks.forEach(link => link.classList.remove('active'));

        const mark = 150;

        if (section1 && section1.getBoundingClientRect().top <= mark && section1.getBoundingClientRect().bottom >= mark) {
            document.querySelector('a[href="#section1"]').classList.add('active');
        }
        else if (section2 && section2.getBoundingClientRect().top <= mark && section2.getBoundingClientRect().bottom >= mark) {
            document.querySelector('a[href="#section2"]').classList.add('active');
        }
        else if (section3 && section3.getBoundingClientRect().top <= mark && section3.getBoundingClientRect().bottom >= mark) {
            document.querySelector('a[href="#section3"]').classList.add('active');
        }
        else if (section4 && section4.getBoundingClientRect().top <= mark && section4.getBoundingClientRect().bottom >= mark) {
            document.querySelector('a[href="#section4"]').classList.add('active');
        }
        else if (section5 && section5.getBoundingClientRect().top <= mark && section5.getBoundingClientRect().bottom >= mark) {
            document.querySelector('a[href="#section5"]').classList.add('active');
        }
    }

    window.addEventListener('scroll', updateOnScroll);
    updateOnScroll();
});