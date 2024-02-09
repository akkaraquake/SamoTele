window.onload = function() {
    
    const navigation_panel = document.getElementsByClassName('navigation_panel_element');
 

    if ((window.location.href.indexOf("https://samotele.com/profile.php") >= 0) || (window.location.href.indexOf("https://samotele.com/full_profile.php") >= 0)) {
        navigation_panel[2].classList.add('select');
    }
    else if (window.location.href.indexOf("https://samotele.com/sbornik.php") >= 0) {
        navigation_panel[1].classList.add('select');
    }
    else if (window.location.href.indexOf("https://samotele.com/practise.php") >= 0) {
        navigation_panel[0].classList.add('select');
    }
}