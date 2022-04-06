@extends('admin.layouts.app')

@section('content')
    <div class="section-header">
        <h1>Atualizar usuario {{ $user->person }} </h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6 col-sm-8 col-xs-12">
                <div class="card card-primary">
    
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.user-update',$user->id) }}" class="needs-validation form-user-update" novalidate="">
                            <div class="form-group">
                              <label>Nome do usuario: </label>
                              <input type="text" name="person" value="{{ $user->person }}" class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o nome do usuario
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Login</label>
                              <input type="text" name="login" value="{{ $user->login }}"  class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o login do usuario
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="text" name="email" value="{{ $user->email }}"  class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o e-mail do usuario
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Telefone</label>
                              <input type="text" name="phone" value="{{ $user->phone }}"  class="form-control" required />
                              <div class="invalid-feedback">
                                Por favor informe o telefone do usuario
                              </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" value="1" name="inadmin" @if ($user->inadmin == 1) checked @endif class="custom-control-input" tabindex="3" id="inadmin"/>
                                    <label class="custom-control-label" for="inadmin">Acesso administrador.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Atualizar usuário {{ $user->person }}
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