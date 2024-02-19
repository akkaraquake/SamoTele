// Получение таблицы в разделе "Содержимое раздела"
function get_table_to_view(data, rows) {
    const table = document.getElementById('table_to_view');


    for (let i = 0; i < rows; i++) {
        var tr = document.createElement('tr');

        var td_1 = document.createElement('td');
        var input_field_1 = document.createElement('input');
        input_field_1.style.margin = "0";
        input_field_1.style.fontSize = "18px";
        input_field_1.style.fontFamily = "Times New Roman";
        input_field_1.style.textAlign = "center";
        input_field_1.disabled = "true";
        input_field_1.style.width = "99%";
        
        input_field_1.value = data[i]['word'];
        td_1.appendChild(input_field_1);
        tr.appendChild(td_1);

        var td_2 = document.createElement('td');
        var input_field_2 = document.createElement('input');
        input_field_2.style.margin = "0";
        input_field_2.style.fontSize = "18px";
        input_field_2.style.fontFamily = "Times New Roman";
        input_field_2.style.textAlign = "center";
        input_field_2.disabled = "true";
        input_field_2.style.width = "99%";
        input_field_2.value = data[i]['word_translate'];
        td_2.appendChild(input_field_2);
        tr.appendChild(td_2);


        table.appendChild(tr);
    }
}