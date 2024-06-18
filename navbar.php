<?php
// Function to calculate total price of items in cart
function calculateTotalPrice($cart)
{
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Adding event listeners for removing items from cart
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-id');
                removeFromCart(itemId);
            });
        });

        // Function to remove item from cart via AJAX
        function removeFromCart(id) {
            fetch('remove_from_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload(); // Reload page after successful removal
                    } else {
                        console.error('Error removing item from cart:', data.message);
                    }
                })
                .catch(error => console.error('Error removing item from cart:', error));
        }
    });
</script>
<div class="main-header header-transparent header-sticky">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2 col-xl-2 col-md-6 col-6 col-custom">
                <div class="header-logo d-flex align-items-center">
                    <a href="index.php">
                        <img class="img-full" src="assets/images/logo/p1.png" alt="Header Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-flex justify-content-center col-custom">
                <nav class="main-nav d-none d-lg-flex">
                    <ul class="nav">
                        <li>
                            <a class="active" href="index.php">
                                <span class="menu-text">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="shop.php">
                                <span class="menu-text">Shop</span>
                            </a>

                        </li>


                        <li>
                            <a href="about-us.php">
                                <span class="menu-text">About Us</span>
                            </a>
                        </li>
                        <li>
                            <a href="contact-us.php">
                                <span class="menu-text">Contact Us</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2 col-md-6 col-6 col-custom">
                <div class="header-right-area main-nav">
                    <ul class="nav">
                        <li class="minicart-wrap">
                            <a href="#" class="minicart-btn toolbar-btn">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="cart-item_count">
                                    <?php
                                    // Check if cart session exists and count items
                                    $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                                    echo $cartCount;
                                    ?>
                                </span>
                            </a>
                            <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                                <?php if ($cartCount > 0) : ?>
                                    <?php foreach ($_SESSION['cart'] as $key => $item) : ?>
                                        <div class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.php"><img src="<?php echo $item['image']; ?>" alt=""></a>
                                            </div>
                                            <div class="cart-text">
                                                <h5 class="title"><a href="cart.php"><?php echo $item['name']; ?></a></h5>
                                                <div class="cart-text-btn">
                                                    <div class="cart-qty">
                                                        <span><?php echo $item['quantity']; ?>×</span>
                                                        <span class="cart-price">Rp<?php echo number_format($item['price'], 0, ',', '.'); ?></span>
                                                    </div>
                                                    <button type="button" class="remove-item" data-id="<?php echo $key; ?>"><i class="ion-trash-b"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="cart-price-total d-flex justify-content-between">
                                        <h5>Total :</h5>
                                        <h5>Rp<?php echo number_format(calculateTotalPrice($_SESSION['cart']), 0, ',', '.'); ?></h5>
                                    </div>
                                    <div class="cart-links d-flex justify-content-between">
                                        <a class="btn flosun-button secondary-btn rounded-0" href="checkout.php">Checkout</a>
                                    </div>
                                <?php else : ?>
                                    <p>Your cart is empty</p>
                                <?php endif; ?>
                            </div>
                        </li>
                        <li class="account-menu-wrap d-none d-lg-flex">
                            <?php if (isset($_SESSION['first_name'])) : ?>
                                <div class="user-info">
                                    <span class="user-name"><?php echo $_SESSION['first_name']; ?></span>
                                    <a href="logout.php">Logout</a>
                                </div>
                            <?php else : ?>
                                <div class="user-info">
                                    <a href="login.php">Login</a>
                                </div>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div