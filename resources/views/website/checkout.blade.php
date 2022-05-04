@extends('website.layouts.profile')
@section('title','Checkout')

@section('content')
    <div class="checkout">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-md-8">
                    <h3>Endereço de entrega</h3>
                    <form action="{{ route('website.saveCheckout') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Provincia" required>
                        </div>
                        <div class="form-group">
                            <label for="complement">Complemento</label>
                            <input type="text" name="complement" id="complement" class="form-control" placeholder="Complemento (opcional)">
                        </div>
                        <div class="form-group">
                            <label for="city">Municipio</label>
                            <input type="text" name="city" id="city" class="form-control" placeholder="Municipio, bairro, nº de casa" required>
                        </div>
                        <h5>DETALHES DO PEDIDOS</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produto(s)</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>

                        <button type="submit" class="btn btn-success col-sm-12">Adicionar endereço</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
	<script>
        const formAddress = document.querySelector('form');

        function subTotal() {
            let items = JSON.parse(localStorage.getItem('productInCart')) ?? []
            let subtotal = 0;
            for (let i = 0; i < items.length; i++) {
                const count = items[i].inCart * items[i].price;
                subtotal +=count
            }
            return subtotal;
        }

        function totalOrder() {
            return subTotal() + 10000;
        }

        formAddress.addEventListener('submit',async (e)=>{
            e.preventDefault()
            const fd = new FormData(e.currentTarget);
            fd.append('vltotal',totalOrder());
            const {data} = await axios.post(formAddress.action,fd);
            
            if (data.success) {
                iziToast.success({
                    title: 'Sucesso!',
                    message: data.message,
                    position: 'topRight'
                });
                setInterval(() => {
                    location.assign(`pagamento/${data.id}`);
                }, 2000);
            } else {
                iziToast.error({
                    title: 'Falha na autenticação!',
                    message: data.message,
                    position: 'topRight'
                });
            }
        })
    </script>	
@endsection