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

	<!-- Main JS -->
	<script src="assets/js/main.js" defer></script>
</head>

<body>
	<?php include 'includes/header.php'; ?>
	<main>
		<section class="offers-page">
			<h1 id="formules">Demande de devis</h1>
			<div class="container">
				<form action="handlers/contact_handler.php" method="post" id="contactForm">
					<div class="form-group">
						<label for="name">Nom :</label>
						<input type="text" id="name" name="name" required />
					</div>
					<div class="form-group">
						<label for="company">Entreprise :</label>
						<input type="text" id="company" name="company" required />
					</div>
					<div class="form-group">
						<label for="contribution">Contribution AGEFIPH annuelle :</label>
						<input type="number" id="contribution" name="contribution" required />
					</div>
					<div class="form-group">
						<label for="email">Email :</label>
						<input type="email" id="email" name="email" required />
					</div>
					<div class="form-group">
						<label for="phone">Téléphone :</label>
						<input type="tel" id="phone" name="phone" required />
					</div>
					<div class="form-group">
						<label for="details">Détails de votre demande :</label>
						<textarea id="details" name="details" rows="4" required></textarea>
					</div>
					<button type="submit" id="submitButton">Envoyer</button>
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
</body>

</html>