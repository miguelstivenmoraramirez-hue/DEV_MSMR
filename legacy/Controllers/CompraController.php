<?php

require_once __DIR__ . "/../models/Compra.php";

class Compra
{
    public function index()
    {
        $compraModel = new CompraController();
        $compras = $compraModel->getAll();

        $id = $_GET['id'] ?? null;
        $compra = $id ? $compraModel->getById($id) : null;

        require_once __DIR__ . "/../../views/compras/index.php";
    }

    public function crear()
    {
        require_once __DIR__ . "/../../views/compras/crear.php";
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fecha     = $_POST['fecha'] ?? '';
            $proveedor = $_POST['proveedor'] ?? '';

            $compraModel = new CompraController();
            $resultado = $compraModel->guardar($fecha, $proveedor);

            if ($resultado) {
                header("Location: /compras");
                exit();
            } else {
                echo "Error al guardar la compra.";
            }
        }
    }

    public function eliminar($id)
    {
        $compraModel = new CompraController();
        return $compraModel->eliminar($id);
    }
}