<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Ifood app</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</head>
<body>
    <?php include('includes/menu.php'); ?>
    <?php include('includes/cabecalho.php'); ?>

    <?php 
        include_once("controller/verUrl.php");
        $redirecionar = new VerUrl();
        $redirecionar->trocarUrl(@$_GET['secao']);
    ?>

    <?php include('includes/rodape.php');?>

    <script defer src="js/bootstrap.bundle.min.js"></script>
</body>
</html>