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
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

// Vérification si l'utilisateur existe déjà
$sql = "SELECT * FROM utilisateurs WHERE email = ?";
$stmt = $connexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultat = $stmt->get_result();

if ($resultat->num_rows > 0) {
    // L'utilisateur existe déjà, redirection avec un message d'erreur
    header("Location: connexion.php?error=email_exists");
    exit();
} else {
    // Hachage du mot de passe
    $mdp_hache = password_hash($mdp, PASSWORD_BCRYPT);

    // Insertion de l'utilisateur dans la base de données
    $sql = "INSERT INTO utilisateurs (nom, prenom, email, mdp) VALUES (?, ?, ?, ?)";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("ssss", $nom, $prenom, $email, $mdp_hache);

    if ($stmt->execute()) {
        // Inscription réussie
        echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
        // Redirection vers la page de connexion (exemple : connexion.php)
        header("Location: jeu.php?success=registered");
        exit();
    } else {
        // Erreur lors de l'insertion
        echo "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
    }
}

// Fermeture de la connexion
$stmt->close();
$connexion->close();
?>