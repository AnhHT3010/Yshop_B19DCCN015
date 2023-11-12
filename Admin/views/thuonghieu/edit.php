<style>
    .app-menu__item.active5 {
        background: #c6defd;
        text-decoration: none;
        color: rgb(22 22 72);
        box-shadow: none;
        border: 1px solid rgb(22 22 72);
    }

    .Choicefile {
        display: block;
        background: #14142B;
        border: 1px solid #fff;
        color: #fff;
        width: 150px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        padding: 5px 0px;
        border-radius: 5px;
        font-weight: 500;
        align-items: center;
        justify-content: center;
    }

    .Choicefile:hover {
        text-decoration: none;
        color: white;
    }

    #uploadfile,
    .removeimg {
        display: none;
    }

    #thumbbox {
        position: relative;
        width: 100%;
        margin-bottom: 20px;
    }

    .removeimg {
        height: 25px;
        position: absolute;
        background-repeat: no-repeat;
        top: 5px;
        left: 5px;
        background-size: 25px;
        width: 25px;
        /* border: 3px solid red; */
        border-radius: 50%;

    }

    .removeimg::before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        content: '';
        border: 1px solid red;
        background: red;
        text-align: center;
        display: block;
        margin-top: 11px;
        transform: rotate(45deg);
    }

    .removeimg::after {
        /* color: #FFF; */
        /* background-color: #DC403B; */
        content: '';
        background: red;
        border: 1px solid red;
        text-align: center;
        display: block;
        transform: rotate(-45deg);
        margin-top: -2px;
    }
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Sửa hãng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=".">Pages</a></li>
                <li class="breadcrumb-item"><a href="danhmuc">Hãng</a></li>
                <li class="breadcrumb-item active">Sửa hãng</li>
            </ol>
            <div id="clock"></div>
        </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Chỉnh sửa hãng</h3>
                <div class="tile-body">
                    <div class="row element-button">
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
                            <input class="form-control" value="<?= $data_brand['MaLSP'] ?>" type="hidden" name="MaLSP" placeholder="">
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
                        <div class="form-group col-md-10">
                            <label class="control-label">Tên hãng</label>
                            <input class="form-control" name="TenLSP" value="<?= $data_brand['TenLSP'] ?>" type="text">
                        </div>

                        <div class="form-group col-md-10">
                            <label class="control-label">Ảnh hãng</label>
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