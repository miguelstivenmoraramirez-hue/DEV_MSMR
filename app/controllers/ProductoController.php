<?php

require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../helpers.php';

class ProductoController
{
    private $modelo;
    private $errorConexion = '';

    public function __construct()
    {
        try {
            $this->modelo = new Producto();
        } catch (Throwable $e) {
            $this->modelo = null;
            $this->errorConexion = $e->getMessage();
            error_log('AutoExpress inicializar modelo: ' . $e->getMessage());
        }
    }

    public function index()
    {
        $productos = [];
        $error = $_GET['error'] ?? '';
        $mensaje = $_GET['mensaje'] ?? '';

        try {
            $productos = $this->modeloActivo()->getAll();
        } catch (Throwable $e) {
            error_log('AutoExpress productos index: ' . $e->getMessage());
            $error = $e->getMessage();
        }

        require __DIR__ . '/../../views/productos/index.php';
    }

    public function crear()
    {
        $datos = [
            'codigo_barras' => '',
            'nombre' => '',
            'descripcion' => '',
            'precio' => '',
            'stock' => '',
            'proveedor_id' => '',
            'estado' => 'activo'
        ];
        $error = '';
        $proveedores = $this->cargarProveedores($error);

        require __DIR__ . '/../../views/productos/crear.php';
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirigir('productos');
        }

        $datos = $this->recogerDatos();
        $error = $this->validar($datos);

        if ($error === '') {
            try {
                $this->modeloActivo()->guardar($datos);
                $this->redirigir('productos', 'Producto creado correctamente.');
            } catch (Throwable $e) {
                error_log('AutoExpress guardar producto: ' . $e->getMessage());
                $error = $this->mensajeErrorGuardar($e);
            }
        }

        $proveedores = $this->cargarProveedores($error);
        require __DIR__ . '/../../views/productos/crear.php';
    }

    public function editar()
    {
        $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);

        if (!$id || $id < 1) {
            $this->redirigir('productos', '', 'El identificador del producto no es válido.');
        }

        try {
            $producto = $this->modeloActivo()->getById($id);
        } catch (Throwable $e) {
            error_log('AutoExpress buscar producto: ' . $e->getMessage());
            $this->redirigir('productos', '', 'No fue posible consultar el producto.');
        }

        if (!$producto) {
            $this->redirigir('productos', '', 'El producto solicitado no existe.');
        }

        $datos = $producto;
        $error = '';
        $proveedores = $this->cargarProveedores($error);
        require __DIR__ . '/../../views/productos/editar.php';
    }

    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirigir('productos');
        }

        $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
        if (!$id || $id < 1) {
            $this->redirigir('productos', '', 'El identificador del producto no es válido.');
        }

        $datos = $this->recogerDatos();
        $error = $this->validar($datos);

        if ($error === '') {
            try {
                $modelo = $this->modeloActivo();
                if (!$modelo->getById($id)) {
                    $this->redirigir('productos', '', 'El producto que intentas actualizar ya no existe.');
                }
                $modelo->actualizar($id, $datos);
                $this->redirigir('productos', 'Producto actualizado correctamente.');
            } catch (Throwable $e) {
                error_log('AutoExpress actualizar producto: ' . $e->getMessage());
                $error = $this->mensajeErrorGuardar($e);
            }
        }

        $datos['id'] = $id;
        $proveedores = $this->cargarProveedores($error);
        require __DIR__ . '/../../views/productos/editar.php';
    }

    public function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirigir('productos');
        }

        $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
        if (!$id || $id < 1) {
            $this->redirigir('productos', '', 'El identificador del producto no es válido.');
        }

        try {
            $modelo = $this->modeloActivo();
            if (!$modelo->getById($id)) {
                $this->redirigir('productos', '', 'El producto ya no existe.');
            }

            $modelo->eliminar($id);
            $this->redirigir('productos', 'Producto eliminado correctamente.');
        } catch (Throwable $e) {
            error_log('AutoExpress eliminar producto: ' . $e->getMessage());
            $this->redirigir('productos', '', 'No se pudo eliminar. Es posible que el producto esté relacionado con ventas.');
        }
    }

    private function modeloActivo()
    {
        if (!$this->modelo) {
            throw new RuntimeException($this->errorConexion ?: 'No hay conexión con la base de datos.');
        }
        return $this->modelo;
    }

    private function cargarProveedores(&$error)
    {
        try {
            return $this->modeloActivo()->getProveedores();
        } catch (Throwable $e) {
            error_log('AutoExpress proveedores: ' . $e->getMessage());
            if ($error === '') {
                $error = $e->getMessage();
            }
            return [];
        }
    }

    private function mensajeErrorGuardar(Throwable $e)
    {
        if ($e instanceof PDOException && ($e->errorInfo[1] ?? 0) == 1062) {
            return 'Ya existe un producto con ese código de barras.';
        }
        return 'No se pudo guardar el producto. Verifica que el proveedor exista y que los datos sean válidos.';
    }

    private function recogerDatos()
    {
        return [
            'codigo_barras' => trim($_POST['codigo_barras'] ?? ''),
            'nombre' => trim($_POST['nombre'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'precio' => trim($_POST['precio'] ?? ''),
            'stock' => trim($_POST['stock'] ?? ''),
            'proveedor_id' => trim($_POST['proveedor_id'] ?? ''),
            'estado' => trim($_POST['estado'] ?? '')
        ];
    }

    private function validar(&$datos)
    {
        if ($datos['nombre'] === '') {
            return 'El nombre del producto es obligatorio.';
        }

        if (strlen($datos['nombre']) > 100) {
            return 'El nombre no puede superar los 100 caracteres.';
        }

        if (strlen($datos['codigo_barras']) > 50) {
            return 'El código de barras no puede superar los 50 caracteres.';
        }

        if (filter_var($datos['proveedor_id'], FILTER_VALIDATE_INT) === false || (int)$datos['proveedor_id'] < 1) {
            return 'Debes seleccionar un proveedor.';
        }

        if (filter_var($datos['stock'], FILTER_VALIDATE_INT) === false || (int)$datos['stock'] < 0) {
            return 'El stock debe ser un número entero igual o mayor que cero.';
        }

        if ($datos['precio'] === '' || !is_numeric($datos['precio']) || (float)$datos['precio'] < 0) {
            return 'El precio debe ser un número igual o mayor que cero.';
        }

        if (!in_array($datos['estado'], ['activo', 'inactivo'], true)) {
            return 'El estado debe ser activo o inactivo.';
        }

        $datos['proveedor_id'] = (int)$datos['proveedor_id'];
        $datos['stock'] = (int)$datos['stock'];
        $datos['precio'] = (float)$datos['precio'];

        return '';
    }

    private function redirigir($accion, $mensaje = '', $error = '')
    {
        $parametros = ['action' => $accion];
        if ($mensaje !== '') {
            $parametros['mensaje'] = $mensaje;
        }
        if ($error !== '') {
            $parametros['error'] = $error;
        }

        header('Location: index.php?' . http_build_query($parametros));
        exit;
    }
}
