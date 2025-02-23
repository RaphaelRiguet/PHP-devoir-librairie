<?php
if (!isset($_GET['titre']) || !isset($_GET['prix'])) {
    header('Location: livres.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - Bibliothèque en ligne</title>

</head>
<body>
    <header>
        <a href="home.php">Accueil</a>
        <a href="livres.php">Livres</a>
    </header>

    <?php
    $titre = $_GET['titre'];
    $prix = $_GET['prix'];

    echo "<h2>Paiement</h2>";
    echo "<p>Merci pour votre achat du livre : " . htmlspecialchars($titre) . "</p>";
    echo "<p>Prix : " . htmlspecialchars($prix) . " €</p>";
    ?>

    <?php include("footer.php"); ?>
</body>
</html>
