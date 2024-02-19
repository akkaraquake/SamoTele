// Первая загрузка фото
const uploadPhoto = document.getElementById("upload_avatar");
const uploadPhotoBtn = document.getElementById("upload_avatar_btn");
const submitPhotoBtn = document.getElementById("hidden_submit_btn");


uploadPhotoBtn.addEventListener('click', () => {
    uploadPhoto.click();
});

uploadPhoto.addEventListener('change', () => {
    submitPhotoBtn.click();
});


// Замена фото
const change_avatar = document.getElementById("change_avatar"); // сохраняем в переменную рамку аватара

change_avatar.addEventListener("dblclick", () => { // после двойного нажатия откроется окно для выбора фото
    uploadPhoto.click();
})

