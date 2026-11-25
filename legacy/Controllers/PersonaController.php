<?php

require_once __DIR__ . "/../models/Persona.php";

class Cliente
{
    public function index()
    {
        $personaModel = new PersonaController();
        $personas = $personaModel->getAll();

        $id = $_GET['id'] ?? null;
        $persona = $id ? $personaModel->getById($id) : null;

        require_once __DIR__ . "/../../views/personas/index.php";
    }

    public function crear()
    {
        require_once __DIR__ . "/../../views/personas/crear.php";
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre    = $_POST['nombre'] ?? '';
            $apellido  = $_POST['apellido'] ?? '';
            $documento = $_POST['documento'] ?? '';
            $telefono  = $_POST['telefono'] ?? '';
            $correo    = $_POST['correo'] ?? '';
            $ciudad    = $_POST['ciudad'] ?? '';

            $personaModel = new PersonaController();
            $resultado = $personaModel->guardar($nombre, $apellido, $documento, $telefono, $correo, $ciudad);

            if ($resultado) {
                header("Location: /clientes");
                exit();
            } else {
                echo "Error al guardar el cliente.";
            }
        }
    }
}