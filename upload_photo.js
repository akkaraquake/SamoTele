const uploadPhoto = document.getElementById("upload_avatar");
const uploadPhotoBtn = document.getElementById("upload_avatar_btn");
const submitPhotoBtn = document.getElementById("hidden_submit_btn");

uploadPhotoBtn.addEventListener('click', () => {
    uploadPhoto.click();
});

uploadPhoto.addEventListener('change', () => {
    submitPhotoBtn.click();
});