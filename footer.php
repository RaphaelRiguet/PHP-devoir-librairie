<?php
$username = htmlspecialchars($username ?? '');
$name = htmlspecialchars($name ?? '');
?>

<footer>
    <h4>Nom: <?php echo $name ? $name : 'Inconnu' ?></h4>
    <h4>Prénom: <?php echo $username ? $username : 'Inconnu' ?></h4>
    <h4>Année: <?php echo date("Y") ?></h4>
</footer>