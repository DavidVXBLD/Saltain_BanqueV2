<?php
include "template/header.php";
include "template/nav.php";
?>

<main class="container padding">
    <h2 class="mt-5 border-danger border-bottom">Ouvrir un compte</h2>
    <div class="row">
        <div class="col-12 col-md-6">
            <form class="mt-5" method="post" action="">
                <div class="form-group">
                    <label for="countType">Type de compte</label>
                    <select class="form-control mb-5" id="countType" name="name">
                    <option selectd value="Compte courant">Courant</option>
                    <option value="livret A">Livret A</option>
                    <option value="PEL">PEL</option>
                    <option value="PEA">PEA</option>
                    <option value="PERP">PERP</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount">Montant à l'ouverture</label>
                    <input type="number" name="amount" id="amount" min="51" value="51">
                </div>
                <div class="text-center">
                    <button name="new_account" type="submit" class="btn btn-danger my-5">Ouvrir</button>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-6">
            <?php
            if(isset($_POST["new_account"])):
            $account = array_map(htmlspecialchars, $_POST);
            ?>
            <article class="card">
                <div class="card-header">
                    <h5 class="card-title"><?php echo $account["name"]; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo "some random number" ?></h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush border-bottom mb-2">
                        <li class="list-group-item">Propriétaire : <?php echo "you"; ?></li>
                        <li class="list-group-item">Solde : <?php echo $account["amount"]; ?></li>
                        <li class="list-group-item">Dernière opération : <?php echo "/"; ?></li>
                    </ul>
                    <a href="#" class="btn btn-danger">Clôturer</a>
                    <a href="operation.html" class="btn btn-danger">Dépot/retrait</a>
                    <a href="#" class="btn btn-danger">Voir</a>
                </div>
            </article>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php $script = "<script src='js/main.js'></script>"; ?>
<?php include "template/footer.php"; ?>