<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoExpress | Crear producto</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .mvc-form { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:16px; }
        .mvc-field { display:flex; flex-direction:column; gap:7px; }
        .mvc-field.full { grid-column:1/-1; }
        .mvc-field label { font-weight:700; color:#432365; font-size:13px; }
        .mvc-field input, .mvc-field textarea, .mvc-field select { width:100%; padding:12px 13px; border:1px solid #ddd3e8; border-radius:8px; font:inherit; box-sizing:border-box; background:#fff; }
        .mvc-field textarea { min-height:95px; resize:vertical; }
        .mvc-actions { display:flex; flex-wrap:wrap; gap:10px; margin-top:20px; }
        .mvc-button { display:inline-flex; align-items:center; gap:8px; padding:12px 17px; border:0; border-radius:8px; background:#6c3fa0; color:white; text-decoration:none; font-weight:700; cursor:pointer; }
        .mvc-button:hover { background:#432365; color:white; }
        .mvc-button.secondary { background:#eee5f8; color:#432365; }
        .mvc-error { padding:13px 16px; margin:16px 0; border-radius:8px; background:#fde8e8; color:#922c2c; }
        @media(max-width:700px) { .mvc-form { grid-template-columns:1fr; } .mvc-field.full { grid-column:auto; } }
    </style>
</head>
<body class="app-body">
<div class="app">
    <aside class="sidebar">
        <div class="brand"><span><i class="fa-solid fa-car"></i> AutoExpress</span></div>
        <nav>
            <a class="nav-link" href="dashboard.html"><i class="fa-solid fa-house"></i> Inicio</a>
            <a class="nav-link" href="index.php?action=productos"><i class="fa-solid fa-boxes-stacked"></i> Productos</a>
            <a class="nav-link active" href="index.php?action=crear"><i class="fa-solid fa-circle-plus"></i> Crear producto</a>
        </nav>
        <div class="sidebar-foot">
            <button type="button" id="btn-logout" class="btn-logout"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</button>
        </div>
    </aside>
    <main class="content">
        <header class="content-header">
            <div><p class="eyebrow">Productos</p><h1>Crear producto</h1><p>Completa los datos para registrar un producto en autoexpress_v2.</p></div>
        </header>

        <?php if (!empty($error)): ?><div class="mvc-error"><?= e($error) ?></div><?php endif; ?>

        <section class="panel">
            <h2><i class="fa-solid fa-circle-plus"></i> Datos del producto</h2>
            <form class="mvc-form" method="POST" action="index.php?action=guardar">
                <div class="mvc-field">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text" maxlength="100" value="<?= e($datos['nombre'] ?? '') ?>" required>
                </div>
                <div class="mvc-field">
                    <label for="codigo_barras">Código de barras</label>
                    <input id="codigo_barras" name="codigo_barras" type="text" maxlength="50" value="<?= e($datos['codigo_barras'] ?? '') ?>">
                </div>
                <div class="mvc-field full">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion"><?= e($datos['descripcion'] ?? '') ?></textarea>
                </div>
                <div class="mvc-field">
                    <label for="proveedor_id">Proveedor</label>
                    <select id="proveedor_id" name="proveedor_id" required>
                        <option value="">Selecciona un proveedor</option>
                        <?php foreach ($proveedores as $proveedor): ?>
                            <option value="<?= e($proveedor['id']) ?>" <?= (string)($datos['proveedor_id'] ?? '') === (string)$proveedor['id'] ? 'selected' : '' ?>>
                                <?= e($proveedor['razon_social']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mvc-field">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" required>
                        <?php foreach (['activo', 'inactivo'] as $opcion): ?>
                            <option value="<?= $opcion ?>" <?= ($datos['estado'] ?? 'activo') === $opcion ? 'selected' : '' ?>><?= ucfirst($opcion) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mvc-field">
                    <label for="precio">Precio</label>
                    <input id="precio" name="precio" type="number" min="0" step="0.01" value="<?= e($datos['precio'] ?? '') ?>" required>
                </div>
                <div class="mvc-field">
                    <label for="stock">Stock</label>
                    <input id="stock" name="stock" type="number" min="0" step="1" value="<?= e($datos['stock'] ?? '') ?>" required>
                </div>
                <div class="mvc-field full">
                    <div class="mvc-actions">
                        <button class="mvc-button" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar producto</button>
                        <a class="mvc-button secondary" href="index.php?action=productos">Cancelar / Volver</a>
                    </div>
                </div>
            </form>
        </section>
    </main>
</div>
<script src="public/js/config.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2.45.0/dist/umd/supabase.min.js"></script>
<script src="public/js/supabase-client.js"></script>
<script src="public/js/guard.js"></script>
</body>
</html>
