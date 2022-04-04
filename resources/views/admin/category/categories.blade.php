@extends('admin.layouts.app')

@section('content')
    <div class="section-header">
        <h1>Painel de categoria</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.users')}}">Painel administrativo</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.category')}}">Categorias</a></div>
        </div>
    </div>
    <div class="container">

        <a href="{{ route('admin.category-create') }}" class="btn btn-primary">Adicionar nova categoria</a>
        <br>
        <br>
        {{-- <br> --}}
        @if (count($categories) > 0)
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome da categoria</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category }}</td>
                            <td>
                                <a href="{{ route('admin.category-edit',$category->id) }}" class="btn btn-info">Editar</a>
                                <a href="javascript:;" class="btn btn-danger" onclick="comfirmDeleteCategory('{{ route('admin.category-delete',$category->id) }}','{{ $category->category }}')">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info"> Nenhum categoria registrado no sistema. </div>
        @endif
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('admin/assets/js/page/modules-datatables.js') }}"></script>
    <script>
        function comfirmDeleteCategory(route,category) {
            console.log(route)
            swal({
              title: `Deseja realmente excluir a categoria ${category}?`,
              text: 'Uma vez que você exclui uma categoria, você exclui-o para sempre!',
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
                        swal('Categoria deletado com successo!', {
                                icon: 'success',
                            });
                        if (res.success) {
                            $('.swal-button--confirm').click((e)=>{
                                return window.location.reload()
                            });
                        } else {
                            swal('Falha ao excluir o categoria!', {
                                icon: 'error',
                            });
                        }
                    })
                    .catch(error => {
                        swal({
                            title: 'Erro da aplicação!',
                            text: 'Não foi possível excluir a categoria.',
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