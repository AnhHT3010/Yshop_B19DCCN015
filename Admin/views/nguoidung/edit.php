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
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Pages</a></li>
                <li class="breadcrumb-item"><a href="nguoidung">Danh Sách Tài Khỏan</a></li>
                <li class="breadcrumb-item active">Chỉnh Sửa Tài Khoản</li>
            </ol>
            <div id="clock"></div>
        </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Chỉnh Sửa Tài Khoản</h3>
                <div class="tile-body">

                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a href="?mod=nguoidung&act=add" class="btn btn-add btn-sm"><i class="bx bxs-comment-add"></i>Thêm Tài Khoản</a>
                        </div>
                    </div>

                    <form class="row" action="./?mod=nguoidung&act=update" method="POST" role="form" enctype="multipart/form-data_user_detail">
                        <input class="form-control" name="MaND" type="hidden" value="<?= $data_user_detail['MaND'] ?>">
                        <div class="form-group col-md-4">
                            <label class="control-label">Tên tài khoản</label>
                            <input class="form-control" name="TaiKhoan" value="<?= $data_user_detail['TaiKhoan'] ?>" type="text" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Họ</label>
                            <input class="form-control" name="Ho" type="text" value="<?= $data_user_detail['Ho'] ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Tên</label>
                            <input class="form-control" name="Ten" value="<?= $data_user_detail['Ten'] ?>" type="text" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Địa chỉ email</label>
                            <input class="form-control" name="Email" value="<?= $data_user_detail['Email'] ?>" type="email" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Tỉnh/Thành Phố</label>
                            <input class="form-control" type="text" name="DiaChi" value="<?= $data_user_detail['DiaChi'] ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Quận/Huyện</label>
                            <input class="form-control" type="text" name="Quan" value="<?= $data_user_detail['Quan'] ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Địa chỉ thường trú</label>
                            <input class="form-control" type="text" name="Tinh" value="<?= $data_user_detail['Tinh'] ?>" required>
                        </div>
                        <div class="form-group  col-md-4">
                            <label class="control-label">Số điện thoại</label>
                            <input class="form-control" name="SDT" value="<?= $data_user_detail['SDT'] ?>" type="tel" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Giới tính</label>
                            <select class="form-control" name="GioiTinh" value="" id="exampleSelect2" required>
                                <option>-- Chọn giới tính --</option>
                                <option <?= ($data_user_detail['GioiTinh'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
                                <option <?= ($data_user_detail['GioiTinh'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
                                <?php if (empty($_POST['GioiTinh'])) : ?>
                                    <option selected disabled hidden>Giới tính không xác định</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleSelect1" class="control-label">Trạng thái tài khoản</label>
                            <select class="form-control" name="TrangThai" id="exampleSelect1">
                                <option <?= ($data_user_detail['TrangThai'] == '1') ? 'selected' : '' ?> value="1">Hoạt động
                                </option>
                                <option <?= ($data_user_detail['TrangThai'] == '2') ? 'selected' : '' ?> value="2">Tạm
                                    khóa</option>

                            </select>
                        </div>
                        <div class="form-group col-md-10">
                            <label class="control-label">Ảnh hãng</label>
                            <div id="myfileupload">
                                <input type="hidden" id="uploadfile" name="HinhAnh" value="<?= $data_user_detail['HinhAnh'] ?>" />
                            </div>
                            <div id="thumbbox">
                                <img height="auto" class="img-cover" id="thumbimage" width="200px" alt="Thumb image" src="<?= $data_user_detail['HinhAnh'] ?>" />
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

                        <button type="submit" class="btn btn-success w-25 m-auto mt-10">Cập nhật</button>
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