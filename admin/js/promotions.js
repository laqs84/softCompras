$(function () {
    $('#cartcontent').datagrid({
        singleSelect: true,
        showFooter: true
    });
    $('.item-promo').draggable({
        revert: true,
        proxy: 'clone',
        onStartDrag: function () {
            $(this).draggable('options').cursor = 'not-allowed';
            $(this).draggable('proxy').css('z-index', 10);
        },
        onStopDrag: function () {
            $(this).draggable('options').cursor = 'move';
        }
    });
    $('.cart-promo').droppable({
        onDragEnter: function (e, source) {
            $(source).draggable('options').cursor = 'auto';
        },
        onDragLeave: function (e, source) {
            $(source).draggable('options').cursor = 'not-allowed';
        },
        onDrop: function (e, source) {
            var name = $(source).find('p:eq(0)').html();
            var price = $(source).find('p:eq(1)').html();
            addProduct(name, parseFloat(price.split('₡')[1]));
        }
    });
});

function addProduct(name, price) {
    var dg = $('#cartcontent');
    var data = dg.datagrid('getData');
    function add() {
        for (var i = 0; i < data.total; i++) {
            var row = data.rows[i];
            if (row.name == name) {
                row.quantity += 1;
                return;
            }
        }
        var text = "\"" + name + "\"";
        data.total += 1;
        data.rows.push({
            name: name,
            quantity: 1,
            price: price,
            delete: "<a onclick='deleteproduct(" + text + ")'><span class='glyphicon glyphicon-remove'></span></a>"
        });
    }
    add();
    dg.datagrid('loadData', data);
    var cost = 0;
    var rows = dg.datagrid('getRows');
    for (var i = 0; i < rows.length; i++) {
        cost += rows[i].price * rows[i].quantity;
    }
    dg.datagrid('reloadFooter', [{name: 'Total', price: cost}]);
}


function deleteproduct(name)
{
    var dg = $('#cartcontent');
    var data = dg.datagrid('getData');
    for (var i = 0; i < data.total; i++) {
        var row = data.rows[i];
        var index = dg.datagrid('getRowIndex',data.rows[i]);
        if (row.name == name) {
             
            dg.datagrid('deleteRow',index);
            dg.datagrid('loadData', data);
        }
    }

    var cost = 0;
    var rows = dg.datagrid('getRows');
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].price > 0) {
            cost += rows[i].price * rows[i].quantity;
        }
    }
    dg.datagrid('reloadFooter', [{name: 'Total', price: cost}]);

}
