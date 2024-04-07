<?php 
    include_once('../../dao/manipuladados.php');
    include_once('../../model/restaurante.php');

    function converte($string) {
        return iconv('UTF-8','ISO8859-1', $string);   
    }

    // Verifica se os campos obrigatórios foram enviados e se um arquivo foi enviado
    if(isset($_POST['txtNome'], $_POST['txtDescricao'], $_POST['txtCategoria']) && $_FILES['arquivo']['error'] !== UPLOAD_ERR_NO_FILE) {
        $restaurante = new Restaurante();
        $inserir = new ManipularDados();

        $restaurante->setNome($_POST['txtNome']);
        $restaurante->setDescricao($_POST['txtDescricao']);
        $restaurante->setCategoria($_POST['txtCategoria']);
        
        // Verifica se o arquivo foi enviado sem erros
        if($_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
            $nomeArquivo = $_FILES['arquivo']['name'];
            $restaurante->setUrl('img/restaurantes/' . $nomeArquivo);

            // Move o arquivo para o diretório desejado
            $nomeArquivoSalvo = converte($nomeArquivo);
            $urlLocalSalvo = "../../img/restaurantes/" . $nomeArquivoSalvo;
            move_uploaded_file($_FILES["arquivo"]["tmp_name"], $urlLocalSalvo);
        } else {
            // Se houver um erro no envio do arquivo, defina a URL como vazia
            $restaurante->setUrl('');
            echo "Erro ao Setar URL do restaurante";
        }

        // Insere os dados do restaurante no banco de dados
        $inserir->setTable('tb_restaurante');
        $inserir->setFields("nome, descricao, categoria, url");
        $inserir->setDados("'{$restaurante->getNome()}',
            '{$restaurante->getDescricao()}',
            '{$restaurante->getCategoria()}',
            '{$restaurante->getUrl()}'");


        // Executa a inserção
        $inserir->insert();
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
          Restaurante {$restaurante->getNome()} cadastrado com sucesso!
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <script>
          setTimeout(function(){
            window.location.href = '../principal.php'; //
          }, 3000); // Redireciona após 3 segundos
        </script>
        ";

    } else {
        // Se algum campo obrigatório estiver faltando, exibe uma mensagem de erro
        $camposFaltando = array();
        if(!isset($_POST['txtNome'])) $camposFaltando[] = "Nome";
        if(!isset($_POST['txtDescricao'])) $camposFaltando[] = "Descrição";
        if(!isset($_POST['txtCategoria'])) $camposFaltando[] = "Categoria";
        if($_FILES['arquivo']['error'] === UPLOAD_ERR_NO_FILE) $camposFaltando[] = "Arquivo";

        echo "Erro: Os seguintes campos são obrigatórios - " . implode(", ", $camposFaltando);
    }
?>