<?php

require_once __DIR__ . "/../../config/Database.php";

class VentaController
{
    private $connection;

    public function __construct()
    {
        try {
            $db = new Database();
            $this->connection = $db->connect();
        } catch (PDOException $e) {
            echo "Error al conectar: " . $e->getMessage();
        }
    }

    public function getAll()
    {
        try {
            $sql = "SELECT 
                        venta.idVenta,
                        venta.fecha,
                        persona.nombre AS cliente_nombre,
                        persona.apellido AS cliente_apellido,
                        venta.tipo_pago
                    FROM venta
                    INNER JOIN persona ON venta.idCliente = persona.idPersona";

            $consulta = $this->connection->query($sql);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener las ventas: " . $e->getMessage();
            return [];
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT 
                        venta.idVenta,
                        venta.fecha,
                        venta.idCliente,
                        persona.nombre AS cliente_nombre,
                        persona.apellido AS cliente_apellido,
                        venta.tipo_pago
                    FROM venta
                    INNER JOIN persona ON venta.idCliente = persona.idPersona
                    WHERE venta.idVenta = :id";

            $stmt = $this->connection->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener la venta: " . $e->getMessage();
            return false;
        }
    }

    public function guardar($fecha, $cliente, $tipoPago)
    {
        try {
            $sql = "INSERT INTO venta (fecha, idCliente, tipo_pago)
                    SELECT :fecha, persona.idPersona, :tipoPago
                    FROM persona
                    WHERE CONCAT(persona.nombre, ' ', persona.apellido) = :cliente 
                    OR persona.documento = :cliente";

            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':cliente', $cliente);
            $stmt->bindParam(':tipoPago', $tipoPago);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al guardar la venta: " . $e->getMessage();
            return false;
        }
    }

    public function eliminar($id)
    {
        try {
            $sql = "DELETE FROM venta WHERE idVenta = :id";
            $stmt = $this->connection->prepare($sql);

            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            echo "Error al eliminar la venta: " . $e->getMessage();
            return false;
        }
    }
}