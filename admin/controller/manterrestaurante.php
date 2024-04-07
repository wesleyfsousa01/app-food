<?php 

    include_once("../../dao/manipuladados.php");

    $manter = new ManipularDados();
    $manter->setTable("tb_restaurante");
    $manter->setFieldPK("id");


    $id = $_POST['txtId'];
    $nome= $_POST['txtNome'];
    $descricao= $_POST['txtDescricao'];
    $categoria= $_POST['txtCategoria'];
    $url= $_POST['txtUrl'];
    $botao = $_POST ['botao'];

    switch ($botao){
        case "excluir";
            $manter->setValuePK($id);
            //$manter->delete();
            echo '<script>alert("O arquivo foi removido com sucesso do BD")</script>';
            echo "<script> location = '../principal.php' </script>";
            break;
        case "editar";
            
            break;
        default;
            break;
    }
?>
