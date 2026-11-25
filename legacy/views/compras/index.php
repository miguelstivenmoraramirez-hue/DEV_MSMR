<?php
$compras = $compras ?? [];
$compra = $compra ?? null;
?>

<h1>Listado de Compras</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID Compra</th>
            <th>Fecha</th>
            <th>Proveedor</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($compras)): ?>
            <?php foreach ($compras as $compraItem): ?>
                <tr>
                    <td><?= htmlspecialchars($compraItem['idCompra'] ?? '') ?></td>
                    <td><?= htmlspecialchars($compraItem['fecha'] ?? '') ?></td>
                    <td><?= htmlspecialchars($compraItem['proveedor_nombre'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No hay compras registradas.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<h1>Detalle de la compra</h1>

<?php if (!empty($compra)): ?>

<table border="1">
    <thead>
        <tr>
            <th>ID Compra</th>
            <th>Fecha</th>
            <th>Proveedor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= htmlspecialchars($compra['idCompra'] ?? '') ?></td>
            <td><?= htmlspecialchars($compra['fecha'] ?? '') ?></td>
            <td><?= htmlspecialchars($compra['proveedor_nombre'] ?? '') ?></td>
        </tr>
    </tbody>
</table>

<hr style="border: 2px solid black;">

<?php else: ?>

<p>Compra no encontrada.</p>

<?php endif; ?>