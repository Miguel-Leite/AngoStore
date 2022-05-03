@extends('website.layouts.profile')
@section('title','Perfil')

@section('content')
    <section class="profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-4 col-md-6 col-xs-12">
                    <ul class="nav flex-column">
                        <li class="active col-12"><a data-toggle="tab" href="#dataUser">Dados Pessoas</a></li>
                        <li class="col-12"><a data-toggle="tab" href="#alterPassword">Alterar senha</a></li>
                        <li class="col-12"><a data-toggle="tab" href="#myRequest">Meus Pedidos</a></li>
                        <li class="col-12"><a href="{{ route('website.logout') }}">Sair</a></li>
                    </ul>
                </div>
                <div class="col-lg-8 col-xl-8 col-md-6 col-xs-12">
                    <div class="tab-content">
                        <div id="dataUser" class="tab-pane fade in active">
                            <form action="{{ route('website.updateUser',authUser()->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="person">Nome completo:</label>
                                    <input type="text" name="person" value="{{ authUser()->person }}" id="name" class="form-control" placeholder="Digite o seu nome" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="email" name="email" value="{{ authUser()->email }}" id="email" class="form-control" placeholder="Digite o seu E-mail" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefone:</label>
                                    <input type="text" name="phone" value="{{ authUser()->phone }}" id="phone" class="form-control" placeholder="Digite o seu nº de telefone" required>
                                </div>
                                <button type="submit" class="btn btn-info col-sm-12">Atualizar dados pessoas</button>
                            </form>
                        </div>
                        <div id="alterPassword" class="tab-pane fade">
                            <form action="{{ route('website.resetPassword',authUser()->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="password">Palavra-passe nova:</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Digite a palavra-passe nova" required>
                                </div>
                                <div class="form-group">
                                    <label for="password_c">Confirmar palavra-passe:</label>
                                    <input type="password" name="password_c" id="password_c" class="form-control" placeholder="Confirma a palavra-passe" required>
                                </div>
                                <button type="submit" class="btn btn-info col-sm-12">Atualizar palavra-passe</button>
                            </form>
                        </div>
                        <div id="myRequest" class="tab-pane fade">
                            3
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-script')
<script>
    function countProductInCart() {
        let products = localStorage.getItem('productInCart') !=null?JSON.parse(localStorage.getItem('productInCart')).length:0;
        document.querySelector('.qty-cart').innerHTML=`${products}`;
        document.querySelector('.cart-summary > small > .count').innerHTML=`${products}`;
    }
    setInterval(countProductInCart,1000)
</script>
<script src="{{ asset('website/js/profile.js') }}" type="module"></script>
@endsection