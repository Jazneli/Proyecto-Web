$(document).ready(function(){
    $("#formIndex").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                url:"./pages/index_AX.php",
                method:"POST",
                data:$("#formIndex").serialize(),
                cache:false,
                success:function(respAX){
                    var AX = JSON.parse(respAX);
                    var titulo = "<h3> Proyecto Web </h3>";
                    $.alert({
                        title:titulo,
                        content:AX.msj,
                        icon:"fas fa-cogs fa-2x",
                        theme:"supervan",
                        onDestroy:function(){
                            if(AX.val == 0){
                                //No se encontro el registro
                                location.reload();
                            }
                            if(AX.val == 1){
                                //Datos correctos
                                location.replace("./pages/alumno/alumno.php");
                            }
                        }
                    });
                }
            });
        }
    });
});