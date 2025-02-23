<?php
$error = $error1 = $error2 = "";
$username = $name = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    if (empty($_POST['username'])) {
        $error = "prénom est obligatoire";
    } else {
        $username = htmlspecialchars($_POST['username']);
    }

    if (empty($_POST['name'])) {
        $error1 = "nom est obligatoire";
    } else {
        $name = htmlspecialchars($_POST['name']);
    }

    if (empty($_POST['password'])) {
        $error2 = "mot de passe est obligatoire";
    }
}
?>
<style>
    body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
            max-width: 900px; 
            margin: 0 auto; 
            padding: 2rem; 
            color: #333;
            word-wrap: balance;
            background-color: #f9f9f9;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            color: #2c3e50;
            margin-top: 1rem;
            font-weight: 600;
        } 
        h1 {
            font-size: 2rem;
            solid #3498db;
        }
        h2 {
            font-size: 1.75rem;
            solid #2ecc71;
        }
        h3 {
            font-size: 1.25rem;
            color:#301d87;
        }
        h4 {
            font-size: 1rem;
            color: #9b59b6;
        } 
        a {
            color: #3498db;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        a:hover {
            color: #2980b9;
        } 
        p{
            text-align: justify;
        } 
        ul, ol {
            padding-left: 2rem;
            margin-bottom: 1rem;
        }
        li {
            margin-bottom: 0.5rem;
        }
        code {
            background-color: #f8f9fa;
            padding: 0.2rem 0.4rem;
            border-radius: 4px;
            font-family: 'Fira Code', monospace;
            font-size: 0.9em;
            color: #e83e8c;
        }
        pre {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 1rem;
            border-radius: 8px;
            overflow-x: auto;
            margin: 1.5rem 0;
        }
        pre code {
            background-color: transparent;
            color: inherit;
            padding: 0;
        }
        blockquote {
            border-left: 4px solid #3498db;
            margin: 1.5rem 0;
            padding: 1rem;
            background-color: #ecf0f1;
            font-style: italic;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
        }
        th, td {
            padding: 0.75rem;
            border:1px solid lightgrey !important;
        } 
        td{

        } 
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 1.5rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        hr {
            border: 0;
            height: 2px;
            background: linear-gradient(to right, #3498db, #2ecc71);
            margin: 2rem 0;
        }
        mark {
            background-color: #ffd700;
            padding: 0.2rem 0.4rem;
            border-radius: 4px;
        } 
        * {
            transition: all 0.3s ease;
        } 
        @media (max-width: 768px) { 
            body {
                padding: 1rem;
            } 
            h1 {
                font-size: 2rem;
            } 
            h2 {
                font-size: 1.75rem;
            } 
            h3 {
                font-size: 1.5rem;
            } 
            h4 {
                font-size: 1.25rem;
            }
        }
        .module {
            font-size: 2.5rem;
            color: #f8f9fa;
            background-color: #3498db;
            text-align: center;
            padding: 0.5rem;
            margin: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
</style>

<header>
    <a href="home.php">Accueil</a>
    <a href="livres.php">Livres</a>

</header>

<body>
    <h1 id="enregistrement">ENREGISTRE TOI</h1>
    <form action="home.php" method="post">
        <label for="username">Prénom:</label>
        <input type="text" name="username" id="username" value="<?php echo $_POST['username'] ?? '' ?>">
        <p style="color: red;">
            <?php echo $error ?>
        </p>
        
        <label for="name">Nom:</label>
        <input type="text" name="name" id="name" value="<?php echo $_POST['name'] ?? '' ?>">
        <p style="color: red;">
            <?php echo $error1 ?>
        </p>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="<?php echo $_POST['password'] ?? '' ?>">
        <p style="color: red;">
            <?php echo $error2 ?>
        </p>

        <input type="submit" value="validé">
    </form>

    <h2>Livres Disponibles</h2>
<?php
if (file_exists('livres.txt')) {
    $fichier = fopen('livres.txt', 'r');
    while (($ligne = fgets($fichier)) !== false) {
        $livre = json_decode($ligne, true);
        echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;'>";
        echo "<h3>" . htmlspecialchars($livre['titre']) . "</h3>";
        echo "<p>Auteur : " . htmlspecialchars($livre['auteur']) . "</p>";
        echo "<p>Civilité : " . htmlspecialchars($livre['civilité']) . "</p>";
        echo "<p>Année de publication : " . htmlspecialchars($livre['publication']) . "</p>";
        echo "<p>Nombre de pages : " . htmlspecialchars($livre['pages']) . "</p>";
        echo "<p>Catégorie : " . htmlspecialchars($livre['catégorie']) . "</p>";
        echo "<p>Prix : " . htmlspecialchars($livre['prix']) . " €</p>";
        echo "<p>Description : " . htmlspecialchars($livre['description']) . "</p>";
        echo "<p>Image de couverture : <img src='" . htmlspecialchars($livre['couverture']) . "' alt='" . htmlspecialchars($livre['titre']) . "' width='100'></p>";
        echo "<p>Lien vers la page d'achat : <a href='" . htmlspecialchars($livre['achat']) . "'>" . htmlspecialchars($livre['achat']) . "</a></p>";
        echo "<button onclick=\"window.location.href='paiement.php?titre=" . urlencode($livre['titre']) . "&prix=" . urlencode($livre['prix']) . "';\">Paiement</button>";
        echo "<button onclick=\"window.location.href='partage.php?titre=" . urlencode($livre['titre']) . "&auteur=" . urlencode($livre['auteur']) . "&image=" . urlencode($livre['image']) . "&achat=" . urlencode($livre['achat']) . "';\">Partager</button>";
        echo "</div>";
    }
    fclose($fichier);
} else {
    echo "<p>Aucun livre disponible pour le moment.</p>";
}
?>
</body>

<?php
include("footer.php");
?>