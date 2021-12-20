<?php
try{
	$db = new PDO('mysql:host=localhost;dbname=saltain_banque',
    'BanquePHP',
    'banque76');
} catch (Exception $e) {       
    echo "Erreur lors de la connexion à la base de donnée: " . $e->getMessage() . "<br/>";
    die();
}
?>


