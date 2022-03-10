window.desativaeAtivaCulto = desativaeAtivaCulto;
window.desativaeAtivaCampanha = desativaeAtivaCampanha;
window.deletaCulto = deletaCulto;
window.deletaCampanha = deletaCampanha;
window.desativaVisitante = desativaVisitante;

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
                type: "POST",
                url: "/deletaCulto",
                data: {cod_culto: cod_culto},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
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

function desativaVisitante(cod_pessoa) {
    Swal.fire({
        title: 'Remover Visitante?',
        type: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, prosseguir!',
        cancelButtonText: 'Não, cancelar'
    }).then((result) => {
        if (result.value == true) {
            $.ajax({
                type: "POST",
                url: "/desativaVisitante",
                data: {cod_pessoa: cod_pessoa},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
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

function deletaCampanha(cod_campanha){
    Swal.fire({
        title: 'Deletar Campanha?',
        text: "Deletar o campanha ele será removido da lista!",
        type: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, prosseguir!',
        cancelButtonText: 'Não, cancelar'
    }).then((result) => {
        if (result.value == true) {
            $.ajax({
                type: "POST",
                url: "/deletaCampanha",
                data: {cod_campanha: cod_campanha},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
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
