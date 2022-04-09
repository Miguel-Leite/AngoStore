@extends('website.layouts.app')
@section('title','Loja')

@section('content')
	<!-- Section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- product -->
				@foreach ($products as $product)
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="{{ url("storage/$product->image_default") }}" alt="{{ $product->image_default }}">
								<div class="product-label">
									<span class="new">Novo</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">Categoria: {{ $product->category }}</p>
								<h3 class="product-name" style="font-size: 12px !important;"><a href="{{ route('website.product',$product->product) }}">{{ $product->product }}</a></h3>
								<h4 class="product-price">AKZ {{formatPrice($product->price)}} <del class="product-old-price">AKZ {{lastPrice($product->price)}}</del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button onclick="viewDetailProduct('{{ route('website.product',$product->product) }}')" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Ver detalhes</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Comprar</button>
							</div>
						</div>
					</div>
				@endforeach
				<!-- /product -->
			</div>
			<!-- /row -->
			<!-- store bottom filter -->
			<div class="store-filter clearfix">
				<span class="store-qty">Mostrando 10-100 produtos</span>
				<ul class="store-pagination">
					@foreach ($pages as $page)
                        <li><a href="{{ $page["link"] }}">{{ $page["page"] }}</a></li>
                    @endforeach
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
				</ul>
			</div>
			<!-- /store bottom filter -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Section -->
@endsection

@section('page-script')

<script>
	function viewDetailProduct(url){
		if (url!=='' || url!==null) {
			location.assign(url);
		}
	}
</script>
@endsection