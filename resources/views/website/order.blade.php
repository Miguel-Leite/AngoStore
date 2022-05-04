@extends('website.layouts.profile')
@section('title','Checkout')

@section('content')
<br>
<br>
<br>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <h1>Pagamento N° {{ $order->id}}</h1>

                <button type="submit" id="btn-print" class="button alt" style="margin-bottom:10px">Imprimir</button>

                <iframe src="{{ route('website.boleto',$id) }}" name="boleto" frameborder="0" style="width:100%; min-height:1000px; border:1px solid #CCC; padding:20px;"></iframe>

                <script>
                document.querySelector("#btn-print").addEventListener("click", function(event){

                    event.preventDefault();

                    window.frames["boleto"].focus();
                    window.frames["boleto"].print();

                });                
                </script>

            </div>
        </div>
    </div>
</div>
@endsection