@extends('website.layouts.app')
@section('title','Carrinho de compra')

@section('content')
	<div class="cart">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-ms-8 col-xs-12 col-md-6">
					<table class="table table-hover">
						<thead>
							{{--  table-inverse --}}
							<tr>
								<th></th>
								<th>Produto(s)</th>
								<th>Preço</th>
								<th>Quantidade</th>
								<th>Sub-total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<span id="remove">&times;</span>
								</td>
								<td>Iphone 6s</td>
								<td># 160000,00</td>
								<td class="quantity">
									<div class="btn-minus">-</div>
									<input type="text" name="qty" value="1"/>
									<div class="btn-plus">+</div>
								</td>
								<td>AKZ 170000,00</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg-4 col-ms-4 col-xs-12 col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Total do carrinho</h4>
						</div>
						<div class="panel-body">
							<div class="subtotal">
								<p class="text">Sub-total</p>
								<p class="value">AKZ 170000,00</p>
							</div>
							<div class="total">
								<p class="text">Total</p>
								<p class="value">AKZ 200000,00</p>
							</div>
						</div>
					</div>
					<a href="#" class="btn btn-info col-sm-12">Finalizar compra</a>
				</div>
			</div>
		</div>
	</div>
@endsection