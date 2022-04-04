@extends('admin.layouts.app')

@section('content')
    <div class="section-header">
        <h1>Painel de categoria</h1>
    </div>
    <div class="container">

        <a href="{{ route('admin.category-create') }}" class="btn btn-primary">Adicionar nova categoria</a>
        <br>
        <br>
        {{-- <br> --}}
        <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome da categoria</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Iphone</td>
                <td>
                    <a href="#" class="btn btn-info">Editar</a>
                    <a href="#" class="btn btn-danger">Excluir</a>
                </td>
              </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('admin/assets/js/page/modules-datatables.js') }}"></script>
@endsection