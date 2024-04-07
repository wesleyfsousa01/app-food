<!-- CDN Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<?php 
    include_once('validarcookie.php');
?>

<?php 
    session_start();
    $qualquer = @$_SESSION['usuario'];

    include_once("includes/menu.php");
?>
<div class="">
    
    <?php 
        include_once("controller/verUrl.php");
        $redirecionar = new VerUrl();
        $redirecionar->trocarUrl(@$_GET['secao']);
    ?>
</div>

<?php 
    include_once("includes/rodape.php");
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script defer src="../js/bootstrap.bundle.min.js"></script>
