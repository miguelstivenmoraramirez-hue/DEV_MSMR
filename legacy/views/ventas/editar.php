<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Venta</title>
</head>
<body>

<h1>Actualizando Datos de la Venta</h1>

<form action="/ventas/actualizar" method="POST">

    <input type="hidden" name="id" value="<?= htmlspecialchars($venta['idVenta'] ?? '') ?>">

    <label for="fecha">Fecha:</label>
    <input type="datetime-local" id="fecha" name="fecha" value="<?= htmlspecialchars($venta['fecha'] ?? '') ?>" required>

    <br><br>

    <label for="cliente">ID del Cliente:</label>
    <input type="number" id="cliente" name="cliente" value="<?= htmlspecialchars($venta['idCliente'] ?? '') ?>" required>

    <br><br>

    <label for="tipoPago">Tipo de Pago:</label>
    <input type="text" id="tipoPago" name="tipoPago" value="<?= htmlspecialchars($venta['tipo_pago'] ?? '') ?>" required>

    <br><br>

    <button type="submit">Actualizar Venta</button>

</form>

</body>
</html>