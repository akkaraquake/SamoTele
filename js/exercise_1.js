const exercise_status_progress = document.getElementById('exercise_status_progress');
const count_input_translates = document.getElementById('count_input_translates');
const count_all_translates = document.getElementById('count_all_translates');
const word = document.getElementById('word');
const right_answer = document.getElementById('right_answer');
const right_translate = document.getElementById('right_translate');
const input_translate = document.getElementById('input_translate');
const confirm_translate_btn = document.getElementById('confirm_translate_btn');
const go_to_next_word_btn = document.getElementById('go_to_next_word');



var words = JSON.parse(localStorage.getItem('words_data')); // Получаем слова из локального хранилища

var count_answers = 1;


// Начало упражнения
exercise_onload(words[0], words.length);

function exercise_onload(first_data, length) {
     
    // Устанавливаем число вопросов
    count_all_translates.innerHTML = length;


    // Устанавливаем макс.значение шкалы прогресса
    exercise_status_progress.max = length;


    // Устанавливаем первое слово
    word.innerHTML = first_data['word'];

    // Устанавливаем перевод (правильный ответ)
    right_translate.innerHTML = first_data['word_translate'];

}


var answer_status_list = []; // Список состояний ответов
var right_answer_list = []; // Список правильных ответов
var user_answer_list = []; // Список ответов пользователя

// Подтверждаем ответ нажатием галочки
confirm_translate_btn.addEventListener('click', check_answer);

function check_answer() {

    if (input_translate.value == right_translate.innerHTML) {
    
        input_translate.style.borderColor = "#01ee60";
        input_translate.style.color = "#01ee60";
        answer_status_list[count_answers - 1] = true;

    }
    else {

        input_translate.style.borderColor = "red";
        input_translate.style.color = "red";
        right_answer.style.visibility = "visible";
        answer_status_list[count_answers - 1] = false;
    }
    right_answer_list[count_answers - 1] = right_translate.innerHTML;
    user_answer_list[count_answers - 1] = input_translate.value;

    input_translate.disabled = true;
    confirm_translate_btn.style.visibility = "hidden";
    setTimeout(() => {go_to_next_word_btn.disabled = false}, 500);
}



// Подтверждаем ответ нажатием клавиши Enter (при фокусе текстового поля)
input_translate.addEventListener('keydown', function(event) {

    // Нажимаем на Enter (код клавиши - 13)
    if (event.keyCode === 13) {
        confirm_translate_btn.click();
    }
});




// Переходим к следующим вопросам
go_to_next_word_btn.addEventListener('click', function() {

    go_next(count_answers + 1);
    count_answers += 1;

});

function go_next(count_answers) {

    if (count_answers === words.length + 1) {

        document.getElementById('doing_exercise').style.display = "none";
        show_results(words, words.length);
        document.getElementById('results').style.display = 'flex';

        // Считаем и устанавливаем правильные ответы
        var count_right_answers = 0;
        for (let i = 0; i < answer_status_list.length; i++) {
            if (answer_status_list[i]) {
                count_right_answers += 1;
            }
        }
        if (count_right_answers === 0)  document.getElementById('count_right_answers').style.color = "red";
        document.getElementById('count_right_answers').innerHTML = count_right_answers;
        document.getElementById('count_all_answers').innerHTML = answer_status_list.length;
        return;
    }

    word.innerHTML = words[count_answers - 1]['word'];
    
    right_translate.innerHTML = words[count_answers - 1]['word_translate'];

    exercise_status_progress.value = count_answers;

    count_input_translates.innerHTML = count_answers;

    input_translate.style.borderColor = "#0075FF";
    input_translate.style.color = "#0075FF";
    
    input_translate.disabled = false;
    input_translate.focus();
    input_translate.value = "";
    

    right_answer.style.visibility = "hidden";

    confirm_translate_btn.style.visibility = "visible";

    go_to_next_word_btn.disabled = true;

    if (count_answers === words.length) {

        go_to_next_word_btn.innerHTML = "Результат &gt;&gt;";
        
    }
    

}

// При нажатии Enter, переходим к следующему вопросу
document.addEventListener('keydown', function(event) {

    // Нажимаем на Enter (код клавиши - 13)
    if (event.keyCode === 13) {
        go_to_next_word_btn.click();
        
    }
});

function show_results(data, rows) {

    const table = document.getElementById('table_to_view');

    table.style.border = "2px solid black";
    table.style.borderRadius = "15px";
    table.style.backgroundColor = "white";

    for (let i = 0; i < rows; i++) {
        var tr = document.createElement('tr');

        var td_1 = document.createElement('td');
        var input_field_1 = document.createElement('input');
        input_field_1.style.margin = "0";
        input_field_1.style.fontSize = "18px";
        input_field_1.style.textAlign = "center";
        input_field_1.disabled = "true";
        input_field_1.style.width = "99%";
        
        
        
        input_field_1.value = data[i]['word'];
        td_1.appendChild(input_field_1);
        tr.appendChild(td_1);

        var td_2 = document.createElement('td');
        var input_field_2 = document.createElement('input');
        input_field_2.style.margin = "0";
        input_field_2.style.fontSize = "18px";
        input_field_2.style.textAlign = "center";
        input_field_2.disabled = "true";
        input_field_2.style.width = "99%";
        input_field_2.value = data[i]['word_translate'];

        // В таблице результатов выделяем правильные и неправильные ответы
        if (answer_status_list[i]) {
            input_field_2.style.color = "#01ee60";
        }
        else {
            input_field_2.style.color = "red";
            input_field_2.title = "Ваш ответ: " + user_answer_list[i];
        }
        
        td_2.appendChild(input_field_2);
        tr.appendChild(td_2);


        table.appendChild(tr);
    }
}

