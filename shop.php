<?php
$title = "Shop";
include 'header.php'; // Sesuaikan dengan path header.php Anda
?>

<body>
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Nuna Graphic</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->

    <!-- Shop Main Area Start Here -->
    <div class="shop-main-area">
        <div class="container">
            <div>
                <div>
                    <!-- Shop Toolbar Start -->
                    <div class="shop_toolbar_wrapper mb-30">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-3" title="Grid"><i class="fa fa-th"></i></button>
                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i class="fa fa-th-list"></i></button>
                        </div>
                        <div class="shop-select">
                            <form class="d-flex flex-column w-100" action="#">
                                <div class="form-group">
                                    <select class="form-control nice-select w-100">
                                        <option selected value="1">Alphabetically, A-Z</option>
                                        <option value="2">Sort by popularity</option>
                                        <option value="3">Sort by newness</option>
                                        <option value="4">Sort by price: low to high</option>
                                        <option value="5">Sort by price: high to low</option>
                                        <option value="6">Product Name: Z</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Shop Toolbar End -->
                    <!-- Shop Wrapper Start -->
                    <div class="row shop_wrapper grid_3">
                        <?php
                        // Query untuk mengambil data produk
                        require 'app/Conn.php';
                        $result = $db->query("SELECT * FROM products")->fetchAll();

                        // untuk mengubah format harga
                        function rupiah($angka)
                        {
                            $result = "Rp " . number_format($angka, 0, ',', '.');
                            return $result;
                        }

                        // Periksa apakah query berhasil dieksekusi
                        if ($result) {
                            // Periksa apakah ada hasil yang dikembalikan
                            if (count($result) > 0) {
                                // Loop untuk menampilkan setiap produk
                                foreach ($result as $data) {
                        ?>

                                    <!-- Toast Notification Area -->
                                    <div id="toast-notification" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header">
                                            <strong class="me-auto">Cart Notification</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                        <div class="toast-body">
                                            Product added to cart successfully!
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                                        <div class="product-item">
                                            <div class="single-product position-relative mr-0 ml-0">
                                                <div class="product-image">
                                                    <a class="d-block" href="product-detail.php?id=<?= $data['id'] ?>">
                                                        <img src="assets/products/<?= $data['image1']; ?>" alt="Product Image" class="product-image-1 w-100">
                                                        <img src="assets/products/<?= $data['image2']; ?>" alt="Product Image" class="product-image-2 position-absolute w-100">
                                                    </a>
                                                    <span class="onsale">Sale!</span>
                                                    <div class="add-action d-flex flex-column position-absolute">
                                                        <a href="compare.html" title="Compare">
                                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                                        </a>
                                                        <a href="wishlist.html" title="Add To Wishlist">
                                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                                        </a>
                                                        <a href="#iniquickview" title="Quick View" data-bs-toggle="modal" data-bs-target="#iniquickview" data-id="<?= $data['id']; ?>" data-name="<?= $data['name']; ?>" data-price="<?= $data['price']; ?>" data-oldprice="<?= $data['price'] + 200000; ?>" data-description="<?= $data['description']; ?>" data-image1="<?= $data['image1']; ?>" data-image2="<?= $data['image2']; ?>" data-rating="5" class="quick-view-btn">
                                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title">
                                                        <h4 class="title-2"> <a href="product-detail.php?id=<?= $data['id'] ?>"><?= $data['name']; ?></a></h4>
                                                    </div>
                                                    <div class="product-rating">
                                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php endfor; ?>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="regular-price "><?= rupiah($data['price']); ?></span>
                                                    </div>
                                                    <a href="#" class="btn product-cart" data-id="<?= $data['id']; ?>" data-name="<?= $data['name']; ?>" data-price="<?= $data['price']; ?>" data-image="assets/products/<?= $data['image1']; ?>">Add to Cart</a>

                                                </div>
                                                <div class="product-content-listview">
                                                    <div class="product-title">
                                                        <h4 class="title-2"> <a href="product-detail.php?id=<?= $data['id'] ?>"><?= $data['name']; ?></a></h4>
                                                    </div>
                                                    <div class="product-rating">
                                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php endfor; ?>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="regular-price "><?= rupiah($data['price']); ?></span>
                                                    </div>
                                                    <p class="desc-content"><?= $data['description']; ?></p>
                                                    <div class="button-listview">
                                                        <a href="#" class="btn product-cart button-icon flosun-button dark-btn" data-toggle="tooltip" data-placement="top" title="Add to Cart"> <span>Add to Cart</span> </a>
                                                        <a class="list-icon" href="compare.html" title="Compare">
                                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="top" title="Compare"></i>
                                                        </a>
                                                        <a class="list-icon" href="wishlist.html" title="Add To Wishlist">
                                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="top" title="Wishlist"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                } // Akhir dari while loop
                            } else {
                                echo "No products found.";
                            }
                        } else {
                            // Handle error jika query tidak berhasil dieksekusi
                            echo "Gagal mendapatkan data";
                        }
                        ?>
                    </div>
                    <!-- Shop Wrapper End -->
                </div>


            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>