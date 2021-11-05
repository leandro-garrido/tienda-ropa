<?php
  // 1) Conexion
  $conexion = mysqli_connect("127.0.0.1", "root", "");
  mysqli_select_db($conexion, "tienda_ropa");

  // 2) Almacenamos los datos del envío POST
  $tipo_prenda = $_POST['tipo_prenda'];
  $marca = $_POST['marca'];
  $talle = $_POST['talle'];
  $precio = $_POST['precio'];
  $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

  // 3) Preparar la orden SQL
  // INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_a_ingresar)
  // => Ingresa dentro de la siguiente tabla los siguientes valores
  $consulta = "INSERT INTO ropa (id,tipo_prenda,marca,talle,precio,imagen) VALUES ('','$tipo_prenda','$marca','$talle','$precio','$imagen')";

  // 4) Ejecutar la orden y ingresamos datos
  mysqli_query($conexion, $consulta);
  header('Location: index.html');
?>
