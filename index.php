<?php
require "data/acounts.php";
$accounts = get_accounts();

include "template/header.php";
include "template/nav.php";
?>

<main class="container bigScreenPadding">
    <h2>Vos comptes bancaires</h2>
    <div class="row mt-5">
        <?php foreach ($accounts as $key => $account): ?>
            <div class="col-12 col-md-6 col-lg-4">
                <article class="card">
                    <div class="card-header">
                        <h5 class="card-title"><?php echo $account["name"]; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $account["number"]; ?></h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush border-bottom mb-2">
                            <li class="list-group-item">Propriétaire : <?php echo $account["owner"]; ?></li>
                            <li class="list-group-item">Solde : <?php echo $account["amount"]; ?></li>
                            <li class="list-group-item">Dernière opération : <?php echo $account["last_operation"]; ?></li>
                        </ul>
                        <a href="#" class="btn btn-danger">Clôturer</a>
                        <a href="operation.html" class="btn btn-danger">Dépot/retrait</a>
                        <a href="single.php<?php echo "?id=$key"; ?>" class="btn btn-danger">Voir</a>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
</main>


<?php $script = "<script src='js/layer.js'></script>"; ?>

<?php include "template/footer.php"; ?>