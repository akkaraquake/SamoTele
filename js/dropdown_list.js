const dropdown_list = document.getElementById('dropdown_list');
const exercise_list = Array.from(document.getElementsByClassName('exercise disabled'));


var selected_section_list = JSON.parse(localStorage.getItem('chosen_sections'));


if (selected_section_list != null && selected_section_list.length !== 0) {

    // Устанавливаем статус "Разделы выбраны!"
    var select_status = document.getElementById('select_status');

    select_status.innerHTML = "Разделы выбраны!";

    select_status.style.color = "#01ee60";

    // Делаем кнопки упражнений активными
    for (let i = 0; i < exercise_list.length; i++) {
        exercise_list[i].classList.remove("disabled");
    }

    // Создаем выпадающий список с выбранными разделами
    for (let i = 0; i < selected_section_list.length; i++) {
    
        var selected_section = document.createElement('p');
    
        selected_section.className = "selected_section";
    
        selected_section.innerHTML = selected_section_list[i];
    
        dropdown_list.appendChild(selected_section);
    }

    // Получаем слова из выбранных разделов
    $.ajax({
        url: 'practice/get_words_for_exercise.php',
        type: 'GET',
        dataType: 'json',
        data: {"selected_sections": localStorage.getItem('chosen_sections')},
        success: function(data) {
            console.log("Слова получены!");

            // Сохраняем в локальное хранилище слова из выбранных разделов
            localStorage.setItem('words_data', JSON.stringify(data));
            
        }
    });
}
else {
    dropdown_list.style.border = "0";
}






