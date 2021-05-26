<?php
    session_start();
    require 'funciones.php';    

    //Cambiar valor
    if(!empty($_GET["cambiarValor"])){
        if(!empty($_SESSION["resultado"])){
            $_SESSION["resultado"] = -$_SESSION["resultado"];
            $_SESSION["pantalla"] = $_SESSION["resultado"];
        }else if(!empty($_SESSION["temporal"])){
            $_SESSION["temporal"] = -$_SESSION["temporal"];
            $_SESSION["pantalla"] = $_SESSION["temporal"];
        }
    }
    //Insertar numero
    if(isset($_GET['numero'])){
        if(!isset($_SESSION['temporal'])){
            $_SESSION['temporal'] = $_GET['numero'];  
        }else if(!empty($_SESSION["resultado"])){
            $_SESSION['temporal'] = $_GET['numero'];
            $_SESSION["resultado"] = "";
        }else if($_SESSION["temporal"] == 0 && $_GET["numero"] == 0){

        }else if($_SESSION["temporal"] === 0 && $_GET["numero"] != 0){
            $_SESSION["temporal"] = $_GET["numero"];
        }
        else{    
            $_SESSION['temporal'] = $_SESSION['temporal'] . $_GET['numero'];
        }
        $_SESSION['pantalla'] = $_SESSION['temporal'];
    }
    //Destruye session, reinicia la operacion
    if(!empty($_GET["ce"])){
        session_destroy();
    }
    if(!empty($_GET["raiz"])){
        $_SESSION["operador1"] = "";
        $_SESSION["signo"] = "√ ";
        if(!empty($_SESSION["resultado"])){
            $_SESSION["temporal"] = $_SESSION["resultado"];
            $_SESSION["resultado"] = sqrt($_SESSION["resultado"]);
            $_SESSION["pantalla"] = $_SESSION["resultado"];
        }else if(!empty($_SESSION["temporal"])){
            $_SESSION["resultado"] = sqrt($_SESSION["temporal"]);
            $_SESSION["pantalla"] = $_SESSION["resultado"];
        }
    }
    //Operacion uno entre
    if(!empty($_GET["unoEntre"])){
        $_SESSION["signo"] = " / ";
        $_SESSION["operador1"] = 1;
        if(empty($_SESSION["resultado"])){
            $_SESSION["resultado"] = 1/$_SESSION["temporal"];
        }else{
            $_SESSION["temporal"] = $_SESSION["resultado"];
            $_SESSION["resultado"] = 1/$_SESSION["resultado"];
        }
        $_SESSION["pantalla"] = $_SESSION["resultado"];
    }
    // Verificar la coma
    if(!empty($_GET["coma"])){
        if(empty($_SESSION["resultado"])){
            if(strpos($_SESSION["temporal"],'.') == false){
                if(empty($_SESSION["temporal"])){
                    $_SESSION["temporal"] = '0.';
                }else{
                    $_SESSION["temporal"] = $_SESSION["temporal"] . '.';
                }
                $_SESSION["pantalla"] = $_SESSION["temporal"];
            }
        }else if(empty($_SESSION["temporal"])){
            $_SESSION["temporal"] = '0.';
        }
    }
    //Vacia el valor actual
    if(!empty($_GET["c"])){
        if(!empty($_SESSION["resultado"])){

        }else{
            $_SESSION["temporal"] = "";
            $_SESSION["pantalla"] = 0;
        }  
    }
    //Borra ultima posicion
    if(!empty($_GET["retr"])){
        if(!empty($_SESSION["resultado"])){
            
        }else if(!empty($_SESSION["temporal"])){
            $_SESSION["temporal"] = substr($_SESSION["temporal"], 0, -1);
            $_SESSION["pantalla"] = $_SESSION["temporal"];
            if(strlen($_SESSION["temporal"]) == 0){
                $_SESSION["temporal"] = "";
                $_SESSION["pantalla"] = 0;
            }
        }
    }
    // Funcionalidad cuando se inserta un operador
    if(!empty($_GET["operador"])){
        if(!isset($_SESSION["temporal"])){

        }else if(isset($_SESSION["operador"]) && empty($_SESSION["resultado"])){
        
        }else{
            if(isset($_SESSION["resultado"]) && !empty($_SESSION["resultado"])){
                $_SESSION["operador1"] = $_SESSION["resultado"];
            }else{
                $_SESSION["operador1"] = $_SESSION["temporal"];
            }
            $_SESSION["temporal"] = "";
            $_SESSION["resultado"] = "";
            $_SESSION["signo"] = $_GET["operador"];
        } 
    }
    //Evalua el resultado
    if(!empty($_GET["botonIgual"])){
        if(empty($_SESSION["temporal"])){

        }else{
            $_SESSION["resultado"] =  operacion($_SESSION["operador1"] , $_SESSION["signo"] , $_SESSION["temporal"]);
            $_SESSION["pantalla"] = $_SESSION["resultado"];
        }
    }
    header('Location: index.php');
?>