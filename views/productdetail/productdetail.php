<?php if ($data != NULL) { ?>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=".">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Categories</a></li>
                    <li class="breadcrumb-item"><a href="#"><?= $category_where['TenDM'] ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $data['TenSP'] ?></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

    </main><!-- End .main -->
    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="<?= $data['AnhDaiDien'] ?>" data-zoom-image="<?= $data['AnhDaiDien'] ?>" alt="product image">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="fa-solid fa-maximize"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->
                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    <?php
                                    $firstActive = true;
                                    foreach ($data_img as $item) {
                                        if ($firstActive) { ?>
                                            <a class="product-gallery-item active" href="#" data-image="<?= $item['AnhURL'] ?>" data-zoom-image="<?= $item['AnhURL'] ?>">
                                                <img src="<?= $item['AnhURL'] ?>" alt="product side">
                                            </a>
                                        <?php $firstActive = false;
                                        } else { ?>
                                            <a class="product-gallery-item" href="#" data-image="<?= $item['AnhURL'] ?>" data-zoom-image="<?= $item['AnhURL'] ?>">
                                                <img src="<?= $item['AnhURL'] ?>" alt="product side">
                                            </a>
                                    <?php }
                                    } ?>
                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <form action="./?act=cart&xuli=add&id=<?= $data['MaSP'] ?>" method="POST" class="product-details">
                            <h1 class="product-title"><?= $data['TenSP'] ?></h1><!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="star-rating">
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-regular fa-star"></span>
                                    <span class="fa-regular fa-star"></span>
                                    <span class="fa-regular fa-star"></span>
                                </div>
                                <span class="ratings-text">( <?= $dataview['SoLuongView'] ?> Views )</span>
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                $<?= number_format($data['DonGia']) ?>
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p><?= $data['HDH'] ?></p>
                                <p><?= $data['CamTruoc'] ?></p>
                                <p><?= $data['CamSau'] ?></p>
                                <p><?= $data['Ram'] ?></p>
                                <p><?= $data['Pin'] ?></p>
                            </div><!-- End .product-content -->

                            <?php if ($data['SoLuong'] > 0) { ?>
                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Qty:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" class="form-control" name="quality" value="1" min="1" max="<?= $data['SoLuong'] ?>" step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->
                                    <div class="mb-4"></div>
                                    <?php if (isset($_COOKIE['cart'])) { ?>
                                        <div class="alert alert-success">
                                            <?= $_COOKIE['cart'] ?>
                                        </div>
                                    <?php } ?>
                                </div><!-- End .details-filter-row -->

                                <div class="product-details-action">
                                    <button type="submit" class="btn-product btn-cart"><i class="fa-solid fa-cart-plus mx-1"></i><span>Thêm Giỏ Hàng</span></button>

                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Thêm Yêu Thích</span></a>
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->
                            <?php } else { ?>
                                <div class="product-details-action">
                                    <div class="details-action-wrapper">
                                        <h3 style="color: #39f; font-size: 20px;"><span>Out of stock now</span></h3>
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->
                            <?php } ?>
                            <div class="product-details-footer">
                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#" class="social-icon" title="TikTok" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </form><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->
            <div class="product-desc-content">
                <h3 style="">Product Information</h3>
                <p style="font-family: 'Times New Roman', Times, serif;"><?= $data['MoTa'] ?></p>
            </div><!-- End .product-desc-content -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
<?php } else {
    require_once("views/error.php");
} ?>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en/sdk.js#xfbml=1&version=v12.0" nonce="pdwVqxDW"></script>