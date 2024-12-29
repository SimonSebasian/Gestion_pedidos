<?php
session_start();

// Establecer un tiempo límite de inactividad
$inactividad_limite = 1800; // 30 minutos

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

// Verificar si el parámetro id está presente
if (isset($_GET['id'])) {
    // Obtener el ID del producto desde el parámetro GET
    $productoId = $_GET['id'];
    // Eliminar el producto del carrito
    unset($_SESSION['carrito'][$productoId]);
}
header('Location: Prog_Web_II_Tarea5_carrito.php'); // Redirigir de vuelta a la página del carrito
?>