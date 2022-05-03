const btnAddProduct = document.querySelectorAll('.add-to-cart-btn');
const getProductsInCarts = () => JSON.parse(localStorage.getItem('productInCart')) ?? [];

for (let index = 0; index < btnAddProduct.length; index++) {
    btnAddProduct[index].addEventListener('click',()=>{
        let key = btnAddProduct[index].getAttribute('key');
        const getProducts = async () => {
            const {data} = await axios.get('http://127.0.0.1:8000/products');
            data.filter(product=>{
                if (product.id==key) {
                    product.inCart = 1;
                    setProductsInCart(product)
                }
            })
        }
        getProducts()
    })
}

function setProductsInCart(product) {
    if (localStorage.getItem('productInCart')===null) {
        iziToast.success({
            title: 'Adicionado com sucesso!',
            message: `Produto ${product.product} adicionado no carrinho com sucesso.`,
            position: 'topRight'
          });
        localStorage.setItem('productInCart',JSON.stringify([product]))
    } else {
        let allProducts = JSON.parse(localStorage.getItem('productInCart'))
        for (let i = 0; i < allProducts.length; i++) {
            if(allProducts[i].id===product.id) {
                allProducts[i].inCart = allProducts[i].inCart+1;
                iziToast.info({
                    title: 'Repilicado com sucesso!',
                    message: `Produto ${product.product} foi repilicado no carrinho com sucesso.`,
                    position: 'topRight'
                  });
                return localStorage.setItem('productInCart',JSON.stringify(allProducts))
            }           
        }
        allProducts = [product,...allProducts];
        localStorage.setItem('productInCart',JSON.stringify(allProducts))
        iziToast.success({
            title: 'Adicionado no carrinho',
            message: `Produto ${product.product} adicionado no carrinho com sucesso.`,
            position: 'topRight'
          });
    }
}


function countProductInCart() {
    let products = localStorage.getItem('productInCart') !=null?JSON.parse(localStorage.getItem('productInCart')).length:0;
    document.querySelector('.qty-cart').innerHTML=`${products}`;
    document.querySelector('.cart-summary > small > .count').innerHTML=`${products}`;
}

function cartList() {
    let items = getProductsInCarts()
    let count = items.length > 1 ? 2 : 1

    const cartList = document.querySelector('.cart-list')
    cartList.innerHTML='';
    
    for (let i = 0; i < count; i++) {
        let productWidget = document.createElement('div')
        productWidget.classList.add('product-widget')
        if (items.length > 0) {
            productWidget.innerHTML = `
            <div class="product-img">
                <img src="storage/${items[i].image_default}" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-name"><a href="#">${items[i].product}</a></h3>
                <h4 class="product-price"><span class="qty">${items[i].inCart}x</span>AKZ ${items[i].price * items[i].inCart}</h4>
            </div>
            <button class="delete"><i class="fa fa-close"></i></button>
            `;
        } else {
            productWidget.innerHTML = ``;
        }
        cartList.appendChild(productWidget)
    }
}

setInterval(cartList,1000)

setInterval(countProductInCart,1000)

