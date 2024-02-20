$('#select_sections_btn').on('click', function() {
    $(location).prop('href', 'http://samotele.com/sbornik.php');

    localStorage.setItem('choose_sections_request', 'true');
})