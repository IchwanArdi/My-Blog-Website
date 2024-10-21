const contact = document.querySelectorAll('.nav-link')[2];
contact.addEventListener('click', () => {
  alert('Maaf, kami sedang melakukan perbaikan. Halaman contact tidak dapat dilakukan saat ini. Harap coba lagi nanti');
});

const toggle = document.querySelector('.navbar-toggler');
const navLink = document.querySelectorAll('.nav-link');
toggle.addEventListener('click', () => {
  navLink.forEach(function (nav) {
    nav.style.color = 'white';
    nav.style.textAlign = 'left';
    nav.style.margin = '5px 0px';
  });
});
