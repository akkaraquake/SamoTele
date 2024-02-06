const submit_table_btn = document.getElementById('submit_table_btn');

function convert_table() {
    // Получение данных таблицы
    var tableData = [];
    var tableRows = document.querySelectorAll('#table tr');

    for (var i = 0; i < tableRows.length; i++) {
        var rowData = [];
        var tableCells = tableRows[i].querySelectorAll('td textarea');

        for (var j = 0; j < tableCells.length; j++) {
            rowData.push(tableCells[j].value);
        }

        tableData.push(rowData);
    }

    // Заполнение формы значениями
    document.getElementById('tableDataInput').value = JSON.stringify(tableData);
}



