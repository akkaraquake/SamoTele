function convert_table(table) {
    // Получение данных таблицы
    var tableData = [];
    var tableRows = document.querySelectorAll('.is-active tr');

    for (var i = 0; i < tableRows.length; i++) {
        var rowData = [];
        var tableCells = tableRows[i].querySelectorAll('.is-active td textarea');

        for (var j = 0; j < tableCells.length; j++) {
            rowData.push(tableCells[j].value);
        }

        tableData.push(rowData);
    }

    // Заполнение формы значениями
    document.getElementById(table).value = JSON.stringify(tableData);
}



