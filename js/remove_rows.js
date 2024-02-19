function remove_rows(rows) {

    if (rows === "0" || rows === "" || isNaN(rows)) return;

    var row = parseInt(rows);

    $('.is-active tr').slice(-row).remove();
}