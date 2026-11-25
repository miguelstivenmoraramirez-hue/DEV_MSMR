<?php
require_once __DIR__ . '/../../models/Persona.php';

$id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id < 1) {
    header('Location: /clientes');
    exit;
}

$personaModel = new PersonaController();
if (!$personaModel->eliminar($id)) {
    http_response_code(500);
    exit('No se pudo eliminar la persona.');
}

header('Location: /clientes');
exit;
