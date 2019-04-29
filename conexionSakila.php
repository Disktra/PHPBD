<?php
    include_once("constantesSakila.php");

    $mysqli = new mysqli($host, $user, $password, $database);
    if($mysqli -> connect_errno)
    {
        echo "Fallo al conectar a MySQL: {" . $mysqli -> connect_errno . ")" . $mysqli -> connect_errno . 
            ". <br/>";
    }
    echo "Conectado " . $mysqli -> host_info . ". <br/>";
?>