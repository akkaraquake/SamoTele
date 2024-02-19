function back_to_section_list() {

    // Делаем "Список разделов" активным
    clearActiveClass(function_listItems);
    clearActiveClass(contentItems);
  
    setActiveClass(function_listItems, 0);
    setActiveClass(contentItems, 0);

    function_menu.options[0].selected = true;

    // Скрываем ссылку, ведущую в "Список разделов"
    document.querySelector('.section_name a').setAttribute('hidden', true);
}