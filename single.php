<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=saltain_banque', 'root','');
} 
catch (\Exception $e) {
    echo "Erreur lors de la connexion à la base de données: " . $e->getMessage() . "<br/>";
    die();
}

$sqlQuery = 'SELECT * FROM Account WHERE account_customer_id = :cstmr_id';
$AccountStatement = $db->prepare($sqlQuery);
$AccountStatement->execute(["cstmr_id" => $_SESSION['customer_id']]);
$Account = $AccountStatement->fetchAll();

$db_customer = 'SELECT firstname, lastname from Customer INNER JOIN Account ON customer.id = account_customer_id';
$customerStatement = $db->prepare($db_customer);
$customerStatement->execute();
$customer = $customerStatement->fetchAll();

$db_op = 'SELECT op_amount, op_date, op_type from Last_op INNER JOIN Account ON operation.last_op_account_id = account.id';
$opStatement = $db->prepare($operation_db);
$opStatement->execute();
$op = $opStatement->fetchAll();

for ($i = 0; $i < count($Account); $i++) {
?>

<main class="container padding">
  <div class='col-xl-3 col-md-6'>
    <div class='card bg-secondary text-white mb-4'>
      <div class='card-body '>
        <p class='card-text'>Type de compte : <?php echo $Account[$i]['account_type']; ?></p>
        <p class='card-text'>N° : <?php echo $Account[$i]['account_number']; ?></p>
        <p class='card-text'>Solde : <?php echo $Account[$i]['amount']; ?> €</p>
        <p class='card-text'>Date de création : <?php echo $Account[$i]['creation_date']; ?></p>
        <p class='card-text'>Propriétaire : <?php echo $customer[$i]['lastname']; ?> <?php echo $customer[$i]['firstname']; ?> </p>
        <p class='card-text'>Dernière opération : <br> <?php echo $op[$i]['op_type']; ?> - <?php echo $op[$i]['op_date']; ?> - <?php echo $op[$i]['op_amount']; ?> € </p>
        <a href="account_detail.php?id=<?php echo $Account[$i]['id'] ?>"><button class="btn btn-warning">Voir détails</button></a>
      </div>
    </div>
  </div>
<?php
}
?>
</main>
