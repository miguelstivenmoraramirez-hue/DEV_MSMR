<?php

$rutas = require_once dirname(__DIR__) . "/rutas/web.php";

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$ruta = parse_url($uri, PHP_URL_PATH);

$enrutamiento = $rutas[$method][$ruta] ?? null;

if ($enrutamiento != null) {
    $ncontrolador = $enrutamiento[0];
    $nMetodo = $enrutamiento[1];

    $controlador = new $ncontrolador();
    $controlador->$nMetodo();

} else {

    echo "Ruta no encontrada";

}

?>