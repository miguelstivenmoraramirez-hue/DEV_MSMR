<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Proveedor</title>
</head>
<body>

<h1>Actualizando Datos del Proveedor</h1>

<form action="/proveedores/actualizar" method="POST">

    <input type="hidden" name="id" value="<?= htmlspecialchars($proveedor['idProveedor'] ?? '') ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($proveedor['nombre'] ?? '') ?>" required>

    <br><br>

    <label for="documento">Documento:</label>
    <input type="text" id="documento" name="documento" value="<?= htmlspecialchars($proveedor['documento'] ?? '') ?>" required>

    <br><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" value="<?= htmlspecialchars($proveedor['telefono'] ?? '') ?>" required>

    <br><br>

    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($proveedor['correo'] ?? '') ?>" required>

    <br><br>

    <label for="ciudad">ID de la Ciudad:</label>
    <input type="number" id="ciudad" name="ciudad" value="<?= htmlspecialchars($proveedor['idCiudad'] ?? '') ?>" required>

    <br><br>

    <button type="submit">Actualizar Proveedor</button>

</form>

</body>
</html>