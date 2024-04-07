<?php 
    include_once('../dao/manipuladados.php');
    $dados = new ManipularDados();
    $dados -> setTable('tb_usuario');
    $lista = $dados-> getAllDataTable();
?>

<section>
    <?php 
    
        foreach($lista as $usuario) {
    ?>   
        <h1 class="mt-5"><?= $usuario['nome'] ?></h1>   
         
    <?php
        }
    ?>
</section>