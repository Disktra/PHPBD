<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    </head>
    <body>
        <?php //bootstrap -> estilos.
            include_once("conexionSakila.php");

            $sqlQuery = "select first_name as Nombre, last_name as Apellidos, count(f.film_id) as Total, a.actor_id as ActorId
                        from (actor a
                        left outer join film_actor fa
                        on a.actor_id = fa.actor_id)
                        left outer join film f
                        on fa.film_id = f.film_id
                        group by a.actor_id
                        order by a.last_name, a.first_name";

            $resultado = $mysqli -> query($sqlQuery);
            echo "<div class=\"container-fluid\">";
            echo "<h1>Listado de actores</h1>"; //h1 se refiere a cabecera.
            echo "<table>";
            echo "<th><tr><td>Nombre</td><td>Apellidos</td><td>Total</td><td>Hipervinculo</td></tr></th>";
            while($fila = $resultado -> fetch_object())
            {
                echo "<tr>"; // Table row.
                echo "<td>" . $fila -> Nombre . "</td>"; // td -> table data (celdas).
                     
                echo "<td>" . $fila -> Apellidos . "</td>";
                echo "<td>" . $fila -> Total . "</td>";
                echo "<td><a href = \"filmografiaActor.php?actor_id=$fila->ActorId\">" . "Peliculas</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>"; // Agrupa contenidos.
            $mysqli -> close();
        ?>
    </body>
</html>