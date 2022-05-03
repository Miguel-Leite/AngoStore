const tbody = document.querySelector('tbody')
const getProductsInCarts = () => JSON.parse(localStorage.getItem('productInCart')) ?? [];

function loadProducts () {
    let items = getProductsInCarts()
    let subtotal = document.querySelector('.subtotal > .value')
    let total = document.querySelector('.total > .value')

    subtotal.innerHTML = `AKZ ${subTotal()}`;
    total.innerHTML = `AKZ ${totalOrder()}`
    tbody.innerHTML = ''
    items.forEach((item,index) => {
        insertItemInTable(item, index)
    });
}

loadProducts()

function insertItemInTable(item, index) {
    let tr = document.createElement('tr')
    tr.innerHTML = `
        <td><span id="remove" onclick="deleteItem(${index})">&times;</span></td>
        <td>${item.product}</td>
        <td>${item.price}</td>
        <td class="quantity">
            <div class="btn-minus" onclick="minusQty(${item.inCart},${index})"> - </div>
            <input type="text" name="qty" value="${item.inCart}"/>
            <div class="btn-plus" onclick="plusQty(${index})">+</div>
        </td>
        <td>${item.price * item.inCart}</td>
    `;
    tbody.appendChild(tr)
}

function deleteItem(index) {
    let items = getProductsInCarts()
    items.splice(index,1);
    localStorage.setItem('productInCart',JSON.stringify(items))
    loadProducts()
}

function plusQty(index) {
    let items = getProductsInCarts()
    items[index].inCart += 1;
    localStorage.setItem('productInCart',JSON.stringify(items))
    loadProducts()
}

function minusQty(qty,index) {
    let items = getProductsInCarts()
    let inCart = qty - 1;
    items[index].inCart = inCart > 1 ? inCart : 1;
    localStorage.setItem('productInCart',JSON.stringify(items))
    loadProducts()
}

function subTotal() {
    let items = getProductsInCarts()
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

if (document.querySelector('.btn-finishedOrders')){
    const btnFinishedOrders = document.querySelector('.btn-finishedOrders');
    btnFinishedOrders.addEventListener('click', async (e) => {
        e.preventDefault(); 
        const {data} = await axios.post(btnFinishedOrders.href,JSON.parse(localStorage.getItem('productInCart')));
        if (data.success) {
            localStorage.setItem('productInCart',JSON.stringify([]))
            loadProducts()
            swal('Concluído!',data.message,'success')
        } else {
            swal('Ops! Falhou.', data.message);
        }
    })
}