<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subtte Vasquez O.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url(./fondo.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .formulario{
            margin-top: 35%;
            background-color: rgba(0, 0, 0, 0.605);
            padding: 15%;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center text-white" >Bienvenido al Juego de la Serpiente</h1>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4" >
                <form action="juego.php" method="post"  class="formulario text-white" > 
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre del Jugador</label>
                        <input type="text" class="form-control" name="jugador" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Listo!</label>
                    </div class="d-flex justify-content-center" >
                    <button type="submit" class="btn btn-primary">JUGAR</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>