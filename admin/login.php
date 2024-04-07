
<?php
include_once("../dao/manipuladados.php");
    
    session_start();
    $nome = $_POST['txtNome'];
    $senha = $_POST['txtSenha'];

    $dadosLogin =  new ManipularDados();
    $dadosLogin->setTable('tb_usuario');

    if($dadosLogin -> validarLogin($nome, $senha) !=0) {

        //Setar cookies
        setcookie('nome_usuario', $nome);
        setcookie('senha_usuario', $senha);

        $_SESSION['usuario'] = $nome;
        header('location:principal.php');


    }
    else {
        echo '
        <script> 
            alert("Usuario ou senha incorretos!");
        </script>
        ';

        echo "
            <script>
                location = 'index.php';
            </script>
        ";
    }
?>