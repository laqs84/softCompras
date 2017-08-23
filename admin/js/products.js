var manageProductsTable;

$(document).ready(function() {
	// active top navbar products	
        $('.nav-pills .products').addClass('active');	

	manageProductsTable = $('#manageProductsTable').DataTable({
		'ajax' : 'fetchProducts.php',
		'order': []
	}); // manage Products Data Table
 

}); // /document
