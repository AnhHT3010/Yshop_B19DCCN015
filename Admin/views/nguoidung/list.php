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

                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title">Đơn hàng bán gần đây <span>| Hôm nay</span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Mã tài khoản</th>
                                                <th scope="col">Họ và tên</th>
                                                <th scope="col">Tài khoản</th>
                                                <th scope="col">Địa chỉ</th>
                                                <th scope="col">Giới tính</th>
                                                <th scope="col">SĐT</th>
                                                <th scope="col">Chức vụ</th>
                                                <th scope="col">Tính năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data_customer as $row) : ?>
                                                <tr>
                                                    <td>#<?= $row['MaND'] ?></td>
                                                    <td><?= $row['Ho'] ?> <?= $row['Ten'] ?></td>
                                                    <td><?= $row['TaiKhoan'] ?></td>
                                                    <td><?= $row['Tinh'] ?> <?= $row['Quan'] ?> <?= $row['DiaChi'] ?></td>
                                                    <td><?= $row['GioiTinh'] ?></td>
                                                    <td><?= $row['SDT'] ?></td>
                                                    <td><?php
                                                        if ($row['MaQuyen'] == 2) {
                                                            echo 'Quản trị viên';
                                                        } else {
                                                            if ($row['MaQuyen'] == 1) {
                                                                echo 'Khách hàng';
                                                            } elseif ($row['MaQuyen'] == 4) {
                                                                echo 'Nhân viên giao hàng';
                                                            } elseif ($row['MaQuyen'] == 5) {
                                                                echo 'Biên tập viên';
                                                            } else {
                                                                echo 'Nhân viên';
                                                            }
                                                        }
                                                        ?></td>
                                                    <td class="table-td-center">
                                                        <a href="./?mod=nguoidung&act=edit&id=<?= $row['MaND'] ?>" class="btn btn-warning"><i class="bx bx-message-square-edit d-flex" style="font-size: 13px"></i></a>
                                                        <a href="./?mod=nguoidung&act=delete&id=<?= $row['MaND'] ?>" onclick="return confirm('Do you really want to delete?');" type="button" class="btn btn-danger" style="color:#d4e9f7 !important"><i class="bx bxs-trash d-flex" style="font-size: 13px"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->

<?php } ?>