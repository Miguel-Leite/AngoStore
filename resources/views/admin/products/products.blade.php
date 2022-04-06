@extends('admin.layouts.app')

@section('content')
    <div class="section-header">
        <h1>Painel de produtos</h1>
    </div>
    <div class="container">

        <a href="{{ route('admin.product-create') }}" class="btn btn-primary">Adicionar novo produto</a>
        <br>
        <br>
        {{-- <br> --}}

        @if (count($products) > 0)
            <table class="table table-striped" id="table-2">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome do producto</th>
                    <th>Preço</th>
                    <th>Largura</th>
                    <th>Altura</th>
                    <th>Comprimento</th>
                    <th>Peso</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td> {{ $product->id }} </td>
                            <td> {{ $product->product }} </td>
                            <td> {{ $product->price }} </td>
                            <td> {{ $product->width }} </td>
                            <td> {{ $product->height }} </td>
                            <td> {{ $product->length }} </td>
                            <td> {{ $product->weight }} </td>
                            <td>
                                <a href="{{ route('admin.product-edit',$product->id) }}" class="btn btn-info">Editar</a>
                                <a href="javascript:;" class="btn btn-danger" onclick="comfirmDeleteProduct('{{ route('admin.product-delete',$product->id) }}','{{ $product->product }}')">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else:
            <div class="alert alert-info"> Nenhum produto registrado no sistema. </div>
        @endif
            
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('admin/assets/js/page/modules-datatables.js') }}"></script>
    <script>
        function comfirmDeleteProduct(route,product) {
            console.log(route)
            swal({
              title: `Deseja realmente excluir o produto ${product}?`,
              text: 'Uma vez que você exclui um produto, você exclui-o para sempre!',
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
                        swal(`Produto ${product} deletado com successo!`, {
                                icon: 'success',
                            });
                        if (res.success) {
                            $('.swal-button--confirm').click((e)=>{
                                return window.location.reload()
                            });
                        } else {
                            swal('Falha ao excluir o produto!', {
                                icon: 'error',
                            });
                        }
                    })
                    .catch(error => {
                        swal({
                            title: 'Erro da aplicação!',
                            text: 'Não foi possível excluir o produto.',
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