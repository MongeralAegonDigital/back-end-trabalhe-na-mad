$(document).ready(function(){
   getProducts(); 
});

function getProducts(){
    alert(1);
    /*$.ajax({
        url: 'http://localhost/teste/json.php',
        data:{
            method:"ajaxListarTodasLojas"
        },
        dataType: "json",
        type: "post",
        beforeSend: function(){
        },
        success: function(data){
            console.log(data);
        }
   });*/
}