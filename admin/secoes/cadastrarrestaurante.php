<head>
    <link rel="stylesheet" href="secoes/css/cadastrarrestaurante.css">
</head>
<section id="container-cad-restaurante">
     <div>
        <h1>Cadastre seus restaurantes!</h1>
        <form method="post" class="col-10 m-auto mt-5 border border-radious-5 p-2" action="controller/inserirrestaurante.php" enctype="multipart/form-data">

            <div class="form-group">
                    <label>Nome: </label>
                    <input type="text" class="form-control" name="txtNome" required>
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <input type="text" class="form-control" name="txtDescricao" required>
            </div>

            <div class="form-group">
                <label>Categoria: </label>
                <input type="text" class="form-control" name="txtCategoria" required>
            </div>

            <div class="form-group">                
                <label>Imagem: </label>
                <input type="file" class="form-control" name="arquivo" required>
            </div>


            <input type="submit" value="Enviar" class="btn btn-lg btn-primary mt-2">

        </form>
    </div>
</section>