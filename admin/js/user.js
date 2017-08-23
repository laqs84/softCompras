var manageUserTable;

$(document).ready(function() {
	// active top navbar users	
        $('.nav-pills .user').addClass('active');	

	manageUserTable = $('#manageUserTable').DataTable({
		'ajax' : 'fetchusers.php',
		'order': []
	}); // manage user Data Table
 
 var consulta;
                                                 
      //comprobamos si se pulsa una tecla
      $("#email").keyup(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#email").val();
                                      
             //hace la búsqueda
             $("#resultado").delay(1000).queue(function(n) {                                        
                        $.ajax({
                              type: "POST",
                              url: "../existecorreo.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){  
                                    
                                    if(data == "<span style='font-weight:bold;color:red;'>El correo de usuario ya existe.</span>"){
                                        $("#login-submit").hide(); 
                                        $("#resultado").html(data); 
                                    } 
                                    else {
                                        $("#resultado").html("");
                                        $("#login-submit").show();
                                    }
                                    n();
                              }
                  });
                                           
             });
                                
      });

}); // /document
