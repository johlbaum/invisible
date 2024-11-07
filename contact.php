<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Contactez Invisible pour obtenir un devis personnalisé. Simplifiez votre politique handicap avec nos solutions de sensibilisation et d’inclusion, et optimisez vos coûts AGEFIPH tout en valorisant vos talents invisibles." />
    <meta name="keywords"
        content="Inclusion, sensibilisation, handicap, AGEFIPH, devis, entreprise, talents invisibles, formations inclusion" />

    <!-- Open Graph metadata -->
    <meta property="og:title" content="Invisible - Demandez un devis" />
    <meta property="og:description"
        content="Obtenez un devis personnalisé avec Invisible pour une politique d'inclusion efficace et un gain économique durable." />
    <meta property="og:image" content="assets/images/logo_2.svg" />
    <meta property="og:url" content="https://votre-site.com/contact.html" />
    <meta property="og:type" content="website" />

    <!-- Balises Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Invisible - Demandez un devis" />
    <meta name="twitter:description"
        content="Simplifiez votre politique handicap avec Invisible et valorisez vos talents invisibles." />
    <meta name="twitter:image" content="assets/images/logo_2.svg" />

    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />

    <!-- Page Title -->
    <title>Invisible - Demandez un devis</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/normalize.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Montserrat:wght@100..900&family=Open+Sans:wght@300..800&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b14f14ea95.js" crossorigin="anonymous"></script>


</head>

<body class="contact-page">
    <?php include 'includes/header.php'; ?>
    <main>
        <section class="contact">
            <div class="header__secondary">
                <h1 class="header__secondary-title">Demande de devis</h1>
            </div>
            <div class="contact__wrapper">
                <div class="form__container">
                    <form action="handlers/contact_handler.php" method="post" id="contactForm" autocomplete="off">
                        <div class="form-group">
                            <input type="text" id="name" name="name" placeholder="Nom" required
                                autocomplete="one-time-code" autocorrect="off" autocapitalize="off" />
                        </div>
                        <div class="form-group">
                            <input type="text" id="company" name="company" placeholder="Entreprise" required
                                autocomplete="one-time-code" autocorrect="off" autocapitalize="off" />
                        </div>
                        <div class="form-group">
                            <input type="number" id="contribution" name="contribution"
                                placeholder="Contribution AGEFIPH annuelle" required autocomplete="one-time-code"
                                autocorrect="off" autocapitalize="off" />
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" placeholder="Email" required
                                autocomplete="one-time-code" autocorrect="off" autocapitalize="off" />
                        </div>
                        <div class="form-group">
                            <input type="tel" id="phone" name="phone" placeholder="Téléphone" required
                                autocomplete="one-time-code" autocorrect="off" autocapitalize="off" />
                        </div>
                        <div class="form-group">
                            <textarea id="details" name="details" placeholder="Détails de votre demande" rows="4"
                                required autocomplete="one-time-code" autocorrect="off" autocapitalize="off"></textarea>
                        </div>
                        <button type="submit" id="submitButton" class="btn-filled">Envoyer ma demande</button>
                    </form>


                    <!-- Spinner -->
                    <div id="spinner-container" style="display: none;">
                        <div class="spinner"></div>
                    </div>

                    <!-- Message de confirmation -->
                    <div id="confirmationMessage" class="confirmation-message" style="display: none;">
                        <p>Votre demande a bien été envoyée. Nous vous contacterons sous peu.</p>
                        <p>Vous allez être redirigé vers la page d'accueil...</p>
                    </div>
                </div>
        </section>
    </main>
    <?php include 'includes/footer.php'; ?>
    <!-- Main JS -->
    <script src="assets/js/main.js" defer></script>
</body>

</html>