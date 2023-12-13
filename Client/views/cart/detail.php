<?php if (isset($data_cart)) {
    foreach ($_data_cart as $value) { ?>
        <div class="product">
            <div class="product-cart-details">
                <h4 class="product-title">
                    <a href="<?= $value['MaSP'] ?>.html"><?= $value['TenSP'] ?></a>
                </h4>

                <span class="cart-product-info">
                    <span class="cart-product-qty"><?= $value['SoLuongTrongGio'] ?></span>
                    <!-- x $<?= number_format($value['ThanhTien']) ?> -->
                </span>
            </div>

            <figure class="product-image-container">
                <a href="<?= $value['MaSP'] ?>.html" class="product-image">
                    <img src="<?= $value['AnhDaiDien'] ?>" alt="product">
                </a>
            </figure>
            <a href="./?act=cart&xuli=deleteAll&id=<?= $value['MaGH'] ?>" class="btn-remove" title="Remove Product"><i class="fa-solid fa-xmark"></i></a>
        </div>
<?php }
} ?>