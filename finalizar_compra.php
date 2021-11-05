

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h2>Lista de ropa</h2>
        <p>La siguiente lista muestra los datos de la ropa actualmente en stock.</p>
        <table border="1">
        <tr>
            <th>ID</th>
            <th>PRODUCTO</th>
        </tr>
        <?php
        // 1) Conexion
        $conexion = mysqli_connect("127.0.0.1", "root", "");
        mysqli_select_db($conexion, "tienda_ropa");

        // ) Almacenamos los datos del envío POST
        // No se utiliza este paso en este caso puntual

        // 2) Preparar la orden SQL
        // Sintaxis SQL SELECT
        // SELECT * FROM nombre_tabla
        // => Selecciona todos los campos de la siguiente tabla
        // SELECT campos_tabla FROM nombre_tabla
        // => Selecciona los siguientes campos de la siguiente tabla
        $consulta='SELECT * FROM fantasma';

        // 3) Ejecutar la orden y obtenemos los registros
        $datos= mysqli_query($conexion, $consulta);

        // 4) Mostrar los datos del registro
        while ($reg=mysqli_fetch_array($datos)) { ?>
            <tr>
            <td><?php echo $reg['id']; ?></td>
            <td><?php echo $reg['producto']; ?></td>
            </tr>
        <?php } ?>
        <a href="finalizar.php">Finalizar</a>
    </body>
</html>
