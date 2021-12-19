<?php 

try {
    $db = new PDO('mysql:host=localhost;dbname=saltain_banque', 'root','');
} 
catch (\Exception $e) {
    echo "Erreur lors de la connexion à la base de données: " . $e->getMessage() . "<br/>";
    die();
}

$sqlQuery = 'SELECT customer_mail, customer_password, id FROM Customer';
$customerStatement = $db->prepare($sqlQuery);
$customerStatement->execute();
$customers = $customerStatement->fetchAll();

if (isset($_POST['customer_mail']) &&  isset($_POST['customer_password'])) {
    foreach ($customers as $customer) {
        if (
            $customer['customer_mail'] === $_POST['customer_mail'] &&
            $customer['customer_password'] === $_POST['customer_password']
        ) {
            $_SESSION['LOGGED_CUSTOMER'] = $customer['customer_mail'];
            $_SESSION["customer_id"] = $customer['id'];
        } else {
            $errorMessage = sprintf(
                'Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['customer_mail'],
                $_POST['customer_password']
            );
        }
    }
}

?>

<?php if (!isset($_SESSION['LOGGED_CUSTOMER'])) : ?>

<div id="container">
    
    <form class="formLogin" action="index.php" method="POST">
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
        <h1>Connexion</h1>
        
        <label><b>E-mail</b></label>
        <input type="email" name="email" required>

        <label><b>Mot de passe</b></label>
        <input type="password" name="password" required>

        <input type="submit" id='submit' value='LOGIN' >
    </form>
</div>

<?php else : ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo $_SESSION['LOGGED_CUSTOMER']; ?> et bienvenue sur le site !
    </div>
<?php endif; ?>