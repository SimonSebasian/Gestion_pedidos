<?php
session_start();

// Establecer un tiempo límite de inactividad (por ejemplo, 30 minutos)
$inactividad_limite = 1800; // En segundos

// Verificar la última actividad
if (isset($_SESSION['ultima_actividad']) && (time() - $_SESSION['ultima_actividad']) > $inactividad_limite) {
    // Si excedió el límite, destruir la sesión
    session_unset();
    session_destroy();
    header("Location: Prog_Web_II_Tarea5_productos.php"); // Redirigir al inicio de sesión
    exit();
}

// Actualizar el timestamp de última actividad
$_SESSION['ultima_actividad'] = time();

// Lista de productos
$productos = [
    ['id' => 1, 'nombre' => 'Camiseta sin mangas', 'precio' => 12990, 'imagen' => 'imagenes/camiseta_sin_mangas.jpg'],
    ['id' => 2, 'nombre' => 'Calcetines nike', 'precio' => 9990, 'imagen' => 'imagenes/calcetines_nike.jpg'],
    ['id' => 3, 'nombre' => 'Polera', 'precio' => 15990, 'imagen' => 'imagenes/polera.jpg']
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="Prog_Web_II_Tarea5_estilos.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <h1>Lista de Productos</h1>
    <?php foreach ($productos as $producto): ?>
        <div class="producto">
            <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>">
            <p>
                <?= htmlspecialchars($producto['nombre']) ?> - $<?= htmlspecialchars($producto['precio']) ?>
                <a href="Prog_Web_II_Tarea5_agregar.php?id=<?= $producto['id'] ?>">Agregar al carrito</a>
            </p>
        </div>
    <?php endforeach; ?>
    <a href="Prog_Web_II_Tarea5_carrito.php">Ver Carrito</a>
</body>
</html>
