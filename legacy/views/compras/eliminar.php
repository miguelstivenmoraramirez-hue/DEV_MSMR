<?php
require_once __DIR__ . '/../../models/Compra.php';

$id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id < 1) {
    header('Location: /compras');
    exit;
}

$compraModel = new CompraController();
if (!$compraModel->eliminar($id)) {
    http_response_code(500);
    exit('No se pudo eliminar la compra.');
}

header('Location: /compras');
exit;