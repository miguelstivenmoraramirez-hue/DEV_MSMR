<?php
$proveedores = $proveedores ?? [];
$proveedor = $proveedor ?? null;
?>

<h1>Listado de Proveedores</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID Proveedor</th>
            <th>Nombre</th>
            <th>Documento</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Ciudad</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($proveedores)): ?>
            <?php foreach ($proveedores as $proveedorItem): ?>
                <tr>
                    <td><?= htmlspecialchars($proveedorItem['idProveedor'] ?? '') ?></td>
                    <td><?= htmlspecialchars($proveedorItem['nombre'] ?? '') ?></td>
                    <td><?= htmlspecialchars($proveedorItem['documento'] ?? '') ?></td>
                    <td><?= htmlspecialchars($proveedorItem['telefono'] ?? '') ?></td>
                    <td><?= htmlspecialchars($proveedorItem['correo'] ?? '') ?></td>
                    <td>
                        <?php if (!empty($proveedorItem['ciudad_nombre'])): ?>
                            <?= htmlspecialchars($proveedorItem['ciudad_nombre']) ?>
                        <?php else: ?>
                            Sin ciudad
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No hay proveedores registrados.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<h1>Detalle del proveedor</h1>

<?php if (!empty($proveedor)): ?>

<table border="1">
    <thead>
        <tr>
            <th>ID Proveedor</th>
            <th>Nombre</th>
            <th>Documento</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Ciudad</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= htmlspecialchars($proveedor['idProveedor'] ?? '') ?></td>
            <td><?= htmlspecialchars($proveedor['nombre'] ?? '') ?></td>
            <td><?= htmlspecialchars($proveedor['documento'] ?? '') ?></td>
            <td><?= htmlspecialchars($proveedor['telefono'] ?? '') ?></td>
            <td><?= htmlspecialchars($proveedor['correo'] ?? '') ?></td>
            <td>
                <?php if (!empty($proveedor['ciudad_nombre'])): ?>
                    <?= htmlspecialchars($proveedor['ciudad_nombre']) ?>
                <?php else: ?>
                    Sin ciudad
                <?php endif; ?>
            </td>
        </tr>
    </tbody>
</table>

<hr style="border: 2px solid black;">

<?php else: ?>

<p>Proveedor no encontrado.</p>

<?php endif; ?>