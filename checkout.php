<?php
ob_start();
session_start();

$title = "Checkout";
include 'header.php';

// Inisialisasi variabel total_price
$total_price = 0;

// Pastikan user sudah login sebelum proses checkout
if (!isset($_SESSION['first_name'])) {
    header("Location: login.php");
    exit;
}
?>

<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Checkout</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->

<!-- Checkout Area Start -->
<div class="checkout-area mt-no-text">
    <div class="container custom-area">
        <div class="row">
            <div class="col-lg-7 col-custom">
                <!-- Billing Details Form -->
                <div class="billing-details">
                    <h3 class="title">Billing Details</h3>
                    <form action="process_checkout.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo isset($_SESSION['first_name']) ? $_SESSION['first_name'] : ''; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo isset($_SESSION['last_name']) ? $_SESSION['last_name'] : ''; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="notes">Order Notes</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn flosun-button primary-btn rounded-0 black-btn w-100">Place Order</button>
                    </form>
                </div>
                <!-- End Billing Details Form -->
            </div>
            <div class="col-lg-5 ml-auto col-custom">
                <!-- Cart Calculation Area -->
                <div class="order-details">
                    <h3 class="title">Your Order</h3>
                    <div class="order-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $key => $item) {
                                        $product_id = $item['id'];
                                        $product_name = $item['name'];
                                        $price = $item['price'];
                                        $quantity = $item['quantity'];
                                        $image = $item['image'];

                                        $subtotal = $price * $quantity;
                                        $total_price += $subtotal;
                                ?>
                                        <tr>
                                            <td class="pro-thumbnail"><img src="<?php echo $image; ?>" alt="Product Image"></td>
                                            <td class="pro-title"><?php echo $product_name; ?></td>
                                            <td class="pro-price"><?php echo 'Rp' . number_format($price); ?></td>
                                            <td class="pro-quantity"><?php echo $quantity; ?></td>
                                            <td class="pro-subtotal"><?php echo 'Rp' . number_format($subtotal); ?></td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No items in cart</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="order-total">
                        <h3 class="title">Order Total</h3>
                        <ul>
                            <li><span class="left">Subtotal</span> <span class="right"><?php echo 'Rp' . number_format($total_price); ?></span></li>
                            <li><span class="left">Shipping</span> <span class="right">Rp300.000</span></li>
                            <li><span class="left">Total</span> <span class="right"><?php echo 'Rp' . number_format($total_price + 300000); ?></span></li>
                        </ul>
                    </div>
                </div>
                <!-- End Cart Calculation Area -->
            </div>
        </div>
    </div>
</div>
<!-- Checkout Area End -->

<?php
include 'footer.php';
ob_end_flush();
?>

</body>
</html>
