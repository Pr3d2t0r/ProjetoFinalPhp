function pessoal() {
    var options = document.querySelectorAll("#menu li");
    for (var i = 0; i < options.length; i++)
        options[i].addEventListener("click", menuClick);
    var controls = document.querySelectorAll(".controls i");
    for (var x = 0; x < controls.length; x++)
        controls[x].addEventListener("click", parentSubmit);
    urlPage();
}

options = {
    "Conta":"conta",
    "Quotas":"quotas",
    "Eventos que participou":"eventos",
    "Noticias que gostou":"noticias",
    "Socios": 'socios',
    "Noticias": 'noticias',
    "Eventos Ativos": 'eventos'
}

function menuClick() {
    var url = location.origin + location.pathname;
    window.history.replaceState({}, document.title, url);
    var id = options[this.innerText];
    mainMenu(id)
}

function parentSubmit() {
    this.parentNode.submit();
}

function urlPage() {
    if (location.hash !== "") {
        var id = location.hash.replace('#', '');
        mainMenu(id)
    }
}

function mainMenu(id){
    document.getElementById(id).style.display = "block";
    //console.log("Id: "+id);
    for (var i in options) {
        if (options[i] !== id)
            document.getElementById(options[i]).style.display = "none";
    }
}