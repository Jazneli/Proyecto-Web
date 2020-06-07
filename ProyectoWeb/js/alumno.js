$(document).ready(function(){
    $('.tabs').tabs();
    $('.fixed-action-btn').floatingActionButton();

    $("#formEditAlumno").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                url:"./alumnoEditar_AX.php",
                method:"POST",
                data:$("#formEditAlumno").serialize(),
                cache:false,
                success:function(respAX){
                    var AX = JSON.parse(respAX);
                    var titulo = "<h2>Proyecto Web</h2>";
                    $.alert({
                        title:titulo,
                        content:AX.msj,
                        icon:"fas fa-cogs fa-2x",
                        theme:"supervan",
                        onDestroy:function(){
                            location.reload();
                        }
                    });
                }
            });
        }
    });

    $("#formCambiarContrasena").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                url:"./alumnoContrasena_AX.php",
                method:"POST",
                data:$("#formCambiarContrasena").serialize(),
                cache:false,
                success:function(respAX){
                     var AX = JSON.parse(respAX);
                    var titulo = "<h2>Proyecto Web</h2>";
                    $.alert({
                        title:titulo,
                        content:AX.msj,
                        icon:"fas fa-cogs fa-2x",
                        theme:"supervan",
                        onDestroy:function(){
                            location.reload();
                        }
                    });
                }
            });
        }
    });
});