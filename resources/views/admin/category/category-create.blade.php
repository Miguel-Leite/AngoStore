@extends('admin.layouts.app')

@section('content')
    <div class="section-header">
        <h1>Adicionar categoria</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.users')}}">Painel administrativo</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.category')}}">Categorias</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.category-create')}}">adicionar</a></div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 col-sm-8 col-xs-12">
                <div class="card card-info">
    
                    <div class="card-body">
                        <form method="post" class="needs-validation" novalidate="">
                            <div class="form-group">
                              <label>Nome da categoria: </label>
                              <input type="text" name="name" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o nome da categoria
                              </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
                                    Adicionar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('admin/assets/js/page/modules-datatables.js') }}"></script>
@endsection