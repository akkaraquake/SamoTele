// Делаем чекбоксы, кнопки "Показать выбранное", "Очистить выбор" и "Подтвердить" видимыми после нажатия кнопки "Выбрать разделы" в "Практика"
function show_buttons() {

    var checkboxes = document.getElementsByClassName('section_checkbox');
    
    // Делаем чекбоксы видимыми
    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].style.display = 'inline-block';
    }

    // Делаем "Показать выбранное", "Очистить выбор" и "Подтвердить" видимыми
    document.getElementById('show_selected').style.display = 'block';
    document.getElementById('clear_selected_btn').style.display = 'inline-block';
    document.getElementById('confirm_selected_btn').style.display = 'inline-block';
    
}



// Скрываем все это после нажатия кнопки "Подтвердить"
function hide_buttons() {

    var checkboxes = document.getElementsByClassName('section_checkbox');
    
    // Делаем чекбоксы невидимыми
    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].style.display = 'none';
    }

    // Делаем "Показать выбранное", "Очистить выбор" и "Подтвердить" невидимыми
    document.getElementById('show_selected').style.display = 'none';
    document.getElementById('clear_selected_btn').style.display = 'none';
    document.getElementById('confirm_selected_btn').style.display = 'none';
}

