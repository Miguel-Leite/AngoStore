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
						<li>{{ $product->product }}</li>
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
				<div class="@if ($product->image_other) col-md-5 col-md-push-2 @else: col-md-5 col-md-push-1 @endif">
					<div id="product-main-img">
						<div class="product-preview">
							<img src="{{ url("storage/$product->image_default") }}" alt="{{ url("storage/$product->image_default") }}">
						</div>
						@if ($product->image_other)
							<div class="product-preview">
								<img src="{{ url("storage/$product->image_other") }}" class="img-responsive" alt="">
							</div>
						@endif
					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->

				@if ($product->image_other)
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="{{ url("storage/$product->image_other") }}" class="img-responsive" alt="">
							</div>	
							<div class="product-preview">
								<img src="{{ url("storage/$product->image_default") }}" class="img-responsive" alt="">
							</div>	
						</div>
					</div>
				@else
					<div class="col-md-2  col-md-pull-1"></div>
				@endif
				<!-- /Product thumb imgs -->

				<!-- Product details -->
				<div class="col-md-5">
					<div class="product-details">
						<h2 class="product-name">{{ $product->product }}</h2>
						<div></div>
						<div>
							<h3 class="product-price">AKZ {{formatPrice($product->price)}} <del class="product-old-price">AKZ {{lastPrice($product->price)}}</del></h3>
							{{-- <span class="product-available">In Stock</span> --}}
						</div>
						{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> --}}

						<div class="product-options">
							<label>
								Tamanho: <b>{{ $product->length }}</b>
								{{-- 
								<select class="input-select">
									<option value="0" disabled>{{ $product->length }}</option>
								</select> --}}
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
							<br>
							<br>
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