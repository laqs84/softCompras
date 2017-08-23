$( document ).ready(function() {
    $("#cart").hide();
    $("#loadingDiv").hide();      
    $( ".closealert" ).click(function() {
  $("#myModal").modal('hide');     
});

$( ".sinacceso" ).click(function() {
  $("#myModal").modal('show');   
});


});

function addtocart(nombre, precio, idp)
{
    var add = 0;
    var addc = 0;
 if($('#cantidad_'+idp).val() > 0){
     if ( $(".producto"+idp).length > 0 ) {
         //$("#loadingDiv").show();
     preciop = $('#cantidad_'+idp).val() * precio;
     
     cantidad = $('#cantidad_'+idp).val();
     $(".producto"+idp+" p[class='precio']").each(function (index, value){
               add += Number($(value).text().replace('₡', ''));
               add = add + preciop;
       }); 
       
       
       
       $(".producto"+idp+" p[class='cantidad']").each(function (indexc, valuec){
               addc += Number($(valuec).text().replace('Cantidad: ', ''));
               addc = addc + Number(cantidad);
       }); 
       
       $(".producto"+idp+" p[class='precio']").text('₡ '+add)
       $(".producto"+idp+" p[class='cantidad']").text('Cantidad: ' + addc);
       $('.totalcompleto').text('Total ₡ '+add);
       // $("#loadingDiv").hide();
    }
    else{
    $("#loadingDiv").show();
    $('.totalcompleto').remove();
    $('.producto .nombre').text(nombre);
    $('.producto .precio').text('₡ ' + $('#cantidad_'+idp).val() * precio);
    $('.producto .cantidad').text('Cantidad: ' + $('#cantidad_'+idp).val());
    $('.producto .delete').append("<a class='btn btn-danger' onclick='deleteproduct("+idp+")'><span class='glyphicon glyphicon-remove'></span> Eliminar</a>")
    $(".producto").removeClass( "producto" ).addClass( "producto"+idp );
    $("#cart").show();
    $("#cart").append("<div class='producto'><hr/><p class='nombre'></p><p class='cantidad'></p><p class='precio'></p><p class='delete'></p><p class='totalcompleto'></p>")
       
       $('p[class="precio"]').each(function (index, value){
               add += Number($(value).text().replace('₡', ''));
       }); 

   $('.totalcompleto').text('Total ₡ '+add);
   $("#loadingDiv").hide();
 }
}
else{
    $("#myModal").on("hidden", function() {  
        $("#myModal").remove();
    });
    
    $('#myModal').modal('show');
    $('#myModal').on('hidden.bs.modal', function (e) {
        
    });
    
    $("#myModal").modal({          
      "backdrop"  : "static",
      "keyboard"  : true,
      "show"      : true                     
    })
}

}

function deleteproduct(idp)
{
    $("#loadingDiv").show();
    $(".producto"+idp).remove();
    var add = 0
    $('p[class="precio"]').each(function (index, value){
            add += Number($(value).text().replace('₡', ''));
            
            
    }); 

    if(add > 0){
        $('.totalcompleto').text('Total ₡ '+add);
    }
    else
    {
        $("#cart").hide();
        $('.totalcompleto').remove();
    }
    $("#loadingDiv").hide();
}
