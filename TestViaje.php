<?php
include "Viaje.php";
function crearViaje()
{
    $pasajeroD1 = [
        'nombre' => "Juan",
        'apellido' => "Lopez",
        'documento' => 25643215
    ];

    $pasajeroD2 = [
        'nombre' => "Maria",
        'apellido' => "Ave",
        'documento' => 34659825
    ];

    $pasajeroD3 = [
        'nombre' => "Fernando",
        'apellido' => "Perez",
        'documento' => 15135647
    ];

    $pasajeroD4 = [
        'nombre' => "Carmen",
        'apellido' => "Reinike",
        'documento' => 8431659
    ];

    $pasajerosViaje = [$pasajeroD1, $pasajeroD2, $pasajeroD3, $pasajeroD4];
    //objeto 
    $unViaje = new Viaje(1234, "Neuquen", 50);
    $unViaje->setColPasajeros($pasajerosViaje);
    return $unViaje;
}
//menu
function menu()
{
    do {
        echo "Ingrese una opción: \n
        1) Crear un viaje \n
        2) Modificar pasajeros de un viaje \n
        3) Ver datos de un viaje \n
        4) salir \n";
        $respuesta = trim(fgets(STDIN));
        if (!(is_int($respuesta)) && ($respuesta < 0 || $respuesta > 4)) {
            echo "Opcion incorrecta \n";
        }
    } while (!(is_int($respuesta)) && ($respuesta < 0 || $respuesta > 4));
    return ($respuesta);
}
//programa
do {
    //ejecutamos el menu
    $case = menu();
    //swirch
    switch ($case) {
        case 1:
            $objViaje = crearViaje();
            echo $objViaje;
            break;
        case 2:
            //modificar
            echo "Modificar un pasajero: \n Opción ";
            $listaDePasajeros = $objViaje->getColPasajeros();
            //mostramos la lista
            print_r($listaDePasajeros);
            echo "Que pasajero desea modificar ingrese el DNI del mismo \n";
            $docPasajeroIng = trim(fgets(STDIN));
            echo "Ingrese el nombre del pasajero";
            $nomPasajeroIng = trim(fgets(STDIN));
            echo "ingrese el apellido del pasajero: ";
            $apePasajeroIng = trim(fgets(STDIN));
            echo "ingrese el DNI del pasajero";
            $pnuevodni = trim(fgets(STDIN));
            $objViaje->modificarPasajero($objViaje, $docPasajeroIng, $pnuevodni, $nomPasajeroIng, $apePasajeroIng);
            echo $objViaje;
            break;
        case 3:
            //mostrar información del viaje
            echo $objViaje;
            break;
        case 4:
            //salimos
            echo "fin del programa";
            break;
    }
} while ($case <> 4);
