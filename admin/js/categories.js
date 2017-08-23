var manageCategoriesTable;

$(document).ready(function() {
	// active top navbar categories
	$('.nav-pills .categories').addClass('active');	

	manageCategoriesTable = $('#manageCategoriesTable').DataTable({
		'ajax' : 'fetchCategories.php',
		'order': []
	}); // manage categories Data Table
$(".form").submit(function () {  
        if($("#editCategoriesName").val() == "") {
            alert("El campo esta vacio");
            return false;
        }
  
        if($("#CreateCategoriesName").val() == "") {
            alert("El campo esta vacio");
            return false;
        }
 }); 

}); // /document
