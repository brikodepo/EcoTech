<?php


ini_set('display_errors', TRUE);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Établissez une connexion à votre base de données MySQL en utilisant vos informations de connexion
    $hostname = "localhost"; // L'adresse du serveur MySQL (ex: localhost)
    $db_username = "root"; // Votre nom d'utilisateur MySQL
    $db_password = "root"; // Votre mot de passe MySQL
    $database = "connexion_db"; // Le nom de votre base de données MySQL

    $connection = new mysqli($hostname, $db_username, $db_password, $database);

    // Vérifiez la connexion
    if ($connection->connect_error) {
        die("Échec de la connexion à la base de données : " . $connection->connect_error);
    }

    // Évitez les attaques par injection SQL en utilisant des requêtes préparées
    $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Exécutez la requête préparée
    $stmt->execute();

    // Récupérez le résultat
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // L'utilisateur est authentifié avec succès.
        // Vous pouvez rediriger l'utilisateur vers la page de succès ou la page d'accueil.
        header("Location: index.html");
        exit();
    } else {
        echo "Échec de la connexion. Veuillez réessayer.";
    }

    // Fermez la connexion à la base de données
    $stmt->close();
    $connection->close();
}
?>
