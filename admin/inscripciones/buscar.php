<?php

include ('../../../app/config.php');
// Conexión a la base de datos
// include 'conexion.php'; 

if (isset($_POST['dni'])) {
    $dni = $_POST['dni'];

    // Consulta para buscar al estudiante
    $query = "SELECT * FROM estudiantes WHERE ci = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$dni]);
    $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

    // Respuesta en formato JSON
    echo json_encode($estudiante ? $estudiante : null);
    exit;
}
?>