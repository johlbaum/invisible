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

  // Formulaire
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
  if (window.innerWidth > 992) {
    const sections = document.querySelectorAll('.fade-up');
    const observerOptions = {
      root: null, // Utilise la fenêtre du navigateur
      rootMargin: '0px',
      threshold: 0.3, // L'élément doit être visible à 30% pour être déclenché
    };

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        console.log(entry.isIntersecting);
        if (entry.isIntersecting) {
          entry.target.classList.add('visible'); // Ajoute la classe visible quand la section est visible
          observer.unobserve(entry.target); // Arrêter d'observer l'élément une fois qu'il est visible
        }
      });
    }, observerOptions);

    sections.forEach((section) => {
      observer.observe(section);
    });
  } else {
    // Enlevez directement les classes d'animation pour les petits écrans
    document.querySelectorAll('.fade-up').forEach((section) => {
      section.classList.add('visible');
    });
  }

  // Fonction principale pour ajuster les hauteurs des éléments
  function adjustHeights() {
    const cardTitles = document.querySelectorAll('.our-offers__card-title');
    const cardTaglines = document.querySelectorAll('.our-offers__card-tagline');
    const cardDescriptions = document.querySelectorAll(
      '.our-offers__card-description',
    );

    // Fonction pour obtenir la hauteur maximale d'un groupe d'éléments
    function getMaxHeight(elements) {
      let maxHeight = 0;
      elements.forEach((element) => {
        element.style.height = 'auto'; // Réinitialise la hauteur avant mesure
        maxHeight = Math.max(maxHeight, element.offsetHeight);
      });
      return maxHeight;
    }

    // Fonction pour appliquer une hauteur maximale à un groupe d'éléments
    function setMaxHeight(elements, height) {
      elements.forEach((element) => {
        element.style.height = `${height}px`;
      });
    }

    // Ajuste la hauteur des titres
    const maxTitleHeight = getMaxHeight(cardTitles);
    setMaxHeight(cardTitles, maxTitleHeight);

    // Ajuste la hauteur des sous-titres
    const maxTaglineHeight = getMaxHeight(cardTaglines);
    setMaxHeight(cardTaglines, maxTaglineHeight);

    // Ajuste la hauteur des descriptions
    const maxDescriptionHeight = getMaxHeight(cardDescriptions);
    setMaxHeight(cardDescriptions, maxDescriptionHeight);
  }

  // Initialisation du ResizeObserver pour surveiller les changements de taille
  const container = document.querySelector('.our-offers__cards-wrapper');
  if (container) {
    const resizeObserver = new ResizeObserver(() => {
      adjustHeights();
    });

    // Observe le conteneur principal
    resizeObserver.observe(container);
  }

  // Ajuste les hauteurs une fois la page chargée
  window.addEventListener('load', adjustHeights);

  // Optionnel : Gestion du redimensionnement avec debounce pour plus de performances
  function debounce(func, delay) {
    let timeout;
    return function (...args) {
      clearTimeout(timeout);
      timeout = setTimeout(() => func(...args), delay);
    };
  }

  window.addEventListener('resize', debounce(adjustHeights, 200));
});
