<?php
include 'config.php';

// Consulta para obtener todos los proyectos
$stmt = $pdo->query('SELECT * FROM proyectos');

// Verifica si se obtienen resultados de la consulta
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch()) {
        // Limita la descripción a 100 caracteres en la tarjeta
        $shortDescription = strlen($row['DESCRIPCIÓN']) > 100 ? substr($row['DESCRIPCIÓN'], 0, 100) . '...' : $row['DESCRIPCIÓN'];

        echo "
        <div class='col project-card' data-name='{$row['NOMBRE']}' data-description='{$row['DESCRIPCIÓN']}'>
            <div class='card border-0 shadow h-100 mx-2'>
                <div class='card-body'>";
        
        // Muestra la imagen si hay un enlace en el campo IMAGEN
        if (!empty($row['IMAGEN'])) {
            echo "<img src='{$row['IMAGEN']}' alt='{$row['NOMBRE']}' class='card-img-top mb-3' style='height: 200px; object-fit: cover;'>";
        }

        echo "      <h5 class='card-title mt-2'>{$row['NOMBRE']}</h5>
                    <p class='card-text'>{$shortDescription}</p>
                    <button class='btn btn-outline-light' data-bs-toggle='modal' data-bs-target='#projectModal' 
                        data-title='{$row['NOMBRE']}' 
                        data-description='{$row['DESCRIPCIÓN']}'
                        onclick='setModalContent(this)'>Leer Más</button>";
        
        echo "      </div>
            </div>
        </div>";
    }
} else {
    echo "<p class='text-white'>No hay proyectos para mostrar.</p>";
}
?>


