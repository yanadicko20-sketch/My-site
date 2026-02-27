<?php
$conn = new mysqli("localhost", "root", "", "salon_de_beaute");

if ($conn->connect_error) die("Erreur: ".$conn->connect_error);

$username = "admin"; // Nom d'utilisateur que tu utiliseras pour te connecter
$password = password_hash("123456", PASSWORD_DEFAULT); // mot de passe

$sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
$conn->query($sql);
$conn->close();

echo "Admin créé avec succès !";
?>