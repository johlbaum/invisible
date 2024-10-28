document.addEventListener('DOMContentLoaded', function () {
  const mobileMenu = document.querySelector('.mobile-menu');
  const burgerButton = document.querySelector('.burger');
  const menuLinks = document.querySelectorAll('.mobile-menu ul li a');

  // Ouvrir/Fermer le menu quand on clique sur le bouton burger
  burgerButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('show');
    burgerButton.classList.toggle('open');
  });

  // Fermer le menu mobile quand on clique sur un lien du menu
  menuLinks.forEach((link) => {
    link.addEventListener('click', () => {
      mobileMenu.classList.remove('show');
      burgerButton.classList.remove('open');
    });
  });
});
