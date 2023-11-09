<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="public/assets/css/skins/skin-demo-4.css">-->
    <link rel="stylesheet" href="public/assets/css/demos/demo-4.css">
</head>

<body>
    <?php require_once("slider.php"); ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="#">
                        <img src="public/assets/images/demos/demo-4/banners/banner-1.png" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle"><a href="./trangchu">SAMSUNG</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title">
                            <a href="./trangchu">Galaxy M14<strong> 5G <br></strong></a>
                            <small class="">Giảm 5% cho Sinh Viên </small>
                        </h3><!-- End .banner-title -->
                        <a href="./trangchu" class="banner-link"><br><b>XEM NGAY<i class="fa-solid fa-arrow-right"></i></b></br></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-md-4 -->

            <div class="col-md-6 col-lg-4">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="#">
                        <img src="public/assets/images/demos/demo-4/banners/banner-2.jpg" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle"><a href="./trangchu">iPad</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title mr-31">
                            <a href="./trangchu"><strong>Ipad Chính Hãng<br></strong></a>
                            <small>Lên đời chỉ từ 6.790.000</small>
                        </h3><!-- End .banner-title -->
                        <a href="./trangchu" class="banner-link"><br><b>XEM NGAY<i class="fa-solid fa-arrow-right"></i></b></br></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-md-4 -->

            <div class="col-md-6 col-lg-4">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="#">
                        <img src="public/assets/images/demos/demo-4/banners/banner-3.png" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle"><a href="./trangchu">Asus</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title mr-31">
                            <a href="./trangchu"><strong>Asus Vivobook OLED<br></strong></a>
                            <small>Lên đời trợ giá 3 triệu</small>
                        </h3><!-- End .banner-title -->
                        <a href="./trangchu" class="banner-link"><br><b>XEM NGAY<i class="fa-solid fa-arrow-right"></i></b></br></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
    <div class="container">
        <hr class="mb-0">
        <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": false,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            }
                        }
                    }'>
            <a href="#" class="brand">
                <img src="public/assets/images/brands/logo-iphone.png" height="50" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="public/assets/images/brands/samsung.png" height="50" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="public/assets/images/brands/xiaomi.png" height="50" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="public/assets/images/brands/vivo.png" height="50" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="public/assets/images/brands/nokia.png" height="50" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="public/assets/images/brands/assus.png" alt="Brand Name">
            </a>
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->
    <div class="container">
        <h1 class="text-center mb-4 text-primary">Khám phá các danh mục phổ biến</h1><!-- End .title text-center -->
        <div class="cat-blocks-container">
            <div class="row">
                <?php
                foreach ($data_categories as $row) {
                    echo
                    '<div class="col-6 col-sm-4 col-lg-1">
                        <a href="type-product-0" class="cat-block">
                            <figure>
                                <span>
                                    <img src="' . $row['HinhAnh'] . '" alt="Category image">
                                </span>
                            </figure>
                            <p class="cat-block-title">' . $row['TenDM'] . '</p>
                        </a>
                    </div>';
                }
                ?>
            </div><!-- End .row -->
        </div><!-- End .cat-blocks-container -->
    </div><!-- End .container -->
    <div class="mb-5"></div>
    <!-- Recommendation For You -->


    <div class="container for-you">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">Recommendation For You</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <a href="recommendation" class="title-link">View All Recommendadion <i class="icon-long-arrow-right"></i></a>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->
        <div class="products">

            <!-- Hiển thị sản phẩm gọi ý sử dụng hàm randum để truy vấn -->
            <div class="row justify-content-center">
                <?php foreach ($data_recommendationforyou as $item) : ?>
                    <div class="col-5 col-md-3 col-lg-2">
                        <div class="product product-2">
                            <figure class="product-media">
                                <?php if ($item['TrangThai'] == 1) { ?>
                                    <span class="product-label label-circle label-new">Mới</span>
                                <?php  } elseif ($item['TrangThai'] == 3) { ?>
                                    <span class="product-label label-circle label-sale">Bán chạy</span>
                                <?php } else { ?>
                                    <span class="product-label label-circle label-top">Đang bán</span>
                                <?php } ?>

                                <a href="<?= $item['MaSP'] ?>.html">
                                    <img src="public/assets/images/products/<?= $item['AnhDaiDien'] ?>" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="?act=cart&xuli=addwishlist&id=<?= $item['MaSP'] ?>" class="btn-product-icon btn-wishlist" title="Yêu thích"></a>
                                </div><!-- End .product-action -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Thêm vào giỏ  hàng"><i class="fa-solid fa-cart-shopping px-1"></i><span>Giỏ hàng</span></a>
                                    <a href="?act=quickView&id=<?= $item['MaSP'] ?>" class="btn-product btn-quickview" title="Quick view"><i class="fa-solid fa-eye"></i><span>Xem ngay</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="<?= $item['MaSP'] ?>.html"><?= $item['TenSP'] ?></a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <?php if ($item['SoLuong'] == 0) { ?>
                                        <span class="old-price">Out of stock now</span>
                                    <?php } else { ?>
                                        <span class="new-price">$ <?= number_format($item['DonGia']) ?></span>
                                    <?php } ?>
                                </div><!-- End .product-price -->

                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                <?php endforeach; ?>
            </div><!-- End .row -->
        </div><!-- End .products -->
    </div><!-- End .container -->

    <div class="mb-3"></div><!-- End .mb-5 -->


    <div class="mb-6"></div><!-- End .mb-6 -->
</body>

</html>