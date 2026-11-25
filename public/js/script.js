// =====================================
// AUTOEXPRESS - DASHBOARD DE PRODUCTOS
// Datos desde productos.php (tabla productos de autoexpress_v2)
// =====================================

const STOCK_BAJO = 10;

let productos = [];
let graficaStock = null;
let graficaValor = null;

function escapar(valor) {
    const d = document.createElement("div");
    d.textContent = valor ?? "";
    return d.innerHTML;
}

function formatearDinero(valor) {
    return new Intl.NumberFormat("es-CO", {
        style: "currency",
        currency: "COP",
        maximumFractionDigits: 0
    }).format(Number(valor) || 0);
}

function mostrarSeccion(nombre) {
    document.querySelectorAll(".section").forEach(s => s.classList.remove("active"));
    document.querySelectorAll(".nav-link").forEach(e => e.classList.remove("active"));

    const seleccionada = document.getElementById(nombre);
    if (seleccionada) seleccionada.classList.add("active");

    const enlace = document.querySelector('.nav-link[href="#' + nombre + '"]');
    if (enlace) enlace.classList.add("active");

    if (nombre === "estadisticas") actualizarGraficas();
}

function cargarProductos() {
    fetch("productos.php")
        .then(r => r.json())
        .then(datos => {
            if (!Array.isArray(datos)) throw new Error(datos.error || "Respuesta inválida");
            productos = datos;
            mostrarProductos();
            calcularEstadisticas();
            actualizarGraficas();
        })
        .catch(error => {
            console.error("Error al cargar productos:", error);
            document.getElementById("tablaProductos").innerHTML =
                '<tr><td colspan="8">Error al consultar los productos. Verifica la conexión con MySQL.</td></tr>';
        });
}

function mostrarProductos() {
    const tabla = document.getElementById("tablaProductos");
    tabla.innerHTML = "";

    if (productos.length === 0) {
        tabla.innerHTML = '<tr><td colspan="8">No hay productos registrados.</td></tr>';
        return;
    }

    productos.forEach(p => {
        const bajo = Number(p.stock) <= STOCK_BAJO;
        const fila = document.createElement("tr");
        fila.innerHTML = `
            <td>${escapar(p.id)}</td>
            <td>${escapar(p.codigo_barras)}</td>
            <td>${escapar(p.nombre)}</td>
            <td>${escapar(p.descripcion)}</td>
            <td>${escapar(p.proveedor)}</td>
            <td>${formatearDinero(p.precio)}</td>
            <td>${escapar(p.stock)}</td>
            <td><span class="estado ${bajo ? "salida" : "entrada"}">${bajo ? "Stock bajo" : escapar(p.estado)}</span></td>
        `;
        tabla.appendChild(fila);
    });
}

function calcularEstadisticas() {
    let unidades = 0, valor = 0, bajo = 0;

    productos.forEach(p => {
        const stock = Number(p.stock);
        unidades += stock;
        valor += Number(p.precio) * stock;
        if (stock <= STOCK_BAJO) bajo++;
    });

    document.getElementById("totalProductos").textContent = productos.length;
    document.getElementById("stockTotal").textContent = unidades;
    document.getElementById("valorInventario").textContent = formatearDinero(valor);
    document.getElementById("stockBajo").textContent = bajo;
}

function actualizarGraficas() {
    if (typeof Chart === "undefined") return;

    const nombres = productos.map(p => p.nombre);
    const cantidades = productos.map(p => Number(p.stock));
    const valores = productos.map(p => Number(p.stock) * Number(p.precio));

    const crear = (id, anterior, etiqueta, datos) => {
        const canvas = document.getElementById(id);
        if (!canvas) return null;
        if (anterior) anterior.destroy();
        return new Chart(canvas, {
            type: "bar",
            data: { labels: nombres, datasets: [{ label: etiqueta, data: datos }] },
            options: { responsive: true, maintainAspectRatio: true }
        });
    };

    graficaStock = crear("graficaStock", graficaStock, "Cantidad disponible", cantidades);
    graficaValor = crear("graficaValor", graficaValor, "Valor de existencias", valores);
}

document.addEventListener("DOMContentLoaded", function () {
    mostrarSeccion("inicio");
    cargarProductos();
});
