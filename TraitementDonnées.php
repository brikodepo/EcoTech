<?php
// Vérification si les champs sont remplis
if(isset($_POST['username']) && isset($_POST['password'])){
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérification des identifiants (ceci est un exemple basique, veuillez utiliser des méthodes sécurisées en production)
    if($username == 'utilisateur' && $password == 'motdepasse'){
        // Authentification réussie, rediriger vers la page d'accueil (ou toute autre page souhaitée)
        header("Location: accueil.php");
        exit();
    } else {
        // Identifiants invalides, afficher un message d'erreur (ou rediriger vers une page d'erreur)
        echo "Identifiants incorrects. Veuillez réessayer.";
    }
} else {
    // Si les champs ne sont pas remplis, afficher un message d'erreur
    echo "Veuillez remplir tous les champs.";
}
?>