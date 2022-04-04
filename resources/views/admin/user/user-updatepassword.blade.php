@extends('admin.layouts.app')

@section('content')
    <div id="app">
      <section class="section">
        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6">
                <div class="login-brand">
                {{-- <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> --}}
                    {{-- <h2>Ango<span class="text-danger">Shop</span> </h2> --}}
                </div>

              <div class="card card-primary">
                <div class="card-header"><h4>Alterar senha</h4></div>

                <div class="card-body">
                  {{-- <p class="text-muted">We will send a link to reset your password</p> --}}
                  <form method="POST">
                    <div class="form-group">
                      <label for="password">Nova senha</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="password-confirm">Confirma senha</label>
                      <input id="password-confirm" type="password" class="form-control" name="confirm-password" tabindex="2" required>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Alterar senha
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="simple-footer">
                Copyright &copy; Stisla 2018
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection