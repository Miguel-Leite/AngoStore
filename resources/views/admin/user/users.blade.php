@extends('admin.layouts.app')

@section('content')
    <div class="section-header">
        <h1>Painel de Usuarios</h1>
    </div>
    <div class="container">

        <a href="{{ route('admin.user-create') }}" class="btn btn-primary">Adicionar novo usuario</a>
        <br>
        <br>
        {{-- <br> --}}
        <table class="table table-striped" id="table-2">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome completo</th>
                <th>Login</th>
                <th>Email</th>
                <th>Admin</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->person }}</td>
                        <td>{{ $user->login }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->inadmin === 1 ? 'Sim' : 'Não' }}</td>
                        <td>
                            <a href="{{ route('admin.user-edit',$user->id) }}" class="btn btn-info">Editar</a>
                            <a href="javascript:;" class="btn btn-danger" onclick="comfirmDeleteUser('{{ route('admin.user-delete',$user->id) }}','{{ $user->person }}')">Excluir</a>
                        </td>
                    </tr>
                @endforeach
                    
            </tbody>
        </table>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('admin/assets/js/page/modules-datatables.js') }}"></script>
    <script>
        function comfirmDeleteUser(route,user) {
            swal({
              title: `Deseja realmente excluir usuario ${user}?`,
              text: 'Uma vez que você exclui um usuário, você exclui-o para sempre!',
              icon: 'warning',
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    fetch(`${route}`)
                    .then((response) => {
                        return response.json()
                    })
                    .then((res) => {
                        swal('Usuario deletado com successo!', {
                                icon: 'success',
                            });
                        if (res.success) {
                            $('.swal-button--confirm').click((e)=>{
                                return window.location.reload()
                            });
                        } else {
                            swal('Falha ao excluir o usuario!', {
                                icon: 'error',
                            });
                        }
                    })
                    .catch(error => {
                        swal({
                            title: 'Erro da aplicação!',
                            text: 'Não foi possível excluir o usuário.',
                            icon: 'error',
                        });
                    });
              } else {
              swal('Operação cancelada!');
              }
            });
        }
        
    </script>
@endsection