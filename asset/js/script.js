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
const motPourJeuDePendu = genererMotAleatoire();
console.log("Mot généré pour le jeu de pendu:", motPourJeuDePendu);