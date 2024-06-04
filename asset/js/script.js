// Liste des mots possibles
const mots = [
    "ordinateur", "programmation", "javascript", "algorithmique",
    "developpement", "interface", "bibliothèque", "fonction",
    "variable", "constante", "système", "logiciel", "application",
    "débogage", "compilation", "exécution", "asynchrone", "synchronisation",
    "protocole", "serveur", "client", "réseau", "projet", "version",
    "dépôt", "référentiel", "branche", "fusion", "rebase", "commit",
    "push", "pull", "clone", "fork", "build", "test", "déploiement",
    "conteneur", "microservices", "monolithe", "architecture",
    "design", "pattern", "singleton", "prototypage", "scalabilité",
    "performance", "optimisation", "sécurité", "cryptographie",
    "chiffrement", "authentification", "autorisation", "session",
    "cookie", "token", "api", "rest", "graphql", "http", "https",
    "url", "endpoint", "route", "middleware", "framework", "bibliothèque"
];

// Fonction pour générer un mot aléatoire
function genererMotAleatoire() {
    const indexAleatoire = Math.floor(Math.random() * mots.length);
    return mots[indexAleatoire];
}

// Exemple d'utilisation
let motPourJeuDePendu = genererMotAleatoire();
console.log("Mot généré pour le jeu de pendu:", motPourJeuDePendu);

// Variables globales
let vies = 6;
let lettresUtilisees = [];
let motCache = Array(motPourJeuDePendu.length).fill("_");

// Initialisation du jeu
function initialiserJeu() {
    vies = 6;
    lettresUtilisees = [];
    motCache = Array(motPourJeuDePendu.length).fill("_");
    motPourJeuDePendu = genererMotAleatoire();
    console.log("Nouveau mot généré pour le jeu de pendu:", motPourJeuDePendu);
    afficherMot();
    afficherVies();
    genererClavier();
}

// Fonction pour afficher le mot avec les lettres trouvées et les tirets
function afficherMot() {
    const motElement = document.getElementById("mot");
    motElement.innerText = motCache.join(" ");
}

// Fonction pour afficher le nombre de vies restantes
function afficherVies() {
    const viesElement = document.getElementById("vies");
    viesElement.innerText = "Vies restantes : " + vies;
}

// Fonction pour générer le clavier
function genererClavier() {
    const clavierElement = document.getElementById("clavier");
    clavierElement.innerHTML = ""; // Réinitialiser le clavier
    const alphabet = "abcdefghijklmnopqrstuvwxyz";
    for (let lettre of alphabet) {
        const bouton = document.createElement("button");
        bouton.innerText = lettre;
        bouton.addEventListener("click", () => verifierLettre(lettre, bouton));
        clavierElement.appendChild(bouton);
    }
}

// Fonction pour vérifier la lettre choisie par l'utilisateur
function verifierLettre(lettre, bouton) {
    if (lettresUtilisees.includes(lettre)) {
        return; // Si la lettre a déjà été utilisée, on ne fait rien
    }
    lettresUtilisees.push(lettre);

    const lettresTrouvees = motPourJeuDePendu.split("").map((char, index) => {
        if (char === lettre) {
            motCache[index] = lettre;
            return true;
        }
        return false;
    });

    if (lettresTrouvees.includes(true)) {
        afficherMot();
        if (!motCache.includes("_")) {
            alert("Félicitations ! Vous avez trouvé le mot.");
            initialiserJeu();
        }
    } else {
        vies--;
        afficherVies();
        if (vies === 0) {
            alert("Vous avez perdu ! Le mot était : " + motPourJeuDePendu);
            initialiserJeu();
        }
    }

    // Désactiver le bouton
    bouton.classList.add("desactive");
}

// Initialiser le jeu lors du chargement de la page
document.addEventListener("DOMContentLoaded", initialiserJeu);