<header>
    <a href="home.php">Accueil</a>
    <a href="livres.php">Livres</a>
</header>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $titre=$_POST['titre']?? '';
    $auteur=$_POST['auteur']?? '';
    $civilité=$_POST['civilité']?? '';
    $publication=$_POST['publication']?? '';
    $pages=$_POST['pages']?? '';
    $catégorie=$_POST['catégorie']?? '';
    $prix=$_POST['prix']?? '';
    $description=$_POST['description']?? '';
    $couverture=$_POST['couverture']?? '';
    $achat=$_POST['achat']?? '';

    if (empty($titre)) {
        $erreurs['titre'] = 'Veuillez entrer un titre.';
    }elseif (strlen($titre) < 2) {
        echo $erreurs['titre']= 'titre trop court.';
    }elseif (strlen($titre) > 150) {
        echo $erreurs['titre']= 'titre trop long.';
    }


    if (empty($auteur)) {
        $erreurs['auteur'] = 'Veuillez entrer au moins un auteur.';
    }elseif (strlen($auteur) < 2) {
        echo $erreurs['auteur']= 'nom de ou des auteur(s) trop court.';
    }elseif (strlen($auteur) > 150) {
        echo $erreurs['auteur']= 'nom de ou des auteur(s) trop long.';
    }


    if (empty($civilité)) {
        $erreurs['civilité'] = 'Veuillez selectioner la civilité de ou des auteur(s).';
    }


    if (empty($publication)) {
        $erreurs['publication'] = 'Veuillez entrer la date de publication du livre.';
    }elseif ($publication < 2000 || $publication > 2025) {
        $erreurs['publication']="L'année de publication doit être comprise entre 2000 et 2025.";
    }elseif (strlen($publication) != 4) {
        $erreurs['publication']="l'année de publication doit contenir 4 chiffres.";
    }


    if (empty($pages)) {
        $erreurs['pages'] = 'Veuillez entrer le nombre le page.';
    }elseif ($pages < 10) {
        echo $erreurs['pages']= 'nombre de pages trop bas.';
    }elseif ($pages > 1000) {
        echo $erreurs['pages']= 'nombre de pages trop élevée.';
    }


    if (empty($catégorie)) {
        $erreurs['catégorie'] = 'Veuillez choisir au moins une catégorie.';
    }


    if (empty($prix)) {
        $erreurs['prix'] = 'Veuillez entrer le prix du livre.';
    }elseif ($prix < 0) {
        echo $erreurs['prix']= 'prix trop bas.';
    }elseif ($prix > 299) {
        echo $erreurs['prix']= 'prix trop élevé.';
    }


    if (empty($description)) {
        $erreurs['description'] = 'Veuillez entrer une courte description du livre.';
    }elseif (strlen($description)>500) {
        $erreurs['description']='La dsecription est trop longue';
    }


    if (empty($couverture)) {
        $erreurs['couverture'] = "Veuillez entrer l'url de la couverture du livre.";
    }elseif (!filter_var($couverture, FILTER_VALIDATE_URL)) {
        $erreurs['couverture'] = "L'URL de la couverture n'est pas valide.";
    }

    if (empty($achat)) {
        $erreurs['achat'] = "Veuillez entrer l'url du site vers l'achat du livre.";
    }elseif(!filter_var($achat, FILTER_VALIDATE_URL)) {
        $erreurs['achat'] = "L'URL de la page d'achat n'est pas valide.";
    }

    if (!empty($erreurs)) {
        foreach ($erreurs as $champ => $message) {
            echo "<p style='color: red;'>Erreur dans le champ $champ : $message</p>";
        }
    } else {
        
        $livre = [
            'titre' => $titre,
            'auteur' => $auteur,
            'civilite' => $civilité,
            'publication' => $publication,
            'pages' => $pages,
            'categorie' => $catégorie,
            'prix' => $prix,
            'description' => $description,
            'couverture' => $couverture,
            'achat' => $achat
        ];

        $fichier = fopen("livres.txt", "a");
        fwrite($fichier, json_encode($livre) . PHP_EOL);
        fclose($fichier);

        echo "<h2>Détails du Livre</h2>";
        echo "<div style='border: 1px solid #ccc; padding: 10px;'>";
        echo "<p><strong>Titre :</strong> " . htmlspecialchars($titre) . "</p>";
        echo "<p><strong>Auteur(s) :</strong> " . htmlspecialchars($auteur) . "</p>";
        echo "<p><strong>Civilité :</strong> " . htmlspecialchars($civilité) . "</p>";
        echo "<p><strong>Date de publication :</strong> " . htmlspecialchars($publication) . "</p>";
        echo "<p><strong>Nombre de pages :</strong> " . htmlspecialchars($pages) . "</p>";
        echo "<p><strong>Catégorie :</strong> " . htmlspecialchars($catégorie) . "</p>";
        echo "<p><strong>Prix :</strong> " . htmlspecialchars($prix) . " €</p>";
        echo "<p><strong>Description :</strong> " . htmlspecialchars($description) . "</p>";
        echo "<p><strong>Image de couverture :</strong> <img src='" . htmlspecialchars($couverture) . "' alt='" . htmlspecialchars($titre) . "' width='100'></p>";
        echo "<p><strong>Lien vers la page d'achat :</strong> <a href='" . htmlspecialchars($achat) . "'>" . htmlspecialchars($achat) . "</a></p>";
        echo "<button onclick=\"window.location.href='paiement.php?titre=" . urlencode($titre) . "&prix=" . urlencode($prix) . "';\">Paiement</button>";
        echo "</div>";
    }
}
include_once("footer.php");
?>