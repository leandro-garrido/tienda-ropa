<?php
include_once "config.php";

// ) Almacenamos los datos del envío POST
// No se utiliza este paso en este caso puntual

// 2) Preparar la orden SQL
// Sintaxis SQL SELECT
// SELECT * FROM nombre_tabla
// => Selecciona todos los campos de la siguiente tabla
// SELECT campos_tabla FROM nombre_tabla
// => Selecciona los siguientes campos de la siguiente tabla
$consulta = 'SELECT * FROM ropa';

// 3) Ejecutar la orden y obtenemos los registros
$datos = mysqli_query($conexion, $consulta);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Ropa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
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
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Buzos</a>
                            <a class="dropdown-item" href="#">Remeras</a>
                            <a class="dropdown-item" href="#">Jeans</a>
                            <a class="dropdown-item" href="#">Calzados</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Contacto</a>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="container border p-3">
            <!-- categories -->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="text-center">
                            <h2>Mas Vendidos</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        // 4) Mostrar los datos del registro
                        while ($reg = mysqli_fetch_array($datos)) { ?>
                            <div class="card mb-1 col-6 col-lg-3">
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
        </div>


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
