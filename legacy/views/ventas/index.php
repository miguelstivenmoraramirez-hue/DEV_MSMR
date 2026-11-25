<?php
$ventas = $ventas ?? [];
$venta = $venta ?? null;
?>

<h1>Listado de Ventas</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID Venta</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Tipo de Pago</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($ventas)): ?>
            <?php foreach ($ventas as $ventaItem): ?>
                <tr>
                    <td><?= htmlspecialchars($ventaItem['idVenta'] ?? '') ?></td>
                    <td><?= htmlspecialchars($ventaItem['fecha'] ?? '') ?></td>
                    <td><?= htmlspecialchars($ventaItem['cliente_nombre'] ?? '') ?> <?= htmlspecialchars($ventaItem['cliente_apellido'] ?? '') ?></td>
                    <td><?= htmlspecialchars($ventaItem['tipo_pago'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No hay ventas registradas.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<h1>Detalle de la venta</h1>

<?php if (!empty($venta)): ?>

<table border="1">
    <thead>
        <tr>
            <th>ID Venta</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Tipo de Pago</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= htmlspecialchars($venta['idVenta'] ?? '') ?></td>
            <td><?= htmlspecialchars($venta['fecha'] ?? '') ?></td>
            <td><?= htmlspecialchars($venta['cliente_nombre'] ?? '') ?> <?= htmlspecialchars($venta['cliente_apellido'] ?? '') ?></td>
            <td><?= htmlspecialchars($venta['tipo_pago'] ?? '') ?></td>
        </tr>
    </tbody>
</table>

<hr style="border: 2px solid black;">

<?php else: ?>

<p>Venta no encontrada.</p>

<?php endif; ?>