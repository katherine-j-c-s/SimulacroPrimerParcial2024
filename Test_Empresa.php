<?php
/**
 * Nombre: Katherine
 * Apellido: Contreras
 * Legajo: 4996
 * Github: https://github.com/katherine-j-c-s/SimulacroPrimerParcial2024
*/
/*
Implementar un script TestEmpresa en la cual:
*/
include "Cliente.php";
include "Moto.php";
include "Empresa.php";
//1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.

$objCliente1 = new Cliente("helent","Sanchez",false,"normal",28273828);
$objCliente2 = new Cliente("Javier","Contreras",true,"Dificil",28273828);

//2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación,
//descripción, porcentaje incremento anual, activo.

$objMoto1 = new Moto(11,2230000,2022,"Benelli Imperiale 400",85,true);
$objMoto2 = new Moto(12,584000,2021,"Zanella Zr 150 Ohc",70,true);
$objMoto3 = new Moto(13,999900,2023,"Zanella Patagonian Eagle 250",55,false);

//3. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
//Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
//[$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].

$coleccionMotos=[$objMoto1,$objMoto2,$objMoto3];
$coleccionClientes=[$objCliente1,$objCliente2];

$empresa = new Empresa("Alta Gama","Av Argenetina 123",$coleccionClientes,$coleccionMotos,[]);

//5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
//$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
//punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido

$colCodigosMoto1 = [11,12,13];
$empresa->registrarVenta($colCodigosMoto1, $objCliente2);

// 6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
// $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
// punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido

$colCodigosMoto2 = [0];
$empresa->registrarVenta($colCodigosMoto2, $objCliente2);

// 7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
// $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
// punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.

$colCodigosMoto3 = [11];
$empresa->registrarVenta($colCodigosMoto3, $objCliente1);

// 8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
// corresponden con el tipo y número de documento del $objCliente1.

$ventasXCliente1 =$empresa->retornarVentasXCliente("normal",28273828);
foreach($ventasXCliente1 as $ventaCliente){
    echo $ventaCliente;
}

// 9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
// corresponden con el tipo y número de documento del $objCliente2

$ventasXCliente2 =$empresa->retornarVentasXCliente("Dificil",28273828);
foreach($ventasXCliente2 as $ventaCliente){
    echo $ventaCliente;
}

// 10. Realizar un echo de la variable Empresa creada en 2.

echo $empresa;