$(document).ready(function(){
    $("#formRegistro").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                url:"./registro_AX.php",
                method:"POST",
                data:$("#formRegistro").serialize(),
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
                            if(AX.cod == 0 || AX.cod == 2){
                                location.reload();
                            }
                            if(AX.cod == 1){
                                location.replace("./../../index.php");
                            }
                        }
                    });
                }
            });
        }
    });
});