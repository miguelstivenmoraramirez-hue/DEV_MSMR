<?php

require_once __DIR__ . '/../../config/database.php';

class Producto
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT p.id, p.codigo_barras, p.nombre, p.descripcion, p.precio,
                       p.stock, p.proveedor_id, p.estado,
                       pr.razon_social AS proveedor
                FROM productos p
                INNER JOIN proveedores pr ON pr.id = p.proveedor_id
                ORDER BY p.id DESC";

        $consulta = $this->conn->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT id, codigo_barras, nombre, descripcion, precio,
                       stock, proveedor_id, estado
                FROM productos
                WHERE id = :id
                LIMIT 1";

        $consulta = $this->conn->prepare($sql);
        $consulta->execute([':id' => $id]);

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public function getProveedores()
    {
        $consulta = $this->conn->prepare("SELECT id, razon_social FROM proveedores ORDER BY razon_social");
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($datos)
    {
        $sql = "INSERT INTO productos
                    (codigo_barras, nombre, descripcion, precio, stock, proveedor_id, estado)
                VALUES
                    (:codigo_barras, :nombre, :descripcion, :precio, :stock, :proveedor_id, :estado)";

        $consulta = $this->conn->prepare($sql);

        return $consulta->execute([
            ':codigo_barras' => $datos['codigo_barras'] !== '' ? $datos['codigo_barras'] : null,
            ':nombre' => $datos['nombre'],
            ':descripcion' => $datos['descripcion'],
            ':precio' => $datos['precio'],
            ':stock' => $datos['stock'],
            ':proveedor_id' => $datos['proveedor_id'],
            ':estado' => $datos['estado']
        ]);
    }

    public function actualizar($id, $datos)
    {
        $sql = "UPDATE productos SET
                    codigo_barras = :codigo_barras,
                    nombre = :nombre,
                    descripcion = :descripcion,
                    precio = :precio,
                    stock = :stock,
                    proveedor_id = :proveedor_id,
                    estado = :estado
                WHERE id = :id";

        $consulta = $this->conn->prepare($sql);

        return $consulta->execute([
            ':id' => $id,
            ':codigo_barras' => $datos['codigo_barras'] !== '' ? $datos['codigo_barras'] : null,
            ':nombre' => $datos['nombre'],
            ':descripcion' => $datos['descripcion'],
            ':precio' => $datos['precio'],
            ':stock' => $datos['stock'],
            ':proveedor_id' => $datos['proveedor_id'],
            ':estado' => $datos['estado']
        ]);
    }

    public function eliminar($id)
    {
        $consulta = $this->conn->prepare("DELETE FROM productos WHERE id = :id");

        return $consulta->execute([':id' => $id]);
    }
}
