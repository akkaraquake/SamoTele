const search_input = document.getElementById('search_input');


// Поиск введенных символов как подстроки 
search_input.addEventListener('input', search);


function search() {

    const section_list = document.getElementById('section_list');
    const section_div_array = document.getElementsByClassName('section_list_element');
    const section_teg_array = document.getElementsByTagName("p");

    var section_array = [];

    for (let i = 0; i < section_teg_array.length; i++) {
        section_array[i] = section_teg_array[i].innerHTML.toLowerCase();
        console.log(section_array);
    }
    
    var number_of_found = 0;
    for (let i = 0; i < section_teg_array.length; i++) {
        if (section_array[i].indexOf(search_input.value.toLowerCase()) >= 0) {
            section_div_array[i].style.display = "block";
            number_of_found += 1;
        }
        else {
            section_div_array[i].style.display = "none";
        }
    }


    // Чтобы не отображалась горизонтальная полоса, если ничего не найдено
    if (number_of_found === 0) {
        section_list.style.borderBottom = "none";
    }
    else {
        section_list.style.borderBottom = "3px ridge #0075FF";
    }
    
}


// Поиск введенных символов как целой строки
search_input.addEventListener('keydown', function(event) {

    // Нажимаем на Enter (код клавиши - 13)
    if (event.keyCode === 13) {
        search_as_whole();
    }

});


function search_as_whole() {
    
    // Чтобы не исчезал список разделов, если в поле ввода пустая строка
    if (search_input.value === "") return;


    const section_list = document.getElementById('section_list');
    const section_div_array = document.getElementsByClassName('section_list_element');
    const section_teg_array = document.getElementsByTagName("p");

    var section_array = [];

    for (let i = 0; i < section_teg_array.length; i++) {
        section_array[i] = section_teg_array[i].innerHTML.toLowerCase();
    }
    
    var number_of_found = 0;
    for (let i = 0; i < section_teg_array.length; i++) {
        if (section_array[i] == search_input.value.toLowerCase()) {
            section_div_array[i].style.display = "block";
            number_of_found += 1;
        }
        else {
            section_div_array[i].style.display = "none";
        }
    }


    // Чтобы не отображалась горизонтальная полоса, если ничего не найдено
    if (number_of_found === 0) {
        section_list.style.borderBottom = "none";
    }
    else {
        section_list.style.borderBottom = "3px ridge #0075FF";
    }
}




