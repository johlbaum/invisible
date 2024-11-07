<?php

require __DIR__ . '/../vendor/autoload.php';

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
        $mail->Username = 'contact@talentinvisbile.com';
        $mail->Password = 'Frenier77410';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Paramètres de l’e-mail
        $mail->setFrom('contact@talentinvisbile.com', 'Invisible');
        $mail->addAddress('contact@talentinvisbile.com');

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