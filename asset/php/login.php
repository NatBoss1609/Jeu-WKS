<?php
require 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['mdp'])) {
        $_SESSION['user_id'] = $user['id_utilisateur'];
        header("Location: ../../index.html");
        exit();
    } else {
        echo "Identifiants incorrects.";
    }
}
?>
