@extends('website.layouts.app')
@section('title','Login')
@section('content')
    
    <div class="container">
        <div class="col-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="auth">
                <ul class="nav nav-tabs">
                  <li class="active col-lg-6 col-sm-6 col-xs-12"><a data-toggle="tab" href="#login">Entrar</a></li>
                  <li class="col-lg-6 col-sm-6 col-xs-12"><a data-toggle="tab" href="#register">Registrar-se</a></li>
                </ul>

                <div class="tab-content">
                  <div id="login" class="tab-pane fade in active">
                    <form action="{{ route('website.login') }}" method="POST" class="login-client">
                        @csrf
                        <input type="email" name="email" placeholder="E-mail" required />
                        <input type="password" name="password" placeholder="Palavra-passe" required />
                        <button class="btn btn-info col-sm-12">Entrar</button>
                    </form>
                  </div>
                  <div id="register" class="tab-pane fade">
                    <form action="#">
                        <input type="text" name="username" placeholder="Nome completo" required />
                        <input type="email" name="email" placeholder="E-mail" required />
                        <input type="password" name="password" placeholder="Palavra-passe" required />
                        <input type="password" name="c_password" placeholder="Confirma palavra-passe" required />
                        <button class="btn btn-info col-sm-12">Registra-se</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
<script src="{{ asset('website/js/auth.js') }}" type="module"></script>    
@endsection