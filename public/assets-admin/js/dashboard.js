document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.testimonials-slider', {
        speed: 600,
        loop: false,
        autoplay: false,
        // {
        //     delay: 5000,
        //     disableOnInteraction: false
        // },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        // breakpoints: {
        //     320: {
        //         slidesPerView: 2,
        //         spaceBetween: 20
        //     },

        //     1200: {
        //         slidesPerView: 3,
        //         spaceBetween: 22
        //     }
        // }
    });

});
