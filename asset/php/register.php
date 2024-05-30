<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['prenom'];
    $last_name = $_POST['nom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $photo = '../image/default.jpg'; // Chemin par défaut pour la photo

    $stmt = $pdo->prepare("INSERT INTO utilisateurs (prenom, nom, email, mdp, photo) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$first_name, $last_name, $email, $password, $photo])) {
        header("Location: ../../index.html");
        exit();
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>
