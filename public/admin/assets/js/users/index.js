
function comfirmDeleteUser(route) {
    swal({
      title: 'Deseja realmente excluir usuario?',
      text: 'Uma vez que você exclui um usuário, você exclui para sempre!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
        swal('Usuario deletado com successo!', {
            icon: 'success',
        });
        // location.assign(route)
        // location.replace();
      } else {
      swal('Operação cancelada!');
      }
    });
}
       