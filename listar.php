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
    $consulta='SELECT * FROM ropa';

    // 3) Ejecutar la orden y obtenemos los registros
    $datos= mysqli_query($conexion, $consulta);
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
                        <a class="nav-link" href="listar.php">Listar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agregar.php">Agregar</a>
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

    <section>
        <div class="listar mt-5">
            <div class="container">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                          <tr class="table-primary">
                            <th scope="col">ID</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">TIPO</th>
                            <th scope="col">PRECIO</th>
                            <th scope="col">IMAGEN</th>
                            <th scope="col">ACCIONES</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        // 4) Mostrar los datos del registro
                        while ($reg=mysqli_fetch_array($datos)) { ?>
                            <tr>
                                <td><?php echo $reg['id']; ?></td>
                                <td><?php echo $reg['talle']; ?></td>
                                <td><?php echo $reg['tipo_prenda']; ?></td>
                                <td><?php echo $reg['precio']; ?></td>
                                <td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen'])?>" alt="" width="100px" height="100px"></td>
                                <td>
                                    <a class="btn btn-primary m-1" href="modificar.php?id=<?php echo $reg['id'];?>">Editar</a>
                                    <a class="btn btn-primary m-1" href="borrar.php?id=<?php echo $reg['id'];?>">Borrar</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                      </table>
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


    <h1>Tienda de ropa</h1>
    <button type="submit"><a href="index.html">Inicio</a></button>
    <button type="submit"><a href="listar.php">Listar ropa</a></button>
    <button type="submit"><a href="agregar.html">Agregar ropa</a></button>
    <h2>Lista de ropa</h2>
    <p>La siguiente lista muestra los datos de la ropa actualmente en stock.</p>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>TIPO DE PRENDA</th>
        <th>MARCA</th>
        <th>TALLE</th>
        <th>PRECIO</th>
        <th>IMAGEN</th>
        <th>EDITAR</th>
        <th>BORRAR</th>
    </tr>
    
    
    </table>
</body>
</html>
