<?php
$personas = $personas ?? [];
$persona = $persona ?? null;
?>

<h1>Listado de Personas</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID Persona</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Documento</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Ciudad</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($personas)): ?>
            <?php foreach ($personas as $personaItem): ?>
                <tr>
                    <td><?= htmlspecialchars($personaItem['idPersona'] ?? '') ?></td>
                    <td><?= htmlspecialchars($personaItem['nombre'] ?? '') ?></td>
                    <td><?= htmlspecialchars($personaItem['apellido'] ?? '') ?></td>
                    <td><?= htmlspecialchars($personaItem['documento'] ?? '') ?></td>
                    <td><?= htmlspecialchars($personaItem['telefono'] ?? '') ?></td>
                    <td><?= htmlspecialchars($personaItem['correo'] ?? '') ?></td>
                    <td>
                        <?php if (!empty($personaItem['ciudad_nombre'])): ?>
                            <?= htmlspecialchars($personaItem['ciudad_nombre']) ?>
                        <?php else: ?>
                            Sin ciudad
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No hay personas registradas.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<h1>Detalle de la persona</h1>

<?php if (!empty($persona)): ?>

<table border="1">
    <thead>
        <tr>
            <th>ID Persona</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Documento</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Ciudad</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= htmlspecialchars($persona['idPersona'] ?? '') ?></td>
            <td><?= htmlspecialchars($persona['nombre'] ?? '') ?></td>
            <td><?= htmlspecialchars($persona['apellido'] ?? '') ?></td>
            <td><?= htmlspecialchars($persona['documento'] ?? '') ?></td>
            <td><?= htmlspecialchars($persona['telefono'] ?? '') ?></td>
            <td><?= htmlspecialchars($persona['correo'] ?? '') ?></td>
            <td>
                <?php if (!empty($persona['ciudad_nombre'])): ?>
                    <?= htmlspecialchars($persona['ciudad_nombre']) ?>
                <?php else: ?>
                    Sin ciudad
                <?php endif; ?>
            </td>
        </tr>
    </tbody>
</table>

<hr style="border: 2px solid black;">

<?php else: ?>

<p>Persona no encontrada.</p>

<?php endif; ?>