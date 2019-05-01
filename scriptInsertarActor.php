<?php
    include_once("conexionSakila.php");
    
    $name = $_GET["nombre"];
    $last_name = $_GET["apellidos"];

    $query = "INSERT INTO actor (first_name, last_name)
            VALUES('$name', '$last_name')";
    $mysqli -> query($query);

    if(1 == $mysqli -> affected_rows)
    {
        echo "Actor insertado con éxito.<br/>";
    }
    else 
    {
        echo "Actor no insertado.<br/>";
    }

    $mysqli -> close();
?>