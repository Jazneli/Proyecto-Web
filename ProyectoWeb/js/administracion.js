$(document).ready(function(){
    $(".dropdown-trigger").dropdown();
    $(".sidenav").sidenav();
    $('.fixed-action-btn').floatingActionButton();

    var boleta;
    var titulo = "<h2>Administracion</h2>";

    $("header").on("click",".findBoleta",function(){
        $.confirm({
            title:'Buscar por boleta',
            content:'' +
            '<form action="" class="formBoleta">' +
                '<div class="form-group">' +
                    '<label>Por favor ingrese la boleta</label>' +
                    '<input type="text" placeholder="Boleta" id="boleta" class="boleta form-control" required />' +
                '</div>' +
            '</form>',
            theme:"modern",
            icon:"fas fa-search",
            buttons: {
                formSubmit: {
                    text: 'Buscar',
                    btnClass: 'btn-blue',
                    action: function () {
                        var boleta = this.$content.find('.boleta').val();
                        if(boleta.length != 10){
                            $.alert('Ingresa una boleta valida');
                            return false;
                        }
                        else{
                            $.alert({
                                title:titulo,
                                content: "url:./administracionVer_AX.php?boleta="+boleta,
                                theme:"supervan",
                                icon:"fas fa-eye fa-2x"
                            });
                        }
                    }
                },
                Cancelar: function () {
                    //cerrar propmt
                },
            },
            onContentReady: function () {
                var jc = this;
                this.$content.find('form').on('submit', function (e) {
                    // si presiona Enter en vez del boton Buscar
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    });

    $("header").on("click",".findCurp",function(){
        $.confirm({
            title:'Buscar por CURP',
            content:'' +
            '<form action="" class="formName">' +
                '<div class="form-group">' +
                    '<label>Por favor ingrese el CURP</label>' +
                    '<input type="text" placeholder="CURP" class="curp form-control" data-validetta="required,number,minLength[10],maxLength[10]" />' +
                '</div>' +
            '</form>',
            theme:"modern",
            icon:"fas fa-search",
            buttons: {
                formSubmit: {
                    text: 'Buscar',
                    btnClass: 'btn-blue',
                    action: function () {
                        var curp = this.$content.find('.curp').val();
                        if(curp.length != 18){
                            $.alert('Ingresa un CURP valido');
                            return false;
                        }
                        else{
                            $.alert({
                                title:titulo,
                                content: "url:./admin_find_curp.php?curp="+curp,
                                theme:"supervan",
                                icon:"fas fa-eye fa-2x"
                            });
                        }
                    }
                },
                Cancelar: function () {
                    //cerrar propmt
                },
            },
            onContentReady: function () {
                var jc = this;
                this.$content.find('form').on('submit', function (e) {
                    // si presiona Enter en vez del boton Buscar
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    });

    //Nos ayudamos del evento on() de jQuery  [https://www.w3schools.com/jquery/event_on.asp] ya que las clases '***Almn' se generan de forma dinámica y no están disponibles en primera instancia para el DOM de JS
    $("main").on("click",".verAlmn",function(){
        boleta = $(this).attr("data-ver");
        //En algunos casos podemos ahorrarnos algunas líneas de código haciendo uso de la posibilidad que desde el plugin de confirm.js se hagan peticiones AJAX
        $.alert({
            title:titulo,
            content: "url:./administracionVer_AX.php?boleta="+boleta,
            theme:"supervan",
            icon:"fas fa-eye fa-2x"
        });
    });

    $("main").on("click",".editarAlmn",function(){
        boleta = $(this).attr("data-editar");
        window.location.href = "./administracionEditar.php?boleta="+boleta;
    });

    $("main").on("click",".eliminarAlmn",function(){
        boleta = $(this).attr("data-eliminar");
        $.confirm({
            title:titulo,
            content:"<h5>Est&aacute; seguro de eliminar el registro de la Boleta: "+boleta+"</h5>",
            theme:"supervan",
            icon:"fas fa-times",
            buttons:{
                Sí:function(){
                    $.alert({
                        title:titulo,
                        content: "url:./administracionEliminar_AX.php?boleta="+boleta,
                        theme:"supervan",
                        icon:"fas fa-times fa-2x",
                        onDestroy:function(){
                            location.reload();
                        }
                    });
                },
                No:function(){
                }
            }
        });
    });

    $("main").on("click",".pdfAlmn",function(){
        boleta = $(this).attr("data-pdf");
        window.location.href = "./administracionPDF.php?boleta="+boleta;
    });

    $("main").on("click",".correoAlmn",function(){
        boleta = $(this).attr("data-correo");
        window.location.href = "./administracionCorreo.php?boleta="+boleta;
    });
});