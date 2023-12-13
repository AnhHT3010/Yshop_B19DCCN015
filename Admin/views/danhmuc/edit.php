<main id="main" class="main">

    <div class="pagetitle">
        <h1>Sửa danh mục</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=".">Pages</a></li>
                <li class="breadcrumb-item"><a href="danhmuc">Danh mục</a></li>
                <li class="breadcrumb-item active">Sửa danh mục</li>
            </ol>
            <div id="clock"></div>
        </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Chỉnh sửa danh mục</h3>
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a href="?mod=danhmuc&act=add" class="btn btn-add btn-sm"><i class="bx bxs-comment-add"></i> Thêm danh mục mới</a>
                        </div>
                    </div>

                    <?php if (isset($_COOKIE['msg'])) { ?>
                        <div class="alert alert-warning">
                            <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
                        </div>
                    <?php } ?>
                    <form class="row" action="./?mod=danhmuc&act=update" method="POST" role="form" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <label class="control-label">Mã sản phẩm </label>
                            <input class="form-control" type="number" value="<?= $data['MaDM'] ?>" name="MaDM" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Tên danh mục</label>
                            <input class="form-control" name="TenDM" value="<?= $data['TenDM'] ?>" type="text">
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Ảnh danh mục cập nhật</label>
                            <div id="myfileupload">
                                <input type="hidden" id="uploadfile" name="HinhAnh" value="<?= $data['HinhAnh'] ?>" />
                            </div>
                            <div id="thumbbox">
                                <img height="400" class="img-cover" id="thumbimage" width=" auto" alt="Thumb image" src="<?= $data['HinhAnh'] ?>" />
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
        uploadfile.value = ""
    }
</script>