<?php
session_start();
$conn = new mysqli("localhost", "root", "", "salon_de_beaute");

if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $conn->real_escape_string($_POST['nom']);
    $prenom = $conn->real_escape_string($_POST['prenom']);
    $email = $conn->real_escape_string($_POST['email']);
    $objet = $conn->real_escape_string($_POST['objet']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO messages (nom, prenom, email, objet, message) 
            VALUES ('$nom', '$prenom', '$email', '$objet', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message envoyé avec succès !";
    } else {
        echo "Erreur: " . $conn->error;
    }
}
?>