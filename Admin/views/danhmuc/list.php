<style>
    .app-menu__item.active5 {
        background: #c6defd;
        text-decoration: none;
        color: rgb(22 22 72);
        box-shadow: none;
        border: 1px solid rgb(22 22 72);
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Danh sách danh mục</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Pages</a></li>
                <li class="breadcrumb-item active">Danh mục</li>
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

                                <a class="btn btn-add btn-sm" href="./?mod=danhmuc&act=add" title="Thêm"><i class="bx bxs-add-to-queue"></i>
                                    Thêm mới danh mục</a>
                            </div>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Mã Code</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tính năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row) { ?>
                                    <tr>

                                        <td><?= $row['MaDM'] ?></td>
                                        <td><?= $row['TenDM'] ?></td>
                                        <td>
                                            <img src="<?= $row['HinhAnh'] ?>" height="60px">
                                        </td>
                                        <td>
                                            <a href="./?mod=danhmuc&act=detail&id=<?= $row['MaDM'] ?>" class="btn btn-success"><i class="bx bx-search d-flex" style="font-size: 13px"></i></a>
                                            <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
                                                <a href="./?mod=danhmuc&act=edit&id=<?= $row['MaDM'] ?>" class="btn btn-warning"><i class="bx bx-message-square-edit d-flex" style="font-size: 13px"></i></a>
                                                <a href="./?mod=danhmuc&act=delete&id=<?= $row['MaDM'] ?>" onclick="return confirm('Do you really want to delete?');" type="button" class="btn btn-danger" style="color:#d4e9f7 !important"><i class="bx bxs-trash d-flex" style="font-size: 13px"></i></a>
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