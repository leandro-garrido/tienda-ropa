<?php
// 1) Conexion
$conexion = mysqli_connect("localhost", "id17011505_root", "jdq1o7Nma3R~zTr=");
mysqli_select_db($conexion, "id17011505_tienda_ropa");

// 2) Almacenamos los datos del envío POST
$id = $_GET['id'];

// 3) Preparar la orden SQL
// => Selecciona todos los campos de la tabla alumno donde el campo dni sea igual a $dni
$consulta = "SELECT * FROM ropa WHERE id=$id";

// 4) Ejecutar la orden y almacenamos en una variable el resultado
$repuesta = mysqli_query($conexion, $consulta);

// 5) Transformamos el registro obtenido a un array
$datos = mysqli_fetch_array($repuesta);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Tienda de Ropa</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="container-img d-flex justify-content-center p-3">
                <h1>Tienda de ropa</h1>
            </div>
            <nav class="navbar navbar-light navbar-expand-sm bg-dark navbar-dark navbar-light justify-content-between">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar.php">Listar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agregar.html">Agregar</a>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- producto -->
        <section>
            <div class="container my-3">
                <div class="row">
                    <div class="text-center">
                        <h1><?php echo ucwords($datos['tipo_prenda'] . " " . $datos['marca'] . " ") . strtoupper($datos['talle']); ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="card col-6 col-lg-3">
                        <img class="card-img-top" src="data:image/png;base64, <?php echo base64_encode($datos['imagen']) ?>" alt="img" style="width: 100%; height: 400px;">
                    </div>
                    <div class="card col-6 col-lg-9">
                        <div class="card-body">
                            <h2 class="card-title">Información</h2>
                            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate quaerat consectetur similique porro, dolore, impedit quae tenetur eveniet animi quibusdam rerum quos consequatur eos delectus, at illum adipisci eius velit?</p>
                            <p class="card-text">Tipo de prenda: <?php echo ucwords($datos['tipo_prenda']); ?></p>
                            <p class="card-text">Marca: <?php echo ucwords($datos['marca']); ?></p>
                            <p class="card-text">Talle: <?php echo strtoupper($datos['talle']); ?></p>
                            <p class="card-text">Precio: $<?php echo $datos['precio']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- otros productos -->
        <section>
            <div class="container my-3">
                <div class="row">
                    <div class="text-center my-3">
                        <h2>Productos relacionados</h2>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $q = mysqli_query($conexion, 'SELECT * FROM ropa ORDER BY RAND() LIMIT 4');
                    while ($reg = mysqli_fetch_array($q)) { ?>
                        <div class="card mb-1 col-3 col-lg-3">
                            <img class="card-img-top" src="data:image/png;base64, <?php echo base64_encode($reg['imagen']) ?>" alt="img" style="width: 100%; height: 400px;">
                            <a href="ver.php?id=<?php echo $reg['id']; ?>" class="card-body" style="text-decoration: none;">
                                <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['tipo_prenda'] . " " . $reg['marca'] . " ") . strtoupper($reg['talle']); ?></h3>
                                <span>$<?php echo $reg['precio']; ?></span>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="navbar bg-dark navbar-dark">
                        <p class="text-white justify-content-center p-3">Tienda de ropa, ejemplo realizado para el curso de Backend en Potrero Digital.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>