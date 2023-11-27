<main id="main" class="main">

    <div class="pagetitle">
        <h1>Trang chủ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active">Quản lý đơn hàng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
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
                                <h5 class="card-title">Danh Sách Đơn Hàng <span>| Hôm nay</span></h5>
                                <div class="d-flex-row m-3">
                                    <a href="./?mod=donhang&act=filter_browse" class="btn btn-success me-5"><i class="bx bxs-comment-check me-1"></i>Đã duyệt</a>
                                    <a href="./?mod=donhang&act=filter_not_browse" class="btn btn-warning me-5"><i class="bx bxs-comment-x  me-1"></i>Chưa duyệt</a>
                                </div>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Ngày Order</th>
                                            <th scope="col">Khách hàng</th>
                                            <th scope="col">Người nhận</th>
                                            <th scope="col">Địa chỉ giao hàng</th>
                                            <th scope="col">Phương thức thanh toán</th>
                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Tính năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_order as $order) : ?>
                                            <tr>
                                                <th scope="row"><a href="#">#<?= $order['MaHD']; ?></a></th>
                                                <th><?= $order['NgayLap']; ?></th>
                                                <td><?= $order['Ten'] . " " . $order['Ho'] ?></td>
                                                <td><?= $order['NguoiNhan'] ?></td>
                                                <td><?= $order['DiaChi'] ?></td>
                                                <td><?= $order['PhuongThucTT'] ?></td>
                                                <td><?= number_format($order['TongTien']) ?></td>
                                                <?php if ($order['TrangThai'] == 0) { ?>
                                                    <td><span class="badge bg-warning">Chờ duyệt đơn</span></td>
                                                <?php } else { ?>
                                                    <td><span class="badge bg-success">Đã giao hàng</span></td>
                                                <?php } ?>
                                                <td>
                                                    <a href="./?mod=donhang&act=detail&id=<?= $order['MaHD'] ?>" class="btn btn-primary btn-sm edit mb-1"><i class="bi eye"></i> Xem chi tiết</a>
                                                    <a class="btn btn-danger btn-sm trash" href="./?mod=donhang&act=delete&id=<?= $order['MaHD'] ?>" onclick="return confirm('Do you really want to delete?');">Xóa<i class="bx bxs-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="d-flex-row m-3">
                                    <a href="./?mod=donhang&act=export_invoice&state=y" type="button" class="btn btn-success me-5"><i class="bx bxs-message-add me-1"></i>Xuất hóa đơn tháng này</a>
                                    <a href="./?mod=donhang&act=export_invoice&state=m" type="button" class="btn btn-success me-5"><i class="bx bxs-message-add me-1"></i>Xuất hóa đơn năm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>