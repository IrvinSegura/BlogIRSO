function mostrar(id) {
    var x = document.getElementById('alerta'+id);
    if (x.style.display === '') {
        x.style.display = 'block';
    } else {
        x.style.display = '';
    }
}