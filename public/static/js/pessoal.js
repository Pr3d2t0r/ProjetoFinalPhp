window.onload = function () {
    var options = document.querySelectorAll("#menu li");
    for (var i = 0; i < options.length; i++)
        options[i].addEventListener("click", menuClick);
    var controls = document.querySelectorAll(".controls i");
    console.log(controls)
    for (var x = 0; x < controls.length; x++) {
        console.log(controls[x]);
        controls[x].addEventListener("click", parentSubmit);
    }

}

function menuClick() {
    var options = {
        "Conta":"conta",
        "Quotas":"quotas",
        "Eventos que participou":"eventos",
        "Noticias que gostou":"noticias",
        "Socios": 'socios',
        "Noticias": 'noticias',
        "Eventos Ativos": 'eventos'
    }
    var clikedId = options[this.innerText];
    delete options[this.innerText];
    document.getElementById(clikedId).style.display = "block";
    //console.log("Id: "+clikedId);
    for (var i in options) {
        if (options[i] !== clikedId)
            document.getElementById(options[i]).style.display = "none";
    }
}

function parentSubmit() {
    this.parentNode.submit();
}