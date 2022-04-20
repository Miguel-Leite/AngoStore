import { useState } from './hooks/hooks.js';

const btnAddProduct = document.querySelectorAll('.add-to-cart-btn');
const [products, setProducts] = useState(localStorage.getItem('productInCart') !== null? JSON.parse(localStorage.getItem('productInCart')) : []);

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
        localStorage.setItem('productInCart',JSON.stringify([product]))
        setProducts([product])
    } else {
        let allProducts = JSON.parse(localStorage.getItem('productInCart'))
        for (let i = 0; i < allProducts.length; i++) {
            if(allProducts[i].id===product.id) {
                allProducts[i].inCart = allProducts[i].inCart+1;
                setProducts(allProducts);
                return localStorage.setItem('productInCart',JSON.stringify(allProducts))
            }           
        }
        allProducts = [product,...allProducts];
        setProducts(allProducts)
        localStorage.setItem('productInCart',JSON.stringify(allProducts))
    }
}