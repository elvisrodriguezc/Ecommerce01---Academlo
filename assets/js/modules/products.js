import {request} from '../utils/data.js'
const myUrl = './core/controller.php?Op=products_list&limite=20'

var myRequest = new Request(myUrl);
export const ceckLS = localStorage.getItem('productContainer') 
                ? JSON.parse(localStorage.getItem('productContainer')) 
                : request(myRequest)

export const productRender = async () => {
    const products = await ceckLS;
    if (document.getElementById('radio1').checked) {
        products.sort((a, b) => (a.precio > b.precio) ? 1 : ((b.precio > a.precio) ? -1 : 0));
    } else{
        products.sort((a, b) => (a.precio < b.precio) ? 1 : ((b.precio < a.precio) ? -1 : 0));
    }
    let html = ''
    for (const product of products) {
        html += '<div>'
        html += `<img src="${product.img}" alt="${product.descripcion}">`
        html += `<h4>${product.descripcion}</h4>`
        html += `<p>Código ${product.codigo}</p>`
        html += `<p>Stock ${product.cantidad} Und</p>`
        html += `<h3>Precio: S/ ${product.precio}</h3>`
        html += `<button id="buyme" data-id="${product.id}">Comprar</button>`
        html += '</div>'
        
    }
    productContainer.innerHTML = html
}

// let cart = localStorage.getItem('cartContainer') ? JSON.parse(localStorage.getItem('cartContainer')) : []

// export const buyProduct = (id) => {
//   const product = products.find((product)=> product.id === id)
//   cart.push(product)
//   localStorage.setItem('cartContainer', JSON.stringify(cart))
// }

// export const productRemove = (id) => {
//   const pokemon = ceckLS.find((pokemon)=> pokemon.id === id)
//   bag.splice(bag.indexOf(pokemon), 1)
//   localStorage.setItem('pokeBag', JSON.stringify(bag))
// }

// export const cartRender = async () => {
//     let html = ''
//     for (let product of cart) {
//         html += '<div>'
//         html += `<img src="${product.img}" alt="${product.codigo}">`
//         html += `<h2>${product.descripcion}</h2>`
//         html += `<button id="remove" data-id="${product.id}"><i>X<i/> Eliminar</button>`
//         html += '</div>'
//     }
//     pokebagContainer.innerHTML = html
// }
