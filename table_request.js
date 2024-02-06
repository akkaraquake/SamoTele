$(document).ready(function() {

    // Получение таблицы из бд в разделе "Изменение раздела"
    $('#get_table_to_change_btn').on("click", function() {
        
        $('#table_to_change').html(""); // Удаляем таблицу перед получением новой

        if ($('#table_name_to_change').val() === "") {
            alert("Введите название раздела!");
        }
        else {

            $.ajax({
                url: 'php/get_table.php',
                type: 'GET',
                dataType: 'json',
                data: {"table_name": $('#table_name_to_change').val()},
                success: function(data) {
                    console.log(data.length);
                    get_table_to_change(data, data.length);

                    // Делаем кнопки + и - активными
                    $('#plus_button').prop("disabled", false);
                    $('#minus_button').prop("disabled", false);
                    
                },
                error: function() {
                    alert("Раздел с таким именем не найден!");
                }

            });
        }
        
    });

    // Получение таблицы из бд в разделе "Содержимое раздела"
    $('#get_table_to_view_btn').on("click", function() {
        
        $('#table_to_view').html(""); // Удаляем таблицу перед получением новой

        if ($('#table_name_to_view').val() === "") {
            alert("Введите название раздела!");
        }
        else {

            $.ajax({
                url: 'php/get_table.php',
                type: 'GET',
                dataType: 'json',
                data: {"table_name": $('#table_name_to_view').val()},
                success: function(data) {
                    get_table_to_view(data, data.length);
                    
                },
                error: function() {
                    alert("Раздел с таким именем не найден!");
                }

            });
        }
        
    });

    // Отправка созданной таблицы на сервер
    $('#submit_table_btn').on("click", function() {

        
        if ($('#name').val() === "") {
            alert("Введите название раздела!");
        }
        else {
            
            convert_table();
            
            if ($('#tableDataInput').val().length === 2) {
                alert("Таблица отсутствует!");
                return;
            }

            var $name = $("#name").val();

            $.ajax({
                url: 'php/send_table.php',
                type: 'POST',
                dataType: 'json',
                data: {"table_name": $name,
                    "tableData": $('#tableDataInput').val()},
                success: function() {

                    alert("Раздел " + $name + " успешно создан!");
                },

                error: function(xhr, status, error) {

                    if (xhr.status === 422) {
                        alert("Раздел с таким именем уже создан!");
                    }

                    if (xhr.status === 400) {
                        alert("Заполните пустые поля в таблице!");
                    }
                    
                }
                
            });
        }
        
    });
})