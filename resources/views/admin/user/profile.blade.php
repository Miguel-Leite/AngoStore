@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card author-box card-primary">
            <div class="card-body">
              <div class="author-box-left">
                <img alt="image" src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" class="rounded-circle author-box-picture">
                <div class="clearfix"></div>
                {{-- <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');" data-unfollow-action="alert('unfollow clicked');">Follow</a> --}}
              </div>
              <div class="author-box-details">
                <div class="author-box-name">
                  <a href="#">Miguel Leite</a>
                </div>
                <div class="author-box-job">Administrador</div>
                <br>
                <br>
                <br>
                <form method="post" class="needs-validation" novalidate="">
                    <div class="form-group">
                      <label>Nome do usuario: </label>
                      <input type="text" name="name" class="form-control" required />
                      <div class="invalid-feedback">
                        Por favor informe o nome do usuario
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
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Atualizar
                        </button>
                    </div>
                </form>

                {{-- <div class="mb-2 mt-3"><div class="text-small font-weight-bold">Deseja alterar a sua senha?</div></div> --}}
                <div class="w-100 d-sm-none"></div>
                <div class="float-right mt-sm-0 mt-3">
                  <a href="{{ route('admin.user-updatePassword') }}" class="btn">Alterar senha <i class="fas fa-lock"></i></a>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection