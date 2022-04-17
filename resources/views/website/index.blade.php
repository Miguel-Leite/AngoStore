@extends('website.layouts.app')
@section('title','Home')
@section('content')
	
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="{{ asset('website/img/shop01.png') }}" alt="">
						</div>
						<div class="shop-body">
							<h3>Colecções de <br>Laptop's</h3>
							{{-- <a href="#" class="cta-btn">Ver agora <i class="fa fa-arrow-circle-right"></i></a> --}}
						</div>
					</div>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="{{ asset('website/img/shop03.png') }}" alt="">
						</div>
						<div class="shop-body">
							<h3>Colecções de <br>Accessorios</h3>
							{{-- <a href="#" class="cta-btn">Ver agora <i class="fa fa-arrow-circle-right"></i></a> --}}
						</div>
					</div>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="{{ asset('website/img/shop02.png') }}" alt="">
						</div>
						<div class="shop-body">
							<h3>Colecções de <br>Câmeras</h3>
							{{-- <a href="#" class="cta-btn">Ver agora <i class="fa fa-arrow-circle-right"></i></a> --}}
						</div>
					</div>
				</div>
				<!-- /shop -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Novos produtos</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								{{-- @include('website.layouts.category-menu-filter')   --}}
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<div id="#" class="tab-pane active"> 
								@if (count($products) > 0)	
									<div class="products-slick" data-nav="#slick-nav-1">
										@foreach ($products as $product)
											<!-- product -->
											<div class="product">
												<div class="product-img">
													<img src="{{ url("storage/$product->image_default") }}" alt="{{ $product->image_default }}">
													<div class="product-label">
														<span class="new">Novo</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">Categoria: {{ $product->category }}</p>
													<h3 class="product-name"><a href="{{ route('website.product',$product->product) }}">{{ $product->product }}</a></h3>
													<h4 class="product-price">AKZ {{formatPrice($product->price)}} <del class="product-old-price">AKZ {{lastPrice($product->price)}}</del></h4>
													<div class="product-btns">
														<button onclick="viewDetailProduct('{{ route('website.product',$product->product) }}')" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver detalhes</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Comprar </button>
												</div>
											</div>
											<!-- /product -->
										@endforeach
									</div>
								@else:
									<div class="alert alert-info text-center">
										<b>Lamentamos informar,</b> que não foi registrado nenhum produto na nossa loja. Por favor tente mas tarde
									</div>
								@endif
							</div>
						</div>
					</div>
					<br><br>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- HOT DEAL SECTION -->
	<div id="hot-deal" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
							<li>
								<div>
									<h3 class="day">00</h3>
									<span>Dia(s)</span>
								</div>
							</li>
							<li>
								<div>
									<h3 class="hour">00</h3>
									<span>Hora(s)</span>
								</div>
							</li>
							<li>
								<div>
									<h3 class="min">00</h3>
									<span>Minuto(s)</span>
								</div>
							</li>
							<li>
								<div>
									<h3 class="second">00</h3>
									<span>Segundo(s)</span>
								</div>
							</li>
						</ul>
						<h2 class="text-uppercase">Os produtos da semana</h2>
						<p>Novas colecções com 50% de desconto</p>
						<a class="primary-btn cta-btn" href="{{ route('website.products') }}">Comprar Agora</a>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Top produtos</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								{{-- @include('website.layouts.category-menu-filter')   --}}
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="#" class="tab-pane active"> 
								@if (count($products) > 0)	
									<div class="products-slick" data-nav="#slick-nav-1">
										@foreach ($products as $product)
											<!-- product -->
											<div class="product">
												<div class="product-img">
													<img src="{{ url("storage/$product->image_default") }}" alt="{{ $product->image_default }}">
													<div class="product-label">
														<span class="new">Novo</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">Categoria: {{ $product->category }}</p>
													<h3 class="product-name"><a href="{{ route('website.product',$product->product) }}">{{ $product->product }}</a></h3>
													<h4 class="product-price">AKZ {{formatPrice($product->price)}} <del class="product-old-price">AKZ {{lastPrice($product->price)}}</del></h4>
													<div class="product-btns">
														<button onclick="viewDetailProduct('{{ route('website.product',$product->product) }}')" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver detalhes</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Comprar </button>
												</div>
											</div>
											<!-- /product -->
										@endforeach
									</div>
								@else
									<div class="alert alert-info text-center">
										<b>Lamentamos informar,</b> que não foi registrado nenhum produto na nossa loja. Por favor tente mas tarde
									</div>
								@endif
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- /Products tab & slick -->
			</div>
			<!-- /row -->
			<br><br>
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
@endsection

@section('page-script')

<script>
	function viewDetailProduct(url){
		if (url!=='' || url!==null) {
			location.assign(url);
		}
	}
	setInterval(() => {
		let date = new Date()
		let day = date.getDate() < 10? '0'+date.getDate():date.getDate();
		let hour = date.getHours() < 10? '0'+date.getHours():date.getHours();
		let min = date.getMinutes() < 10? '0'+date.getMinutes():date.getMinutes();
		let sec = date.getSeconds() < 10? '0'+date.getSeconds():date.getSeconds();
		document.querySelector('.day').innerHTML=`${day}`
		document.querySelector('.hour').innerHTML=`${hour}`
		document.querySelector('.min').innerHTML=`${min}`
		document.querySelector('.second').innerHTML=`${sec}`
		// document.querySelector('.min').innerHTML=`${}`
		// document.querySelector('.second').innerHTML=`${}`
	}, 1000);
</script>
@endsection