function addProduct(name, price, id) {
    var dg = $('#cartcontent');
    var data = dg.datagrid('getData');
    var inputs = 0;
    function add() {
        for (var i = 0; i < data.total; i++) {
            var row = data.rows[i];
            if (row.name == name) {
               // row.quantity += 1;
                return;
            }
        }
        var text = "\"" + name + "\"";
        data.total += 1;
        data.rows.push({
            name: name,
            quantity: 1,
            price: price,
            id: id,
            delete: "<a onclick='deleteproduct(" + text + ")'><span class='glyphicon glyphicon-remove'></span></a>"
        });
    }
    add();
    dg.datagrid('loadData', data);
    var cost = 0;
    
    var rows = dg.datagrid('getRows');
    for (var i = 0; i < rows.length; i++) {
        cost += rows[i].price * rows[i].quantity;
        inputs += rows[i].id + ',';
    }
    $("#products").val(inputs);
    dg.datagrid('reloadFooter', [{name: 'Total', price: cost}]);
}


function deleteproduct(name)
{
    var inputs = 0;
    var dg = $('#cartcontent');
    var data = dg.datagrid('getData');
    for (var i = 0; i < data.total; i++) {
        var row = data.rows[i];
        var index = dg.datagrid('getRowIndex', data.rows[i]);
        if (row.name == name) {

            dg.datagrid('deleteRow', index);
            dg.datagrid('loadData', data);
        }
    }

    var cost = 0;
    var rows = dg.datagrid('getRows');
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].price > 0) {
            cost += rows[i].price * rows[i].quantity;
            inputs += rows[i].id + ',';
        }
    }
    $("#products").val(inputs);
    dg.datagrid('reloadFooter', [{name: 'Total', price: cost}]);

}




            function update_calendar() {
                var month = $('#calendar_mes').attr('value');
                var year = $('#calendar_anio').attr('value');

                var valores = 'month=' + month + '&year=' + year;

                $.ajax({
                    url: 'setvalue.php',
                    type: "GET",
                    data: valores,
                    success: function (datos) {
                        $("#calendario_dias").html(datos);
                    }
                });
            }

            function set_date(date) {
                //input text donde debe aparecer la fecha
                $.ajax({
                    url: 'actualsessions.php',
                    type: "GET",
                    success: function (input) {
                        if (input == 1) {
                            $('#fechainicio').attr('value', date);
                        } else {
                            $('#fechafinal').attr('value', date);
                        }
                    }
                });


                show_calendar();
            }

            function show_calendar() {
                //div donde se mostrará calendario
                $('#calendario').toggle();
            }

$(document).ready(function () {
    $('#calendario').hide();
    $('#fechainicioc').click(function () {
        $.get('sessions.php', {input: 1}, function (data) {
            console.log('You grabbed the key 1');
        });

    });

    $('#fechafinalc').click(function () {
        $.get('sessions.php', {input: 2}, function (data) {
            console.log('You grabbed the key 2');
        });
    });

});
