//teste
const elementosBtn = document.querySelectorAll('.edit-btn')

elementosBtn.forEach(elemento => {
    elemento.addEventListener('click', function () {
        console.log('Botão de editar clicado!')
        //Obtenha o ID do restaurante associado a esete botão
        const id = this.getAttribute('data-id');
        const nome = this.getAttribute('data-nome');
        const descricao = this.getAttribute('data-descricao');
        const categoria = this.getAttribute('data-categoria');
        const url = this.getAttribute('data-url');

        const inputNome = document.getElementsByName('txtNome')[0];
        const inputDescricao = document.getElementsByName('txtDescricao')[0];
        const inputCategoria = document.getElementsByName('txtCategoria')[0];
        const inputUrl = document.getElementsByName('txtUrl')[0];

        inputNome.value = nome;
        inputDescricao.value = descricao;
        inputCategoria.value = categoria;
        // inputUrl.value = url;
    })
})