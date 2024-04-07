<!-- CDN Bootstrap 5.3 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

<!-- Link Para CSS personalizado da Página: -->
<link rel="stylesheet" href="secoes/css/manutrestaurante.css">

<!-- Link do JS personalizado -->
<script defer src="secoes/js/manutrestaurante.js"></script>

<style>

    h1{
        padding-top: 200px !important;
        padding-bottom: 1rem;
        border-bottom: solid 1px #716d6d;
    }

</style>

<h1 class="mb-5 text-center">Manutenção de Restaurantes</h1>

<?php
    include_once("../dao/manipuladados.php");

    // Instancia um objeto para acesso ao banco
    $dados = new ManipularDados();
    // Seta a tabela alvo das consultas
    $dados->setTable("tb_restaurante");
    // Recupera todos os dados da tabela especificada, e os armazena em uma lista
    $lista = $dados->getAllDataTable();
?>

<section class="mb-5 col-12">

    <!-- Button trigger modal
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
        Launch demo modal
    </button> -->

    <!-- <form method="post" action="controller/manterRestaurante.php">
            <input type="hidden" name="txtId" value="<?= $restaurante["id"]?>">
            <input type="hidden" name="txtNome" value="<?= $restaurante["nome"]?>">
            <input type="hidden" name="txtDescricao" value="<?= $restaurante["descricao"]?>">
            <input type="hidden" name="txtCategoria" value="<?= $restaurante["categoria"]?>">
            <input type="hidden" name="txtUrl" value="<?= $restaurante["url"]?>">
            <input type="button" class="btn btn-primary" name="botao" value="Editar"
                data-bs-toggle="modal"
                data-bs-target="#exampleModalCenter"
            >
            </input>
    </form> -->

        <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                    Editar restaurante

                    </h5>
                    <button type="button" class="close btn btn-secondary btn-lg" 
                        data-bs-dismiss="modal" 
                        aria-label="Close"
                     >
                        <i class="fa-solid fa-x"></i>
                    </button>

                </div>
                <div class="modal-body">
                    <form method="post" action="controller/manterRestaurante.php">
                    <input type="hidden" name="txtId" value="<?= $restaurante["id"]?>">

                    <label class="form-label">Titulo</label>
                    <input type="text" class="form-control" name="txtNome">
                    
                    <label for="" class="form-label">Descrição</label>
                    <textarea name="txtDescricao" id="" cols="10" rows="5" class="form-control" value=""></textarea>

                    <label for="" class="form-label">Categoria</label>
                    <input type="text" class="form-control" name="txtCategoria" value="">

                    <label for="" class="form-label">Imagem</label>
                    <input type="file" class="form-control" name="txtUrl" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                    >
                        Limpar

                    </button>
                    <!-- <button type="button" class="btn btn-primary">
                        Salvar
                    </button> -->
                    <form action="">
                        <input type="submit" class="btn btn-primary" value="Salvar">
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- Fim do modal -->

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DESCRIÇÃO</th>
                    <th>CATEGORIA</th>
                    <th>URL</th>
                    <th>ALTERAR</th>
                    <th>EXCLUIR</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($lista as $restaurante) {
                ?>
                <tr>
                    <td><?= $restaurante["id"] ?></td>
                    <td><?= $restaurante["nome"] ?></td>
                    <td><?= $restaurante["descricao"] ?></td>
                    <td><?= $restaurante["categoria"] ?></td>
                    <td><?= $restaurante["url"] ?></td>

                    <td>
                        <button class="btn btn-primary btn-lg edit-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModalCenter"
                            data-id="<?= $restaurante["id"] ?>"
                            data-nome="<?= $restaurante["nome"] ?>"
                            data-descricao="<?= $restaurante["descricao"] ?>"
                            data-categoria="<?= $restaurante["categoria"] ?>"
                            data-url="<?= $restaurante["url"] ?>"
                        >
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </td>

                    <td>
                        <form method="post" action="controller/manterRestaurante.php">
                            <input type="hidden" name="txtId" value="<?= $restaurante["id"]?>">
                            <button type="button" class="btn btn-danger btn-lg" name="botao" 
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
