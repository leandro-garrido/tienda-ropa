<?php
// 1) Conexion
include_once "config.php";

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
    <title>Tienda de Ropa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Tienda Ropa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalogo.php">Catalogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="outfits.php">Outfits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ayuda.php">Ayuda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- producto -->
    <section>
        <div class="container my-3">
            <div class="row">
                <div class="card col-12 col-md-4 col-lg-6">
                    <img class="card-img-top" src="./img/remera1.jpg"
                        alt="img">
                </div>
                <div class="card col-12 col-md-8 col-lg-6">
                    <div class="card-body">
                        <h2 class="card-title">Remera re loca</h2>
                        <p class="card-text">Color:</p>
                        <p class="card-text">Talle:
                            
                            <input type="radio" class="btn-check" name="options" id="talle_s" autocomplete="off">
                            <label class="btn btn-outline-primary" for="talle_s">S</label>
                            
                            <input type="radio" class="btn-check" name="options" id="talle_m" autocomplete="off">
                            <label class="btn btn-outline-primary" for="talle_m">M</label>
                            
                            <input type="radio" class="btn-check" name="options" id="talle_l" autocomplete="off">
                            <label class="btn btn-outline-primary" for="talle_l">L</label>
                            
                            <input type="radio" class="btn-check" name="options" id="talle_xl" autocomplete="off">
                            <label class="btn btn-outline-primary" for="talle_xl">XL</label>
                            
                            <input type="radio" class="btn-check" name="options" id="talle_xxl" autocomplete="off">
                            <label class="btn btn-outline-primary" for="talle_xxl">XXL</label>
                            
                            <input type="radio" class="btn-check" name="options" id="talle_xxxl" autocomplete="off">
                            <label class="btn btn-outline-primary" for="talle_xxxl">XXXL</label>
                            
                        </p>
                        <h2 class="card-text">$500</h2>
                        <button type="submit">Agregar al carrito</button>
                        <h4 class="card-title">Descripción</h4>
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate
                            quaerat consectetur similique porro, dolore, impedit quae tenetur eveniet animi
                            quibusdam rerum quos consequatur eos delectus, at illum adipisci eius velit?</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- otros productos -->
        <div class="productos">
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
                    <div class="col-6 col-lg-3 mt-4">
                        <div class="card">
                            <a href="ver.php?id=<?php echo $reg['id']; ?>" class="card-body text-center">
                                <img class="card-img-top" src="./img/remera1.jpg" alt="img">
                                <h3 class="card-title">remera re loca</h3>
                                <p class="card-text">$10</p>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="sec5 mt-5">
            <div class="container-fluid bg-dark">
                <div class="row">
                    <div class="my-5 text-center text-light">
                        <h2>¡ENTERATE DE TODO!</h2>
                        <p>Suscribite a nuestro newsletter y recibí ofertas exclusivas</p>
                        <form>
                            <div class="d-flex justify-content-center">
                                <input type="email" class="form-control w-50 rounded-pill mx-3" id="exampleInputEmail1"
                                    placeholder="Ingresá tu email">
                                <button type="submit" class="btn boton btn-primary px-5 rounded-pill">Enviar</button>
                            </div>
                        </form>
                        <div class="mt-3">
                            <h5>Seguinos en nuestras redes</h5>
                            <button type="button" class="btn">
                                <a class="social" href="https://www.facebook.com/" target="_blank"><i
                                        class="bi bi-facebook"></i></a>
                            </button>
                            <button type="button" class="btn">
                                <a class="social" href="https://www.instagram.com/" target="_blank"><i
                                        class="bi bi-instagram"></i></a>
                            </button>
                            <button type="button" class="btn">
                                <a class="social" href="https://twitter.com/" target="_blank"><i
                                        class="bi bi-twitter"></i></a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Vestirse nunca fue tan facil.</h2>
                </div>
                <hr class="mt-5">
                <div class="col-12 col-lg-6 col-xl-6">
                    <p class="text-muted">Diseñado por <a href="https://www.linkedin.com/in/leandro-garrido/"
                            target="_blank">Leandro Garrido</a>. Todos los derechos reservados</p>
                </div>
                <div class="col-12 col-lg-6 col-xl-6 text-end">
                    <p class="text-muted">Utilizado con fines educativos para <a href="https://www.potrerodigital.org/"
                            target="_blank">Potrero Digital</a></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>