<?php
require_once __DIR__ . '/../../models/Proveedor.php';

$id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id < 1) {
    header('Location: /proveedores');
    exit;
}

$proveedorModel = new ProveedorController();
if (!$proveedorModel->eliminar($id)) {
    http_response_code(500);
    exit('No se pudo eliminar el proveedor.');
}

header('Location: /proveedores');
exit;