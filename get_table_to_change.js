// Получение таблицы в разделе "Изменение раздела"
function get_table_to_change(data, rows) {
    const table = document.getElementById('table_to_change');


    for (let i = 0; i < rows; i++) {
        var tr = document.createElement('tr');


        // Параметры для 1-го столбца
        var td_1 = document.createElement('td');
        var input_field_1 = document.createElement('textarea');

        input_field_1.style.height = "20px";
        input_field_1.rows = "1";

        // Увеличиваем высоту столбца при переходе слова на следующую строку
        input_field_1.addEventListener( 'input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight - 5 + 'px';
        });

        input_field_1.style.margin = "0";
        input_field_1.style.fontSize = "18px";
        input_field_1.style.fontFamily = "Times New Roman";
        input_field_1.style.textAlign = "center";
        input_field_1.style.resize = "none";
        input_field_1.style.border = "none";
        input_field_1.style.width = "99%";
        
        input_field_1.value = data[i]['word'];
        td_1.appendChild(input_field_1);
        tr.appendChild(td_1);



        // Параметры для 2-го столбца
        var td_2 = document.createElement('td');
        var input_field_2 = document.createElement('textarea');

        input_field_2.style.height = "20px";
        input_field_2.rows = "1";

        // Увеличиваем высоту столбца при переходе слова на следующую строку
        input_field_2.addEventListener( 'input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight - 5 + 'px';
        });

        input_field_2.style.margin = "0";
        input_field_2.style.fontSize = "18px";
        input_field_2.style.fontFamily = "Times New Roman";
        input_field_2.style.textAlign = "center";
        input_field_2.style.resize = "none";
        input_field_2.style.border = "none";
        input_field_2.style.width = "99%";
        input_field_2.value = data[i]['word_translate'];
        td_2.appendChild(input_field_2);
        tr.appendChild(td_2);


        table.appendChild(tr);
    }
}