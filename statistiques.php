<?php
include "template/header.php";
include "template/nav.php";
?>

<main class="container padding bigScreenPadding">
    <h2 class="my-4 border-danger border-bottom">L'économie en bref</h2>
    <table class="table table-striped my-5">
        <thead class="bg-dark text-white">
            <tr>
            <th scope="col">Indicateur</th>
            <th scope="col">Valeur</th>
            <th scope="col">Variation</th>
            </tr>
        </thead>
        <tbody id="statTable"></tbody>
    </table>
</main>

<?php $script = "<script src='js/statistiques.js'></script>"?>
<?php include "template/footer.php"; ?>
