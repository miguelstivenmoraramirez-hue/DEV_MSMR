<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Cliente</title>
</head>
<body>

<h1>Actualizando Datos del Cliente</h1>

<form action="/clientes/actualizar" method="POST">

    <input type="hidden" name="id" value="<?= htmlspecialchars($persona['idPersona'] ?? '') ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($persona['nombre'] ?? '') ?>" required>

    <br><br>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($persona['apellido'] ?? '') ?>" required>

    <br><br>

    <label for="documento">Documento:</label>
    <input type="text" id="documento" name="documento" value="<?= htmlspecialchars($persona['documento'] ?? '') ?>" required>

    <br><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" value="<?= htmlspecialchars($persona['telefono'] ?? '') ?>" required>

    <br><br>

    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($persona['correo'] ?? '') ?>" required>

    <br><br>

    <label for="ciudad">ID de la Ciudad:</label>
    <input type="number" id="ciudad" name="ciudad" value="<?= htmlspecialchars($persona['idCiudad'] ?? '') ?>" required>

    <br><br>

    <button type="submit">Actualizar Cliente</button>

</form>

</body>
</html>