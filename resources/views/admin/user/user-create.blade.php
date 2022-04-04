@extends('admin.layouts.app')

@section('content')
    <div class="section-header">
        <h1>Adicionar usuario</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 col-sm-8 col-xs-12">
                <div class="card card-primary">
    
                    <div class="card-body">
                        <form method="post" class="form-user-create" novalidate="">
                            <div class="form-group">
                              <label>Nome do usuario: </label>
                              <input type="text" name="person" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o nome do usuario
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Login</label>
                              <input type="text" name="login" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o login do usuario
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="text" name="email" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o e-mail do usuario
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Telefone</label>
                              <input type="text" name="phone" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o telefone do usuario
                              </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="inadmin" class="custom-control-input" tabindex="3" id="inadmin"/>
                                    <label class="custom-control-label" for="inadmin">Adiconar como administrador.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block btn-user-create" tabindex="4">
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