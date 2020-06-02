<?php
//Recupera los datos obtenidos por método POST
    foreach($_POST as $nombre_campo => $valor){ 
        $asignacion = "\$".$nombre_campo."='".$valor."';"; 
        eval($asignacion); 
    }
?>