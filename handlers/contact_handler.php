<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..', '.env');
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $company = htmlspecialchars($_POST['company']);
    $contribution = htmlspecialchars($_POST['contribution']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $details = htmlspecialchars($_POST['details']);

    // Initialisation de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP de PHPMailer
        $mail->isSMTP();
        $mail->Host = 'ssl0.ovh.net';
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USERNAME'];
        $mail->Password = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Paramètres de l’e-mail
        $mail->setFrom($email, $name); // L'email de l'utilisateur et son nom dans l'en-tête

        $mail->addAddress('contact@talentinvisbile.com');

        $mail->Subject = "Demande de devis de $name";

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        // Corps du message en HTML
        $mail->Body = "
        <h3>Demande de devis de $name</h3>
        <p><strong>Nom:</strong> $name</p>
        <p><strong>Entreprise:</strong> $company</p>
        <p><strong>Contribution AGEFIPH:</strong> $contribution</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Téléphone:</strong> $phone</p>
        <p><strong>Détails:</strong> $details</p>
        ";

        // Envoi de l’e-mail
        if ($mail->send()) {
            echo "Votre demande a été envoyée avec succès.";
        } else {
            echo "Erreur lors de l'envoi de votre demande. Veuillez réessayer.";
        }
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
    }
} else {
    echo "Méthode de requête invalide.";
}
