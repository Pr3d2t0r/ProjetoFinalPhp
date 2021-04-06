var options = document.querySelectorAll("#menu li");
for (var i = 0; i < options.length; i++)
    options[i].addEventListener("click", menuClick);

function menuClick() {
    var options = {
        "Conta":"conta",
        "Quotas":"quotas",
        "Eventos que participou":"eventos",
        "Noticias que gostou":"noticias"
    }
    var clikedId = options[this.innerText];
    delete options[this.innerText];
    document.getElementById(clikedId).style.display = "block";
    for (var i in options) {
        document.getElementById(options[i]).style.display = "none";
    }
}