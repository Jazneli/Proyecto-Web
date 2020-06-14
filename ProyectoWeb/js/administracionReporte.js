$(document).ready(function(){
    $(".sidenav").sidenav();

    $("main").on("click",".pdfMat",function(){
        clave = $(this).attr("data-pdf");
        window.location.href = "./admin_mat_pdf.php?clave="+clave;
    });

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