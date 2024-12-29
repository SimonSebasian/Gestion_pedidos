<?php
session_start();

// Establecer un tiempo límite de inactividad
$inactividad_limite = 1800;

if (isset($_SESSION['ultima_actividad']) && (time() - $_SESSION['ultima_actividad']) > $inactividad_limite) {
    session_unset();
    session_destroy();
    header("Location: Prog_Web_II_Tarea5_productos.php");
    exit();
}

$_SESSION['ultima_actividad'] = time();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <?php
    if (empty($_SESSION['carrito'])) {
        echo "<p>El carrito está vacío.</p>";
    } else {
        foreach ($_SESSION['carrito'] as $productoId => $cantidad) {
            echo "<p>Producto ID: $productoId - Cantidad: $cantidad ";
            echo "<a href='Prog_Web_II_Tarea5_eliminar_prod.php?id=$productoId'>Eliminar</a></p>";
        }
    }
    ?>
    <a href="Prog_Web_II_Tarea5_productos.php">Volver a Productos</a>
</body>
</html>
