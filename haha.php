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
        <div class="container container-default custom-area">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-12 col-custom widget-mt">
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
                        // Koneksi ke database (sesuaikan dengan pengaturan koneksi Anda)
                        $servername = "localhost";
                        $username = "username";
                        $password = "password";
                        $dbname = "dbname";

                        // Membuat koneksi
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Memeriksa koneksi
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Query untuk mengambil data produk dari database
                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);

                        // Memeriksa apakah ada hasil yang dikembalikan dari query
                        if ($result->num_rows > 0) {
                            // Loop untuk menampilkan setiap produk
                            while ($row = $result->fetch_assoc()) {
                                $product_id = $row['id'];
                                $product_name = $row['product_name'];
                                $price = $row['price'];
                                $old_price = $row['old_price'];
                                $description = $row['description'];
                                $image1 = $row['image1']; // Ganti image1 dengan nama kolom gambar pertama
                                $image2 = $row['image2']; // Ganti image2 dengan nama kolom gambar kedua
                                $discount = $row['discount']; // Mengambil kolom discount dari database
                                $rating = $row['rating'];
                        ?>
                                <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                                    <div class="product-item">
                                        <div class="single-product position-relative mr-0 ml-0">
                                            <div class="product-image">
                                                <a class="d-block" href="product-details.html">
                                                    <img src="assets/IMG2/shop product/<?php echo $image1; ?>" alt="Product Image" class="product-image-1 w-100">
                                                    <img src="assets/IMG2/shop product/<?php echo $image2; ?>" alt="Product Image" class="product-image-2 position-absolute w-100">
                                                </a>
                                                <?php if ($discount > 0) : ?>
                                                    <span class="onsale">Sale!</span>
                                                <?php endif; ?>
                                                <div class="add-action d-flex flex-column position-absolute">
                                                    <a href="compare.html" title="Compare">
                                                        <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                                    </a>
                                                    <a href="wishlist.html" title="Add To Wishlist">
                                                        <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                                    </a>
                                                    <a href="#iniquickview" title="Quick View" data-bs-toggle="modal" data-bs-target="#iniquickview"
                                                       data-id="<?php echo $product_id; ?>"
                                                       data-name="<?php echo $product_name; ?>"
                                                       data-price="<?php echo $price; ?>"
                                                       data-oldprice="<?php echo $old_price; ?>"
                                                       data-description="<?php echo $description; ?>"
                                                       data-image1="<?php echo $image1; ?>"
                                                       data-image2="<?php echo $image2; ?>"
                                                       data-rating="<?php echo $rating; ?>"
                                                       class="quick-view-btn">
                                                        <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-title">
                                                    <h4 class="title-2"> <a href="product-details.html"><?php echo $product_name; ?></a></h4>
                                                </div>
                                                <div class="product-rating">
                                                    <?php for ($i = 0; $i < 5; $i++) : ?>
                                                        <i class="fa fa-star<?php echo ($i < $rating) ? '' : '-o'; ?>"></i>
                                                    <?php endfor; ?>
                                                </div>
                                                <div class="price-box">
                                                    <span class="regular-price "><?php echo number_format($price); ?></span>
                                                    <?php if ($discount > 0) : ?>
                                                        <span class="old-price"><del><?php echo number_format($old_price); ?></del></span>
                                                    <?php endif; ?>
                                                </div>
                                                <a href="#" class="btn product-cart"
                                                   data-id="<?php echo $product_id; ?>"
                                                   data-name="<?php echo $product_name; ?>"
                                                   data-price="<?php echo $price; ?>"
                                                   data-image="assets/IMG2/shop product/<?php echo $image1; ?>">Add to Cart</a>
                                            </div>
                                            <div class="product-content-listview">
                                                <div class="product-title">
                                                    <h4 class="title-2"> <a href="product-details.html"><?php echo $product_name; ?></a></h4>
                                                </div>
                                                <div class="product-rating">
                                                    <?php for ($i = 0; $i < 5; $i++) : ?>
                                                        <i class="fa fa-star<?php echo ($i < $rating) ? '' : '-o'; ?>"></i>
                                                    <?php endfor; ?>
                                                </div>
                                                <div class="price-box">
                                                    <span class="regular-price "><?php echo number_format($price); ?></span>
                                                    <?php if ($discount > 0) : ?>
                                                        <span class="old-price"><del><?php echo number_format($old_price); ?></del></span>
                                                    <?php endif; ?>
                                                </div>
                                                <p class="desc-content"><?php echo $description; ?></p>
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
                                </div>
                        <?php
                            } // Akhir dari while loop
                        } else {
                            echo "No products found.";
                        }

                        // Tutup koneksi
                        $conn->close();
                        ?>
                    </div>
                    <!-- Shop Wrapper End -->
                </div>

                <div class="col-lg-3 col-12 col-custom">
                    <!-- Sidebar Widget Start -->
                    <aside class="sidebar_widget widget-mt">
                        <div class="widget_inner">
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Search</h3>
                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Our Store" aria-label="Search Our Store">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Menu Categories</h3>
                                <!-- Widget Menu Start -->
                                <nav>
                                    <ul class="mobile-menu p-0 m-0">
                                        <li class="menu-item-has-children"><a href="#">Request Nuna Graphic</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Club</a></li>
                                                <li><a href="#">Perusahaan</a></li>
                                                <li><a href="#">Keluarga</a></li>
                                                <li><a href="#">Instansi</a></li>
                                                <li><a href="#">Keluarga</a></li>
                                                <li><a href="#">Agama</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Rider ID</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Name DECAL</a></li>
                                                <li><a href="#">Sticker</a></li>
                                                <li><a href="#">Accessories</a></li>
                                                <li><a href="#">View All</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Custom Orders</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Instansi</a></li>
                                                <li><a href="#">Usaha</a></li>
                                                <li><a href="#">Club</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- Widget Menu End -->
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Price Filter</h3>
                                <!-- Widget Menu Start -->
                                <form action="#">
                                    <div id="slider-range"></div>
                                    <button type="submit">Filter</button>
                                    <input type="text" name="text" id="amount" />
                                </form>
                                <!-- Widget Menu End -->
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Categories</h3>
                                <div class="sidebar-body">
                                    <ul class="sidebar-list">
                                        <li><a href="#">All Product</a></li>
                                        <li><a href="#">Best Seller (5)</a></li>
                                        <li><a href="#">Featured (4)</a></li>
                                        <li><a href="#">New Products (6)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget-list widget-mb-2">
                                <h3 class="widget-title">Color</h3>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                <label class="custom-control-label" for="customCheck12">black (20)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                <label class="custom-control-label" for="customCheck13">red (6)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                <label class="custom-control-label" for="customCheck14">blue (8)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                <label class="custom-control-label" for="customCheck11">green (5)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                <label class="custom-control-label" for="customCheck15">pink (4)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget-list widget-mb-3">
                                <h3 class="widget-title">Tags</h3>
                                <div class="sidebar-body">
                                    <ul class="tags">
                                        <li><a href="#">Stiker</a></li>
                                        <li><a href="#">Club</a></li>
                                        <!-- Tambahkan tag lainnya sesuai kebutuhan -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- Sidebar Widget End -->
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <!-- JavaScript untuk menangani tombol "Add to Cart" -->
    <script>
        // Menggunakan jQuery untuk menangani klik tombol "Add to Cart"
        $(document).ready(function() {
            $(".product-cart").click(function(e) {
                e.preventDefault();
                var product_id = $(this).data('id');
                var product_name = $(this).data('name');
                var product_price = $(this).data('price');
                var product_image = $(this).data('image');

                // Simpan produk ke session atau lakukan aksi yang sesuai dengan kebutuhan Anda
                console.log("Product ID: " + product_id);
                console.log("Product Name: " + product_name);
                console.log("Product Price: " + product_price);
                console.log("Product Image: " + product_image);

                // Di sini Anda dapat menambahkan kode untuk menambahkan produk ke keranjang belanja
                // Misalnya, menggunakan AJAX untuk mengirim data produk ke backend
                // atau menyimpan data ke localStorage/sessionStorage
            });
        });
    </script>
</body>
</html>
