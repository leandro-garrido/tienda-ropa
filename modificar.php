<?php
// 1) Conexion
$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "tienda_ropa");

// 2) Almacenamos los datos del envío POST
$id = $_GET['id'];

// 3) Preparar la orden SQL
// => Selecciona todos los campos de la tabla alumno donde el campo dni sea igual a $dni
$consulta= "SELECT * FROM ropa WHERE id=$id";

// 4) Ejecutar la orden y almacenamos en una variable el resultado
$repuesta=mysqli_query ($conexion, $consulta);

// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($repuesta);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda de Ropa</title>
    </head>
    <body>
        <?php
        // asignamos a diferentes variables los respectivos valores del array $datos.
        $tipo_prenda=$datos["tipo_prenda"];
        $marca=$datos["marca"];
        $talle=$datos["talle"];
        $precio=$datos["precio"];
        $imagen=$datos['imagen'];?>
        <h2>Modificar</h2>
        <p>Ingrese los nuevos datos de la prenda.</p>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Tipo de prenda</label>
            <input type="text" name="tipo_prenda" placeholder="Tipo de Prenda" value="<?php echo "$tipo_prenda"; ?>">
            <label>Marca</label>
            <input type="text" name="marca" placeholder="Marca" value="<?php echo "$marca"; ?>">
            <label>Talle</label>
            <input type="text" name="talle" placeholder="Talle" value="<?php echo "$talle"; ?>">
            <label>Precio</label>
            <input type="text" name="precio" placeholder="Precio" value="<?php echo "$precio"; ?>">
            <label>Imagen</label>
            <input type="file" name="imagen" placeholder="imagen">
            <input type="submit" name="guardar_cambios" value="Guardar Cambios">
            <button type="submit" name="Cancelar" formaction="index.html">Cancelar</button>
        </form>
        <?php
        // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
        if(array_key_exists('guardar_cambios',$_POST)){
            // 1') Conexion
            $conexion = mysqli_connect("127.0.0.1", "root", "");
            mysqli_select_db($conexion, "tienda_ropa");

            // 2') Almacenamos los datos actualizados del envío POST
            $tipo_prenda=$_POST["tipo_prenda"];
            $marca=$_POST["marca"];
            $talle=$_POST["talle"];
            $precio=$_POST["precio"];
            $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

            // 3') Preparar la orden SQL
            $consulta = "UPDATE ropa SET tipo_prenda='$tipo_prenda', marca='$marca', talle='$talle', precio='$precio', imagen='$imagen' WHERE id=$id";

            // 4') Ejecutar la orden y actualizamos los datos
            mysqli_query($conexion, $consulta);
            header('Location: index.html');
        }?>
    </body>
</html>
