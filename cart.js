document.addEventListener('DOMContentLoaded', function () {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function () {
            const name = this.dataset.name;
            const price = this.dataset.price;

            let product = cart.find(p => p.name === name);
            if (product) {
                product.quantity += 1;
            } else {
                cart.push({ name, price, quantity: 1 });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert(name + ' added to cart!');
        });
    });
});
