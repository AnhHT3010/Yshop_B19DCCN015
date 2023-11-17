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
        <h1 class="text-center mb-4" style="font-family: sans-serif;color: #000000cf !important">Khám phá các danh mục phổ biến</h1><!-- End .title text-center -->
        <div class="cat-blocks-container">
            <div class="row">
                <?php
                foreach ($data_categories as $row) {
                    echo
                    '<div class="col-6 col-sm-4 col-lg-1">
                        <a href="type-product-categoris-' . $row['MaDM'] . '" class="cat-block">
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
                <h2 class="title">Gợi ý dành cho bạn</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <a href="recommendation" class="title-link all-rcm">Xem tất cả đề xuất<i class="fa-solid fa-arrow-right"></i></a>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->
        <div class="products">

            <!-- Hiển thị sản phẩm gọi ý sử dụng hàm randum để truy vấn -->
            <div class="row justify-content-center products-container">
                <?php foreach ($data_recommendationforyou as $item) : ?>
                    <div class="col-5 col-md-3 col-lg-2">
                        <div class="product product-2">
                            <figure class="product-media">
                                <?php if ($item['TrangThai'] == 1) { ?>
                                    <span class="product-label label-circle label-new">Mới</span>
                                <?php  } elseif ($item['TrangThai'] == 2) { ?>
                                    <span class="product-label label-circle label-sale-hot">Giá rẻ</span>
                                <?php  } else { ?>
                                    <span class="product-label label-circle label-sale">Bán chạy</span>
                                <?php } ?>
                                <a href="<?= $item['MaSP'] ?>.html">
                                    <img src="<?= $item['AnhDaiDien'] ?>" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="?act=cart&xuli=addwishlist&id=<?= $item['MaSP'] ?>" class="btn-product-icon btn-wishlist" title="Yêu thích"></a>
                                </div><!-- End .product-action -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Thêm vào giỏ  hàng"><i class="fa-solid fa-cart-shopping px-1"></i></a>
                                    <a href="<?= $item['MaSP'] ?>.html" class="btn-product btn-quickview" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></a>
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
                            <span class="product-sale">Lượt xem: <?= $item['SoLuongView'] ?></span>
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                <?php endforeach; ?>
            </div><!-- End .row -->
        </div><!-- End .products -->
    </div><!-- End .container -->

    <div class="mb-3"></div><!-- End .mb-5 -->


    <div class="mb-6"></div><!-- End .mb-6 -->

    <div class="container">
        <div class="cta cta-border mb-5" style="background-image: url(public/assets/images/demos/demo-4/bg-1.jpg);">
            <img src="public/assets/images/demos/demo-4/camera.png" alt="camera" class="cta-img">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="cta-content">
                        <div class="cta-text text-right text-white">
                            <p>Mua sắm với ưu đãi hôm nay <br><strong>HERO7 Black</strong></p>
                        </div><!-- End .cta-text -->
                        <a href="#" class="btn btn-primary btn-round" style="font-weight: 500;background-color: rgb(102, 172, 203, 0.54); color: white"><span>Mua ngay - <?php echo (number_format(10000000) . 'đ') ?></span><i class="fa-solid fa-arrow-right"></i></a>
                    </div><!-- End .cta-content -->
                </div><!-- End .col-md-12 -->
            </div><!-- End .row -->
        </div><!-- End .cta -->
    </div><!-- End .container -->

    <div class="container">
        <div class="heading text-center mb-3">
            <h2 class="title">Ưu đãi & Cửa hàng</h2><!-- End .title -->
            <p class="title-desc">Ưu đãi hôm nay và hơn thế nữa</p><!-- End .title-desc -->
        </div><!-- End .heading -->

        <div class="row">
            <div class="col-lg-6 deal-col">
                <div class="deal" style="background-image: url('public/assets/images/demos/demo-4/deal/bg-1.jpg');">
                    <div class="deal-top">
                        <h2>Thỏa thuận trong ngày.</h2>
                        <h4>Số lượng có hạn.</h4>
                    </div><!-- End .deal-top -->

                    <div class="deal-content">
                        <h3 class="product-title"><a href="product.html">Loa thông minh tại nhà có Google Assistant</a>
                        </h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price"><?php echo (number_format(39900000) . 'đ') ?></span>
                        </div><!-- End .product-price -->

                        <a href="product.html" class="btn btn-link"><span>Mua ngay</span><i class="fa-solid fa-arrow-right"></i></a>
                    </div><!-- End .deal-content -->

                    <div class="deal-bottom">
                        <div class="deal-countdown daily-deal-countdown" data-until="+10h"></div>
                        <!-- End .deal-countdown -->
                    </div><!-- End .deal-bottom -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6 deal-col">
                <div class="deal" style="background-image: url('public/assets/images/demos/demo-4/deal/bg-2.jpg');">
                    <div class="deal-top">
                        <h2>Ưu đãi độc quyền của bạn.</h2>
                        <h4>Đăng nhập để xem ưu đãi tuyệt vời.</h4>
                    </div><!-- End .deal-top -->

                    <div class="deal-content">
                        <h3 class="product-title"><a href="product.html">Tấm sạc không dây được chứng nhận dành cho iPhone / Android</a></h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price"><?php echo (number_format(1999800) . 'đ') ?></span>
                        </div><!-- End .product-price -->

                        <a href="login.html" class="btn btn-link"><span>Đăng nhập</span><i class="fa-solid fa-arrow-right"></i></a>
                    </div><!-- End .deal-content -->

                    <div class="deal-bottom">
                        <div class="deal-countdown offer-countdown" data-until="+11d"></div><!-- End .deal-countdown -->
                    </div><!-- End .deal-bottom -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->

        <div class="more-container text-center mt-1 mb-5">
            <a href="#" class="btn btn-outline-dark-2 btn-round btn-more"><span>Xem Các ưu đãi khác</span><i class="fa-solid fa-arrow-right"></i></a>
        </div><!-- End .more-container -->
    </div><!-- End .container -->

    <div class="container new-arrivals">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">Lượt xem nhiều nhất</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="new-tv-link" data-toggle="tab" href="#new-tv-tab" role="tab" aria-controls="new-tv-tab" aria-selected="false">TV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="new-computers-link" data-toggle="tab" href="#new-computers-tab" role="tab" aria-controls="new-computers-tab" aria-selected="false">Laptop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="new-phones-link" data-toggle="tab" href="#new-phones-tab" role="tab" aria-controls="new-phones-tab" aria-selected="false">Tablets & Cell Phones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="new-watches-link" data-toggle="tab" href="#new-watches-tab" role="tab" aria-controls="new-watches-tab" aria-selected="false">Smartwatches</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="new-acc-link">View All LAPTOP, HIGHLIGHTS SIGNS <i class="icon-long-arrow-right"></i></a>
                    </li> -->
                </ul>
            </div>
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel just-action-icons-sm">
            <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                    <!-- Hiển thị sản phẩm lượt xem nhiều nhất thì: join với bảng liveview để hiển thị sản phẩm và lấy số lượng view -->
                    <?php foreach ($top_rated as $item) : ?>
                        <div class="product product-2">
                            <figure class="product-media">
                                <?php if ($item['TrangThai'] == 1) { ?>
                                    <span class="product-label label-circle label-new">Mới</span>
                                <?php  } elseif ($item['TrangThai'] == 2) { ?>
                                    <span class="product-label label-circle label-sale-hot">Giá rẻ</span>
                                <?php  } else { ?>
                                    <span class="product-label label-circle label-sale">Bán chạy</span>
                                <?php } ?>
                                <a href="<?= $item['MaSP'] ?>.html">
                                    <img src="<?= $item['AnhDaiDien'] ?>" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="?act=cart&xuli=addwishlist&id=<?= $item['MaSP'] ?>" class="btn-product-icon btn-wishlist" title="Yêu thích"></a>
                                </div><!-- End .product-action -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Thêm vào giỏ  hàng"><i class="fa-solid fa-cart-shopping px-1"></i></a>
                                    <a href="<?= $item['MaSP'] ?>.html ?>" class="btn-product btn-quickview" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></a>
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
                            <span class="product-sale">Lượt xem: <?= $item['SoLuongView'] ?></span>
                        </div><!-- End .product -->
                    <?php endforeach; ?>
                    <?php foreach ($top_rated as $item) : ?>
                        <div class="product product-2">
                            <figure class="product-media">
                                <?php if ($item['TrangThai'] == 1) { ?>
                                    <span class="product-label label-circle label-new">Mới</span>
                                <?php  } elseif ($item['TrangThai'] == 2) { ?>
                                    <span class="product-label label-circle label-sale-hot">Giá rẻ</span>
                                <?php  } else { ?>
                                    <span class="product-label label-circle label-sale">Bán chạy</span>
                                <?php } ?>
                                <a href="<?= $item['MaSP'] ?>.html">
                                    <img src="<?= $item['AnhDaiDien'] ?>" alt="Product image" class="product-image">
                                </a>

                                <div class="">
                                    <a href="?act=cart&xuli=addwishlist&id=<?= $item['MaSP'] ?>" class="btn-product-icon" title="Yêu thích"></a>
                                </div><!-- End .product-action -->

                                <div class="product-action">
                                    <a href="?act=cart&xuli=add&id=<?= $item['MaSP'] ?>" class="btn-product btn-cart" title="Thêm vào giỏ hàng"><i class="fa-solid fa-cart-shopping px-1"></i></a>
                                    <a href="<?= $item['MaSP'] ?>.html ?>" class="btn-product btn-quickview" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></a>
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
                            <span class="product-sale">Lượt xem: <?= $item['SoLuongView'] ?></span>
                        </div><!-- End .product -->
                    <?php endforeach; ?>
                    <?php foreach ($top_rated as $item) : ?>
                        <div class="product product-2">
                            <figure class="product-media">
                                <?php if ($item['TrangThai'] == 1) { ?>
                                    <span class="product-label label-circle label-new">Mới</span>
                                <?php  } elseif ($item['TrangThai'] == 2) { ?>
                                    <span class="product-label label-circle label-sale-hot">Giá rẻ</span>
                                <?php  } else { ?>
                                    <span class="product-label label-circle label-sale">Bán chạy</span>
                                <?php } ?>
                                <a href="<?= $item['MaSP'] ?>.html">
                                    <img src="<?= $item['AnhDaiDien'] ?>" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="?act=cart&xuli=addwishlist&id=<?= $item['MaSP'] ?>" class="btn-product-icon btn-wishlist" title="Yêu thích"></a>
                                </div><!-- End .product-action -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Thêm vào giỏ  hàng"><i class="fa-solid fa-cart-shopping px-1"></i></a>
                                    <a href="<?= $item['MaSP'] ?>.html ?>" class="btn-product btn-quickview" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></a>
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
                            <span class="product-sale">Lượt xem: <?= $item['SoLuongView'] ?></span>
                        </div><!-- End .product -->
                    <?php endforeach; ?>

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container -->
    <div class="mb-6"></div><!-- End .mb-6 -->

</body>

</html>