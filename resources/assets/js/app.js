

$(document).ready(function () {


    // Ordena o Select

    function removeGrade() {

        $('.btn-modelo').children('button').unbind('click'); // evita vÃ¡rios cliques na inserÃ§Ã£o
        $('.btn-modelo').children('button').click(function () {

            var id_base = $(this).attr('id');
            var name = $(this).parent().find('span').html();
            var n = id_base.split("_");
            var id = n[1];
            var option = $(this);
            var select = $(this).parent().parent().parent().find('select');
            var button = $(this).parent().parent().parent().find('select').find('button');

            //devolve o option para o select
            select.append("<option id='" + id + "' value='" + id + "'>" + name + "</option>");
            //Conta os inputs
            var count = $(this).parent().parent().find('.btn-modelo').length;
            $(this).parent().parent().parent().find('select').fadeIn();
            $(this).parent().parent().parent().find('button').fadeIn();

            if (count === 1) {

                $(this).parent().parent().slideUp("normal", function () {
                    $(this).remove();

                });
            } else {
                $(this).parent().slideUp("normal", function () {
                    $(this).remove();
                });

            }

            // ordenando o select
            select.html($("option", select).sort(function (a, b) {
                return a.text === b.text ? 0 : a.text < b.text ? -1 : 1;
            }));
            return false;
        });

    }


    removeGrade();

    $('.inputSelect').find("button").click(function () {

        var tipo = $(this).attr('id');
        if (tipo === "removeBtn") {
            removeGrade();
        }
        var select = $(this).parent();
        var nomeSelect = select.find('select').attr('id');

        var input = select.find('option').html();
        var input_id = select.find('option').val();


        var result_select = "result_" + nomeSelect;
        //modelo
        var modelo = "<div class='btn-modelo'>" +
            "<input type='hidden' name='" + nomeSelect + "[]'value='##id_option##'>" +
            "<span class='btn btn-xs btn-danger'>##option_value##</span> " +
            "<button type='button' id='removeBtn' class='btn-link text-danger'><i class='fa fa-trash'></i></a>" +
            "</div>";
        //######################################################################################
        // FunÃ§Ã£o para criar a div que mostra o resultado
        //Ela serÃ¡ criada somente uma vez dentro da div principal
        function ResultSelect(value, classPai, nameClass) {

            if (value) {
                if (($('.' + nameClass).length) < 1) {
                    $('<div>', {
                        'class': result_select,
                        css: {
                            background: '#eee',
                            padding: 2,
                            border: '1px solid #ddd',
                            margin: "5px 0 0 0",
                            "max-height": 300,
                            "overflow": "auto"
                        }
                    }).appendTo(select);
                }
            } else {
                $('.' + classPai).find('.' + nameClass).fadeOut();
            }
            return nameClass;
        }
//######################################################################################


        if (tipo === "incluir") {
// captura o id do option
            var id_option = select.find('option:selected').val(); // recupera a vertical selecionada
            // captura o value do option
            if (typeof id_option != 'undefined') {
                var option_value = select.find('option:selected').html(); // recupera a vertical selecionada
                //Faz  o replace no modelo
                var data = modelo.replace(/##id_option##/g, id_option).replace
                ('##option_value##', option_value);
                //Remove o option selecionado do select
                select.find('option:selected').remove();
                //Criar a div para mostrar o Resultado

                var result = ResultSelect(true, 'resultInput', result_select);
                $("." + result).append(data);
                var count = select.find('option').length;
                if (count === 0) {
                    select.find("select").fadeOut();
                    select.children("button#incluir").fadeOut();
                }
                removeGrade(); // chama a funÃ§Ã£o para remover quando for chamado
                return false;
            }

        }
    });
});


/*######################################################################################*/

$(document).ready(function () {
    //####### TELEFONE #########
    var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? "(00) 00000-0000" : "(00) 0000-00009";
        },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('.sp_celphones').mask(SPMaskBehavior, spOptions);

    //######### CPF ###################
    $('.date').mask('00/00/0000');
    $('.tamanho').mask("##0.00", {reverse: true});
    $('.peso').mask("##0.00", {reverse: true});
});


$(document).ready(function(){
    $('.alert').delay(10000).fadeOut('slow');
});
