//C. Ejercicio práctico 1

<?php
// 1. Declarar el arreglo indexado con 5 lenguajes de programación
$lenguajes = ["PHP", "JavaScript", "Python", "Java", "C#"];

// 2. Mostrar los elementos requeridos (recordando que los índices empiezan en 0)
echo "El segundo lenguaje es: " . $lenguajes[1] . "<br>"; // Índice 1 (segundo elemento)
echo "El quinto lenguaje es: " . $lenguajes[4] . "<br>";  // Índice 4 (quinto elemento)
echo "El primer lenguaje es: " . $lenguajes[0] . "<br>";  // Índice 0 (primer elemento)
?>



//D. Ejercicio práctico 2

<?php
// 1. Crear el arreglo indexado con las 4 categorías
$categorias = ["Electrónica", "Ropa y Moda", "Hogar y Cocina", "Deportes"];

// 2. Mostrar la tercera categoría registrada (posición con índice 2)
echo "La tercera categoría registrada es: " . $categorias[2];
?>



//C. Ejercicio práctico 3

<?php
// 1. Crear el arreglo asociativo con los datos del aprendiz
$aprendiz = [
    "nombre" => "Miguel Mora",
    "ficha" => "2900000",
    "programa" => "Análisis y Desarrollo de Software (ADSO)",
    "edad" => 25
];

// 2. Mostrar el nombre y el programa de formación usando sus claves
echo "Nombre del aprendiz: " . $aprendiz["nombre"] . "<br>";
echo "Programa de formación: " . $aprendiz["programa"];
?>



//D. Ejercicio práctico 4

<?php
// 1. Crear el arreglo asociativo con los datos del proveedor
$proveedor = [
    "nombre" => "TecnoPartes S.A.S.",
    "ciudad" => "Bogotá",
    "telefono" => "3101234567",
    "correo" => "contacto@tecnopartes.com"
];

// 2. Mostrar el nombre del proveedor y su ciudad usando sus claves
echo "Nombre del proveedor: " . $proveedor["nombre"] . "<br>";
echo "Ciudad: " . $proveedor["ciudad"];
?>



////C. Ejercicio práctico 5

<?php
// 1. Crear el arreglo asociativo inicial
$producto = [
    "nombre" => "Monitor Gamer",
    "precio" => 750000,
    "cantidad" => 4
];

// 2. Modificar el precio y actualizar la cantidad
$producto["precio"] = 699900;
$producto["cantidad"] = 8;

// 3. Agregar una nueva clave para la categoría
$producto["categoria"] = "Periféricos y Pantallas";

// 4. Mostrar toda la información actualizada
echo "Nombre: " . $producto["nombre"] . "<br>";
echo "Precio actualizado: " . $producto["precio"] . "<br>";
echo "Cantidad disponible: " . $producto["cantidad"] . "<br>";
echo "Categoría: " . $producto["categoria"];
?>




///D. Ejercicio práctico 6

<?php
// 1. Crear el arreglo indexado con 3 marcas
$marcas = ["HP", "Dell", "Lenovo"];

// 2. Agregar dos marcas adicionales usando corchetes vacíos
$marcas[] = "Asus";
$marcas[] = "Acer";

// 3. Mostrar en pantalla las cinco marcas registradas
echo "Marcas de computadores registradas:<br>";
echo "1. " . $marcas[0] . "<br>";
echo "2. " . $marcas[1] . "<br>";
echo "3. " . $marcas[2] . "<br>";
echo "4. " . $marcas[3] . "<br>";
echo "5. " . $marcas[4] . "<br>";
?>




///D. Ejercicio práctico 7

<?php
// 1. Crear el arreglo anidado con 3 productos
$productos = [
    [
        "nombre" => "Mouse Gamer",
        "precio" => 45000,
        "cantidad" => 15
    ],
    [
        "nombre" => "Teclado Mecánico",
        "precio" => 120000,
        "cantidad" => 8
    ],
    [
        "nombre" => "Monitor 24 pulgadas",
        "precio" => 650000,
        "cantidad" => 4
    ]
];

// 2. Mostrar los datos solicitados
echo "Nombre del segundo producto: " . $productos[1]["nombre"] . "<br>";
echo "Precio del tercer producto: " . $productos[2]["precio"] . "<br>";
echo "Cantidad disponible del primer producto: " . $productos[0]["cantidad"];
?>



///E. Ejercicio práctico 8

<?php
// 1. Crear el arreglo anidado con 3 aprendices
$aprendices = [
    [
        "nombre" => "Miguel Mora",
        "ficha" => "2900000",
        "programa" => "ADSO"
    ],
    [
        "nombre" => "Luz Pérez",
        "ficha" => "2900000",
        "programa" => "ADSO"
    ],
    [
        "nombre" => "Carlos Gómez",
        "ficha" => "2900001",
        "programa" => "ADSO"
    ]
];

// 2. Mostrar el nombre del tercer aprendiz y la ficha del primero
echo "Nombre del tercer aprendiz: " . $aprendices[2]["nombre"] . "<br>";
echo "Ficha del primer aprendiz: " . $aprendices[0]["ficha"];
?>


////C. Ejercicio práctico 9

<?php
// 1. Crear el arreglo asociativo con datos y un arreglo interno de contacto
$aprendiz = [
    "nombre" => "Miguel Mora",
    "edad" => 25,
    "contacto" => [
        "correo" => "miguel@email.com",
        "telefono" => "3101234567"
    ]
];

// 2. Mostrar el nombre del aprendiz y su correo electrónico
echo "Nombre del aprendiz: " . $aprendiz["nombre"] . "<br>";
echo "Correo electrónico: " . $aprendiz["contacto"]["correo"];
?>


////D. Ejercicio práctico 10

<?php
// 1. Crear el arreglo asociativo del producto con el fabricante anidado
$producto = [
    "nombre" => "Portátil Gamer",
    "precio" => 3500000,
    "fabricante" => [
        "nombre" => "Asus",
        "pais" => "Taiwán"
    ]
];

// 2. Mostrar el nombre del producto y el país de origen del fabricante
echo "Nombre del producto: " . $producto["nombre"] . "<br>";
echo "País de origen del fabricante: " . $producto["fabricante"]["pais"];
?>