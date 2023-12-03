<main id="main" class="main">

    <div class="pagetitle">
        <h1>Danh sách sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Pages</a></li>
                <li class="breadcrumb-item active">Sản phẩm</li>
            </ol>
            <div id="clock"></div>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row element-button">
                            <div class="col-sm-2">

                                <a class="btn btn-add btn-sm" href="./?mod=sanpham&act=add" title="Thêm"><i class="bx bxs-add-to-queue"></i>
                                    Thêm sản phẩm mới</a>
                            </div>
                        </div>
                        <?php if (isset($_COOKIE['msg'])) { ?>
                            <div class="alert alert-success">
                                <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
                            </div>
                        <?php } ?>
                        <!-- Table with stripped rows -->
                        <table class="table datatable" style="--bs-table-bg: none;">
                            <thead>
                                <tr>
                                    <th scope="col">Mã Code</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Tình trạng</th>
                                    <th>Giá tiền</th>
                                    <th width="120">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row) { ?>
                                    <tr>

                                        <td><?= $row['MaSP'] ?></td>
                                        <td><?= $row['TenSP'] ?></td>
                                        <td>
                                            <img src="<?= $row['AnhDaiDien'] ?>" alt="<?= $row['TenSP'] ?>" height="60px">
                                        </td>
                                        <td>
                                            <?= $row['SoLuong'] ?>

                                        <td> <b>
                                                <?php if ($row['SoLuong'] >= 5) {
                                                    echo 'Còn hàng';
                                                } elseif ($row['SoLuong'] > 0 && $row['SoLuong'] < 5) {
                                                    echo 'Sắp hết';
                                                } elseif ($row['SoLuong'] == 0) {
                                                    echo 'Hết hàng';
                                                } ?>
                                            </b>
                                        </td>
                                        <td><?= number_format($row['DonGia']) ?></td>
                                        <td>
                                            <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
                                                <a href="./?mod=sanpham&act=edit&id=<?= $row['MaSP'] ?>" class="btn btn-warning"><i class="bx bx-message-square-edit d-flex" style="font-size: 13px"></i></a>
                                                <a href="./?mod=sanpham&act=delete&id=<?= $row['MaSP'] ?>" onclick="return confirm('Do you really want to delete?');" type="button" class="btn btn-danger" style="color:#d4e9f7 !important"><i class="bx bxs-trash d-flex" style="font-size: 13px"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->