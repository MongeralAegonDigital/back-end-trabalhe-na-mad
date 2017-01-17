$(document).ready(function($){
	$("#cpf").mask("999.999.999-99");
	$("#rg").mask("99.999.999-9");
	$("#cep").mask("99999-999");
	$("#data").mask("99/99/9999");
	$("#dataExp").mask("99/99/9999");
	
	$("#tel").mask("(99) 9999?9-9999");
	$("#tel").on("blur", function() {
		var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
	
		if( last.length == 3 ) {
			var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
			var lastfour = move + last;
			var first = $(this).val().substr( 0, 9 );
	
			$(this).val( first + '-' + lastfour );
		}
	});
	
	$("#cpf").blur(validarCPF);			
	$("#cpf").keypress(function(e) {
        $("#cpfInvalido").addClass("hidden");
		$("#cpfValido").addClass("hidden");
    });
	
	//$("#form").submit(checarCPFeCEP);
	
});

function checarCPFeCEP() {
	if(validarCPF() && validarCEP())
		alert("boa");
	else
		alert("deuruim");
}

function validarCPF(){
	var cpf = $("#cpf").val();
	exp = /\.|\-/g
	cpf = cpf.toString().replace( exp, "" ); 
	var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
	var soma1=0, soma2=0;
	var vlr =11;

	for(i=0;i<9;i++){
			soma1+=eval(cpf.charAt(i)*(vlr-1));
			soma2+=eval(cpf.charAt(i)*vlr);
			vlr--;
	}       
	soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
	soma2=(((soma2+(2*soma1))*10)%11);

	var digitoGerado=(soma1*10)+soma2;
	if(digitoGerado!=digitoDigitado) {   
		$("#cpfInvalido").removeClass("hidden");
		return false;
	}
	else {
		$("#cpfValido").removeClass("hidden"); 
		return true;
	}
}

function validarCEP() {
	if ($("#cep").val().length == 9 && $("#cep").val().indexOf("_") == -1) {
		$.getJSON("http://api.postmon.com.br/v1/cep/" + $("#cep").val());
	}
};
		
$(function(){
	function onAjaxSuccess(data) {
		if(resultadoValido(data)) {
			$("#cepInvalido").addClass("hidden");
			$("#cepValido").removeClass("hidden");
			$("#endereco").removeClass("hidden");
			mudaRequerido(true);
			$("#rua").val(data.logradouro);
			$("#complemento").val(data.complemento);
			$("#bairro").val(data.bairro);
			$("#cidade").val(data.cidade);
			$("#estado").val(data.estado);
		} else {
			onAjaxError(data);
		}
	}
	
	function onAjaxError(data) {
		$("#cepInvalido").removeClass("hidden");
	}
	
	function resultadoValido(data) {
		if (data.cep != "" && data.cidade != "" && data.estado != "")
			return true;
		else
			return false;
	}

	function mudaRequerido(valor) {
		$("#rua").attr("required",valor);
		$("#numero").attr("required",valor);
		//$("#complemento").attr("required",valor);
		//$("#bairro").attr("required",valor);
		$("#cidade").attr("required",valor);
		$("#estado").attr("required",valor);
	}
	
	function validarCEP() {
		$("#cepInvalido").addClass("hidden");
		$("#cepValido").addClass("hidden");
		$("#endereco").addClass("hidden");
		mudaRequerido(false);
		if ($("#cep").val().length == 9 && $("#cep").val().indexOf("_") == -1) {
			$.getJSON("http://api.postmon.com.br/v1/cep/" + $("#cep").val()).
					success(onAjaxSuccess).
					error(onAjaxError);
		}
	};
	
	$("#cep").keypress(validarCEP);
});