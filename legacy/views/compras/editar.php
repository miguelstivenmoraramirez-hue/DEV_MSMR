<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Compra</title>
</head>
<body>

<h1>Actualizando Datos de la Compra</h1>

<form action="/compras/actualizar" method="POST">

    <input type="hidden" name="id" value="<?= htmlspecialchars($compra['idCompra'] ?? '') ?>">

    <label for="fecha">Fecha:</label>
    <input type="datetime-local" id="fecha" name="fecha" value="<?= htmlspecialchars($compra['fecha'] ?? '') ?>" required>

    <br><br>

    <label for="proveedor">ID del Proveedor:</label>
    <input type="number" id="proveedor" name="proveedor" value="<?= htmlspecialchars($compra['idProveedor'] ?? '') ?>" required>

    <br><br>

    <button type="submit">Actualizar Compra</button>

</form>

</body>
</html>