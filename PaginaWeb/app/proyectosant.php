<?php
include 'config.php';

// Consulta para obtener todos los proyectos
$stmt = $pdo->query('SELECT * FROM proyectos');

// Verifica si se obtienen resultados de la consulta
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch()) {
        echo "
        <div class='col project-card' data-name='{$row['NOMBRE']}' data-description='{$row['DESCRIPCIÓN']}'>
            <div class='card border-0 shadow h-100 mx-2'>
                <div class='card-body'>
                    <h5 class='card-title mt-2'>{$row['NOMBRE']}</h5>
                    <p class='card-text'>{$row['DESCRIPCIÓN']}</p>
                    <button class='btn btn-outline-light' data-bs-toggle='modal' data-bs-target='#projectModal' 
                        data-title='{$row['NOMBRE']}' 
                        data-description='{$row['DESCRIPCIÓN']}'
                        data-link='{$row['LINK']}'
                        onclick='setModalContent(this)'>Leer Más</button>";
        
        if (!empty($row['LINK'])) {
            echo "<a href='{$row['LINK']}' class='btn btn-outline-light' target='_blank'>Ver Proyecto</a>";
        }
        
        echo "      </div>
            </div>
        </div>";
    }
} else {
    echo "<p class='text-white'>No hay proyectos para mostrar.</p>";
}
?>

