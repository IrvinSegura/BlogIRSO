
    $(document).ready(function() {
        $('#categoryTable').DataTable({
            "paging": true,
            "lengthMenu": [5, 10, 15, 20], // Mostrar opciones de cantidad de registros por página
            "pageLength": 10, // Cantidad de registros mostrados por página por defecto
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron registros",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrados de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
