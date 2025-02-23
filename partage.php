<?php

?>
<header>
    <a href="home.php">Accueil</a>
    <a href="livres.php">Livres</a>
</header>
<h2>Partager un Livre avec un Ami</h2>

<form action="partage.php" method="post">
    <input type="hidden" name="titre" value="<?= htmlspecialchars($_GET['titre']) ?>">
    <input type="hidden" name="auteur" value="<?= htmlspecialchars($_GET['auteur']) ?>">
    <input type="hidden" name="image" value="<?= htmlspecialchars($_GET['image']) ?>">
    <input type="hidden" name="achat" value="<?= htmlspecialchars($_GET['achat']) ?>">

    <label for="nom_ami">Nom de l'ami :</label>
    <input type="text" name="nom_ami" id="nom_ami" required><br>

    <label for="email_ami">Adresse e-mail de l'ami :</label>
    <input type="email" name="email_ami" id="email_ami" required><br>

    <label for="message_ami">Message (optionnel) :</label>
    <textarea name="message_ami" id="message_ami"></textarea><br>

    <button type="submit">Envoyer</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_GET['titre'];
    $auteur = $_GET['auteur'];
    $image = $_GET['image'];
    $achat = $_GET['achat'];
    $nom_ami = $_GET['nom_ami'];
    $email_ami = $_GET['email_ami'];
    $message_ami = $_GET['message_ami'];

    if (filter_var($email_ami, FILTER_VALIDATE_EMAIL)) {
        $to = $email_ami;
        $subject = "Recommandation de Livre : $titre";
        $message = "Bonjour $nom_ami,\n\n";
        $message .= "Je voulais te recommander le livre \"$titre\" écrit par $auteur.\n";
        $message .= "Tu peux le découvrir et l'acheter ici : $achat\n\n";
        $message .= "Voici une brève description :\n$message_ami\n\n";
        $message .= "Bonne lecture !\n";
        
        $headers = "From: noreply@example.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "<p style='color: green;'>Le livre a été partagé avec succès !</p>";
        } else {
            echo "<p style='color: red;'>Erreur lors de l'envoi de l'e-mail. Veuillez réessayer.</p>";
        }
    } else {
        echo "<p style='color: red;'>L'adresse e-mail saisie n'est pas valide.</p>";
    }
}
include 'footer.php';
?>

