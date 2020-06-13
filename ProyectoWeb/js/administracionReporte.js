$(document).ready(function(){
    $(".sidenav").sidenav();

    var dataBarsClave = [{
        x:claves,
        y:cantidad,
        type:"bar"
    }];

    var layout = {
        title:"Intenciones x Clave de Materia",
        font:{size:12},
        height: 400
    };

    var config = {
        responsive: true
    };

    Plotly.newPlot("genClaves",dataBarsClave,layout,config);

});