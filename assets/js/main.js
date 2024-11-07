document.addEventListener('DOMContentLoaded', function () {
  // Burger menu
  const mobileMenu = document.querySelector('.mobile-menu');
  const burgerButton = document.querySelector('.burger');
  const menuLinks = document.querySelectorAll('.mobile-menu ul li a');

  burgerButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('show');
    burgerButton.classList.toggle('open');
  });

  menuLinks.forEach((link) => {
    link.addEventListener('click', () => {
      mobileMenu.classList.remove('show');
      burgerButton.classList.remove('open');
    });
  });

  // Mail
  const form = document.getElementById('contactForm');
  const spinner = document.getElementById('spinner');
  const confirmationMessage = document.getElementById('confirmationMessage');
  const submitButton = document.getElementById('submitButton');

  form.addEventListener('submit', function (event) {
    event.preventDefault(); // Empêche la soumission immédiate du formulaire

    // Désactive le bouton et affiche le spinner
    submitButton.disabled = true;
    submitButton.textContent = 'Envoi en cours...';
    spinner.style.display = 'inline-block';

    // Envoi du formulaire via AJAX pour éviter une redirection avant l'envoi
    const formData = new FormData(form);

    // Envoi du formulaire avec Fetch
    fetch(form.action, {
      method: 'POST',
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        // Vérifie la réponse du serveur
        if (data.includes('Votre demande a été envoyée avec succès')) {
          spinner.style.display = 'none';
          confirmationMessage.style.display = 'block';

          // Redirige après un délai pour permettre à l'utilisateur de voir le message
          setTimeout(function () {
            window.location.href = 'index.php'; // Redirection vers la page d'accueil
          }, 3000);
        } else {
          // En cas d'erreur
          alert("Erreur lors de l'envoi du message");
          submitButton.disabled = false;
          submitButton.textContent = 'Envoyer';
          spinner.style.display = 'none';
        }
      })
      .catch((error) => {
        console.error('Erreur:', error);
        alert('Erreur de connexion, veuillez réessayer.');
        submitButton.disabled = false;
        submitButton.textContent = 'Envoyer';
        spinner.style.display = 'none';
      });
  });
});
