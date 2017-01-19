$(document).ready( function() {
   $('#cep').blur(function(){

           $.ajax({
                url : '../consultar_cep.php',
                type : 'POST',
                data: 'cep=' + $('#cep').val(),
                dataType: 'json',
                success: function(data){
 
                        $('#logradouro').val(data.logradouro);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.cidade);
                        $('#estado').val(data.estado);
						$('#complemento').val(data.complemento);
 
                        $('#numero').focus();
                    
                }
           });   
   return false;    
   })
});