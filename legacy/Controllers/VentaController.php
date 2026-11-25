<?php

require_once __DIR__ . "/../models/Venta.php";

class Venta
{
    public function index()
    {
        $ventaModel = new VentaController();

        $ventas = $ventaModel->getAll();

        $venta = $ventaModel->getById(1);

        require_once __DIR__ . "/../views/ventas/index.php";
    }

    public function guardar()
    {
        $fecha = $_POST['fecha'];
        $cliente = $_POST['cliente'];
        $tipoPago = $_POST['tipoPago'];

        $ventaModel = new VentaController();
        $resultado = $ventaModel->guardar($fecha, $cliente, $tipoPago);

        if ($resultado) {
            echo "Venta guardada correctamente.";
            $this->index();
        } else {
            echo "Error al guardar la venta.";
        }
    }

    public function crear()
    {
        require_once __DIR__ . "/../views/ventas/crear.php";
    }
}