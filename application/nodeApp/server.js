var http = require('http');

const options = {
    hostname: 'localhost',
    port: 80,
    method: 'GET',
    path: '/ProjetoFinalPhp/pessoal/adicionarquotas',
    headers: {
        'Content-Type': 'application/json'
    }
}

setInterval(()=>{
    var req = http.request(options, res=>{
        console.log(`Status: ${res.statusCode}`);
        res.on('data', data => {
            process.stdout.write("Response => "+data);
        });
    });

    req.on('error', err =>{
        process.stdout.write("Error => "+err);
    });

    req.end();
}, 36000000);


