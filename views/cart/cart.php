<?php $thanhtien = 0; ?>
<!-- Button trigger modal -->
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title text-center" id="exampleModalLongTitle">Bạn chắc chắn muốn bỏ sản phẩm này?</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" data-dismiss="modal">Không</button>
                <button type="button" onclick="deleteItem()" class="btn btn-agree">Đồng ý</button>
            </div>
        </div>
    </div>
</div>
<main class="main">
    <div class="page-header text-center" style="background-image: url('public/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Giỏ hàng<span>Cart</span></h1>
            <?php if (isset($_COOKIE['msg'])) { ?>
                <div class="alert alert-success">
                    <strong>Thông báo:</strong> <?= $_COOKIE['msg'] ?>
                </div>
            <?php } ?>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=".">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <?php if (isset($_COOKIE['deletecart'])) { ?>
                                    <div class="alert alert-success">
                                        <?= $_COOKIE['deletecart'] ?>
                                    </div>
                                <?php } ?>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($data_cart)) {
                                    foreach ($data_cart as $value) {
                                ?>
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="<?= $value['AnhDaiDien'] ?>" alt="Product image">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="#"><?= $value['TenSP'] ?></a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <?php $thanhtien += $value['SoLuongTrongGio'] * $value['DonGia']; ?>
                                            <td class="price-col">$<?= number_format($value['DonGia']) ?></td>
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity" style="display: flex;">
                                                    <?php if ($value['SoLuongTrongGio'] == 1) { ?>
                                                        <button type="button" class="btn-unstyled" data-toggle="modal" onclick="setDeleteId(<?= $value['MaSP'] ?>)" data-target="#exampleModalCenter">
                                                            -
                                                        </button>
                                                    <?php } else { ?>
                                                        <a href="./?act=cart&xuli=delete&id=<?= $value['MaSP'] ?>">
                                                            -
                                                        </a>
                                                    <?php } ?>
                                                    &nbsp; &nbsp;<p><?= $value['SoLuongTrongGio'] ?></p> &nbsp; &nbsp;
                                                    <a href="./?act=cart&xuli=update&id=<?= $value['MaSP'] ?>">+</a>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
                                            <td class="total-col">
                                                $<?= number_format($value['SoLuongTrongGio'] * $value['DonGia']) ?></td>
                                            <td class="remove-col"><button onclick="setDeleteId(<?= $value['MaSP'] ?>)" class="btn-remove"><i class="fa-solid fa-xmark"></i></button></td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>

                            <?php if (isset($_SESSION['id_ND'])) { ?>
                        </table><!-- End .table table-wishlist -->
                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" style="font-size: 1.3rem; color: #333333" required placeholder="code khuyến mãi">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i class="fa-solid fa-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->

                            <a href="#" class="btn btn-outline-dark-2"><span>CẬP NHẬT GIỎ HÀNG</span><i class="fa-solid fa-arrows-rotate"></i></a>
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <div class="row">
                        <form class="d-flex flex-direc justify-content-center" action="./?act=checkout&xuli=save" method="POST">
                            <aside class="col-lg-10 flex-column">
                                <div class="summary summary-cart">
                                    <center>
                                        <h1 class="summary-title">Tổng đơn giỏ hàng</h1>
                                    </center><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <tbody>
                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td><?= number_format($thanhtien) ?> đ</td>
                                            </tr><!-- End .summary-subtotal -->
                                            <?php if (isset($data_cart)) {
                                                foreach ($data_cart as $value) {
                                            ?>
                                                    <tr class="summary-subtotal">
                                                        <td>Sản phẩm / Số lượng:</td>
                                                        <td><?= $value['TenSP'] ?> / <?= $value['SoLuongTrongGio'] ?>
                                                        </td>
                                                    </tr><!-- End .summary-subtotal -->
                                            <?php
                                                }
                                            } ?>
                                            <tr class="summary-shipping">
                                                <td>Vận chuyển:</td>
                                                <td>&nbsp;</td>
                                            </tr>

                                            <tr class="summary-shipping-row">
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                        <label class="custom-control-label" for="free-shipping">Miễn phí vận chuyển</label>
                                                    </div><!-- End .custom-control -->
                                                </td>
                                                <td>0.00 đ</td>
                                            </tr><!-- End .summary-shipping-row -->
                                            <tr class="summary-shipping-estimate">
                                                <td>Ước tính cho quốc gia của bạn<br> <a href="personal">Thay đổi địa chỉ</a>
                                                </td>
                                                <td>&nbsp;</td>
                                            </tr><!-- End .summary-shipping-estimate -->

                                            <tr class="summary-total">
                                                <td>Tổng tiền:</td>
                                                <td><?= number_format($thanhtien) ?> đ</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>

                                    </table><!-- End .table table-summary -->

                                    <?php if ($data_cart) : ?>
                                        <a href="checkout" class="btn btn-outline-primary-2 btn-order btn-block">TIẾN HÀNH KIỂM TRA</a>
                                    <?php else : ?>
                                        <a class="btn btn-order btn-block btn-disabled" disabled title="Chưa có hàng">CHƯA CÓ HÀNG</a>
                                    <?php endif; ?>
                                </div><!-- End .summary -->

                                <a href="store" class="btn btn-outline-dark-2 btn-block mb-3"><i class="fa-solid fa-backward-step"></i><span>QUAY VỀ CỬA HÀNG</span></a>
                            </aside><!-- End .col-lg-3 -->
                        </form>
                    </div>
                <?php  } ?>
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

<script>
    function setDeleteId(id) {
        document.querySelector('.btn-agree').setAttribute('data-id', id);
    }

    function deleteItem() {
        var productId = document.querySelector('.btn-agree').getAttribute('data-id');
        location.href = './?act=cart&xuli=deleteAll&id=' + productId;
    }
</script>