<?php

require_once __DIR__ . "/../app/Controllers/ProductoController.php";
require_once __DIR__ . "/../app/Controllers/PersonaController.php";
require_once __DIR__ . "/../app/Controllers/ProveedorController.php";
require_once __DIR__ . "/../app/Controllers/VentaController.php";
require_once __DIR__ . "/../app/Controllers/CompraController.php";

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$ruta = parse_url($uri, PHP_URL_PATH);


switch($uri){
    case"productos/index":

        if($method === "GET"){
            $productoController = new Producto;
            $productoController->index();
        }
}

switch($uri){
    case"productos/editar":

        if($method === "GET"){
            $productoController = new Producto;
            $productoController->editar();
        }
}

switch($uri){
    case"productos/actualizar":

        if($method === "POST"){
            $productoController = new Producto;
            $productoController->actualizar();
        }
}

switch($uri){
    case"personas/index":

        if($method === "GET"){
            $productoController = new Producto;
            $productoController->index();
        }
}

switch($uri){
    case"personas/editar":

        if($method === "GET"){
            $productoController = new Producto;
            $productoController->editar();
        }
}

switch($uri){
    case"personas/actualizar":

        if($method === "POST"){
            $productoController = new Producto;
            $productoController->actualizar();
        }
}

?>

<a href="/productos">Productos</a>

<?php
if ($method === 'GET' && $ruta === "/productos") {
    $productoController = new Producto();
    $productoController->index();
}

if ($method === 'GET' && $ruta === "/productos/editar") {
    $productoController = new Producto();
    $productoController->editar();
}

if ($method === 'POST' && $ruta === "/productos/actualizar") {
    $productoController = new Producto();
    $productoController->actualizar();
}
?>

/

<a href="/clientes">Clientes</a>

<?php
if ($method === 'GET' && $ruta === "/clientes") {
    $clienteController = new Cliente();
    $clienteController->index();
}
?>

/

<a href="/proveedores">Proveedores</a>

<?php
if ($method === 'GET' && $ruta === "/proveedores") {
    $proveedorController = new Proveedor();
    $proveedorController->index();
}
?>

/

<a href="/ventas">Ventas</a>

<?php
if ($method === 'GET' && $ruta === "/ventas") {
    $ventaController = new Venta();
    $ventaController->index();
}
?>

/

<a href="/compras">Compras</a>

<?php
if ($method === 'GET' && $ruta === "/compras") {
    $compraController = new Compra();
    $compraController->index();
}
?>

<hr>
//CREACION//
<hr>

<a href="/clientes/crear">Crear Cliente</a>

<?php
if ($method === 'GET' && $ruta === "/clientes/crear") {
    $clienteController = new Cliente();
    $clienteController->crear();
}

if ($method === 'POST' && $ruta === "/clientes/crear") {
    $clienteController = new Cliente();
    $clienteController->guardar();
}
?>

/

<a href="/compras/crear">Crear Compra</a>

<?php
if ($method === 'GET' && $ruta === "/compras/crear") {
    $compraController = new Compra();
    $compraController->crear();
}

if ($method === 'POST' && $ruta === "/compras/crear") {
    $compraController = new Compra();
    $compraController->guardar();
}
?>

/

<a href="/productos/crear">Crear Producto</a>

<?php
if ($method === 'GET' && $ruta === "/productos/crear") {
    $productoController = new Producto();
    $productoController->crear();
}

if ($method === 'POST' && $ruta === "/productos/crear") {
    $productoController = new Producto();
    $productoController->guardar();
}
?>

/

<a href="/proveedores/crear">Crear Proveedor</a>

<?php
if ($method === 'GET' && $ruta === "/proveedores/crear") {
    $proveedorController = new Proveedor();
    $proveedorController->crear();
}

if ($method === 'POST' && $ruta === "/proveedores/crear") {
    $proveedorController = new Proveedor();
    $proveedorController->guardar();
}
?>

/

<a href="/ventas/crear">Crear Venta</a>

<?php
if ($method === 'GET' && $ruta === "/ventas/crear") {
    $ventaController = new Venta();
    $ventaController->crear();
}

if ($method === 'POST' && $ruta === "/ventas/crear") {
    $ventaController = new Venta();
    $ventaController->guardar();
}

?>