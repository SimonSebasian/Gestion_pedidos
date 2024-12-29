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

// Verificar si el parámetro id está presente
if (isset($_GET['id'])) {
    // Obtener el ID del producto desde el parámetro GET
    $productoId = $_GET['id'];
    
    // Verifica si el carrito ya contiene el producto
    if (!isset($_SESSION['carrito'][$productoId])) {
        $_SESSION['carrito'][$productoId] = 1; // Agrega el producto con cantidad 1
    } else {
        $_SESSION['carrito'][$productoId]++; // Incrementa la cantidad del producto
    }
}
// Redirigir de vuelta a la página de productos
header('Location: Prog_Web_II_Tarea5_productos.php'); 
exit(); // Siempre usar exit() después de header para detener la ejecución del script
?>
