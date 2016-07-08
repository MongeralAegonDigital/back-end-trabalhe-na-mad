$(document).ready(function(){
    
    $(".order").click(function(){
       getProducts($(this).attr("rel")); 
    });
   
    //Máscaras
    $(".datepicker" ).datepicker();
    $(".datepicker").datepicker( "option", "dateFormat", "yy-mm-dd");
    $('.float').mask('00.00');
    $('.peso').mask('00');
   
    limparCampos();
    
    /**
     * EVENTOS
     */
    $(".fecharPainelEditar").click(function(){
        fecharPainelEditar();
    });
    $(".fecharPainelCadastrar").click(function(){
        fecharPainelCadastrar();
    });
    $(".novoProduto").click(function(){
        exibirPainelCadastrar();
    });
    $("#cadastrar").click(function(){
        if(executarValidacao('create')){
            cadastrarProduto();
        }
    });
    $("#editar").click(function(){
        if(executarValidacao('edit')){
            editarProduto($(this).val());
        }
    });
    $("body").on("click",".deletar", function(){
        fecharPainelEditar();
        fecharPainelCadastrar();
        deletarProduto($(this).val());
    });
    
    $("body").on("click",".exibirPainelEditar", function(){
        exibirPainelEditar($(this));
    });
});



/**
 * Faz a requisição dos produtos cadastrados e chama a função de montar a
 * tabela de produtos
 */
function getProducts(campo) {
    $.ajax({
        url: 'http://localhost:8000/list',
        dataType: "json",
        type: "get",
        data: {'ordenar':campo},
        beforeSend: function () {
        },
        success: function (data) {
            montarTabelaProdutos(montarHtmlTabela(data));
        }
    });
}

/**
 * Agrupa os produtos em um html
 * @param {Obj} produtos
 * @returns {html|String}
 */
function montarHtmlTabela(produtos) {
    html = "";
    $.each(produtos, function () {
        html += "<tr>";
        $.each(this, function (index, value) {
            if(index == "id"){
                id = value;
            }
            html += "<td>"
            html += value;
            html += "<input name='produto-" + index + "' type='hidden' value='" + value + "' />";
            html += "</td>";
        });
        html += "<td><button value='" + id + "' type='button' class='btn btn-info exibirPainelEditar'>Editar</button></td>";
        html += "<td><button value='" + id + "' type='button' class='btn btn-danger deletar'>Excluir</button></td>";
        html += "</tr>";
    });
    return html;
}

/**
 * Insere o html na tabela
 * @param {String} html
 */
function montarTabelaProdutos(html) {
    $("#produtosLista").html(html);
}

function cadastrarProduto(){
    $.ajax({
        url: url + '/admin/produtos/store',
        dataType: "json",
        type: "post",
        data: $("#create").serialize(),
        beforeSend: function () {
        },
        success: function (data) {
            if(data){
                alert("Produto adicionado com sucesso");
            }else{
                alert("Não foi possível adicionar o produto");
            }
            limparCampos();
            getProducts();
            fecharPainelCadastrar();
        }
    });
}

/**
 * Exclui um produto no banco
 * @returns {undefined}
 */
function deletarProduto(idProduto){
    $.ajax({
        url: url + '/admin/produtos/delete/'+idProduto,
        dataType: "json",
        type: "get",
        beforeSend: function () {
        },
        success: function (data) {
            alert('Produto excluído com sucesso');
            getProducts();
        }
    });
}

/**
 * Preenche o formulário de edição de produto.
 * @param {Obj} $obj
 */
function preencherCamposEditar($obj){
    $("input[name='nome']").val($obj.children().children("input[name='produto-nome']").val());
    $("input[name='data_fabricacao']").val($obj.children().children("input[name='produto-data_fabricacao']").val());
    $("input[name='tamanho']").val($obj.children().children("input[name='produto-tamanho']").val());
    $("input[name='largura']").val($obj.children().children("input[name='produto-largura']").val());
    $("input[name='peso']").val($obj.children().children("input[name='produto-peso']").val());
    $("textarea[name='categorias']").val($obj.children().children("input[name='produto-categorias']").val());
}

/**
 * Edita os dados de um produto
 * @returns {undefined}
 */
function editarProduto(idProduto){
    $.ajax({
        url: url + '/admin/produtos/update/'+idProduto,
        dataType: "json",
        type: "post",
        data: $("#edit").serialize(),
        beforeSend: function () {
        },
        success: function (data) {
            if(data){
                alert("Produto salvo com sucesso");
            }else{
                alert("Não foi possível salvar o produto");
            }
            limparCampos();
            getProducts();
            fecharPainelEditar();
        }
    });
    
}
/**
 * Limpa os campos do formulário
 */
function limparCampos(){
    $("input[type='text']").val("");
    $("textarea").val("");
}

function exibirPainelCadastrar(){
    fecharPainelEditar();
    limparCampos();
    removeBorda();
    $(".painelCadastrar").removeClass('hidden').show();
    $(".novoProduto").hide();
}
function exibirPainelEditar($obj){
    removeBorda();
    fecharPainelCadastrar();
    $(".painelEditar").removeClass('hidden').show();
    $("input[name='nome']").focus();
    preencherCamposEditar($obj.parent().parent());
    $("#editar").val($obj.val());
}
function fecharPainelCadastrar(){
    $(".novoProduto").show();
    $(".painelCadastrar").fadeOut();
}
function fecharPainelEditar(){
    $(".painelEditar").fadeOut();
    $(".painelcadastrar").show();
    $(".novoProduto").show();
    
}

/**
 * Função de validação de formulário
 * @param {String} formulario
 */
function executarValidacao(formulario){
    retorno = true;
    removeBorda();
    $("#"+formulario).find(".form-control").each(function(){
        $(this).attr('value',$(this).val());
        if($(this).val() == ""){
            $(this).addClass("bordaVermelha");
            retorno = false;
        }else{

        }
    });
    return retorno;
}

function removeBorda(){
    $(".form-control").each(function(){
        $(this).removeClass("bordaVermelha");
    });
}