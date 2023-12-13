<main class="main">
    <div class="page-header text-center" style="background-image: url('Client/public/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Tiến hành thanh toán<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=".">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tiến hành thanh toán</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    <form action="#">
                        <input type="text" class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">Có mã giảm giá? <span>Nhấn vào đây để
                                nhập mã của bạn</span></label>
                    </form>
                </div><!-- End .checkout-discount -->
                <form action="./?act=checkout&xuli=save" method="POST">
                    <div class="row">
                        <div class="col-lg-9">
                            <h1 class="checkout-title">Chi tiết hóa đơn</h1><!-- End .checkout-title -->
                            <label>Họ và tên <span class='text-danger'>*</span></label>
                            <input type="text" name="NguoiNhan" class="form-control" value="<?= $data_user['Ho'] ?> <?= $data_user['Ten'] ?>" required>


                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Địa chỉ<span class='text-danger'>*</span></label>
                                    <input type="text" name="DiaChi" class="form-control" value="<?= $data_user['DiaChi'] ?>" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Quận / Huyện<span class='text-danger'>*</span></label>
                                    <input type="text" name="Quan" class="form-control" value="<?= $data_user['Quan'] ?>" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Thị trấn / Thành phố<span class='text-danger'>*</span></label>
                                    <input type="text" name="Tinh" class="form-control" value="<?= $data_user['Tinh'] ?>" required>
                                </div>
                                <div class="col-sm-6">
                                    <label>Số điện thoại<span class='text-danger'>*</span></label>
                                    <input type="tel" name="SDT" class="form-control" value="<?= $data_user['SDT'] ?>" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label>Địa chỉ email<span class='text-danger'>*</span></label>
                            <input type="email" name="Email" class="form-control" value="<?= $data_user['Email'] ?>" required>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                <label class="custom-control-label" for="checkout-diff-address">Gửi đến một địa chỉ
                                    khác?</label>
                            </div><!-- End .custom-checkbox -->

                            <label>Ghi chú cho đơn hàng</label>
                            <textarea name="Note" class="form-control" style="resize: none" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">ĐƠN HÀNG CỦA BẠN</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <?php if (isset($data_cart)) {
                                        foreach ($data_cart as $value) { ?>


                                            <thead>
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th><?= $value['TenSP'] ?></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>Số lượng</td>
                                                    <td><?= $value['SoLuongTrongGio'] ?></td>
                                                </tr>
                                            </tbody>
                                    <?php   }
                                    } ?>
                                    <tbody>
                                        <tr>
                                            <td style="font-size: 1.6rem;">Phí vận chuyển:</td>
                                            <td>Miễn phí vận chuyển</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Tổng tiền:</td>
                                            <td><?= number_format($count) ?>đ</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                <input class="collapsed" type="radio" name="PhuongThucTT" value="Cash on delivery" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                Thanh toán khi giao hàng

                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                            <div class="card-body">COD được hiểu là nhận hàng rồi mới thành toán tiền
                                                mặt. Điều này có thể có nghĩa là thanh toán được thực hiện tại điểm giao
                                                hàng
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-4">
                                            <h2 class="card-title">
                                                <input type="radio" name="PhuongThucTT" value="PayPal" class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                PayPal<img height="10px" src="./Client/public/assets/images/paypal_logo_icon_170865.png" alt="Paypal" />

                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Đây là dịch vụ thanh toán và chuyển khoản điện tử thay thế cho các
                                                phương thức truyền thống sử dụng giấy tờ như séc và các lệnh chuyển
                                                tiền.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                </div><!-- End .accordion -->

                                <button type="submit" id="placeOrderBtn" disabled class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<script>
    // Lấy danh sách các radio input phương thức thanh toán
    const paymentMethods = document.querySelectorAll('input[name="PhuongThucTT"]');

    // Lấy nút "Place Order"
    const placeOrderBtn = document.getElementById('placeOrderBtn');

    // Lặp qua từng radio input để thêm sự kiện 'change'
    paymentMethods.forEach(function(method) {
        method.addEventListener('change', function() {
            // Kiểm tra nếu một trong hai phương thức thanh toán được chọn
            if (paymentMethods[0].checked || paymentMethods[1].checked) {
                // Bật nút "Place Order" nếu đã chọn phương thức thanh toán
                placeOrderBtn.disabled = false;
            } else {
                // Nếu chưa chọn phương thức thanh toán, vô hiệu hóa nút "Place Order"
                placeOrderBtn.disabled = true;
            }
        });
    });
</script>