function show_section_content(section_name) {
    
    const table_name_to_view_input = document.getElementById('table_name_to_view');
    const get_table_to_view_btn = document.getElementById('get_table_to_view_btn');

    // Делаем "Содержимое раздела" активным
    clearActiveClass(function_listItems);
    clearActiveClass(contentItems);
  
    setActiveClass(function_listItems, 2);
    setActiveClass(contentItems, 2);

    function_menu.options[2].selected = true;


    // Вставляем название раздела в поле ввода названия раздела в "Содержимое раздела"
    table_name_to_view_input.value = section_name;

    // Нажимаем кнопку "Получить"
    get_table_to_view_btn.click();
  


}