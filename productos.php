<?php

require_once __DIR__ . '/app/models/Producto.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $modelo = new Producto();
    echo json_encode($modelo->getAll(), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
} catch (Throwable $e) {
    error_log('AutoExpress API productos: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(
        ['error' => 'No fue posible consultar los productos de autoexpress_v2. Verifica la conexión con MySQL.'],
        JSON_UNESCAPED_UNICODE
    );
}
