const submit_table_btn = document.getElementById('submit_table_btn');

function convert_table() {
    // Получение данных таблицы
    var tableData = [];
    var tableRows = document.querySelectorAll('#table tr');

    for (var i = 0; i < tableRows.length; i++) {
        var rowData = [];
        var tableCells = tableRows[i].querySelectorAll('td input');

        for (var j = 0; j < tableCells.length; j++) {
            rowData.push(tableCells[j].value);
        }

        tableData.push(rowData);
    }

    // Заполнение формы значениями
    document.getElementById('tableDataInput').value = JSON.stringify(tableData);
}


function getTable() {
    var jsonData = JSON.parse('<?= $words_to_table; ?>');

    const table = document.getElementById('table');


    for (let i = 0; i < jsonData.length; i++) {
        var tr = document.createElement('tr');

        for (let j = 0; j < 2; j++) {
            var td = document.createElement('td');
            td.innerHTML = jsonData[0];
            tr.appendChild(td);
        }

        table.appendChild(tr);
    }
}


