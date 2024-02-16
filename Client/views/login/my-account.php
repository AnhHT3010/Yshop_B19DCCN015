<main class="main">
    <div class="page-header text-center my-5" style="background-image: url('Client/public/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Thông tin tài khoản<span><?= $_SESSION['login']['Ho'] ?>
                    <?= $_SESSION['login']['Ten'] ?></span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="false">Tài khoản cá nhân</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= "active" ?>" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="true">Theo dõi đơn hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false">Mật khẩu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Cập nhật thông tin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./?act=taikhoan&xuli=dangxuat">Đăng xuất</a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-6 col-lg-6">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <?php if ($data_profile['HinhAnh'] != NULL) { ?>
                                    <blockquote style="margin-left: -50%;" class="testimonial text-center">
                                        <img src="<?= $data_profile['HinhAnh'] ?>" alt="user">
                                        <b><?= $data_profile['Ho'] ?> <?= $data_profile['Ten'] ?></b>

                                        <b>
                                            <?php if (isset($_COOKIE['doimk'])) {
                                                echo $_COOKIE['doimk'];
                                            } ?>
                                        </b>

                                    </blockquote><!-- End .testimonial -->
                                <?php } else { ?>
                                    <blockquote style="margin-left: -50%;" class="testimonial text-center">
                                        <img src="public/assets/images/testimonials/user.png" alt="user">
                                        <b><?= $data_profile['Ho'] ?> <?= $data_profile['Ten'] ?></b>

                                    </blockquote><!-- End .testimonial -->
                                <?php } ?>
                                <form action="./?act=taikhoan&xuli=update" enctype="multipart/form-data" method="POST" id="form1">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <b>First Name *</b>
                                            <p> <?= $data_profile['Ho'] ?> </p>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-5">
                                            <b>Last Name *</b>
                                            <p><?= $data_profile['Ten'] ?></p>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">
                                        <div class="col-sm-5">
                                            <b>Giới tính *</b>
                                            <p><?= $data_profile['GioiTinh'] ?></p>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-5">
                                            <b>Địa chỉ email *</b>
                                            <p><?= $data_profile['Email'] ?></p>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">
                                        <div class="col-sm-5">

                                            <b>Số điện thoại *</b>
                                            <p><?= $data_profile['SDT'] ?></p>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-5">
                                            <b>Địa chỉ thường chú *</b>
                                            <p><?= $data_profile['DiaChi'] ?></p>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <b>Quận / Huyện *</b>
                                            <p><?= $data_profile['Quan'] ?></p>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-5">
                                            <b>Tỉnh / thành phố *</b>
                                            <p><?= $data_profile['Tinh'] ?></p>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->
                                </form>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <div class="page-content">
                                    <div class="cart">
                                        <div class="container">
                                            <div class="row">
                                                <aside class="col-lg-9">
                                                    <div class="summary summary-cart" style="width: 60vw">
                                                        <nav aria-label=" breadcrumb" class="breadcrumb-nav mb-3">
                                                            <div class="container">
                                                                <?php
                                                                if (isset($_GET['maHD'])) {
                                                                ?>
                                                                    <ol class="breadcrumb">
                                                                        <li class="breadcrumb-item"><a href=".">Trang chủ</a></li>
                                                                        <li class="breadcrumb-item" aria-current="page"><a href="personal">Đơn hàng</a></li>
                                                                        <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn</li>
                                                                    </ol>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <ol class="breadcrumb">
                                                                        <li class="breadcrumb-item"><a href=".">Trang chủ</a></li>
                                                                        <li class="breadcrumb-item" aria-current="page"><a href="personal">Đơn hàng</a></li>
                                                                    </ol>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div><!-- End .container -->
                                                        </nav><!-- End .breadcrumb-nav -->
                                                        <?php
                                                        if (isset($_GET['maHD'])) {
                                                        ?>
                                                            <h3 class="summary-title">Chi tiết đơn đặt hàng số <?php print_r($_GET['maHD']);  ?></h3>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <h3 class="summary-title">Đơn hàng của bạn</h3>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php if (isset($data_order_detail) && $data_order_detail !== '') { ?>
                                                            <!-- End .summary-title -->

                                                            <table class="table table-striped" style="width: 100%; text-align: center;">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">STT</th>
                                                                        <th scope="col">Sản phẩm</th>
                                                                        <th colspan="col">Ảnh</th>
                                                                        <th colspan="col">Số lượng</th>
                                                                        <th scope="col">Đơn giá</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($data_order_detail as $index => $product) : ?>
                                                                        <tr>
                                                                            <td><?= $index + 1 ?></td>
                                                                            <td><?= $product['TenSP'] ?></td>
                                                                            <td><img src="<?= $product['AnhDaiDien'] ?>" alt="Ảnh sản phẩm" class="rounded m-auto" style="max-width: 100px;"></td>
                                                                            <td><?= $product['SoLuongTrongGio'] ?></td>
                                                                            <td><?= number_format($product['DonGia'], 0, ',', '.') ?>đ</td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                            <?php if ($data_order_detail[0]['TrangThai'] != "2") { ?>
                                                                <a type="button" class="view-details-button" style="background-color: red;" href="./?act=taikhoan&xuli=huydonhang&idHD=<?= $product['MaHD'] ?>">Hủy đơn hàng</a>
                                                            <?php } ?>
                                                            <a type="button" class="view-details-button" href="personal">Quay lại</a>
                                                        <?php } else { ?>
                                                            <div class="orders-grid">
                                                                <?php foreach ($data_order as $order) : ?>
                                                                    <div class="orders">
                                                                        <div class="order">
                                                                            <div class="order-header">
                                                                                <h2 class="order-title">Thông tin đơn hàng #<?php echo $order['MaHD']; ?></h2>
                                                                            </div>
                                                                            <div class="order-details">
                                                                                <a type="button" class="view-details-button" href="detail-order-<?= $order['MaHD'] ?>" data-order-id="<?php echo $order['MaHD']; ?>">Xem chi tiết</a>
                                                                                <?php
                                                                                $dateString = $order['NgayLap'];
                                                                                $timestamp = strtotime($dateString);
                                                                                $formattedDate = date('d/m/Y', $timestamp);
                                                                                ?>
                                                                                <p><strong>Ngày đặt hàng: <?= $formattedDate ?></strong></p>
                                                                                <p><strong>Trạng thái:</strong>
                                                                                    <?php
                                                                                    if ($order['TrangThai'] == 0) {
                                                                                        echo '<span  class="badge border border-info"  style = "color: #17a2b8 !important; font-weight: normal">Chờ duyệt đơn</span>';
                                                                                    } else if ($order['TrangThai'] == 1) {
                                                                                        echo '<span class="badge border border-success"  style = "color: #28a745 !important; font-weight: normal">Đang giao đến</span>';
                                                                                    } else {
                                                                                        echo '<span class="badge rounded-5 border border-danger p-2" style = "color: red; font-weight: normal">Đơn hàng của bạn đã hủy</span>';
                                                                                    }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </aside><!-- End .col-lg-3 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .container -->
                                    </div><!-- End .cart -->
                                    <!-- <a href="shop" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a> -->
                                </div><!-- End .page-content -->

                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
                                <b>
                                    <?php if (isset($_COOKIE['doimk'])) {
                                        echo $_COOKIE['doimk'];
                                    } ?>
                                </b>
                                <form action="./?act=taikhoan&xuli=update" id="form" method="POST">
                                    <label>Mật khẩu hiện tại (để trống hoặc không thay đổi)</label>
                                    <input type="password" name="MatKhau" class="form-control">

                                    <label>Mật khẩu mới (để trống hoặc không thay đổi)</label>
                                    <input type="password" name="MatKhauMoi" class="form-control">

                                    <label>Xác nhận mật khẩu mới</label>
                                    <input type="password" name="MatKhauXN" class="form-control mb-2">

                                    <button for="form" type="submit" class="btn btn-outline-primary-2">
                                        <span>LƯU THAY ĐỔI</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>The following addresses will be used on the checkout page by default.</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Billing Address</h3><!-- End .card-title -->

                                                <p>User Name<br>
                                                    User Company<br>
                                                    John str<br>
                                                    New York, NY 10001<br>
                                                    1-234-987-6543<br>
                                                    yourmail@mail.com<br>
                                                    <a href="#">Edit <i class="icon-edit"></i></a>
                                                </p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

                                                <p>You have not set up this type of address yet.<br>
                                                    <a href="#">Edit <i class="icon-edit"></i></a>
                                                </p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <?php if ($_SESSION['login']['HinhAnh'] != NULL) { ?>
                                    <blockquote class="testimonial text-center">
                                        <img src="public/assets/images/testimonials/<?= $_SESSION['login']['HinhAnh'] ?>" alt="user">
                                        <p></p>
                                        <cite>
                                            <?= $_SESSION['login']['Ho'] ?> <?= $_SESSION['login']['Ten'] ?>
                                        </cite>
                                    </blockquote><!-- End .testimonial -->
                                    <b>
                                        <?php if (isset($_COOKIE['doimk'])) {
                                            echo $_COOKIE['doimk'];
                                        } ?>
                                    </b>
                                <?php } else { ?>
                                    <blockquote class="testimonial text-center">
                                        <img src="public/assets/images/testimonials/user.png" alt="user">
                                        <p></p>
                                        <cite>
                                            <?= $_SESSION['login']['Ho'] ?> <?= $_SESSION['login']['Ten'] ?>
                                        </cite>
                                    </blockquote><!-- End .testimonial -->
                                    <b>
                                        <?php if (isset($_COOKIE['doimk'])) {
                                            echo $_COOKIE['doimk'];
                                        } ?>
                                    </b>
                                <?php } ?>


                                <form action="./?act=taikhoan&xuli=update" enctype="multipart/form-data" method="POST" id="form1">


                                    <div class="row">

                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" name="Ho" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" name="Ten" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->
                                    <label>Giới tính *</label>
                                    <select class="form-control" name="GioiTinh" title="Giới tính">
                                        <option <?= ($data_profile['GioiTinh'] == 'Male') ? 'selected' : '' ?> value="Male">
                                            Male</option>
                                        <option <?= ($data_profile['GioiTinh'] == 'Female') ? 'selected' : '' ?> value="Female"> Female</option>
                                        <option <?= ($data_profile['GioiTinh'] == 'Other') ? 'selected' : '' ?> value="Other"> Other</option>
                                    </select>
                                    <label>Email address *</label>
                                    <input type="email" name="Email" class="form-control" required>

                                    <label>Số điện thoại *</label>
                                    <input type="tel" name="SĐT" class="form-control" required>

                                    <label>Địa chỉ *</label>
                                    <input type="text" name="DiaChi" class="form-control" required>


                                    <label>Quận / Huyện *</label>
                                    <input type="text" name="Quan" class="form-control" required>


                                    <label>Tỉnh / Thành phố *</label>
                                    <input type="text" name="Tinh" class="form-control" required>

                                    <label>Ảnh đại diện *</label>
                                    <input type="file" name="HinhAnh" class="form-control" require>

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>

                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<script>
    // Using jQuery for click event handling
    $('.nav-link').on('click', function(e) {
        e.preventDefault(); // Prevent default link behavior

        // Get the href attribute of the clicked tab link
        var tabId = $(this).attr('href');

        // Update the URL without page reload
        history.pushState({}, '', tabId);

        // Handle tab switching manually
        $('.tab-pane').removeClass('active');
        $(tabId).addClass('active');
    });
</script>