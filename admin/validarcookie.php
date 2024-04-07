<?php 
    include("../dao/manipuladados.php");
    $manipula = new ManipularDados();
    $manipula->setTable("tb_usuario");
    //verifica se a variavel foi inicializada
    if(isset($_COOKIE['nome_usuario'])) {
        $nome_usuario = $_COOKIE['nome_usuario'];
    }

    if(isset($_COOKIE['senha_usuario'])) {
        $senha_usuario = $_COOKIE['senha_usuario'];
    }

    if(!empty($nome_usuario) or empty($senha_usuario)) {
        $linhas = $manipula->validarLogin($nome_usuario, $senha_usuario);
        if($linhas == 0) { 
            setcookie('nome_usuario');
            setcookie('senha_usuario');
            header('location: index.php');
            exit;
        }
    } else {
        header('location: index.php');
        exit;
    }
?>