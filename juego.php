<?php
session_start();

if (!isset($_SESSION['total_tiradas'])) {
    $_SESSION['total_tiradas'] = 0;
}

if (isset($_POST["jugador"])) {
    $_SESSION["nombre"] = $_POST["jugador"];
}

if (isset($_POST['reiniciar'])) {

    session_unset(); 
    session_destroy(); 
    header("Location: inicio.php"); 

    exit(); 
}

if (isset($_POST['dado'])) {
    $_SESSION['total_tiradas']++;
}

$avanzar = isset($_POST['dado']) ? $_POST['dado'] : 0;
$total_avanzado = isset($_SESSION['total_avanzado']) ? $_SESSION['total_avanzado'] : 0;


if ($avanzar > 0) {
    $total_avanzado += $avanzar;
    if ($total_avanzado == 5) {
        $total_avanzado = 25;
        echo "<h4 class='text-white text-justify' > Usted cayo en la casilla No. 5 ahora SUBIO a la casilla No. 25 </h4>";
    } elseif ($total_avanzado == 34) {
        $total_avanzado = 66;
        echo "<h4 class='text-white text-justify' > Usted cayo en la casilla No. 34 ahora SUBIO a la casilla No. 66 </h4>";
    } elseif ($total_avanzado == 33) {
        $total_avanzado = 11;
        echo "<h4 class='text-white text-justify' > Usted cayo en la casilla No. 33 ahora VOLVIO a la casilla No. 11 </h4>";
    } elseif ($total_avanzado == 42) {
        $total_avanzado = 17;
        echo "<h4 class='text-white text-justify' > Usted cayo en la casilla No. 42 ahora VOLVIO a la casilla No. 17 </h4>";
    } elseif ($total_avanzado == 59) {
        $total_avanzado = 79;
        echo "<h4 class='text-white text-justify' > Usted cayo en la casilla No. 59 ahora SUBIO a la casilla No. 79 </h4>";
    } elseif ($total_avanzado == 88) {
        $total_avanzado = 51;
        echo "<h4 class='text-white text-justify' > Usted cayo en la casilla No. 88 ahora VOLVIO a la casilla No. 51 </h4>";
    } elseif($total_avanzado >= 100) { 

        ?><form action="#" method="post" id="formulario"  >
            
            <h4>FELICIDADES! HAZ, GANADO</h4>
            <input type="hidden" value="LO HAZ LOGRADO" name="reiniciar" >
            <button type="submit" id="boton" >REINICIAR </button>
        </form>
        <?php   
    }

    $_SESSION['total_avanzado'] = $total_avanzado;

    session_regenerate_id();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego</title>
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

        .formulario {
            margin-top: 10%;
            background-color: rgba(0, 0, 0, 0.605);
            padding: 15%;
        }

        #numeros {
            text-align: center;
            font-size: 30px;
            color: black;
        }

        h4,
        h2 {
            background-color: rgba(0, 0, 0, 0.605);
            color: white;
            padding: 1%;
            text-align: justify;
        }

        table,
        tr,
        td {
            border: solid 4px black;
        }

        #texto {
            color: white;
            text-align: center;
        }

        #iniciar {
            position: absolute;
            margin-left: -5%;
            margin-top: 41.5%;
        }

        #imagen_inicio {
            position: absolute;
            margin-left: -15%;
            margin-top: 38.8%;
            width: 150px;
        }
        #boton{
            background-color: rgba(0, 119, 255, 0.667);
            color: white;
            width: 250px;
            height: 75px;
            border-radius: 8%;
            font-size: 50px;
            margin-left: 40%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Juego de la Escalera y la Serpiente</h1>
        <div class="row">
            <div class="col-3">
                <h2>JUGADOR
                    <?php echo isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : "" ?>
                </h2>

                <form action="#" method="post" class="formulario text-white">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tiradas</label>
                        <input type="number" class="form-control" name="tiradas" value="<?php echo $_SESSION['total_tiradas'] ?>"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Dado</label>
                        <input type="number" value="<?php echo rand(1, 6) ?>" class="form-control" name="dado" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">TIRAR</button>
                </form>
                <div id="texto">
                    <h4> Usted Avanzo <?php echo $avanzar; ?> Casillas </h4>

                </div>
            </div>
            <div class="col-1"></div>
            <div class="col-8"><?php


            $filas_columnas = 10;
            $contador = 100;
            $colores = ['green', 'white', 'blue', 'yellow', 'red'];
            $tiradas = 0; 
    
            ?>

                <img src="escalera.png"
                    style="z-index: 2; position: absolute; width: 100px; height: 310px; margin-top: 13%; margin-left: 25%; ">
                <img src="escalera.png"
                    style="z-index: 2; position: absolute; width: 50px; height: 200px; margin-top: 32%; margin-left: 19%; ">
                <img src="escalera.png"
                    style="z-index: 2; position: absolute; width: 50px; height: 200px; margin-top: 10%; margin-left: 5%; ">
                <img src="serpiente.png"
                    style="z-index: 2; position: absolute; width: 150px; height: 200px; margin-top: 28%; margin-left: 33%; ">
                <img src="serpiente.png"
                    style="z-index: 2; position: absolute; width: 170px; height: 280px; margin-top: 23%; margin-left: 6%; ">
                <img src="serpiente.png"
                    style="z-index: 2; position: absolute; width: 170px; height: 300px; margin-top: 5%; margin-left: 32%; ">
                <?php
                echo "<table style='z-index: 1;'>";
                if ($avanzar == 0) {
                    echo "<img src='iniciar.png' id='imagen_inicio'>";
                    echo "<div id='iniciar' style='z-index:2; width: 63px; height: 63px; border-radius: 50%; background-color: black; border: solid 2px white;'></div>";
                }
                for ($i = 1; $i <= $filas_columnas; $i++) {

                    $a = 10;
                    echo "<tr>";

                    for ($j = 1; $j <= $filas_columnas; $j++) {

                        $color_elegido = rand(0, count($colores) - 1);
                        $color = $colores[$color_elegido];

                        if ($i % 2 == 0) {

                            $contador2 = $contador - ($a - $j);
                            if ($total_avanzado == $contador2) {
                                echo "<td id='numeros' style='width: 70px; height: 70px; background-color: $color;'><div style='z-index:2; width: 63px; height: 63px; border-radius: 50%; background-color: black; border: solid 2px white;'></div></td>";

                            } else {
                                echo "<td id='numeros' style='width: 70px; height: 70px; background-color: $color;'>$contador2</td>";
                            }
                        } else {
                            if ($total_avanzado == $contador) {
                                echo "<td id='numeros' style='width: 70px; height: 70px; background-color: $color;'><div style='z-index:2; width: 63px; height: 63px; border-radius: 50%; background-color: black; border: solid 2px white;'></div></td>";

                            } else {
                                echo "<td id='numeros' style='width: 70px; height: 70px; background-color: $color;'>$contador</td>";
                            }
                        }
                        $a--;
                        $contador--;


                    }
                    echo "</tr>";
                }
                echo "</table>";


                ?>
            </div>
        </div>
    </div>
</body>

</html>