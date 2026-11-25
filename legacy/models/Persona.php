<?php

require_once __DIR__ . "/../../config/Database.php";


class PersonaController
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
                        persona.idPersona,
                        persona.nombre,
                        persona.apellido,
                        persona.documento,
                        persona.telefono,
                        persona.correo,
                        ciudad.nombre AS ciudad_nombre
                    FROM persona
                    LEFT JOIN ciudad ON persona.idCiudad = ciudad.idCiudad";

            $consulta = $this->connection->query($sql);
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener las personas: " . $e->getMessage();
            return [];
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT 
                        persona.idPersona,
                        persona.nombre,
                        persona.apellido,
                        persona.documento,
                        persona.telefono,
                        persona.correo,
                        persona.idCiudad,
                        ciudad.nombre AS ciudad_nombre
                    FROM persona
                    LEFT JOIN ciudad ON persona.idCiudad = ciudad.idCiudad
                    WHERE persona.idPersona = :id";

            $stmt = $this->connection->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener la persona: " . $e->getMessage();
            return false;
        }
    }

    public function guardar($nombre, $apellido, $documento, $telefono, $correo, $ciudad)
    {
        try {
            $sql = "INSERT INTO persona (nombre, apellido, documento, telefono, correo, idCiudad)
                    SELECT :nombre, :apellido, :documento, :telefono, :correo, ciudad.idCiudad
                    FROM ciudad
                    WHERE ciudad.nombre = :ciudad";

            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':documento', $documento);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':ciudad', $ciudad);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al guardar la persona: " . $e->getMessage();
            return false;
        }
    }

    public function eliminar($id)
    {
        try {
            $sql = "DELETE FROM persona WHERE idPersona = :id";
            $stmt = $this->connection->prepare($sql);

            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            echo "Error al eliminar la persona: " . $e->getMessage();
            return false;
        }
    }
}