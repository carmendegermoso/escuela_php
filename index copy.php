<?php

function sumar ($num1,$num2) 
{
return $num1+$num2;
}

function restar ($num1,$num2) 
{
return $num1-$num2;
}

function multiplicar ($num1,$num2) 
{
return $num1*$num2;
}

$operacion = $_GET["operacion"]; 
$valor1 = $_GET["valor1"];
$valor2 = $_GET["valor2"];
$resultado = 0;

switch($operacion){
    case "sumar":
        $resultado = sumar($valor1,$valor2);
        break;
    case "restar":
        $resultado = restar($valor1,$valor2);
        break;
    case "multiplicar":
        $resultado = multiplicar($valor1,$valor2);
        break;
    default:
        $resultado = 0;
}


echo "EL resultado de $operacion $valor1 y $valor2 es $resultado";




//elseif ($_GET["operacion"] == "restar")

// function funcionsuma ($num1,$num2) 
// {
// return $num1+$num2;
// }

// function funcionresta ($num1,$num2) 
// {
// return $num1-$num2;
// }

// function funcionmultiplicacion ($num1,$num2) 
// {
// return $num1*$num2;
// }

// $suma=funcionsuma(5, 15);
// echo "<br> <br> La suma de 5 y 15 es igual a " .$suma;

// $resta=funcionresta(48, 36);
// echo "<br> <br> La resta de 48 y 36 es igual a " .$resta;

// $mult=funcionmultiplicacion (3,8);
// echo "<br> <br> La multiplicacion de 3 y 8 es igual a " .$mult;



