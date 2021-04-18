function associacao() {
    if (!location.pathname.includes('all'))
        galeria(false, true);
}
var i = 0;
function galeria(back=false, first=false){
    var url = location.pathname.split('/').filter(value => value !== "" && value !== " ");
    var root = url[0];
    var id = url[url.length - 1];
    var ftPath = location.origin+'/'+root+'/associacao/fotos/'+id;
    var homePath = location.origin+'/'+root;
    var error404Path =  homePath+'/404/';
    var error500Path =  homePath+'/500/';
    $.ajax({
        url: ftPath,
        contentType: "application/json",
        success: function(json){
            json = JSON.parse(json);
            if (json.error === '404' || json.success == false) {
                location.href = error404Path;
                return;
            }
            if (json.error === 'af') {
                location.href = homePath + "?error=af";
                return;
            }
            var caminhos = json.caminhos;
            if (!first)
                if (back)
                    i--;
                else
                    i++;
            if (i>=caminhos.length)
                i = 0;
            else if (i<0)
                i=caminhos.length-1
            document.getElementById('img-assoc').src = caminhos[i];
        },
        error: function(){
            location.href = error500Path;
        }
    });
}
