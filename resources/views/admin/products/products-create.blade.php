@extends('admin.layouts.app')

@section('content')
    <div class="section-header">
        <h1>Adicionar produto</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-6 col-sm-12 col-xs-12">
                <div class="card card-info">
                    <div class="card-body">
                        <form method="post" class="needs-validation" novalidate="">
                            <div class="form-group">
                              <label>Nome do produto: </label>
                              <input type="text" name="name" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o nome do produto
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