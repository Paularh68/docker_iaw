<?php
include 'config.php';

$successMessage = '';

// Procesar el formulario al enviarlo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'] ?? null;

    // Inserta el nuevo proyecto en la base de datos
    $stmt = $pdo->prepare('INSERT INTO proyectos (NOMBRE, DESCRIPCIÓN, IMAGEN) VALUES (?, ?, ?)');
    $stmt->execute([$nombre, $descripcion, $imagen]);

    $successMessage = 'Proyecto agregado exitosamente.';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Paula Ramírez</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="https://github.com/Paularh68/Portfolio---Paula-Ramirez/blob/main/images/faviconportfolio.png?raw=true" type="image/png">
    <style>
        body {
            background-color: #212529;
            color: white;
        }
        .bg-custom {
            background-color: #5b4e7e;
        }
        .text-custom {
            color: #b49fec;
        }
        .card {
            background-color: #343a40;
        }
        .card-text {
            height: 60px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            white-space: normal;
        }
        .modal-body {
            overflow-y: auto;
            color: black;
            word-wrap: break-word; /* Fuerza el salto de línea dentro del modal */
            word-break: break-word; /* Alternativa para forzar saltos en palabras largas */
        }
        .modal-title {
            color: black;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://github.com/Paularh68/Portfolio---Paula-Ramirez/blob/main/images/RH-logo%20(1).png?raw=true" alt="Logo" style="height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Sobre Mí</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#courses">Certificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección de Inicio -->
    <section id="home" class="bg-custom text-white text-center py-4">
        <div class="container">
            <img src="https://github.com/Paularh68/Portfolio---Paula-Ramirez/blob/main/images/800x800.png?raw=true" alt="Paula Ramírez" class="rounded-circle img-fluid border border-5 border-white" style="width: 150px; height: 150px;">
            <h1 class="h4 fw-bold mt-3">¡Hola! Soy Paula Ramírez</h1>
            <p class="lead mb-3">Técnico Superior en Administración de Sistemas Informáticos en Red</p>
            <a href="#projects" class="btn btn-light btn-sm">Explora mis proyectos</a>
        </div>
    </section>

    <!-- Sección Sobre Mí -->
    <section id="about" class="py-4">
        <div class="container text-center">
            <h2 class="h5 text-custom mb-4">Sobre Mí</h2>
            <p>Soy una apasionada de la informática y el deporte, con formación en ambos campos. Cuento con un Grado Medio y Superior en el ámbito deportivo, y actualmente estoy cursando un Grado Superior en Informática. Me encanta desarrollar soluciones tecnológicas innovadoras, y tengo experiencia en sistemas, gestión de proyectos y diseño de redes.</p>
        </div>
    </section>

    <!-- Sección de Proyectos -->
    <section id="projects" class="py-4">
        <div class="container text-center">
            <h2 class="h5 text-custom mb-4">Mis Proyectos</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4" id="projects-container">
                <?php include 'proyectos.php'; ?>
            </div>
        </div>
    </section>

    <!-- Formulario para añadir un nuevo proyecto -->
    <section id="add-project" class="py-4">
    <div class="container text-center">
        <h2 class="h5 text-custom mb-4">Añadir Proyecto</h2>
        <?php if ($successMessage): ?>
            <div class="text-success mb-3"><?= $successMessage ?></div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre del Proyecto" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="descripcion" rows="3" placeholder="Descripción" required></textarea>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="imagen" placeholder="URL de la Imagen (opcional)">
            </div>
            <button type="submit" class="btn btn-light">Guardar Proyecto</button>
        </form>
    </div>
</section>

    <!-- Modal para detalles del proyecto -->
    <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectModalLabel">Título del Proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="projectDescription">Descripción del proyecto.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
        <!-- Sección de Cursos -->
        <section id="courses" class="py-4">
        <div class="container text-center">
            <h2 class="h5 text-custom mb-4">Certificaciones Obtenidas</h2>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="fas fa-check-circle text-custom"></i> Office 365</li>
                <li class="mb-2"><i class="fas fa-check-circle text-custom"></i> Puesta en producción segura</li>
                <li class="mb-2"><i class="fas fa-check-circle text-custom"></i> Configuración sistemas informáticos</li>
                <li class="mb-2"><i class="fas fa-check-circle text-custom"></i> Cisco CCNA</li>
                <li class="mb-2"><i class="fas fa-check-circle text-custom"></i> Hacking Ético</li>
            </ul>
        </div>
    </section>
      <!-- Sección de Contacto -->
    <section id="contact" class="py-4" style="background-color: #5b4e7e;">
        <div class="container text-center">
            <h2 class="h5 text-white mb-4">Contacto</h2>
            <p class="text-white mb-4">¡Me encantaría saber de ti! Puedes encontrarme en mis redes sociales o enviar un correo electrónico.</p>
            <div class="d-flex justify-content-center mb-4">
                <a href="https://www.linkedin.com/in/paula-ram%C3%ADrez-haro-33971720a/?trk=people-guest_people_search-card&originalSubdomain=es" class="text-white me-3"><i class="fab fa-linkedin fa-2x"></i></a>
                <a href="https://github.com/Paularh68/" class="text-white me-3"><i class="fab fa-github fa-2x"></i></a>
                <a href="mailto:ramirezharop@gmail.com" class="text-white"><i class="fas fa-envelope fa-2x"></i></a>
            </div>
            <h5 class="text-white mb-3">O envíame un mensaje:</h5>
            <form id="contactForm" action="https://formspree.io/f/xdkoozkd" method="post" onsubmit="return validateForm(event)">
                <div class="mb-3">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" required>
                    <div id="emailError" class="text-danger" style="display: none;"></div> <!-- Mensaje de error -->
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="mensaje" rows="3" placeholder="Tu Mensaje" required></textarea>
                </div>
                <button type="submit" class="btn btn-light">Enviar</button>
            </form>
        </div>
        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirmación de envío</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Mensaje enviado!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="text-center py-4">
        <p class="mb-0">&copy; 2024 Paula Ramírez. Todos los derechos reservados.</p>
    </footer>
    <script>
    // Función para cargar contenido en el modal
    function setModalContent(element) {
        var title = element.getAttribute("data-title");
        var description = element.getAttribute("data-description");

        // Configura el contenido del modal
        document.getElementById("projectModalLabel").innerText = title;
        document.getElementById("projectDescription").innerText = description;
    }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





