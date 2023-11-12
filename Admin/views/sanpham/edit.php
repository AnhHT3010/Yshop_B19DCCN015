<main id="main" class="main">

    <div class="pagetitle">
        <h1>Sửa sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=".">Pages</a></li>
                <li class="breadcrumb-item"><a href="danhmuc">Sản Phẩm</a></li>
                <li class="breadcrumb-item active">Sửa sản phẩm</li>
            </ol>
            <div id="clock"></div>
        </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Chỉnh sửa sản phẩm</h3>
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a href="?mod=danhmuc&act=add" class="btn btn-add btn-sm"><i class="bx bxs-comment-add"></i> Thêm danh mục mới</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="?mod=thuonghieu&act=add" class="btn btn-add btn-sm"><i class="bx bxs-comment-add"></i> Thêm hãng mới</a>
                        </div>
                    </div>

                    <?php if (isset($_COOKIE['msg'])) { ?>
                        <div class="alert alert-warning">
                            <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
                        </div>
                    <?php } ?>

                    <form class="row" action="./?mod=thuonghieu&act=update" method="POST" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" value="<?= $data_brand['MaSP'] ?>" type="hidden" name="MaSP" placeholder="">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-sm-2 col-form-label">Chọn Danh Mục</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="MaDM" aria-label="Default select example">
                                    <?php foreach ($data as $row) { ?>
                                        <option <?= ($data_brand['MaDM'] == $row['MaDM']) ? 'selected' : '' ?> value="<?= $row['MaDM'] ?>"><?= $row['TenDM'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-sm-2 col-form-label">Chọn Thương hiệu</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="MaLSP" aria-label="Default select example">
                                    <?php foreach ($data as $row) { ?>
                                        <option <?= ($data_brand['MaLSP'] == $row['MaLSP']) ? 'selected' : '' ?> value="<?= $row['MaLSP'] ?>"><?= $row['TenLSP'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-10">
                            <label class="control-label">Tên sản phẩm</label>
                            <input class="form-control" name="TenLSP" value="<?= $data_brand['TenSP'] ?>" type="text">
                        </div>

                        <div class="form-group col-md-10">
                            <label class="control-label">Ảnh sản phẩm</label>
                            <div id="myfileupload">
                                <input type="hidden" id="uploadfile" name="HinhAnh" value="<?= $data_brand['HinhAnh'] ?>" />
                            </div>
                            <div id="thumbbox">
                                <img height="auto" class="img-cover" id="thumbimage" width="200px" alt="Thumb image" src="<?= $data_brand['HinhAnh'] ?>" />
                                <a class="corner-mark" id="new-image" onclick="removeImage(this)">
                                    <div>&times;</div>
                                </a>
                            </div>
                            <div id="boxchoice">
                                <a href="javascript:" class="Choicefile" id="Choicefile"><i class="bx bxs-image-add"></i> Chọn
                                    ảnh</a>
                                <p style="clear:both"></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Mô tả</label>
                            <textarea class="form-control" name="MoTa" id="summernote"><?= $data_brand['MoTa'] ?></textarea>
                            <script>
                                CKEDITOR.replace('summernote');
                            </script>
                        </div>
                        <div class="form-group col-md-12 mt-5"> <!-- Thêm class mt-3 để tạo khoảng cách top -->
                            <button type="submit" class="btn">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
</main>

<script>
    const choiceFile = document.getElementById("Choicefile");
    const thumbimage = document.getElementById("thumbimage")
    const uploadfile = document.getElementById("uploadfile")
    const newImage = document.getElementById("new-image")
    choiceFile.addEventListener("click", () => {
        console.log("click")
        const client = filestack.init("AdJg69GnASJiAP5DB1CYsz");
        const options = {
            maxFiles: 5,
            onFileUploadFinished(file) {
                thumbimage.style.display = "block"; // Hiển thị phần tử thumbimage
                thumbimage.src = file.url; // Đặt đường dẫn ảnh cho thuộc tính src
                uploadfile.value = file.url;
                newImage.style.display = "flex";
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