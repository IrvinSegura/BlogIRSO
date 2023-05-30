function mostrar(id) {
    var x = document.getElementById('alerta'+id);
    if (x.style.display === '') {
        x.style.display = 'block';
    } else {
        x.style.display = '';
    }

    //modal para mostrar comentarios
    var modal = document.getElementById('myModal'+id);
    var span = document.getElementsByClassName("close")[0];
    modal.style.display = "block";
    span.onclick = function() {
        modal.style.display = "none";
        x.style.display = '';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            x.style.display = '';
        }
    }
}