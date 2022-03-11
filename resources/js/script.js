$(document).ready(function () {
    $('table:not(.ignoreDatatable)').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json",
        },
        //"scrollX": '600',
        //"scrollY": 'auto',
        //orderCellsTop: true,
        //fixedHeader: true,
        //autoWidth: true,
        /*rowReorder: {
            selector: 'td:nth-child(2)',
        },*/
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [ {
            className: 'dtr-control',
            orderable: false,
            targets:   0
        } ],
    });
});

$("#toggleCulto").change(function () {

    $.ajax({
        url: 'toggle',
        type: 'GET',
        data: {
            nom_campo: 'culto',
            status: $(this).prop('checked')
        },
        success: function ($data) {
            if ($("#toggleCulto").prop('checked') === true) {
                $.notify('Campo Culto foi ativado', {type: 'success'});
            } else {
                $.notify('Campo Culto foi inativado', {type: 'danger'});
            }
        }
    })
});

$("#toggleCampanha").change(function () {

    $.ajax({
        url: 'toggle',
        type: 'GET',
        data: {
            nom_campo: 'campanha',
            status: $(this).prop('checked')
        },
        success: function ($data) {
            if ($("#toggleCampanha").prop('checked') === true) {
                $.notify('Campo Campanha foi ativado', {type: 'success'});
            } else {
                $.notify('Campo Campanha foi inativado', {type: 'danger'});
            }
        }
    })
});


