<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécurisation des données reçues
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validation des données
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "Tous les champs sont requis."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Adresse email non valide."]);
        exit;
    }

    // Informations de l'email
    $to = "ton-email@example.com"; // Remplace par ton adresse
    $body = "Nom : $name\nEmail : $email\nSujet : $subject\n\nMessage :\n$message";
    $headers = "From: $email\r\nReply-To: $email";

    // Envoi de l'email
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["status" => "success", "message" => "Message envoyé avec succès !"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi. Veuillez réessayer."]);
    }
}
?>
