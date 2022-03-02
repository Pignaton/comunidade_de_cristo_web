$(document).ready(function () {
    $('table:not(.ignoreDatatable)').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json",
        },
        responsive: true
    });
});
// Desativa ou Ativa culto e campanha
function desativaeAtivaCulto(cod_culto, status) {
    swal({
        title: 'Desativar o Ativar o culto',
        text: "Desativando o culto ele não aparecerar no cadastro!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, prosseguir!',
        cancelButtonText: 'Não, cancelar'
    }).then((result) => {
        if (result.value == true) {
            $.ajax({
                type: "GET",
                url: "/visualizacaoDoCulto",
                data: {cod_culto: cod_culto, status: status},
                cache: false,
                success: function (response) {
                    swal(
                        "Sucesso!",
                        "Opereração realizado com sucesso!",
                        "success"
                    )
                    //$('table').DataTable().refresh();
                    window.location.reload()
                }
            });
        }
    })
}

function desativaeAtivaCampanha(cod_campanha, status) {
    swal({
        title: 'Desativar o Ativar o campanha',
        text: "Desativando o campanha ele não aparecerar no cadastro!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, prosseguir!',
        cancelButtonText: 'Não, cancelar'
    }).then((result) => {
        if (result.value == true) {
            $.ajax({
                type: "GET",
                url: "/visualizacaoDaCampanha",
                data: {'cod_campanha': cod_campanha, status: status},
                cache: false,
                success: function (response) {
                    swal(
                        "Sucesso!",
                        "Opereração realizado com sucesso!",
                        "success"
                    )
                    //$('table').data.reload();
                    window.location.reload()
                }
            });
        }
    })
}

//Deleta Culto ou campanha
function deletaCulto(cod_culto) {
    Swal.fire({
        title: 'Deletar culto?',
        text: "Deletar o culto ele será removido da lista!",
        type: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, prosseguir!',
        cancelButtonText: 'Não, cancelar'
    }).then((result) => {
        if (result.value == true) {
            $.ajax({
                type: "GET",
                url: "/deletaCulto",
                data: {cod_culto: cod_culto},
                cache: false,
                success: function (response) {
                    swal(
                        "Sucesso!",
                        "Opereração realizado com sucesso!",
                        "success"
                    )
                    //$('table').DataTable().refresh();
                    window.location.reload()
                }
            });
        }
    })
}

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

