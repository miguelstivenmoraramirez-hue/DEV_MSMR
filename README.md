# AutoExpress

Sistema de gestión para AutoExpress en PHP con arquitectura MVC y MySQL/MariaDB (PDO).
La estructura sigue el proyecto de ejemplo EV_HU.

## Estructura

```
index.html                Inicio de sesión / registro (Supabase Auth)
dashboard.html            Panel con tarjetas y gráficas (lee productos.php)
perfil.html               Datos de la cuenta de Supabase
public/js/                config.js, supabase-client.js, auth.js, guard.js, script.js
index.php                 Front controller (?action=productos|crear|guardar|editar|actualizar|eliminar)
productos.php             Endpoint JSON con el listado de productos
app/controllers/          ProductoController
app/models/               Producto (consultas PDO a la tabla productos)
app/helpers.php           e() para escapar HTML
config/database.php       Conexión PDO (lee config/.env)
views/productos/          index, crear, editar
css/styles.css            Estilos
database/autoexpress_v2.sql   Base de datos
legacy/                   Módulos anteriores (compras, personas, proveedores, ventas) sin migrar
```

## Puesta en marcha

1. Importa `database/autoexpress_v2.sql` en MySQL/MariaDB (phpMyAdmin o `mysql < archivo.sql`).
   El script no crea la base: créala antes con `CREATE DATABASE autoexpress_v2;` y selecciónala.
2. Copia `config/.env.example` a `config/.env` y ajusta usuario y clave.
3. Supabase: copia `public/js/config.example.js` a `public/js/config.js` y pega tu Project URL y anon key (Supabase → Project Settings → API). Crea tu usuario desde la pestaña "Registrarse" de `index.html`.
4. Sirve la carpeta (XAMPP en `htdocs/AutoExpress` o `php -S localhost:8000`) y abre `index.html` (login). Usa Apache/XAMPP: el servidor de `php -S` abriría `index.php` en lugar del login.
   Las pantallas de productos también exigen sesión de Supabase.

## Productos

Tabla `productos`: `codigo_barras`, `nombre`, `descripcion`, `precio`, `stock`, `proveedor_id` (FK a `proveedores`), `estado` (activo/inactivo).
CRUD completo: listar (con el proveedor), crear, editar y eliminar. Un producto con ventas asociadas no se puede eliminar.
