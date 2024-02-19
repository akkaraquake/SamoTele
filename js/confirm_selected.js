// Действия после нажатия "Подтвердить"
const confirm_selected_btn = document.getElementById('confirm_selected_btn');


confirm_selected_btn.addEventListener('click', confirm_selected);


function confirm_selected() {

    const section_teg_array = document.getElementsByTagName("p");
    const checkboxes = document.getElementsByClassName('section_checkbox');

    var chosen_sections = [];

    for (let i = 0; i < checkboxes.length; i++) {

        if (checkboxes[i].checked) {
            chosen_sections.push(section_teg_array[i].innerHTML);
        }
    }

    localStorage.setItem('chosen_sections', JSON.stringify(chosen_sections));

    location.href = "https://samotele.com/practice.php";

    hide_buttons();

    localStorage.removeItem('choose_sections_request');

    
}