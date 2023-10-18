/* init DataTable */
$('.tabela').DataTable({
    language: {
        search:     "",
        processing: "Carregando conteúdo",
        info:       "Exibindo _START_ até _END_ de _TOTAL_ registros",
        infoEmpty:  "Nenhum registro existente",
        paginate: {
            first:      "&laquo;",
            last:       "&raquo;"
        },
        lengthMenu: "Mostrar _MENU_ registros"
    },
    "ordering": false,
    "columnDefs": [
        {
            orderable: false
        }
    ],
    pagingType: "first_last_numbers"
});


$(document).ready(function() {
    $('.select2').Select2();
});