$('a.scrollitem').click(function () {
    $('li a').removeClass('selected');
    $(this).toggleClass('selected');

    var link =  $(this).attr('id');
    var desloca = link * 100;

    $('.wrapper').animate({
        marginLeft: '-'+desloca+'%'
    },1000);
    return false;
});


$(document).ready(function () {

});

$(".fone").bind('input propertychange', function () {
    // pego o valor do telefone
    var texto = $(this).val();
    // Tiro tudo que não é numero
    texto = texto.replace(/[^\d]/g, '');
    // Se tiver alguma coisa
    if (texto.length > 0)
    {
        // Ponho o primeiro parenteses do DDD
        texto = "(" + texto;
        if (texto.length > 3)
        {
            // Fecha o parenteses do DDD
            texto = [texto.slice(0, 3), ") ", texto.slice(3)].join('');
        }
        if (texto.length > 12)
        {
            // Se for 13 digitos ( DDD + 9 digitos) ponhe o traço no quinto digito
            if (texto.length > 13)
                texto = [texto.slice(0, 10), "-", texto.slice(10)].join('');
            else
            // Se for 12 digitos ( DDD + 8 digitos) ponhe o traço no quarto digito
                texto = [texto.slice(0, 9), "-", texto.slice(9)].join('');
        }
        // Não adianta digitar mais digitos!
        if (texto.length > 15)
            texto = texto.substr(0, 15);
    }
    // Retorna o texto
    $(this).val(texto);
    return false;
});




