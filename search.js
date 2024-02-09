const search_input = document.getElementById('search_input');

search_input.addEventListener('input', search);




function search() {

    const section_list = document.getElementById('section_list');
    const section_div_array = document.getElementsByClassName('section_list_element');
    const section_teg_array = document.getElementsByTagName("p");

    var section_array = [];

    for (let i = 0; i < section_teg_array.length; i++) {
        section_array[i] = section_teg_array[i].innerHTML;
    }
    
    var number_of_found = 0;
    for (let i = 0; i < section_teg_array.length; i++) {
        if (section_array[i].indexOf(search_input.value) >= 0) {
            section_div_array[i].style.display = "block";
            number_of_found += 1;
        }
        else {
            section_div_array[i].style.display = "none";
        }
    }

    // Чтобы не отображалась горизонтальная полоса, если ничего не найдено
    if (number_of_found === 0) {
        section_list.style.borderTop = "none";
    }
    else {
        section_list.style.borderTop = "3px ridge #0075FF";
    }
    
}




