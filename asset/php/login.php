<?php
session_start(); // Démarrage de la session (si ce n'est pas déjà fait)

// Paramètres de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "exercice_pendu_wks";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Récupération des données du formulaire
$email = $_POST['email'];
$mdp = $_POST['mdp'];

// Requête pour récupérer l'utilisateur correspondant à l'email
$sql = "SELECT * FROM utilisateurs WHERE email = ?";
$stmt = $connexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultat = $stmt->get_result();

if ($resultat->num_rows > 0) {
    $utilisateur = $resultat->fetch_assoc();
    // Vérification du mot de passe
    if (password_verify($mdp, $utilisateur['mdp'])) {
        // Authentification réussie
        $_SESSION['logged_in'] = true; // Marquer l'utilisateur comme connecté
        // Redirection vers la page de gestion du jeu (exemple : jeu.php)
        header("Location: jeu.php");
        exit();
    } else {
        // Mot de passe incorrect
        echo "Email ou mot de passe incorrect.";
    }
} else {
    // Utilisateur non trouvé
    echo "Email ou mot de passe incorrect.";
}

// Fermeture de la connexion
$stmt->close();
$connexion->close();
?>