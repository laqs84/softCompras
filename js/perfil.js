$(document).ready(function(){
    $("#frmRestablecer").submit(function(e){
          $.ajax({
                url: 'cambiarpasswordperfil.php',
                type: 'post',
                data: $("#frmRestablecer").serializeArray(),
                dataType: 'json',
                success:function(respuesta) {
                    $("#mensaje").html(respuesta);
                    $("#password1").val('');    
                    $("#password2").val('');
                } // /success
        }); // ajax function
    });
  });
  
  
