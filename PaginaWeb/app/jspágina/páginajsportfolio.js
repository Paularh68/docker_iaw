 
function filterProjects() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const projectCards = document.querySelectorAll('.project-card');
    const suggestions = document.getElementById('suggestions-list');
    suggestions.innerHTML = ''; // Limpiar sugerencias previas
    let hasSuggestions = false;

    projectCards.forEach(card => {
        const projectName = card.getAttribute('data-name').toLowerCase();
        const projectDescription = card.getAttribute('data-description').toLowerCase();

        if (projectName.includes(input) || projectDescription.includes(input)) {
            card.style.display = 'block'; // Mostrar tarjeta
            if (input.length > 0) {
                // Mostrar sugerencias
                hasSuggestions = true;
                const suggestionDiv = document.createElement('div');
                suggestionDiv.innerText = projectName;
                suggestionDiv.onclick = () => {
                    document.getElementById('searchInput').value = projectName; // Completar el input
                    suggestions.innerHTML = ''; // Limpiar sugerencias
                    filterProjects(); // Volver a filtrar
                };
                suggestions.appendChild(suggestionDiv);
            }
        } else {
            card.style.display = 'none'; // Ocultar tarjeta
        }
    });

    // Mostrar u ocultar la lista de sugerencias
    suggestions.style.display = hasSuggestions && input.length > 0 ? 'block' : 'none';
}

// Función para establecer el contenido del modal
function setModalContent(button) {
    const title = button.getAttribute('data-title');
    const description = button.closest('.project-card').getAttribute('data-description');
    document.getElementById('projectModalLabel').innerText = title;
    document.getElementById('projectDescription').innerText = description; // Actualiza la descripción del proyecto
}

// Función para validar el formulario antes de enviarlo
// Función para validar el formulario antes de enviarlo
function validateForm(event) {
    const email = document.getElementById('email').value;
    const emailError = document.getElementById('emailError'); // Obtener el elemento de error

    // Verificar si el correo tiene un "@" y un "." después del "@"
    const hasAtSymbol = email.includes('@');
    const hasDotAfterAt = hasAtSymbol && email.split('@')[1].includes('.');

    // Reiniciar el mensaje de error
    emailError.style.display = 'none'; 
    emailError.innerText = '';

    if (!hasAtSymbol || !hasDotAfterAt) {
        emailError.innerText = 'Por favor, introduce un correo electrónico válido que contenga "@" y un punto (.) después del "@".';
        emailError.style.display = 'block'; // Mostrar el mensaje de error
        emailError.style.setProperty('color', 'white', 'important'); // Forzar el color a azul
        event.preventDefault(); // Evitar el envío del formulario
        return false; // Evitar el envío del formulario
    } else {
        // Si los campos son válidos, mostrar el modal
        event.preventDefault(); // Evitar el envío del formulario para mostrar el modal
        const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        modal.show(); // Mostrar el modal

        // Enviar el formulario después de mostrar el modal
        setTimeout(() => {
            document.getElementById('contactForm').submit(); // Enviar el formulario
        }, 2000); // Espera 2 segundos antes de enviar

        return true; // Permitir el envío del formulario (este return se puede omitir)
    }
}


// Función para realizar la búsqueda
function performSearch() {
    const input = document.getElementById('searchInput').value;
    if (input) {
        // Puedes agregar lógica de búsqueda aquí si es necesario
        alert(`Buscando: ${input}`);
    }
}

// Manejar el evento de clic fuera de la lista de sugerencias para ocultarla
window.addEventListener('click', function (event) {
    const suggestionsList = document.getElementById('suggestions-list');
    const searchInput = document.getElementById('searchInput');
    if (!suggestionsList.contains(event.target) && event.target !== searchInput) {
        suggestionsList.style.display = 'none'; // Ocultar la lista si se hace clic fuera de ella
    }
});


function filterProjects() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const projectCards = document.querySelectorAll('.project-card');
    const suggestionsList = document.getElementById('suggestions-list');

    // Limpiar la lista de sugerencias
    suggestionsList.innerHTML = '';

    let hasResults = false; // Bandera para controlar si hay resultados

    // Filtrar proyectos y actualizar la vista
    projectCards.forEach(card => {
        const projectName = card.getAttribute('data-name').toLowerCase();
        if (projectName.includes(filter)) {
            card.style.display = ''; // Mostrar tarjeta
            hasResults = true;
            // Agregar sugerencia a la lista
            const suggestion = document.createElement('div');
            suggestion.textContent = card.getAttribute('data-name');
            suggestion.onclick = () => {
                input.value = card.getAttribute('data-name'); // Al hacer clic, llenar el input con el nombre del proyecto
                suggestionsList.style.display = 'none'; // Ocultar sugerencias
                filterProjects(); // Volver a filtrar
            };
            suggestionsList.appendChild(suggestion);
        } else {
            card.style.display = 'none'; // Ocultar tarjeta
        }
    });

    // Mostrar u ocultar la lista de sugerencias
    suggestionsList.style.display = hasResults && filter ? 'block' : 'none'; // Mostrar solo si hay resultados y el input no está vacío
}

function performSearch() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const projectCards = document.querySelectorAll('.project-card');

    // Filtrar proyectos al hacer clic en el botón de búsqueda
    projectCards.forEach(card => {
        const projectName = card.getAttribute('data-name').toLowerCase();
        card.style.display = projectName.includes(filter) ? '' : 'none'; // Mostrar solo coincidencias
    });
}

function setModalContent(button) {
    const projectCard = button.parentElement.parentElement.parentElement; // Tarjeta del proyecto
    const title = projectCard.getAttribute('data-name'); // Obtener el nombre del proyecto
    const description = projectCard.getAttribute('data-description'); // Obtener la descripción del proyecto

    // Establecer contenido del modal
    document.getElementById('projectModalLabel').innerText = title; // Título del modal
    document.getElementById('projectDescription').innerText = description; // Descripción del proyecto
}

// Manejar el evento de clic fuera de la lista de sugerencias para ocultarla
window.addEventListener('click', function (event) {
    const suggestionsList = document.getElementById('suggestions-list');
    const searchInput = document.getElementById('searchInput');
    if (!suggestionsList.contains(event.target) && event.target !== searchInput) {
        suggestionsList.style.display = 'none'; // Ocultar la lista si se hace clic fuera de ella
    }
});