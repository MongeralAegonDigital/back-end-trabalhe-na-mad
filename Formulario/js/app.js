
angular.module('app', [])
    .controller('FormController', ['$scope',  function($scope) {
      $scope.master = {};

      $scope.user = {};
      $scope.user.cep = "";

      $scope.status = '  ';
  	  //$scope.customFullscreen = $mdMedia('xs') || $mdMedia('sm');

      //envia email para o usuário
      $scope.sendemail = function(user) {
        $scope.master = angular.copy(user);

        console.log("data: ");
        console.dir(user);


        //load mask
      	$.gmsg({ "theme" : "loading"});
      	$.showGmsg();

        //requisita o envido do e-mail contendo os dados do usuário
        $.post( "sendDataAndSave.php", user , function( data ) {
		      //$( ".result" ).html( data );
		      console.log(data); 

		      //dismiss mask
    	     $.hideGmsg();

           if(data == "true") showDialog("#sucess");
           else if(data == "false") showDialog("#faluire");

           //reseta todos os campos do formulário
           $scope.reset();
		    });
      };

      //limpa os dados no formulário
      $scope.reset = function() {
        $scope.user = angular.copy($scope.master);
      };

      //recupera o campo cep
      $scope.getCep = function(user){
      	var cep = user.cep;

        if(!cep) cep = "";

      	//somente dígitos
      	cep = cep.replace(/\D/g, '');

      	user.cep = cep;
      }

      //checa se o cep é válido
      $scope.checkcep = function(cep,event){
      	//Expressão regular para validar o CEP.
      	var regexCEPexpression = /^[0-9]{8}$/;

      	//load mask
      	$.gmsg({ "theme" : "loading"});
      	$.showGmsg();

      	//testa se os valores não são vazios
      	if(cep || cep != ""){
      		//testa se o cep confere com a expressão regular
      		if(regexCEPexpression.test(cep)) {

      			//carrega os dados para o cep informado
      			$.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(data) {

      				//dismiss mask
      				$.hideGmsg();

                      if (!("erro" in data)) {
                          //Atualiza os campos com os valores da consulta.
                          $("#logradouro").val(data.logradouro);
                          $("#bairro").val(data.bairro);
                          $("#cidade").val(data.localidade);
                          $("#estado").val(data.uf);
                      } //end if.
                      else {
                          //CEP pesquisado não foi encontrado.
                          //alert("CEP não encontrado.");
                          console.log("dialog");
      					
      					         //$("#notfound").dialog({width: 600,height:200});
                         //mostra diálogo cep não encontrado
                         showDialog("#notfound");
                      }
                  });
      			
      		} else{
      			//alert("CEP inválido!");
      			console.log("dialog");
      			
      			//$("#dialog").dialog({width: 600,height:500});
            //mostra diálogo de erro
            showDialog("#dialog");
      		}
      	} else{
      		//alert("CEP inválido!");
      		console.log("dialog");
      		
      		//$("#dialog").dialog({width: 600,height:500}); 
          //mostra diálogo de erro
          showDialog("#dialog");  
      	}
      }

      //checa se o cep é válido após o campo perder o foco
      $("#cep").blur(function(event) {

      		event.stopPropagation();
      		
      		console.log("cep: " + $scope.user.cep);

      		$scope.checkcep($scope.user.cep,event);
      });	

      $scope.reset();
}]);

function showDialog(tag){
  $(tag).dialog({width: 600,height:200});
}    
		