document.getElementById('btn-edit').addEventListener('click', function() {
        const formCadastro = document.getElementById('form-cadastro');
        formCadastro.style.display = 'none';
        formCadastro.hidden = true;
        const formEdicao = document.getElementById('form-edicao');
        formEdicao.style.display = 'block';
        formEdicao.hidden = false;
    });

document.getElementById('btn-voltar').addEventListener('click', function() {
        const formCadastro = document.getElementById('form-cadastro');
        formCadastro.style.display = 'block';
        formCadastro.hidden = false;
        const formEdicao = document.getElementById('form-edicao');
        formEdicao.style.display = 'none';
        formEdicao.hidden = true;
    });

function sincronizarDatalist(inputId, hiddenId, datalistId) {
    const input = document.getElementById(inputId);
    const hidden = document.getElementById(hiddenId);
    const datalist = document.getElementById(datalistId);

    input.addEventListener('input', function() {
        const opcaoSelecionada = Array.from(datalist.options).find(opt => opt.value === this.value);
        hidden.value = opcaoSelecionada ? opcaoSelecionada.dataset.id : '';
    });
}

function validarDatalist(inputId, datalistId) {
    const input = document.getElementById(inputId);
    const datalist = document.getElementById(datalistId);
    const options = Array.from(datalist.options).map(option => option.value);

    input.addEventListener('input', function() {
        if (!options.includes(input.value)) {
            input.setCustomValidity('Por favor, selecione uma opção válida da lista.');
        } else {
            input.setCustomValidity('');
        }
    });
}
