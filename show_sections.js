function show_sections(sections, count) {

    const section_list = document.getElementById('section_list');

    for (let i = 0; i < count; i++) {
        var div = document.createElement('div');

        div.className = "section_list_element";

        var section = document.createElement('p');

        section.style.cursor = "pointer";
        section.style.wordWrap = "break-word";

        section.innerHTML = sections[i];

        section.addEventListener('click', () => {
            show_section_content(sections[i]);
        })

        div.appendChild(section)

        section_list.appendChild(div);

    }
}