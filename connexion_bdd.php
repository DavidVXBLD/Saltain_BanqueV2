<?php
try
{
	$dbh = new PDO('mysql:host=localhost;dbname=saltain_banque',
    'root',
    '');
}
catch (Exception $e)
{       
    die('Erreur : ' . $e->getMessage());
}
?>

<?php 
$sqlQuery = 'SELECT * FROM customer';
$customersStatement = $dbh->prepare($sqlQuery);
$customersStatement->execute();
$customers = $customersStatement->fetchAll();
?>

