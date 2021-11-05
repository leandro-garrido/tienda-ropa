<?php
  // 1) Conexion
  $conexion = mysqli_connect("127.0.0.1", "root", "");
  mysqli_select_db($conexion, "tienda_ropa");

  // 2) Almacenamos los datos del envío GET

  // 3) Preparar la orden SQL
  // DELETE FROM nombre_tabla WHERE campo_tabla=dato
  // => Elimina de la siguiente tabla el registro donde este campo sea igual a este dato
  // DELETE FROM nombre_tabla
  // => Elimina todos los registros de la siguiente tabla
  $consulta = "DELETE FROM fantasma";

  // 4) Ejecutar la orden y eliminamos el regitro seleccionado
  mysqli_query($conexion, $consulta);
  header('Location: index.html');
?>
