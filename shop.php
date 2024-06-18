<?php

require 'app/Conn.php';
$products = $db->query("SELECT * FROM products")->fetchAll();

function rupiah($angka)
{
  $result = "Rp " . number_format($angka, 0, ',', '.');
  return $result;
}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<!-- Mirrored from htmldemo.net/flosun/flosun/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:17 GMT -->

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>WP DECAL</title>
  <meta name="robots" content="noindex, follow" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logomobil2.ico" />

  <!-- CSS
	============================================ -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css" />
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css" />
  <!-- Linear Icons CSS -->
  <link rel="stylesheet" href="assets/css/vendor/linearicons.min.css" />
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
  <!-- Animation CSS -->
  <link rel="stylesheet" href="assets/css/plugins/animate.min.css" />
  <!-- Jquery ui CSS -->
  <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
  <!-- Nice Select CSS -->
  <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css" />
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css" />

  <!-- Main Style CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <!-- Header Area Start Here -->
  <header class="main-header-area">
    <!-- Main Header Area Start -->
    <div class="main-header header-sticky">
      <div class="container custom-area">
        <div class="row align-items-center">
          <div class="col-lg-2 col-xl-2 col-md-6 col-6 col-custom">
            <div class="header-logo d-flex align-items-center">
              <a href="index.html">
                <img class="img-full" src="assets/images/logo/p1.jpg" alt="Header Logo" />
              </a>
            </div>
          </div>
          <div class="col-lg-8 d-none d-lg-flex justify-content-center col-custom">
            <nav class="main-nav d-none d-lg-flex">
              <ul class="nav">
                <li>
                  <a href="index.html">
                    <span class="menu-text"> Home</span>
                  </a>
                  <!-- <ul class="dropdown-submenu dropdown-hover"> -->
                  <!-- <li><a href="index.html">Home Page - 1</a></li> -->
                  <!-- <li><a href="index-2.html">Home Page - 2</a></li>
                                        <li><a href="index-3.html">Home Page - 3</a></li> -->
                  <!-- </ul> -->
                </li>
                <li>
                  <a class="active" href="shop.php">
                    <span class="menu-text">Shop</span>
                  </a>
                  <div class="mega-menu dropdown-hover">
                    <div class="menu-colum">
                      <ul>
                        <li><span class="mega-menu-text">Shop</span></li>
                        <li>
                          <a class="active" href="shop.php">All Product</a>
                        </li>
                        <!-- <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                <li><a href="shop-list-left.html">Shop List Left Sidebar</a></li>
                                                <li><a href="shop-list-right.html">Shop List Right Sidebar</a></li>
                                                <li><a href="shop-fullwidth.html">Shop Full Width</a></li> -->
                      </ul>
                    </div>
                    <div class="menu-colum">
                      <ul>
                        <li><span class="mega-menu-text">Others</span></li>
                        <li><a href="error-404.html">Error 404</a></li>
                        <li><a href="compare.html">Compare Page</a></li>
                        <li><a href="cart.html">Cart Page</a></li>
                        <li><a href="checkout.html">Checkout Page</a></li>
                        <li><a href="wishlist.html">Wishlist Page</a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li>
                  <a href="blog-details-fullwidth.html">
                    <span class="menu-text"> Blog</span>
                  </a>
                  <ul class="dropdown-submenu dropdown-hover">
                    <li><a href="blog.html">Blog Left Sidebar</a></li>
                    <li>
                      <a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a>
                    </li>
                    <li>
                      <a href="blog-list-fullwidth.html">Blog List Fullwidth</a>
                    </li>
                    <li><a href="blog-grid.html">Blog Grid Page</a></li>
                    <li>
                      <a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a>
                    </li>
                    <li>
                      <a href="blog-grid-fullwidth.html">Blog Grid Fullwidth</a>
                    </li>
                    <li>
                      <a href="blog-details-sidebar.html">Blog Details Sidebar</a>
                    </li>
                    <li>
                      <a href="blog-details-fullwidth.html">Blog Details Fullwidth</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#">
                    <span class="menu-text"> Pages</span>
                    <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-submenu dropdown-hover">
                    <li><a href="contact-us.html">Contact</a></li>
                    <li><a href="my-account.html">My Account</a></li>
                    <li><a href="frequently-questions.html">FAQ</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                  </ul>
                </li>
                <li>
                  <a href="about-us.html">
                    <span class="menu-text"> About Us</span>
                  </a>
                </li>
                <li>
                  <a href="contact-us.html">
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
                    <span class="cart-item_count">3</span>
                  </a>
                  <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                    <div class="single-cart-item">
                      <div class="cart-img">
                        <a href="cart.html"><img src="assets/IMG2/brading/WhatsApp Image 2024-05-09 at 16.07.16_1a4eb4ed.jpg" alt="" /></a>
                      </div>
                      <div class="cart-text">
                        <h5 class="title">
                          <a href="cart.html">Branding Toko Kue</a>
                        </h5>
                        <div class="cart-text-btn">
                          <div class="cart-qty">
                            <span>1×</span>
                            <span class="cart-price">Rp2.000.000</span>
                          </div>
                          <button type="button">
                            <i class="ion-trash-b"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="single-cart-item">
                      <div class="cart-img">
                        <a href="cart.html"><img src="assets/IMG2/Instansi/WhatsApp Image 2024-05-09 at 16.07.22_770e1643.jpg" alt="" /></a>
                      </div>
                      <div class="cart-text">
                        <h5 class="title">
                          <a href="cart.html">Branding Instansi</a>
                        </h5>
                        <div class="cart-text-btn">
                          <div class="cart-qty">
                            <span>1×</span>
                            <span class="cart-price">Rp2.500.000</span>
                          </div>
                          <button type="button">
                            <i class="ion-trash-b"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="single-cart-item">
                      <div class="cart-img">
                        <a href="cart.html"><img src="assets/IMG2/komunitas/WhatsApp Image 2024-05-09 at 16.07.18_1e929689.jpg" alt="" /></a>
                      </div>
                      <div class="cart-text">
                        <h5 class="title">
                          <a href="cart.html">Branding Pribadi</a>
                        </h5>
                        <div class="cart-text-btn">
                          <div class="cart-qty">
                            <span>1×</span>
                            <span class="cart-price">Rp3.000.000</span>
                          </div>
                          <button type="button">
                            <i class="ion-trash-b"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="cart-price-total d-flex justify-content-between">
                      <h5>Total :</h5>
                      <h5>Rp7.500.000</h5>
                    </div>
                    <div class="cart-links d-flex justify-content-between">
                      <a class="btn product-cart button-icon flosun-button dark-btn" href="cart.html">View cart</a>
                      <a class="btn flosun-button secondary-btn rounded-0" href="checkout.html">Checkout</a>
                    </div>
                  </div>
                </li>
                <li class="sidemenu-wrap">
                  <a href="#"><i class="fa fa-search"></i> </a>
                  <ul class="dropdown-sidemenu dropdown-hover-2 dropdown-search">
                    <li>
                      <form action="#">
                        <input name="search" id="search" placeholder="Search" type="text" />
                        <button type="submit">
                          <i class="fa fa-search"></i>
                        </button>
                      </form>
                    </li>
                  </ul>
                </li>
                <li class="account-menu-wrap d-none d-lg-flex">
                  <a href="#" class="off-canvas-menu-btn">
                    <i class="fa fa-bars"></i>
                  </a>
                </li>
                <li class="mobile-menu-btn d-lg-none">
                  <a class="off-canvas-btn" href="#">
                    <i class="fa fa-bars"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Main Header Area End -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper" id="mobileMenu">
      <div class="off-canvas-overlay"></div>
      <div class="off-canvas-inner-content">
        <div class="btn-close-off-canvas">
          <i class="fa fa-times"></i>
        </div>
        <div class="off-canvas-inner">
          <div class="search-box-offcanvas">
            <form>
              <input type="text" placeholder="Search product..." />
              <button class="search-btn"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <!-- mobile menu start -->
          <div class="mobile-navigation">
            <!-- mobile menu navigation start -->
            <nav>
              <ul class="mobile-menu">
                <li class="menu-item-has-children">
                  <a href="#">Home</a>
                  <ul class="dropdown">
                    <li><a href="index.html">Home Page 1</a></li>
                    <li><a href="index-2.html">Home Page 2</a></li>
                    <li><a href="index-3.html">Home Page 3</a></li>
                    <li><a href="index-4.html">Home Page 4</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children">
                  <a href="#">Shop</a>
                  <ul class="megamenu dropdown">
                    <li class="mega-title has-children">
                      <a href="#">Shop Layouts</a>
                      <ul class="dropdown">
                        <li><a href="shop.php">Shop Left Sidebar</a></li>
                        <li>
                          <a href="shop-right-sidebar.html">Shop Right Sidebar</a>
                        </li>
                        <li>
                          <a href="shop-list-left.html">Shop List Left Sidebar</a>
                        </li>
                        <li>
                          <a href="shop-list-right.html">Shop List Right Sidebar</a>
                        </li>
                        <li>
                          <a href="shop-fullwidth.html">Shop Full Width</a>
                        </li>
                      </ul>
                    </li>
                    <li class="mega-title has-children">
                      <a href="#">Product Details</a>
                      <ul class="dropdown">
                        <li>
                          <a href="product-details.html">Single Product Details</a>
                        </li>
                        <li>
                          <a href="variable-product-details.html">Variable Product Details</a>
                        </li>
                        <li>
                          <a href="external-product-details.html">External Product Details</a>
                        </li>
                        <li>
                          <a href="gallery-product-details.html">Gallery Product Details</a>
                        </li>
                        <li>
                          <a href="countdown-product-details.html">Countdown Product Details</a>
                        </li>
                      </ul>
                    </li>
                    <li class="mega-title has-children">
                      <a href="#">Others</a>
                      <ul class="dropdown">
                        <li><a href="error404.html">Error 404</a></li>
                        <li><a href="compare.html">Compare Page</a></li>
                        <li><a href="cart.html">Cart Page</a></li>
                        <li><a href="checkout.html">Checkout Page</a></li>
                        <li><a href="wishlist.html">Wish List Page</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="menu-item-has-children">
                  <a href="#">Blog</a>
                  <ul class="dropdown">
                    <li><a href="blog.html">Blog Left Sidebar</a></li>
                    <li>
                      <a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a>
                    </li>
                    <li>
                      <a href="blog-list-fullwidth.html">Blog List Fullwidth</a>
                    </li>
                    <li><a href="blog-grid.html">Blog Grid Page</a></li>
                    <li>
                      <a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a>
                    </li>
                    <li>
                      <a href="blog-grid-fullwidth.html">Blog Grid Fullwidth</a>
                    </li>
                    <li>
                      <a href="blog-details-sidebar.html">Blog Details Sidebar Page</a>
                    </li>
                    <li>
                      <a href="blog-details-fullwidth.html">Blog Details Fullwidth Page</a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item-has-children">
                  <a href="#">Pages</a>
                  <ul class="dropdown">
                    <li><a href="frequently-questions.html">FAQ</a></li>
                    <li><a href="my-account.html">My Account</a></li>
                    <li>
                      <a href="login-register.html">login &amp; register</a>
                    </li>
                  </ul>
                </li>
                <li><a href="about-us.html">About Us</a></li>
                <li><a href="contact-us.html">Contact</a></li>
              </ul>
            </nav>
            <!-- mobile menu navigation end -->
          </div>
          <!-- mobile menu end -->
          <div class="offcanvas-widget-area">
            <div class="switcher">
              <div class="language">
                <span class="switcher-title">Language: </span>
                <div class="switcher-menu">
                  <ul>
                    <li>
                      <a href="#">English</a>
                      <ul class="switcher-dropdown">
                        <li><a href="#">German</a></li>
                        <li><a href="#">French</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="currency">
                <span class="switcher-title">Currency: </span>
                <div class="switcher-menu">
                  <ul>
                    <li>
                      <a href="#">$ USD</a>
                      <ul class="switcher-dropdown">
                        <li><a href="#">€ EUR</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="top-info-wrap text-left text-black">
              <ul class="address-info">
                <li>
                  <i class="fa fa-phone"></i>
                  <a href="info%40yourdomain.html">(1245) 2456 012</a>
                </li>
                <li>
                  <i class="fa fa-envelope"></i>
                  <a href="info%40yourdomain.html">info@yourdomain.com</a>
                </li>
              </ul>
              <div class="widget-social">
                <a class="facebook-color-bg" title="Facebook-f" href="#"><i class="fa fa-facebook-f"></i></a>
                <a class="twitter-color-bg" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                <a class="linkedin-color-bg" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                <a class="youtube-color-bg" title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                <a class="vimeo-color-bg" title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-menu-wrapper" id="sideMenu">
      <div class="off-canvas-overlay"></div>
      <div class="off-canvas-inner-content">
        <div class="off-canvas-inner">
          <div class="btn-close-off-canvas">
            <i class="fa fa-times"></i>
          </div>
          <!-- offcanvas widget area start -->
          <div class="offcanvas-widget-area">
            <ul class="menu-top-menu">
              <li><a href="about-us.html">Tentang Kami</a></li>
            </ul>
            <p class="desc-content">
              WP Decal adalah sebuah perusahaan yang berfokus pada Jasa
              Branding Mobil dan Pemasangan Sticker. Bersama kami, kendaraan
              niaga anda akan menjadi media iklan yang eye-catching, yang akan
              menarik perhatian ribuan orang setiap harinya di jalan.
            </p>
            <div class="switcher">
              <div class="language">
                <span class="switcher-title">Language: </span>
                <div class="switcher-menu">
                  <ul>
                    <li>
                      <a href="#">English</a>
                      <ul class="switcher-dropdown">
                        <li><a href="#">German</a></li>
                        <li><a href="#">French</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="currency">
                <span class="switcher-title">Currency: </span>
                <div class="switcher-menu">
                  <ul>
                    <li>
                      <a href="#">$ USD</a>
                      <ul class="switcher-dropdown">
                        <li><a href="#">€ EUR</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="top-info-wrap text-left text-black">
              <ul class="address-info">
                <li>
                  <i class="fa fa-phone"></i>
                  <a href="info%40yourdomain.html">(1245) 2456 012</a>
                </li>
                <li>
                  <i class="fa fa-envelope"></i>
                  <a href="info%40yourdomain.html">info@yourdomain.com</a>
                </li>
              </ul>
              <div class="widget-social">
                <a class="facebook-color-bg" title="Facebook-f" href="#"><i class="fa fa-facebook-f"></i></a>
                <a class="twitter-color-bg" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                <a class="linkedin-color-bg" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                <a class="youtube-color-bg" title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                <a class="vimeo-color-bg" title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
              </div>
            </div>
          </div>
          <!-- offcanvas widget area end -->
        </div>
      </div>
    </aside>
    <!-- off-canvas menu end -->
  </header>
  <!-- Header Area End Here -->
  <!-- Breadcrumb Area Start Here -->
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
          <!--shop toolbar start-->
          <div class="shop_toolbar_wrapper mb-30">
            <div class="shop_toolbar_btn">
              <button data-role="grid_3" type="button" class="active btn-grid-3" title="Grid">
                <i class="fa fa-th"></i>
              </button>
              <button data-role="grid_list" type="button" class="btn-list" title="List">
                <i class="fa fa-th-list"></i>
              </button>
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
          <!--shop toolbar end-->
          <!-- Shop Wrapper Start -->
          <div class="row shop_wrapper grid_3">
            <?php
            foreach ($products as $data) :
            ?>
              <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                <div class="product-item">
                  <div class="single-product position-relative mr-0 ml-0">
                    <div class="product-image">
                      <a class="d-block" href="product-details.html">
                        <img src="assets/products/<?= $data['image'] ?>" alt="" class="product-image-1 w-100" />
                      </a>
                      <span class="onsale">Sale!</span>
                      <div class="add-action d-flex flex-column position-absolute">
                        <a href="compare.html" title="Compare">
                          <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                        </a>
                        <a href="wishlist.html" title="Add To Wishlist">
                          <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                        </a>
                        <a href="#modal_<?= $data['id'] ?>" title="Quick View" data-bs-toggle="modal" data-bs-target="#modal_<?= $data['id'] ?>">
                          <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-content">
                      <div class="product-title">
                        <h4 class="title-2">
                          <a href="product-details.html"><?= $data['name'] ?></a>
                        </h4>
                      </div>
                      <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                      <div class="price-box">
                        <span class="regular-price"><?= rupiah($data['price']) ?></span>
                        <span class="old-price"><del><?= rupiah($data['price'] + 200000) ?></del></span>
                      </div>
                      <a href="cart.html" class="btn product-cart">Add to Cart</a>
                    </div>
                    <div class="product-content-listview">
                      <div class="product-title">
                        <h4 class="title-2">
                          <a href="product-details.html"><?= $data['name'] ?></a>
                        </h4>
                      </div>
                      <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                      <div class="price-box">
                        <span class="regular-price"><?= rupiah($data['price']) ?></span>
                        <span class="old-price"><del><?= rupiah($data['price'] + 200000) ?></del></span>
                      </div>
                      <p class="desc-content"><?= $data['description'] ?></p>
                      <div class="button-listview">
                        <a href="cart.html" class="btn product-cart button-icon flosun-button dark-btn" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                          <span>Add to Cart</span>
                        </a>
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
            <?php endforeach ?>
          </div>
          <!-- Shop Wrapper End -->
          <!-- Bottom Toolbar Start -->
          <div class="row">
            <div class="col-sm-12 col-custom">
              <div class="toolbar-bottom">
                <div class="pagination">
                  <ul>
                    <li class="current">1</li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#">next</a></li>
                    <li><a href="#">&gt;&gt;</a></li>
                  </ul>
                </div>
                <p class="desc-content text-center text-sm-right mb-0">
                  Showing 1 - 12 of 34 result
                </p>
              </div>
            </div>
          </div>
          <!-- Bottom Toolbar End -->
        </div>
        <div class="col-lg-3 col-12 col-custom">
          <!-- Sidebar Widget Start -->
          <aside class="sidebar_widget widget-mt">
            <div class="widget_inner">
              <div class="widget-list widget-mb-1">
                <h3 class="widget-title">Search</h3>
                <div class="search-box">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Our Store" aria-label="Search Our Store" />
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
                    <li class="menu-item-has-children">
                      <a href="#">Request Nuna Graphic</a>
                      <ul class="dropdown">
                        <li><a href="#">Club</a></li>
                        <li><a href="#">Perusahaan</a></li>
                        <li><a href="#">Keluarga</a></li>
                        <li><a href="#">Instansi</a></li>
                        <li><a href="#">Keluarga</a></li>
                        <li><a href="#">Agama</a></li>
                      </ul>
                    </li>
                    <li class="menu-item-has-children">
                      <a href="#">Rider ID</a>
                      <ul class="dropdown">
                        <li><a href="#">Name DECAL</a></li>
                        <li><a href="#">Sticker</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">View All</a></li>
                      </ul>
                      <!-- </li>
                                        <li class="menu-item-has-children"><a href="#">Interior Decor</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Calendula</a></li>
                                                <li><a href="#">Castor Bean</a></li>
                                                <li><a href="#">Catmint</a></li>
                                                <li><a href="#">Chives</a></li>
                                            </ul>
                                        </li> -->
                    </li>

                    <li class="menu-item-has-children">
                      <a href="#">Custom Orders</a>
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
                        <input type="checkbox" class="custom-control-input" id="customCheck12" />
                        <label class="custom-control-label" for="customCheck12">black (20)</label>
                      </div>
                    </li>
                    <li>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck13" />
                        <label class="custom-control-label" for="customCheck13">red (6)</label>
                      </div>
                    </li>
                    <li>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck14" />
                        <label class="custom-control-label" for="customCheck14">blue (8)</label>
                      </div>
                    </li>
                    <li>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck11" />
                        <label class="custom-control-label" for="customCheck11">green (5)</label>
                      </div>
                    </li>
                    <li>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck15" />
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
  <!-- Shop Main Area End Here -->
  <!--Footer Area Start-->
  <footer class="footer-area mt-no-text">
    <div class="footer-widget-area">
      <div class="container container-default custom-area">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-custom">
            <div class="single-footer-widget m-0">
              <div class="footer-logo">
                <a href="index.html">
                  <img src="" alt="Logo Image" />
                </a>
              </div>
              <p class="desc-content">
                Lorem Khaled Ipsum is a major key to success. To be successful
                you’ve got to work hard you’ve got to make it.
              </p>
              <div class="social-links">
                <ul class="d-flex">
                  <li>
                    <a class="rounded-circle" href="#" title="Facebook">
                      <i class="fa fa-facebook-f"></i>
                    </a>
                  </li>
                  <li>
                    <a class="rounded-circle" href="#" title="Twitter">
                      <i class="fa fa-twitter"></i>
                    </a>
                  </li>
                  <li>
                    <a class="rounded-circle" href="#" title="Linkedin">
                      <i class="fa fa-linkedin"></i>
                    </a>
                  </li>
                  <li>
                    <a class="rounded-circle" href="#" title="Youtube">
                      <i class="fa fa-youtube"></i>
                    </a>
                  </li>
                  <li>
                    <a class="rounded-circle" href="#" title="Vimeo">
                      <i class="fa fa-vimeo"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
            <div class="single-footer-widget">
              <h2 class="widget-title">Information</h2>
              <ul class="widget-list">
                <li><a href="about-us.html">Our Company</a></li>
                <li><a href="contact-us.html">Contact Us</a></li>
                <li><a href="about-us.html">Our Services</a></li>
                <li><a href="about-us.html">Why We?</a></li>
                <li><a href="about-us.html">Careers</a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
            <div class="single-footer-widget">
              <h2 class="widget-title">Quicklink</h2>
              <ul class="widget-list">
                <li><a href="about-us.html">About</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="contact-us.html">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
            <div class="single-footer-widget">
              <h2 class="widget-title">Support</h2>
              <ul class="widget-list">
                <li><a href="contact-us.html">Online Support</a></li>
                <li><a href="contact-us.html">Shipping Policy</a></li>
                <li><a href="contact-us.html">Return Policy</a></li>
                <li><a href="contact-us.html">Privacy Policy</a></li>
                <li><a href="contact-us.html">Terms of Service</a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-custom">
            <div class="single-footer-widget">
              <h2 class="widget-title">See Information</h2>
              <div class="widget-body">
                <address>
                  Pekalongan.<br />Phone: 0814 567 890<br />Email:
                  https://wpdecal@gmail.com
                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright-area">
      <div class="container custom-area">
        <div class="row">
          <div class="col-12 text-center col-custom">
            <div class="copyright-content">
              <p>
                Copyright © 2021
                <a href="https://hasthemes.com/" title="https://hasthemes.com/">HasThemes</a>
                | Built with&nbsp;<strong>FloSun</strong>&nbsp;by
                <a href="https://hasthemes.com/" title="https://hasthemes.com/">HasThemes</a>.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--Footer Area End-->

  <!-- Modal -->
  <?php foreach ($products as $data) : ?>
    <div class="modal flosun-modal fade" id="modal_<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="close close-button" data-bs-dismiss="modal" aria-label="Close">
            <span class="close-icon" aria-hidden="true">x</span>
          </button>
          <div class="modal-body">
            <div class="container-fluid custom-area">
              <div class="row">
                <div class="col-md-6 col-custom">
                  <div class="modal-product-img">
                    <a class="w-100" href="#">
                      <img class="w-100" src="assets/products/<?= $data['image'] ?>" alt="Product" />
                    </a>
                  </div>
                </div>
                <div class="col-md-6 col-custom">
                  <div class="modal-product">
                    <div class="product-content">
                      <div class="product-title">
                        <h4 class="title"><?= $data['name'] ?></h4>
                      </div>
                      <div class="price-box">
                        <span class="regular-price"><?= rupiah($data['price']) ?></span>
                        <span class="old-price"><del><?= rupiah($data['price'] + 200000) ?></del></span>
                      </div>
                      <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span>1 Review</span>
                      </div>
                      <?= $data['description'] ?>
                      <div class="quantity-with-btn">
                        <div class="quantity">
                          <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" value="0" type="text" />
                            <div class="dec qtybutton">-</div>
                            <div class="inc qtybutton">+</div>
                            <div class="dec qtybutton">
                              <i class="fa fa-minus"></i>
                            </div>
                            <div class="inc qtybutton">
                              <i class="fa fa-plus"></i>
                            </div>
                          </div>
                        </div>
                        <div class="add-to_btn">
                          <a class="btn product-cart button-icon flosun-button dark-btn" href="cart.html">Add to cart</a>
                          <a class="btn flosun-button secondary-btn rounded-0" href="wishlist.html">Add to wishlist</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach ?>

  <!-- Scroll to Top Start -->
  <a class="scroll-to-top" href="#">
    <i class="lnr lnr-arrow-up"></i>
  </a>
  <!-- Scroll to Top End -->

  <!-- JS
============================================ -->

  <!-- jQuery JS -->
  <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
  <!-- jQuery Migrate JS -->
  <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
  <!-- Modernizer JS -->
  <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>

  <!-- Swiper Slider JS -->
  <script src="assets/js/plugins/swiper-bundle.min.js"></script>
  <!-- nice select JS -->
  <script src="assets/js/plugins/nice-select.min.js"></script>
  <!-- Ajaxchimpt js -->
  <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
  <!-- Jquery Ui js -->
  <script src="assets/js/plugins/jquery-ui.min.js"></script>
  <!-- Jquery Countdown js -->
  <script src="assets/js/plugins/jquery.countdown.min.js"></script>
  <!-- jquery magnific popup js -->
  <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>
</body>

<!-- Mirrored from htmldemo.net/flosun/flosun/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:17 GMT -->

</html>