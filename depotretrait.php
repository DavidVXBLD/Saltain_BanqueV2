<?php
include "template/header.php";
include "template/nav.php";
?>

<main class="container padding bigScreenPadding">
    <h2 class=" border-danger border-bottom mt-4">Réaliser une opération</h2>
    <form class="mt-5 fullForm" method="post" action="">
        <div class="form-group">
            <label for="countType">Choisissez votre compte</label>
            <select class="form-control mb-3" id="countType" name="countType">
                <option value="courant">Courant</option>
                <option value="livreta">Livret A</option>
                <option value="pel">PEL</option>
                <option value="pea">PEA</option>
                <option value="perp">PERP</option>
            </select>
        </div>
        <div class="form-group">
            <label for="opération">Type d'opération</label>
            <select class="form-control mb-3" id="opération" name="opération">
                <option value="deposit">Dépot</option>
                <option value="withdrawal">Retrait</option>
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Montant en euros</label>
            <input type="number" name="amount" id="amount" min="0" value="0">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger my-4">Exécuter</button>
        </div>
    </form>
</main>

<?php $script = "<script src='js/main.js'></script>"; ?>
<?php include "template/footer.php"; ?>