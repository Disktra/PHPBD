<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    </head>
    <body>
        <?php
            include_once("conexionSakila.php");

            $id_actor = $_GET["actor_id"];

            $sqlQuery = "select title as Titulo
                        from (film f
                        join film_actor fa
                        on f.film_id = fa.film_id)
                        join actor a
                        on fa.actor_id = a.actor_id
                        where a.actor_id = $id_actor";

            $resultado = $mysqli -> query($sqlQuery);
            echo '<div class="container-fluid">';
            echo "<h1>Listado de películas de un actor</h1>";
            echo "<table>";
            echo "<th><tr><td>Película</td></tr></th>";
            while($fila = $resultado -> fetch_object())
            {
                echo "<tr>";
                echo "<td>" . $fila -> Titulo . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
            $mysqli -> close();
        ?>
    </body>
</html>