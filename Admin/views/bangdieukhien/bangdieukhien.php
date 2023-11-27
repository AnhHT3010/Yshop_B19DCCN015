<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Trang chủ</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Thống kê theo</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Ngày</a></li>
                                        <li><a class="dropdown-item" href="#">Tháng</a></li>
                                        <li><a class="dropdown-item" href="#">Năm</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Đơn bán <span>| Hôm nay</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?= $count_order['count'] ?></h6>
                                            <span class="text-success small pt-1 fw-bold">Hàng</span> <span class="text-muted small pt-2 ps-1">đã được đặt</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Thống kê theo</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Ngày</a></li>
                                        <li><a class="dropdown-item" href="#">Tháng</a></li>
                                        <li><a class="dropdown-item" href="#">Năm</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Doanh thu <span>| Trong tháng</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?= number_format($count_revenue['sum']) ?></h6>
                                            <span class="text-success small pt-1 fw-bold">VNĐ</span> <span class="text-muted small pt-2 ps-1">tổng tiền</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Thống kê theo</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Ngày</a></li>
                                        <li><a class="dropdown-item" href="#">Tháng</a></li>
                                        <li><a class="dropdown-item" href="#">Năm</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Khách hàng <span>| Trong năm</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?= $count_user['sum'] ?></h6>
                                            <span class="text-danger small pt-1 fw-bold">Khách</span> <span class="text-muted small pt-2 ps-1">đã đăng ký</span>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->
                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Thống kê theo</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Ngày</a></li>
                                        <li><a class="dropdown-item" href="#">Tháng</a></li>
                                        <li><a class="dropdown-item" href="#">Năm</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Đơn hàng bán gần đây <span>| Hôm nay</span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Mã đơn hàng</th>
                                                <th scope="col">Khách hàng</th>
                                                <th scope="col">Tên người nhận</th>
                                                <th scope="col">Địa chỉ giao hàng</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data_order as $order) : ?>
                                                <tr>
                                                    <th scope="row"><a href="?mod=donhang&act=detail&id=<?= $order['MaHD']; ?>">#<?= $order['MaHD']; ?></a></th>
                                                    <td><?= $order['Ten'] . " " . $order['Ho'] ?></td>
                                                    <td><?= $order['NguoiNhan'] ?></td>
                                                    <td><a href="#" class="text-primary"><?= $order['DiaChi'] ?></a></td>
                                                    <td><?= number_format($order['TongTien']) ?></td>
                                                    <?php if ($order['TrangThai'] == 0) { ?>
                                                        <td><span class="badge bg-warning">Chờ duyệt đơn</span></td>
                                                    <?php } else { ?>
                                                        <td><span class="badge bg-success">Đã giao hàng</span></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Thống kê theo</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Ngày</a></li>
                                        <li><a class="dropdown-item" href="#">Tháng</a></li>
                                        <li><a class="dropdown-item" href="#">Năm</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Sản phẩm bán chạy nhất <span>| Hôm nay</span></h5>

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Ảnh</th>
                                                <th scope="col">Tên sản phẩm</th>
                                                <th scope="col">Đơn giá</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Doanh thu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data_best_selling as $best_selling) : ?>
                                                <tr>
                                                    <th scope="row"><a href="#"><img src="<?= $best_selling['AnhDaiDien'] ?>" alt=""></a></th>
                                                    <td><a href="sanpham" class="text-primary fw-bold"><?= $best_selling['TenSP'] ?></a></td>
                                                    <td><?= number_format($best_selling['DonGia']) ?></td>
                                                    <td class="fw-bold text-left"><?= $best_selling['TongSoLuong'] ?></td>
                                                    <td><?= number_format($best_selling['DonGia'] * $best_selling['TongSoLuong']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Top Selling -->

                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->

<?php } ?>