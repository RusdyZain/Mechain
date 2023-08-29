ScrollReveal().reveal('.loginBox h2', {
    scale: 2,
    duration: 3000,
    delay: 500,
    mobile: false,
});

ScrollReveal().reveal('.information h2', {
    reset: true,
    duration: 1500,
    delay: 500,
    origin: 'left',
    distance: '50px',
});

ScrollReveal().reveal('.information-cards', {
    duration: 1500,
});

ScrollReveal().reveal('.section-title-inf', {
    reset: true,
    duration: 1500,
    delay: 500,
    origin: 'left',
    distance: '50px',
});

const swiper = new Swiper('.swiper1', {
    direction: 'horizontal',
    loop: true,
    speed: 600,
    slidesPerView: 6,
    spaceBetween: 10,
    breakpoints: {
        320: {
            slidesPerView: 1,
        },
        655: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        960: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1335: {
            slidesPerView: 6,
            spaceBetween: 10,
        },
    },
});

function logout() {
    if (confirm("Apakah Anda yakin ingin keluar?")) {
      document.getElementById("logoutForm").submit();
    }
  }