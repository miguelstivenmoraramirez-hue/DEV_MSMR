<?php
require_once __DIR__ . '/../../models/Venta.php';

$id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id < 1) {
    header('Location: /ventas');
    exit;
}

$ventaModel = new VentaController();
if (!$ventaModel->eliminar($id)) {
    http_response_code(500);
    exit('No se pudo eliminar la venta.');
}

header('Location: /ventas');
exit;