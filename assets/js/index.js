import { productRender } from './modules/products.js'
import { buyProduct, cartRender, cartPRemove, cartPDecrease, cartRenderCount } from './modules/cart.js'
document.addEventListener('DOMContentLoaded', () => {
    productRender()
    cartRender()
    cartRenderCount()
})

wrapper.addEventListener('click', (e) => {

    if (e.target.matches('#buyme')) {
        const id = e.target.dataset.id
        buyProduct(+id)
        cartRenderCount()
        cartRender()
    }

    if (e.target.matches('#removeme')) {
        const id = e.target.dataset.id
        cartPRemove(+id)
        cartRenderCount()
        cartRender()
    }

    if (e.target.matches('#decrease')) {
        const id = e.target.dataset.id
        cartPDecrease(+id)
        cartRenderCount()
        cartRender()
    }

    if (e.target.matches('#radio1')) {
        const id = e.target.dataset.id
        productRender()
    }

    if (e.target.matches('#radio2')) {
        const id = e.target.dataset.id
        productRender()
    }

})

hamburgerIcon.addEventListener('click', (e) => {
    if (e.target.matches('.bar1')) {
        console.log('puede')
        menu.classList.toggle('open');
    }
})
