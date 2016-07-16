
   function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            
            document.getElementById('address-street').value=("");
            document.getElementById('address-neighborhood').value=("");
            document.getElementById('address-city').value=("");
            document.getElementById('address-state').value=("");

            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('address-street').value=(conteudo.logradouro);
            document.getElementById('address-neighborhood').value=(conteudo.bairro);
            document.getElementById('address-city').value=(conteudo.localidade);
            document.getElementById('address-state').value=(conteudo.uf);
            document.getElementById('address-number').focus();
            window.scroll(0,findPos(document.getElementById("profile-category")));
            
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('address-street').value="...";
                document.getElementById('address-neighborhood').value="...";
                document.getElementById('address-city').value="...";
                document.getElementById('address-state').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

function validarCPF(cpf) {  

    cpf = cpf.replace(/[^\d]+/g,''); 
    
    function error() {

      alert("Campo CPF invalido.");
      document.getElementById("cpf").focus();
      return; 
    }

    if(cpf == '') {
        
    return error(); 
    }
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
            return error();       
    // Valida 1o digito 
    add = 0;    
    for (i=0; i < 9; i ++)       
        add += parseInt(cpf.charAt(i)) * (10 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)     
            rev = 0;    
        if (rev != parseInt(cpf.charAt(9)))     
            return error();       
    // Valida 2o digito 
    add = 0;    
    for (i = 0; i < 10; i ++)        
        add += parseInt(cpf.charAt(i)) * (11 - i);  
    rev = 11 - (add % 11);  
    if (rev == 10 || rev == 11) 
        rev = 0;    
    if (rev != parseInt(cpf.charAt(10)))
        return error();       
    return true;   
}