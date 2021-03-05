<?php
    session_start();
    if(!isset($_SESSION['pantalla'])){
        $_SESSION['pantalla'] = 0;
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>

    <!-- Boostrap -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">

</head>

<body>

    <div class="container-fluid">
        <div class="container">
            <p class="mt-3 text-center calculos">
            
            <?php 
            if(isset($_SESSION["operador1"])){
            }
            if(isset($_SESSION["signo"])){
                $_SESSION["pantalla"] = $_SESSION["operador1"] . $_SESSION["signo"];
            }
            if(isset($_SESSION["temporal"])){
                if(isset($_SESSION["operador1"])){
                    $_SESSION["pantalla"] = $_SESSION["operador1"] . $_SESSION["signo"] . $_SESSION["temporal"];
                }
            }
            if(isset($_SESSION["resultado"])){ 
                $_SESSION["pantalla"] = $_SESSION["operador1"] . " " . $_SESSION["signo"] . " " . $_SESSION["temporal"] . " = " . $_SESSION["resultado"];
            }


            ?>

            </p>
        </div>

        <div class="container border border-dark bg-light text-center mt-3">

            <div class="pantalla_calculadora">
                <p class="col text-left" id="pantalla"><?php echo $_SESSION['pantalla'];?></p>
            </div>

            <form action="funcionalidad.php" method="get" class="p-3">

                <div class="row justify-content-between mt-3 mr-3 ml-3">
                    <button class="col-3 btn btn-danger waves-effect" value="Retr" name="retr">Retr</button>
                    <button class="col-3 btn btn-danger" value="CE" name="ce">CE</button>
                    <button class="col-3 btn btn-danger" value="C" name="c">C</button>
                </div>

                <div class="row justify-content-between mt-3 mr-3 ml-3">
                    <button class="col-2 btn btn-secondary" value="7" name="numero">7</button>
                    <button class="col-2 btn btn-secondary" value="8" name="numero">8</button>
                    <button class="col-2 btn btn-secondary" value="9" name="numero">9</button>
                    <button class="col-2 btn btn-info" value="/" name="operador">/</button>
                    <button class="col-2 btn btn-info" value="raiz" name="raiz">raiz</button>
                </div>
                <div class="row justify-content-between mt-3 mr-3 ml-3">
                    <button class="col-2 btn btn-secondary" value="4" name="numero">4</button>
                    <button class="col-2 btn btn-secondary" value="5" name="numero">5</button>
                    <button class="col-2 btn btn-secondary" value="6" name="numero">6</button>
                    <button class="col-2 btn btn-info" value="*" name="operador">*</button>
                    <button class="col-2 btn btn-info" value="%" name="operador">%</button>
                </div>
                <div class="row justify-content-between mt-3 mr-3 ml-3">
                    <button class="col-2 btn btn-secondary hoverable" value="1" name="numero">1</button>
                    <button class="col-2 btn btn-secondary" value="2" name="numero">2</button>
                    <button class="col-2 btn btn-secondary" value="3" name="numero">3</button>
                    <button class="col-2 btn btn-info" value="-" name="operador">-</button>
                    <button class="col-2 btn btn-info" value="1/x" name="unoEntre">1/x</button>
                </div>
                <div class="row justify-content-between mt-3 mr-3 ml-3">
                    <button class="col-2 btn btn btn-info" value="+/-" name="cambiarValor">+/-</button>
                    <button class="col-2 btn btn-secondary" value="0" name="numero">0</button>
                    <button class="col-2 btn btn btn-info" value="." name="coma">.</button>
                    <button class="col-2 btn btn-info" value="+" name="operador">+</button>
                    <button class="col-2 btn btn-info" value="=" name="botonIgual">=</button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>