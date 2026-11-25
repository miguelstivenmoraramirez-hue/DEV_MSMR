<?php

require_once __DIR__ . "/../models/Proveedor.php";

class Proveedor
{
    public function index()
    {
        $proveedorModel = new ProveedorController();
        $proveedores = $proveedorModel->getAll();

        $id = $_GET['id'] ?? null;
        $proveedor = $id ? $proveedorModel->getById($id) : null;

        require_once __DIR__ . "/../../views/proveedores/index.php";
    }

    public function crear()
    {
        require_once __DIR__ . "/../../views/proveedores/crear.php";
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre    = $_POST['nombre'] ?? '';
            $documento = $_POST['documento'] ?? '';
            $telefono  = $_POST['telefono'] ?? '';
            $correo    = $_POST['correo'] ?? '';
            $ciudad    = $_POST['ciudad'] ?? '';

            $proveedorModel = new Proveedor();
            $resultado = $proveedorModel->guardar($nombre, $documento, $telefono, $correo, $ciudad);

            if ($resultado) {
                header("Location: /proveedores");
                exit();
            } else {
                echo "Error al guardar el proveedor.";
            }
        }
    }
}