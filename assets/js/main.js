document.addEventListener('DOMContentLoaded', function () {
  const mobileMenu = document.querySelector('.mobile-menu');
  const burgerButton = document.querySelector('.burger');

  burgerButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('show');
  });
});
