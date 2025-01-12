document.addEventListener('DOMContentLoaded', function() {

    // $('body').hide()

    document.getElementById('mobile_menu_btn').addEventListener('click', function() {
        const navbar_mobile_menu = document.getElementById('navbar__mobile__menu');
        const mobile_menu_btn = document.getElementById('mobile_menu_btn').querySelector('.sandwich');
        navbar_mobile_menu.classList.toggle('show');
        mobile_menu_btn.classList.toggle('is-active');

        if (navbar_mobile_menu.classList.contains('show')) {
            document.querySelector('body').style.overflow = 'hidden';
        } else {
            document.querySelector('body').removeAttribute('style');
        }

    })

})