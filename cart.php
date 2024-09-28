<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Maendeleo Machinga Group</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f9;
            color: #333;
        }

        header {
            background-color: #ffa500;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        header h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        nav a {
            color: white;
            margin: 0 1rem;
            text-decoration: none;
            font-weight: 600;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .cart {
            max-width: 800px;
            margin: 2rem auto;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .cart h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #ffa500;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .cart-item div {
            flex-grow: 1;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 1rem;
        }

        .cart-item h4 {
            margin: 0;
            font-size: 1.2rem;
        }

        .cart-item p {
            margin: 0.5rem 0;
        }

        .total {
            display: flex;
            justify-content: space-between;
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 2rem;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #ffa500;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 1.5rem;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #e69500;
        }

        .empty-cart {
            text-align: center;
            font-size: 1.2rem;
            color: #777;
        }
    </style>
</head>
<body>
    <header>
        <h1>Maendeleo Machinga Group</h1>
        <nav>
            <a href="index.html">Home</a>
            <a href="products.html">Products</a>
            <a href="cart.php">Cart</a>
        </nav>
    </header>

    <section class="cart">
        <h2>Your Cart</h2>
        <div id="cartItems" class="cart-items"></div>
        <div class="total">
            <h3>Total:</h3>
            <span>Tshs <span id="totalPrice">0</span></span>
        </div>
        <button class="btn" onclick="clearCart()">Clear Cart</button>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cartItems = document.getElementById('cartItems');
            const totalPrice = document.getElementById('totalPrice');
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            if (cart.length === 0) {
                cartItems.innerHTML = '<p class="empty-cart">Your cart is empty.</p>';
            } else {
                let total = 0;
                cart.forEach(product => {
                    cartItems.innerHTML += `
                        <div class="cart-item">
                            <div>
                                <h4>${product.name}</h4>
                                <p>Price: Tshs ${product.price}</p>
                                <p>Quantity: ${product.quantity}</p>
                            </div>
                        </div>
                        <hr>
                    `;
                    total += product.price * product.quantity;
                });
                totalPrice.textContent = total.toFixed(2);
            }
        });

        function clearCart() {
            localStorage.removeItem('cart');
            location.reload();
        }
    </script>
</body>
</html>
