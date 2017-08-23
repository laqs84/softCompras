$(document).ready(function(){
    $("#frmRestablecer").submit(function(e){
          $.ajax({
                url: 'validaremail.php',
                type: 'post',
                data: $("#frmRestablecer").serializeArray(),
                dataType: 'json',
                success:function(respuesta) {
                    $("#mensaje").html(respuesta);
                    $("#email").val('');
                } // /success
        }); // ajax function
    });
  });
  
  
