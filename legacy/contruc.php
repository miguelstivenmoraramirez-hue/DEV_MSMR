<?php

class Automovil {
    public $color, $tipocaja, $numpuertas, $marca, $modelo;

    public function __construct($color, $tipocaja, $numpuertas, $marca, $modelo) {
        $this->color = $color;
        $this->tipocaja = $tipocaja;
        $this->numpuertas = $numpuertas;
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function cambiarColor($color) {
        $this->color = $color;
    }

    public function imprimirEstado () {
        echo "Color: " . $this->color . "<br>";
        echo "Tipo de caja: " . $this->tipocaja . "<br>";
        echo "Número de puertas: " . $this->numpuertas . "<br>";
        echo "Marca: " . $this->marca . "<br>";
        echo "Modelo: " . $this->modelo . "<br>";
        echo "<br>";
    }
}

$auto1 = new Automovil("Negro", "Automática", 4, "Honda", "Civic");
$auto1 -> imprimirestado();

$auto2 = new Automovil("Rojo", "Manual", 2, "Toyota", "Corolla");
$auto2 -> imprimirestado();

$auto2 ->cambiarColor("Azul");
$auto2 -> imprimirestado();
//var_dump($auto1);

?>