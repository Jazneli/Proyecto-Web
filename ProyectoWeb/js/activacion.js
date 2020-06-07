$(document).ready(function(){
    $("#formActivacion").validetta({
        bubblePosition: "bottom",
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                url:"./contActivar_AX.php",
                method:"POST",
                data:$("#formActivacion").serialize(),
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
                            if(AX.val == 0){
                                location.reload();
                            }
                            if(AX.val == 1){
                                location.replace("./../../index.php");
                            }
                        }
                    });
                }
            });
        }
    });
});