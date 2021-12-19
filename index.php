<?php
// require "data/acounts.php";
// $accounts = get_accounts();

include "template/header.php";
require "login.php";
?>

<div class="row mt-4 p-3">

<?php
if(isset($_SESSION['LOGGED_CUSTOMER'])):
    echo "bienvenu";
header("single.php");
endif; 
?>
</div>




<?php $script = "<script src='js/layer.js'></script>"; ?>

<?php include "template/footer.php"; ?>