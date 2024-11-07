document.addEventListener('DOMContentLoaded', function () {
  // Burger menu
  const mobileMenu = document.querySelector('.mobile-menu');
  const burgerButton = document.querySelector('.burger');
  const menuLinks = document.querySelectorAll('.mobile-menu ul li a');

  if (burgerButton && mobileMenu) {
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
  }

  // Code pour le formulaire, seulement si le formulaire existe
  const form = document.getElementById('contactForm');
  if (form) {
    const submitButton = document.getElementById('submitButton');
    const spinner = document.getElementById('spinner-container');
    const confirmationMessage = document.getElementById('confirmationMessage');

    form.addEventListener('submit', function (event) {
      event.preventDefault();
      if (!validateForm()) {
        return;
      }
      submitButton.disabled = true;
      submitButton.textContent = 'Envoi en cours...';
      spinner.style.display = 'flex';

      const formData = new FormData(form);

      fetch(form.action, {
        method: 'POST',
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          if (data.includes('Votre demande a été envoyée avec succès')) {
            spinner.style.display = 'none';
            confirmationMessage.style.display = 'block';

            setTimeout(function () {
              window.location.href = 'index.php';
            }, 3000);
          } else {
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

    function validateForm() {
      let isValid = true;
      const name = document.getElementById('name');
      if (name.value.trim() === '') {
        alert('Veuillez entrer votre nom.');
        isValid = false;
      }

      const email = document.getElementById('email');
      const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!emailRegex.test(email.value)) {
        alert('Veuillez entrer un email valide.');
        isValid = false;
      }

      const phone = document.getElementById('phone');
      const phoneRegex = /^[0-9]{10}$/;
      if (!phoneRegex.test(phone.value)) {
        alert('Veuillez entrer un numéro de téléphone valide (10 chiffres).');
        isValid = false;
      }

      const contribution = document.getElementById('contribution');
      if (contribution.value.trim() === '' || isNaN(contribution.value)) {
        alert('Veuillez entrer une contribution valide.');
        isValid = false;
      }

      const details = document.getElementById('details');
      if (details.value.trim() === '') {
        alert('Veuillez entrer les détails de votre demande.');
        isValid = false;
      }

      return isValid;
    }
  }

  // Effet d'apparition section
  const sections = document.querySelectorAll('.fade-up');

  const observerOptions = {
    root: null, // Utilise la fenêtre du navigateur
    rootMargin: '0px',
    threshold: 0.3, // L'élément doit être visible à 30% pour être déclenché
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      console.log(entry.isIntersecting); // Ajouter un log pour voir si l'entrée devient visible
      if (entry.isIntersecting) {
        entry.target.classList.add('visible'); // Ajoute la classe visible quand la section est visible
        observer.unobserve(entry.target); // Arrêter d'observer l'élément une fois qu'il est visible
      }
    });
  }, observerOptions);

  sections.forEach((section) => {
    observer.observe(section);
  });
});
