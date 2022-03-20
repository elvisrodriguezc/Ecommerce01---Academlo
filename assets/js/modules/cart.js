import {ceckLS} from './products.js'
let cart = [];
function cartReload(){
    cart = localStorage.getItem('cartContainer') ? JSON.parse(localStorage.getItem('cartContainer')) : []
}

export const buyProduct = (id) => {
    cartReload();
    const productFound = ceckLS.find((producto)=> +producto.id === id)
    let indexPFound = cart.findIndex((producto)=> +producto.id === +productFound.id);
    if (indexPFound>=0){ 
        (+cart[indexPFound].reserved<+productFound.cantidad)
            ? cart[indexPFound].reserved++
            : alert('No hay mmás stock')
    }else{
        productFound.reserved = 1
        cart.push(productFound)
    }
    localStorage.setItem('cartContainer', JSON.stringify(cart))
}

export const cartPRemove = (id) => {
    if(confirm('Are you sure you want to eliminate this product?')){
        cartReload()
        const productFound = ceckLS.find((producto)=> +producto.id === id)
        let indexPFound = cart.findIndex((producto)=> +producto.id === +productFound.id);
        cart.splice(indexPFound, 1)
        localStorage.setItem('cartContainer', JSON.stringify(cart))
    }
}

export const cartPDecrease = (id) => {
    cartReload()
    const productFound = ceckLS.find((producto)=> +producto.id === id)
    let indexPFound = cart.findIndex((producto)=> +producto.id === +productFound.id);
    if (+cart[indexPFound].reserved>1){
        cart[indexPFound].reserved--
        localStorage.setItem('cartContainer', JSON.stringify(cart))
    }
}

export const cartRender = async () => {
    cartReload()
    let html = ''
    if (cart.length > 0) {
        for (let producto of cart) {
            html += '<div>'
            html += `<img src="${producto.img}" alt="${producto.codigo}">`
            html += `<h4>${producto.descripcion}</h4>`
            html += `<hp>Cantidad ${producto.reserved}</hp>`
            html += `<div><button id="decrease" data-id="${producto.id}" class="linea">-</button>`
            html += `<button id="removeme" data-id="${producto.id}" class="linea">Eliminar</button></div>`
            html += '</div>'
        }
    }
    cartContainer.innerHTML = html
}

export const cartRenderCount = () => {
    cartReload()
    let counter = 0
    let total = 0
    for (let producto of cart){
        counter += producto.reserved
        total += producto.precio*producto.reserved
    }
    cartCant.textContent = counter
    monto.textContent = total.toFixed(2)
}

