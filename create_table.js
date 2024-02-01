
const input_name = document.getElementById('name');
const input_rows = document.getElementById('count_words');

function set_table_name() {

}


function create_table(rows) {

    const table = document.getElementById('table');


    for (let i = 0; i < rows; i++) {
        var tr = document.createElement('tr');

        for (let j = 0; j < 2; j++) {
            var td = document.createElement('td');
            var input_field = document.createElement('input');
            input_field.style.margin = "0";
            input_field.style.fontSize = "18px";
            input_field.style.fontFamily = "Times New Roman";
            input_field.style.textAlign = "center";
            td.appendChild(input_field);
            tr.appendChild(td);
        }

        table.appendChild(tr);
    }
}

function remove_table() {
    const table = document.getElementById('table');
}

