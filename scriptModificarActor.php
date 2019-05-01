<?php
    include_once("conexionSakila.php");
    
    $id = $_GET["id"];
    $name = $_GET["nombre"];
    $last_name = $_GET["apellidos"];

    $query = "update actor
            set first_name = '$name', last_name = '$last_name'
            where actor_id = '$id'";
    $mysqli -> query($query);

    if(1 == $mysqli -> affected_rows)
    {
        echo "Actor modificado con éxito.<br/>";
    }
    else 
    {
        echo "Actor no modificado.<br/>";
    }

    $mysqli -> close();
?>