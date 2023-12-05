<link rel="stylesheet" href="Client/public/assets/css/plugins/nouislider/nouislider.css">
<link rel="stylesheet" href="Client/public/assets/css/skins/skin-demo-13.css">
<link rel="stylesheet" href="Client/public/assets/css/demos/demo-13.css">
<link rel="stylesheet" href="Client/public/assets/css/choose.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<main class="main">
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-6-6col">
                    <div class="cat-blocks-container">
                        <div class="row">
                            <?php
                            foreach ($data_categories as $value) { ?>
                                <div class="col-6 col-sm-4 col-lg-1">
                                    <a href="type-product-categoris-<?= $value['MaDM'] ?>" class="cat-block">
                                        <figure>
                                            <span>
                                                <img src="<?= $value['HinhAnh'] ?>" alt="Category image">
                                            </span>
                                        </figure>

                                        <h3 class="cat-block-title"><?= $value['TenDM'] ?></h3>
                                        <!-- End .cat-block-title -->
                                    </a>
                                </div><!-- End .col-2 col-md-2 col-lg-2 -->
                            <?php }  ?>

                        </div><!-- End .row -->
                    </div><!-- End .cat-blocks-container -->
                    <div class="owl-carousel owl-simple owl-nav-align " style="width: 80vw;" data-toggle="owl" data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":1
                                        },
                                        "420": {
                                            "items":2
                                        },
                                        "600": {
                                            "items":3
                                        },
                                        "900": {
                                            "items":4
                                        },
                                        "1024": {
                                            "items":5,
                                            "nav": true,
                                            "dots": false
                                        }
                                    }
                                }'>
                        <a href="./?act=shop&from=1000000&to=5000000" class="brand">
                            Từ 1 triệu đến 5 triệu VNĐ
                        </a>

                        <a href="./?act=shop&from=5000000&to=15000000" class="brand">
                            Từ 5 triệu đến 15 triệu VNĐ
                        </a>

                        <a href="./?act=shop&from=15000000&to=25000000" class="brand">
                            Từ 15 triệu đến 25 triệu VNĐ
                        </a>

                        <a href="./?act=shop&from=25000000&to=35000000" class="brand">
                            Từ 25 triệu đến 35 triệu VNĐ
                        </a>
                    </div><!-- End .owl-carousel -->
                    <div class="mb-4"></div><!-- End .mb-4 -->
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                <?= $data_tong ?> Sản phẩm được tìm thấy
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select class="form-control" onchange="showProduct(this.value)">
                                        <option value="1">Bán cháy</option>
                                        <option value="2">Lượt xem nhiều</option>
                                        <option value="3">Mới ra mắt</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row">
                            <?php
                            if (isset($data) and $data != NULL) { ?>
                                <?php foreach ($data as  $items) {
                                ?>
                                    <div class="col-3 col-md-2 col-xl-2 sanpham">
                                        <div class="product">
                                            <figure class="product-media">
                                                <?php if ($items['TrangThai'] == 1 || $items['TrangThai'] == 0) { ?>
                                                    <span class="product-label label-circle label-new">Mới</span>
                                                <?php  } elseif ($items['TrangThai'] == 2) { ?>
                                                    <span class="product-label label-circle label-sale-hot">Giá rẻ</span>
                                                <?php  } else { ?>
                                                    <span class="product-label label-circle label-sale">Bán chạy</span>
                                                <?php } ?>
                                                <a href="<?= $items['MaSP'] ?>.html">
                                                    <img src="<?= $items['AnhDaiDien'] ?>" alt="Product image" class="product-image">
                                                </a>
                                                <div class="product-action-vertical">
                                                    <a href="?act=cart&xuli=addwishlist&id=<?= $items['MaSP'] ?>" class="btn-product-icon btn-wishlist" title="Yêu thích"></a>
                                                </div><!-- End .product-action -->

                                                <div class="product-action">
                                                    <a href="./?act=cart&xuli=add&id=<?= $items['MaSP'] ?>&checked=1" class="btn-product btn-cart" title="Thêm vào giỏ hàng"><i class="fa-solid fa-cart-shopping px-1"></i></a>
                                                    <a href="<?= $items['MaSP'] ?>.html ?>" class="btn-product btn-quickview" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <h3 class="product-title"><a href="<?= $items['MaSP'] ?>.html"><?= $items['TenSP'] ?></a></h3>
                                                <!-- End .product-title -->
                                                <div class="product-price">
                                                    <?php if ($items['SoLuong'] == 0) { ?>
                                                        <span class="old-price">Hiện đã hết hàng</span>
                                                    <?php } else { ?>
                                                        <span class="new-price">$ <?= number_format($items['DonGia']) ?></span>
                                                    <?php } ?>
                                                </div><!-- End .product-price -->

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-md-4 col-xl-3 -->
                                <?php } ?>
                            <?php
                            } else {
                                echo "Sản phẩm bạn đang tìm kiếm hiện không có sẵn";
                            } ?>
                        </div><!-- End .row -->
                    </div><!-- End .products -->

                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php if ($data_tong > 9 and isset($test)) { ?>
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                        <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="lectronics-page-1">1</a>
                                </li>
                                <?php for ($i = 1; $i <= $data_tong / 6; $i++) { ?>
                                    <li class="page-item active"><a class="page-link" href="lectronics-page-<?= $i + 1 ?>"><?= $i + 1 ?></a>
                                    </li>
                                <?php } ?>

                                <li class="page-item">
                                    <a class="page-link page-link-next" href="" aria-label="Next">
                                        Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->

</main><!-- End .main -->