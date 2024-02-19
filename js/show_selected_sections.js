const show_selected_checkbox = document.getElementById('show_selected_checkbox');


show_selected_checkbox.addEventListener('change', show_selected);



function show_selected() {
    
    var checkboxes = document.getElementsByClassName('section_checkbox');
    const section_div_array = document.getElementsByClassName('section_list_element');
    const section_list = document.getElementById('section_list');

    var number_of_found = 0;

    if (show_selected_checkbox.checked) {

    
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
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
    else {

        for (let i = 0; i < checkboxes.length; i++) {

            section_div_array[i].style.display = "block";
        }
        section_list.style.borderBottom = "3px ridge #0075FF";
    }

    
}
