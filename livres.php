
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <header>
    <a href="home.php">Accueil</a>
    <a href="livres.php">Livres</a>
</header>
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
</head>
<body>
    <form action="details.php" method="post">
        <label>Titre du livre:</label>
        <input type="text" name="titre" value="titre">
        <br>
        <br>
        <label>Auteur(s):</label>
        <input type="text" name="auteur" value="auteur">
        <br>
        <br>
        <label>Civilité:</label>
        <input type="radio" name="civilité" value="M">M
        <input type="radio" name="civilité" value="Mme">Mme
        <input type="radio" name="civilité" value="Mlle">Mlle
        <br>
        <br>
        <label>Année de publication:</label>
        <input type="number" name="publication" value="publication">
        <br>
        <br>
        <label>Nombre de pages:</label>
        <input type="number" name="pages" value="pages">
        <br>
        <br>
        <label>Catégorie:</label>
        <br>
            <input type="checkbox" name="catégorie" value="roman">Roman
        <br>
            <input type="checkbox" name="catégorie" value="poésie">Poésie
        <br>
            <input type="checkbox" name="catégorie" value="théâtre">Théâtre
        <br>
            <input type="checkbox" name="catégorie" value="essai">Essai
        <br>
            <input type="checkbox" name="catégorie" value="BD">BD
        <br>
            <input type="checkbox" name="catégorie" value="jeunesse">Jeunesse
        <br>
            <input type="checkbox" name="catégorie" value="autre">Autre
        <br>
        <br>
        <label>Prix:</label>
        <input type="number" name="prix" value="prix">€
        <br>
        <br>
        <label>Courte description:</label>
        <input type="text" name="description" value="description">
        <br>
        <br>
        <label>Image de couverture(URL):</label>
        <input type="text" name="couverture" value="couverture">
        <br>
        <br>
        <label>Lien vers la page d'achat:</label>
        <input type="text" name="achat" value="achat">
        <br>
        <br>
        <button type="submit">Valider</button>

    </form>
</body>
<?php include("footer.php"); ?>
</html>