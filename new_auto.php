<?php
include('config.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php require_once "menu.php" ?>
    <title>Clientes</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <h3>Nuevo Auto</h3>
                <hr>
                <form method="post" action="registro_auto.php">
                    <div class="form-group">
                        <label for="matricula">Matricula:</label>
                        <input id="matricula" class="form-control" type="text" name="matricula">
                    </div>
                    <div class="form-group">
                        <label for="marca">Marca:</label>
                        <input id="marca" class="form-control" type="text" name="marca">
                    </div>
                   
                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <input id="modelo" class="form-control" type="text" name="modelo">
                    </div>
                    <div class="form-group">
                        <label for="color">Color:</label>
                        <input id="color" class="form-control" type="text" name="color">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input id="precio" class="form-control" type="text" name="precio">
                    </div>
                     <br>
                    <button class="btn btn-primary" name="registro" type="submit">Guardar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>