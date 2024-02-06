function add_rows(rows) {

    const table = document.getElementById('table_to_change');


    for (let i = 0; i < rows; i++) {
        var tr = document.createElement('tr');

        for (let j = 0; j < 2; j++) {
            var td = document.createElement('td');
            var input_field = document.createElement('textarea');
            input_field.style.height = "20px";
            input_field.rows = "1";

            // Увеличиваем высоту столбца при переходе слова на следующую строку
            input_field.addEventListener( 'input', function() {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight - 5 + 'px';
            });

            input_field.style.margin = "0";
            input_field.style.fontSize = "18px";
            input_field.style.fontFamily = "Times New Roman";
            input_field.style.textAlign = "center";
            input_field.style.resize = "none";
            input_field.style.border = "none";
            input_field.style.width = "99%";
            
            td.appendChild(input_field);
            tr.appendChild(td);
        }

        table.appendChild(tr);
    }
}