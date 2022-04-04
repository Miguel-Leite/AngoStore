@extends('website.layouts.app')
@section('title','Produto')
@section('content')
	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li><a href="{{ route('website.index') }}">Home</a></li>
						<li><a href="{{ route('website.index') }}">Categoria</a></li>
						<li><a href="{{ route('website.product') }}">Produto</a></li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- Product main img -->
				<div class="col-md-5 col-md-push-2">
					<div id="product-main-img">
						<div class="product-preview">
							<img src="{{ asset('website/img/product01.png') }}" alt="">
						</div>

						<div class="product-preview">
							<img src="{{ asset('website/img/product03.png') }}" alt="">
						</div>

						<div class="product-preview">
							<img src="{{ asset('website/img/product06.png') }}" alt="">
						</div>

						<div class="product-preview">
							<img src="{{ asset('website/img/product08.png') }}" alt="">
						</div>
					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->
				<div class="col-md-2  col-md-pull-5">
					<div id="product-imgs">
						<div class="product-preview">
							<img src="{{ asset('website/img/product01.png') }}" alt="">
						</div>

						<div class="product-preview">
							<img src="{{ asset('website/img/product03.png') }}" alt="">
						</div>

						<div class="product-preview">
							<img src="{{ asset('website/img/product06.png') }}" alt="">
						</div>

						<div class="product-preview">
							<img src="{{ asset('website/img/product08.png') }}" alt="">
						</div>
					</div>
				</div>
				<!-- /Product thumb imgs -->

				<!-- Product details -->
				<div class="col-md-5">
					<div class="product-details">
						<h2 class="product-name">product name goes here</h2>
						<div>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div>
							<a class="review-link" href="#">10 Visualizações</a>
						</div>
						<div>
							<h3 class="product-price">AKZ 980.00 <del class="product-old-price">AKZ 990.00</del></h3>
							{{-- <span class="product-available">In Stock</span> --}}
						</div>
						{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> --}}

						<div class="product-options">
							<label>
								Tamanho
								<select class="input-select">
									<option value="0">X</option>
								</select>
							</label>
							{{-- <label>
								Color
								<select class="input-select">
									<option value="0">Red</option>
								</select>
							</label> --}}
						</div>

						<div class="add-to-cart">
							<div class="qty-label">
								Quantidade
								<div class="input-number">
									<input type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
							<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Adiconar ao carrinho</button>
						</div>
{{-- 
						<ul class="product-btns">
							<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
							<li><a href="#"><i class="fa fa-exchange"></i> adi</a></li>
						</ul> --}}

						<ul class="product-links">
							<li>Categoria:</li>
							<li><a href="#">Laptop's</a></li>
							<li><a href="#">Accessorios</a></li>
						</ul>

						<ul class="product-links">
							<li>Partilhar:</li>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-envelope"></i></a></li>
						</ul>

					</div>
				</div>
				<!-- /Product details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

@endsection