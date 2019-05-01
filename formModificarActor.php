<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
        <title>Modificacion actor.</title>
    </head>
    <body>
        <?php
            include_once("conexionSakila.php");

            $id = $_GET["actor_id"];
            $name = $_GET["nombre"];
            $last_name = $_GET["apellidos"];

            $query = "select actor_id as Id, first_name as Nombre, last_name as Apellidos
                    from actor a
                    where actor_id = '$id'";
            $result = $mysqli -> query($query);
            $row = $result -> fetch_object();
        ?>
        <h1>Formulario de modificacion de actores.</h1>
        <form action="scriptModificarActor.php" method="get">
            <table>
                <tr>
                    <td>ID:</td>
                    <td><input type="hidden" name="id" value=<?php echo $row -> Id;?>></td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre" value=<?php echo $row -> Nombre;?>></td>
                </tr>
                <tr>
                    <td>Apellidos:</td>
                    <td><input type="text" name="apellidos" value=<?php echo $row -> Apellidos;?>></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Modificar"></td>
                </tr>
            </table>
        </form>
        <?php
            $mysqli -> close();
        ?>
    </body>
</html>