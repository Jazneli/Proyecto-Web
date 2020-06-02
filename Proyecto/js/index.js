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
                dat:$("formIndex").serialize(),
                cache:false,
                success:function(respAx){
                    //Convertir JSON a algo que JS entienda
                    var AX = JSON.parse(respAX);
                    var titulo = "<h3>Intenciones de Inscripción</h3>"
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
                                location.replace("./pages/alumno/alumno.php");
                            }
                        }
                    })
                }
            })
        }  
    })
})