<?php 
    //Funcion para las operaciones
    function operacion($op1,$sig,$op2){
        switch ($sig) {
            case '-':
                return $op1-$op2;
                break;
            case '+':
                return $op1+$op2;
                break;
            case '*':
                return $op1*$op2;
                break;
            case '/':
                return $op1/$op2;
                break;
            case '%':
                return $op1%$op2;
                break;
            default:
                # code...
                break;
        }
    }
?>