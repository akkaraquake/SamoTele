const new_password_eye_icon = document.getElementById('new_password_eye_icon');
const new_password_confirm_eye_icon = document.getElementById('new_password_confirm_eye_icon');
const new_password_input = document.getElementById('new_password_input');
const new_password_input_confirm = document.getElementById('new_password_input_confirm');

new_password_input.addEventListener('focus', () => {
    new_password_eye_icon.removeAttribute('hidden');
});

new_password_input_confirm.addEventListener('focus', () => {
    new_password_confirm_eye_icon.removeAttribute('hidden');
});

new_password_eye_icon.addEventListener('click', () => {
    
    if (new_password_input.getAttribute('type') == 'password') {
        new_password_input.setAttribute('type', 'text');
    } else {
        new_password_input.setAttribute('type', 'password');
    }
});

new_password_confirm_eye_icon.addEventListener('click', () => {
    
    if (new_password_input_confirm.getAttribute('type') == 'password') {
        new_password_input_confirm.setAttribute('type', 'text');
    } else {
        new_password_input_confirm.setAttribute('type', 'password');
    }
});

