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
                        <form method="POST" action="{{ route('admin.product-create') }}" class="needs-validation form-product-create" novalidate="">
                            @csrf
                            <div class="form-group">
                              <label>Nome do produto: </label>
                              <input type="text" name="product" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o nome do produto
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Preço: </label>
                              <input type="number" name="price" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o preço do produto
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Largura: </label>
                              <input type="number" name="width" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe a largura do produto
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Altura: </label>
                              <input type="number" name="height" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe a altura do produto
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Comprimento: </label>
                              <input type="number" name="length" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o comprimento do produto
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Peso: </label>
                              <input type="number" name="weight" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o peso do produto
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Foto: </label>
                              <input type="file" name="image_default" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor insire uma foto frontal do produto
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Outra foto (opcional): </label>
                              <input type="file" name="image_other" class="form-control" />
                              <div class="invalid-feedback">
                                Por favor insire uma outra foto do produto
                              </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-product-create btn-lg btn-block" tabindex="4">
                                    Adicionar novo produto
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