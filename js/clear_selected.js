const clear_selected_btn = document.getElementById('clear_selected_btn');


clear_selected_btn.addEventListener('click', clear_selected);


function clear_selected() {

    var checkboxes = document.getElementsByClassName('section_checkbox');

    for (let i = 0; i < checkboxes.length; i++) {

        checkboxes[i].checked = false;

        localStorage.removeItem(checkboxes[i].id);
    }


}