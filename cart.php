<?php
session_start();

$title = "Shopping Cart";
include 'header.php';
// Memastikan request datang dari POST
// Menangani penambahan produk ke keranjang
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'], $_POST['product_name'], $_POST['price'], $_POST['image'])) {
    // Ambil data produk dari permintaan POST
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1; // Default quantity is 1

    // Inisialisasi keranjang jika belum ada
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Periksa apakah produk sudah ada di dalam keranjang
    if (isset($_SESSION['cart'][$product_id])) {
        // Jika produk sudah ada, tambahkan kuantitasnya
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        // Jika produk belum ada, tambahkan produk baru ke keranjang
        $_SESSION['cart'][$product_id] = array(
            'id' => $product_id,
            'name' => $product_name,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $image
        );
    }

    // Kirim respon JSON
    $response = array('status' => 'success', 'message' => 'Product added to cart.');
    echo json_encode($response);
    exit;
}

// Hapus item dari keranjang jika action=delete dan id disediakan via GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $product_id = $_GET['id'];
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Bagian lain dari halaman cart.php, seperti HTML dan kalkulasi subtotal dan total, dapat ditempatkan di sini.
?>
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Shopping Cart</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->

<!-- cart main wrapper start -->
<div class="cart-main-wrapper mt-no-text">
    <div class="container custom-area">
        <div class="row">
            <div class="col-lg-12 col-custom">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_price = 0;
                            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $item) {
                                    if (isset($item['id'], $item['name'], $item['price'], $item['quantity'], $item['image'])) {
                                        $product_id = $item['id'];
                                        $product_name = $item['name'];
                                        $price = $item['price'];
                                        $quantity = $item['quantity'];
                                        $image = $item['image'];

                                        $subtotal = $price * $quantity;
                                        $total_price += $subtotal;
                            ?>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?php echo $image; ?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="#"><?php echo $product_name; ?></a></td>
                                            <td class="pro-price"><span><?php echo 'Rp' . number_format($price); ?></span></td>
                                            <td class="pro-quantity"><span><?php echo $quantity; ?></span>
                                            <td class="pro-subtotal"><span><?php echo 'Rp' . number_format($subtotal); ?></span></td>
                                            <td class="pro-remove"><a href="cart.php?action=delete&id=<?php echo $product_id; ?>"><i class="lnr lnr-trash"></i></a></td>
                                        </tr>
                                <?php
                                    } // Akhir dari pemeriksaan isset
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6" class="text-center">No items in cart</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 ml-auto col-custom">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    <td><?php echo 'Rp' . number_format($total_price); ?></td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>Rp300.000</td> <!-- Ganti dengan metode perhitungan shipping yang sesuai -->
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount"><?php echo 'Rp' . number_format($total_price + 300000); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="checkout.php" class="btn flosun-button primary-btn rounded-0 black-btn w-100">Proceed To Checkout</a>
                    
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<!-- cart main wrapper end -->

<?php include 'footer.php'; ?>

</body>
<!-- Mirrored from htmldemo.net/flosun/flosun/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:26 GMT -->

</html>