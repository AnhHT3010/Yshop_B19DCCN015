<main id="main" class="main">

    <div class="pagetitle">
        <h1>Trang chủ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="donhang">Quản lý đơn hàng</a></li>
                <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
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
                            <div class="card-body">
                                <div class="card-body">
                                    <h5 class="card-title">Kiểm tra chi tiết <span>| hóa đơn</span></h5>
                                    <div class="d-flex-row m-3">
                                        <?php if ($data['0']['TrangThai'] == 0) { ?>
                                            <a href="./?mod=donhang&act=browse_bill&id=<?= $data['0']['MaHD'] ?>" class="btn btn-success me-2">Duyệt đơn hàng</a>
                                            <a href="./?mod=donhang&act=delete&id=<?= $data['0']['MaHD'] ?>" onclick="return confirm('Do you really want to delete?');" type="button" class="btn btn-danger">Xóa</a>
                                        <?php } else { ?>
                                            <a href="./?mod=donhang&act=delete&id=<?= $data['0']['MaHD'] ?>" onclick="return confirm('Do you really want to delete?');" type="button" class="btn btn-danger">Thu hồi đơn hàng</a>
                                        <?php } ?>
                                    </div>
                                    <table class="table table-striped datatable">
                                        <thead>
                                            <tr>
                                                <th>Mã hóa đơn</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Ảnh</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng đơn hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $row) { ?>
                                                <tr>
                                                    <td><?= $row['MaHD'] ?></td>
                                                    <td><?= $row['TenSP'] ?></td>
                                                    <td><img height="100px" class="rounded" src="<?= $row['AnhDaiDien'] ?>" />
                                                    </td>
                                                    <td><?= number_format($row['DonGia']) ?> VNĐ</td>
                                                    <td><?= $row['SoLuongTrongGio'] ?></td>
                                                    <td><?= number_format($row['DonGia'] * $row['SoLuongTrongGio']) ?> VNĐ</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>