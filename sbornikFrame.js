 // Установка содержимого окна при выборе пункта из списка в "Сборник"

const function_menu = document.getElementById('function_menu');
const function_listItems = Array.from(document.getElementsByClassName('section_item'));
const contentItems = Array.from(document.getElementsByClassName('content_item'));

const clearActiveClass = (element) => {
  element.find(item => item.classList.remove('is-active'));
}

const setActiveClass = (element, index) => {
  element[index].classList.add('is-active');
}


function_menu.addEventListener('change', (event) => {
  
  clearActiveClass(function_listItems);
  clearActiveClass(contentItems);
  
  setActiveClass(function_listItems, event.target.selectedIndex);
  setActiveClass(contentItems, event.target.selectedIndex);

  console.log(event);

});

