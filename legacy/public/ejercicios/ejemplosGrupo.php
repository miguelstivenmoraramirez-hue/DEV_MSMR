<?php
// 1. Norbey Steep Montes Ramírez (Arreglo indexado)[cite: 1]
$colores = ["Rojo", "Verde", "Azul"];
echo "1. Indexado: " . $colores[0] . "<br>";

// 2. Huber Stiven Useche Muñoz (Arreglo asociativo)[cite: 1]
$config = ["tema" => "oscuro", "version" => 2.1];
echo "2. Asociativo: " . $config["tema"] . "<br>";

// 3. Miguel Stiven Mora Ramírez (Arreglo indexado con arreglos internos)[cite: 1]
$matriz = [
    [85, 90], 
    [70, 75]
];
echo "3. Indexado con internos: " . $matriz[1][0] . "<br>";

// 4. Juan Sebastián Carrero Devia (Arreglo asociativo con arreglo interno)[cite: 1]
$perfil = [
    "nombre" => "Lucía", 
    "gustos" => ["Cine", "Fotografía"]
];
echo "4. Asociativo con interno: " . $perfil["gustos"][0] . "<br>";

// 5. Charit Mariana Martínez Becerra (Arreglo indexado)[cite: 1]
$frutas = ["Manzana", "Pera", "Uva"];
echo "5. Indexado (Charit): " . $frutas[1] . "<br>";
?>