// Obtener elementos del DOM
var modal = document.getElementById("modal");
var openModalBtn = document.getElementById("open-modal-btn");
var closeModalBtn = document.getElementsByClassName("close")[0];

// Función para abrir el modal
function openModal() {
  modal.style.display = "block";
}

// Función para cerrar el modal
function closeModal() {
  modal.style.display = "none";
}

// Evento al hacer clic en el botón para abrir el modal
openModalBtn.onclick = function() {
  openModal();
}

// Evento al hacer clic en el botón de cerrar del modal
closeModalBtn.onclick = function() {
  closeModal();
}

// Evento al hacer clic fuera del modal
window.onclick = function(event) {
  if (event.target == modal) {
    closeModal();
  }
}
