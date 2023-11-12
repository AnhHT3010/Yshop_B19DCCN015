<main id="main" class="main">

    <div class="pagetitle">
        <h1>Thêm sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=".">Pages</a></li>
                <li class="breadcrumb-item"><a href="danhmuc">Danh mục</a></li>
                <li class="breadcrumb-item active">Thêm sản phẩm</li>
            </ol>
            <div id="clock"></div>
        </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo mới sản phẩm</h3>
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a href="?mod=loaisanpham&act=add" class="btn btn-add btn-sm"><i class="bx bxs-comment-add"></i>Thêm hãng mới</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="?mod=sanpham&act=add" class="btn btn-add btn-sm"><i class="bx bxs-comment-add"></i>
                                Thêm sản phẩm mới</a>
                        </div>
                    </div>

                    <?php if (isset($_COOKIE['msg'])) { ?>
                        <div class="alert alert-warning">
                            <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
                        </div>
                    <?php } ?>
                    <form class="row" action="./?mod=thuonghieu&act=store" method="POST" role="form" enctype="multipart/form-data">
                        <div class="form-group col-md-10">
                            <label class="col-sm-2 col-form-label">Chọn Danh Mục</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="MaDM" aria-label="Default select example">
                                    <?php foreach ($data_category as $row) { ?>
                                        <option value="<?= $row['MaDM'] ?>"><?= $row['TenDM'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-10">
                            <label class="col-sm-2 col-form-label">Chọn Hãng</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="MaLSP" aria-label="Default select example">
                                    <?php foreach ($data_brand as $row) { ?>
                                        <option value="<?= $row['MaLSP'] ?>"><?= $row['TenLSP'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Tên sản phẩm</label>
                            <input class="form-control" name="TenSP" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Đơn giá</label>
                            <input class="form-control" name="DonGia" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Số lượng</label>
                            <input type="number" name="SoLuong" value="1" min="1">

                        </div>

                        <div class="form-group col-md-10">
                            <label class="control-label">Ảnh đại diện cho sản phẩm</label>
                            <div id="myfileupload">
                                <input type="hidden" id="uploadfile" name="HinhAnh" />
                            </div>
                            <div id="thumbbox">
                                <img height="auto" class="img-cover" id="thumbimage" width="200px" alt="Thumb image" />
                                <a class="corner-mark" id="new-image" onclick="removeImage(this)">
                                    <div>&times;</div>
                                </a>
                            </div>
                            <div id="boxchoice">
                                <a href="javascript:" class="btn btn-dark" id="Choicefile"><i class="bx bxs-image-add"></i> Chọn
                                    ảnh</a>
                                <p style="clear:both"></p>
                            </div>
                        </div>
                        <div class="form-group col-md-9">
                            <label class="control-label">Màn hình</label>
                            <input class="form-control" name="ManHinh" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Hệ điều hành</label>
                            <input class="form-control" name="HDH" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Camera sau</label>
                            <input class="form-control" name="CamSau" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Cammera trước</label>
                            <input class="form-control" name="CamTruoc" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">CPU</label>
                            <input class="form-control" name="CPU" type="text">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Ram</label>
                            <input class="form-control" name="Ram" type="text">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Rom</label>
                            <input class="form-control" name="Rom" type="text">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">SDCard</label>
                            <input class="form-control" name="SDCard" type="text">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Pin</label>
                            <input class="form-control" name="Pin" type="text">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Mô tả</label>
                            <textarea class="form-control" name="MoTa" id="summernote"></textarea>
                            <script>
                                CKEDITOR.replace('summernote');
                            </script>
                        </div>
                        <div class="form-group col-md-12 mt-5"> <!-- Thêm class mt-3 để tạo khoảng cách top -->
                            <button type="submit" class="btn">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
</main>

<script>
    const choiceFile = document.getElementById("Choicefile");
    const thumbimage = document.getElementById("thumbimage")
    const uploadfile = document.getElementById("uploadfile")
    choiceFile.addEventListener("click", () => {
        const client = filestack.init("AdJg69GnASJiAP5DB1CYsz");
        const options = {
            onFileUploadFinished(file) {
                thumbimage.style.display = "block"; // Hiển thị phần tử thumbimage
                thumbimage.src = file.url; // Đặt đường dẫn ảnh cho thuộc tính src
                uploadfile.value = file.url;
            }
        }
        client.picker(options).open();
    })

    function removeImage(element) {
        // Lấy phần tử cha (div.image-container) của nút xóa
        var imageContainer = element.parentNode;
        // Xóa phần tử cha khỏi DOM
        imageContainer.parentNode.removeChild(imageContainer);
        uploadfile.value = "";
        thumbimage.src = "";
    }
</script>