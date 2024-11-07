document.addEventListener('DOMContentLoaded', function () {
  // Burger menu

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

  const form = document.getElementById('contactForm');
  const spinner = document.getElementById('spinner');
  const confirmationMessage = document.getElementById('confirmationMessage');

  // Form
  form.addEventListener('submit', async function (event) {
    event.preventDefault();

    // Affiche le spinner
    spinner.style.display = 'block';

    // Envoie du formulaire
    const formData = new FormData(form);

    try {
      const response = await fetch('./handlers/contact_handler.php', {
        method: 'POST',
        body: formData,
      });

      // Cache le spinner une fois terminé
      spinner.style.display = 'none';

      if (response.ok) {
        // Affiche le message de confirmation
        confirmationMessage.style.display = 'block';
        form.reset();
      } else {
        alert("Erreur lors de l'envoi. Veuillez réessayer.");
      }
    } catch (error) {
      alert('Une erreur est survenue. Veuillez réessayer.');
      spinner.style.display = 'none';
    }
  });
});
