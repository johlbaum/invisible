<?php
// Chargement de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

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
        $mail->Host = 'smtp.ovh.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@invisbile.com'; // Votre adresse e-mail pro
        $mail->Password = 'Frenier77410'; // Mot de passe de l’e-mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Paramètres de l’e-mail
        $mail->setFrom('contact@invisbile.com', 'Invisible');
        $mail->addAddress('contact@invisbile.com'); // Destinataire

        $mail->Subject = "Demande de devis de $name";
        $mail->Body = "
        Nom: $name\n
        Entreprise: $company\n
        Contribution AGEFIPH: $contribution\n
        Email: $email\n
        Téléphone: $phone\n
        Détails: $details
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
