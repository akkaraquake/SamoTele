// Получение таблицы разделов в "Список разделов"
function show_sections(sections, count) {

    const section_list = document.getElementById('section_list');

    for (let i = 0; i < count; i++) {
        var div = document.createElement('div');

        div.className = "section_list_element";

        var section = document.createElement('p');

        section.style.cursor = "pointer";
        section.style.overflowWrap = "break-word";

        section.innerHTML = sections[i];

        section.addEventListener('click', () => {
            show_section_content(sections[i]);
        });

        var checkbox = document.createElement('input');

        checkbox.setAttribute('type', 'checkbox');

        checkbox.className = 'section_checkbox';

        checkbox.id = 'checkbox' + i;

        

        div.appendChild(section);
        div.appendChild(checkbox);

        section_list.appendChild(div);


        // Оставляем выбранные разделы отмеченными даже после обновления страницы или таблицы разделов
        var _checkbox = document.getElementById(checkbox.id);

        _checkbox.addEventListener('change', function() {
            if (this.checked) {
                localStorage.setItem(this.id, 'checked' + i);
            }
            else {
                localStorage.removeItem(this.id);
            }
        })

        if (localStorage.getItem(checkbox.id)) {
            _checkbox.checked = true;
        }

    }
}