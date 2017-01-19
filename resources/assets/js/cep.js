$(document).ready( function() {
   $('#cep').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : '../consultar_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
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