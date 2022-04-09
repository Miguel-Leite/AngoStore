@extends('admin.layouts.app')

@section('content')
    <div class="section-header">
        <h1>Painel de categoria e produtos</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.users')}}">Painel administrativo</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.category')}}">Categorias</a></div>
            <div class="breadcrumb-item active">Categorias e Produtos</div>
        </div>
    </div>
    <div class="container">
        <br>
        <br>
        {{-- <br> --}}
        <div class="row">
            <div class="col-lg-6">
                <h4>Todos Produtos</h4>
                @if (count($productsNotRelated) > 0)
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Nome do produto</th>
                            <th style="width: 160px;">&nbsp;</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($productsNotRelated as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->product }}</td>
                                    <td>
                                        <a href="javascript:;" onclick="addProductInCategory('{{ route('admin.category-produt-add',["idProduct"=>$product->id,"idCategory"=>$id]) }}','{{ $product->product }}')" class="btn btn-primary">
                                        <i class="fa fa-arrow-right"></i>
                                        Adicionar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info"> Nenhum categoria registrado no sistema. </div>
                @endif  
            </div>
            <div class="col-lg-6">
                <h4>Produtos da Categoria {{ $categoryName }}</h4>
                @if (count($productsRelated) > 0)
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 15px">#</th>
                            <th>Nome do produto</th>
                            <th style="width: 160px;">&nbsp;</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($productsRelated as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->product }}</td>
                                    <td>
                                        <a href="javascript:;" class="btn btn-danger" onclick="removeProductInCategory('{{ route('admin.category-produt-delete',["idProduct"=>$product->id,"idCategory"=>$id]) }}','{{ $product->product }}')">
                                        <i class="fa fa-arrow-right"></i>
                                        Remover</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info"> Nenhum produto registrado nesta categoria no sistema. </div>
                @endif  
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('admin/assets/js/page/modules-datatables.js') }}"></script>
    <script>

        async function addProductInCategory(url){
            const { data } = await axios.get(url);
            if (data.success) {
                iziToast.success({
                  title: 'Sucesso!',
                  message: data.message,
                  position: 'topRight'
                });
                setTimeout(()=>window.location.reload(),1500)
            } else {
                iziToast.error({
                  title: 'Erro na operação!',
                  message: data.message,
                  position: 'topRight'
                });
            }
        }

        async function removeProductInCategory(url){
            const { data } = await axios.get(url);
            if (data.success) {
                iziToast.info({
                  title: 'Sucesso!',
                  message: data.message,
                  position: 'topRight'
                });
                setTimeout(()=>window.location.reload(),1500)
            } else {
                iziToast.error({
                  title: 'Erro na operação!',
                  message: data.message,
                  position: 'topRight'
                });
            }
        }

        function comfirmDeleteProductWithCategory(route,category) {
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