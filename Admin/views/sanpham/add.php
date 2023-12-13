<main id="main" class="main">
    <div class="pagetitle">
        <h1>Thêm sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=".">Pages</a></li>
                <li class="breadcrumb-item"><a href="sanpham">Sản phẩm</a></li>
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
                            <a href="?mod=thuonghieu&act=add" class="btn btn-add btn-sm"><i class="bx bxs-comment-add"></i>Thêm hãng mới</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="?mod=danhmuc&act=add" class="btn btn-add btn-sm"><i class="bx bxs-comment-add"></i>
                                Thêm danh mục mới</a>
                        </div>
                    </div>

                    <?php if (isset($_COOKIE['msg'])) { ?>
                        <div class="alert alert-warning">
                            <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
                        </div>
                    <?php } ?>
                    <form class="row" action="./?mod=sanpham&act=store" method="POST" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="MaSP" placeholder="">
                        </div>
                        <div class="form-group col-md-10">
                            <label class="col-sm-2 col-form-label">Chọn Danh Mục</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="MaDM" id="selectCategory" aria-label="Default select example">
                                    <?php foreach ($data_category as $row) { ?>
                                        <option value="<?= $row['MaDM'] ?>"><?= $row['TenDM'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-10">
                            <label class="col-sm-2 col-form-label">Chọn Hãng</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="MaLSP" id="selectBrand" aria-label="Default select example">
                                    <?php foreach ($data_brand as $row) { ?>
                                        <option value="<?= $row['MaLSP'] ?>" data-ma-dm="<?= $row['MaDM'] ?>"><?= $row['TenLSP'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Tên sản phẩm<b style="color: red">*</b></label>
                            <input class="form-control" name="TenSP" type="text">
                            <span class="error-message" id="tenSPError"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Đơn giá<b style="color: red">*</b></label>
                            <input class="form-control" name="DonGia" type="text">
                            <span class="error-message" id="donGiaError"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Số lượng<b style="color: red">*</b></label>
                            <input class="form-control" name="SoLuong" type="number" value="1">
                            <span class="error-message" id="soLuongError"></span>
                        </div>

                        <div class="form-group col-md-10">
                            <label class="control-label">Ảnh đại diện cho sản phẩm</label>
                            <div id="myfileupload">
                                <input type="hidden" id="uploadfile" name="AnhDaiDien" />
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
                        <div class="form-group col-md-10">
                            <label class="control-label">Các ảnh chi tiết cho sản phẩm</label>
                            <div id="myfileupload">
                                <input type="hidden" id="uploadfilemutiple" name="AnhURL" />
                            </div>
                            <div id="thumbdetail" class="row"></div>

                            <div id="boxchoice">
                                <a href="javascript:" class="btn btn-dark" id="ChoiceFilemutiple"><i class="bx bxs-image-add"></i> Chọn
                                    ảnh</a>
                                <p style="clear:both"></p>
                            </div>
                        </div>
                        <div class="form-group col-md-8">
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
                            <label class="control-label">Thông tin sản phẩm</label>
                            <textarea class="form-control" name="MoTa" id="summernote"></textarea>
                            <script>
                                CKEDITOR.replace('summernote');
                            </script>
                        </div>
                        <div class="form-group col-md-12 mt-5"> <!-- Thêm class mt-3 để tạo khoảng cách top -->
                            <button type="submit" class="btn" id="btnThem" disabled="disable">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
</main>
<script script src="//static.filestackapi.com/filestack-js/3.x.x/filestack.min.js">
</script>
<script>
    const client = filestack.init("AdJg69GnASJiAP5DB1CYsz");
    const choiceFile = document.getElementById("Choicefile");
    const choiceFilemutiple = document.getElementById("ChoiceFilemutiple");
    const thumbimage = document.getElementById("thumbimage");
    const uploadfile = document.getElementById("uploadfile");
    const uploadfilemutiple = document.getElementById("uploadfilemutiple");
    var btnThem = document.getElementById('btnThem');
    // UploadImage Detail Product
    const fileImageArray = [];
    const imageDetailProduct = document.getElementById("imageDetailProduct"); // Đặt ID của phần tử chứa ảnh
    choiceFilemutiple.addEventListener("click", () => {
        const optionsImage = {
            maxFiles: 4,
            onFileUploadFinished(file) {
                fileImageArray.push(file);

                // Hiển thị các ảnh vừa upload
                displayUploadedImages();
            }
        };

        client.picker(optionsImage).open();
    })

    // Hiển thị các ảnh vừa upload
    function displayUploadedImages() {
        var thumbDetail = document.getElementById("thumbdetail");
        thumbDetail.innerHTML = "";

        fileImageArray.forEach((file, index) => {
            const imageContainer = document.createElement("div");
            imageContainer.classList.add("image-container");
            imageContainer.classList.add("position-relative");

            const imgElement = document.createElement("img");
            imgElement.classList.add("img-cover");
            imgElement.style.width = '100%';
            imgElement.style.height = 'auto';
            imgElement.src = file.url;

            const deleteButton = document.createElement("a");
            deleteButton.innerHTML = "&times;";
            deleteButton.classList.add("deleteButton");
            deleteButton.addEventListener("click", function() {
                fileImageArray.splice(index, 1);
                displayUploadedImages();
            });

            imageContainer.appendChild(imgElement);
            imageContainer.appendChild(deleteButton);

            thumbDetail.appendChild(imageContainer);
        });
        // Update the uploadfile input with the array of URLs
        uploadfilemutiple.value = JSON.stringify(fileImageArray.map(file => file.url));

        console.log(fileImageArray)
    }

    // Upload Thumbnail Image
    choiceFile.addEventListener("click", () => {
        const options = {
            onFileUploadFinished(file) {
                uploadfile.value = file.url;
                console.log(uploadfile.value);
                thumbimage.style.display = "block"; // Hiển thị phần tử thumbimage
                thumbimage.src = file.url; // Đặt đường dẫn ảnh cho thuộc tính src
            }
        }
        client.picker(options).open();
    })

    function removeImage(element) {
        // Lấy phần tử cha (div.image-container) của nút xóa
        let imageContainer = element.parentNode;
        // Xóa phần tử cha khỏi DOM
        imageContainer.parentNode.removeChild(imageContainer);
        uploadfile.value = "";
        thumbimage.src = "";
    }

    function updateBrandOptions() {
        // Lấy giá trị của select Chọn Danh Mục
        var selectedCategory = document.getElementById('selectCategory').value;
        // Truyền dữ liệu từ PHP xuống Javascipt
        var data_brand = <?php echo json_encode($data_brand); ?>;
        // Lặp qua tất cả các option trong select Chọn Hãng
        var selectBrand = document.getElementById('selectBrand');

        // Xóa tất cả các option hiện có trong selectBrand
        selectBrand.innerHTML = "";

        // Biến kiểm tra xem có option nào tương ứng không
        var hasMatchingOption = false;

        // Lặp qua tất cả các option trong selectBrand
        for (var i = 0; i < data_brand.length; i++) {
            // Kiểm tra xem MaDM của option có trùng với MaDM của select Chọn Danh Mục không
            if (data_brand[i].MaDM === selectedCategory) {
                // Tạo một option mới và thêm vào selectBrand
                var option = document.createElement('option');
                option.value = data_brand[i].MaLSP;
                option.setAttribute('data-ma-dm', data_brand[i].MaDM);
                option.text = data_brand[i].TenLSP;
                selectBrand.add(option);
                // Đánh dấu rằng đã có option tương ứng
                hasMatchingOption = true;
            }
        }

        // Nếu có option tương ứng, chọn option đầu tiên
        if (hasMatchingOption) {
            selectBrand.value = selectBrand.options[0].value;
        } else {
            // Nếu không có option tương ứng, tạo option mặc định
            var defaultOption = document.createElement('option');
            defaultOption.text = "Không có hãng nào trong danh mục này";
            defaultOption.value = ""; // Đặt giá trị là một giá trị đặc biệt
            selectBrand.add(defaultOption);
        }
    }

    // Gọi hàm khi trang web được tải lần đầu tiên
    window.onload = updateBrandOptions;

    // Lắng nghe sự kiện onchange của select Chọn Danh Mục
    document.getElementById('selectCategory').addEventListener('change', updateBrandOptions);

    // Lắng nghe sự kiện khi trường Tên Sản Phẩm được focus
    document.querySelector('input[name="TenSP"]').addEventListener('focus', function() {
        validateTenSP();
        validateForm()
    });

    // Lắng nghe sự kiện khi trường Tên Sản Phẩm thay đổi giá trị
    document.querySelector('input[name="TenSP"]').addEventListener('input', function() {
        validateTenSP();
        validateForm()
    });

    // Lắng nghe sự kiện khi trường Đơn Giá được focus
    document.querySelector('input[name="DonGia"]').addEventListener('focus', function() {
        validateDonGia();
        validateForm()
    });

    // Lắng nghe sự kiện khi trường Đơn Giá thay đổi giá trị
    document.querySelector('input[name="DonGia"]').addEventListener('input', function() {
        validateDonGia();
        validateForm()
    });

    // Lắng nghe sự kiện khi trường Số Lượng được focus
    document.querySelector('input[name="SoLuong"]').addEventListener('focus', function() {
        validateSoLuong();
        validateForm()
    });

    // Lắng nghe sự kiện khi trường Số Lượng thay đổi giá trị
    document.querySelector('input[name="SoLuong"]').addEventListener('input', function() {
        validateSoLuong();
        validateForm()
    });

    // Hàm kiểm tra và xử lý điều kiện cho Tên Sản Phẩm
    function validateTenSP() {
        var tenSPValue = document.querySelector('input[name="TenSP"]').value;
        var tenSPError = document.getElementById('tenSPError');
        tenSPError.textContent = tenSPValue.trim() === '' ? 'Tên sản phẩm không được bỏ trống.' : '';
    }

    // Hàm kiểm tra và xử lý điều kiện cho Đơn Giá
    function validateDonGia() {
        var donGiaValue = document.querySelector('input[name="DonGia"]').value;
        var donGiaError = document.getElementById('donGiaError');

        if (donGiaValue.trim() === '') {
            showError(donGiaError, 'Đơn giá không được bỏ trống.');
        } else if (isNaN(donGiaValue)) {
            showError(donGiaError, 'Đơn giá phải là một số.');
        } else {
            clearErrorMessage('donGiaError');
        }
    }

    // Hàm hiển thị thông báo lỗi
    function showError(element, message) {
        element.textContent = message;
        element.style.color = 'red';
        element.style.fontSize = '12px';
    }

    // Hàm xóa thông báo lỗi
    function clearErrorMessage(elementId) {
        var element = document.getElementById(elementId);
        element.textContent = '';
    }

    // Hàm kiểm tra và xử lý điều kiện cho Số Lượng
    function validateSoLuong() {
        var soLuongValue = document.querySelector('input[name="SoLuong"]').value;
        var soLuongError = document.getElementById('soLuongError');
        if (soLuongValue.trim() === '') {
            showError(soLuongError, 'Số lượng không được bỏ trống.');
        } else if (soLuongValue < 1) {
            showError(soLuongError, 'Số lượng không được nhỏ hơn 1.');
        } else {
            clearErrorMessage('soLuongError');
        }
    }

    function validateForm() {
        console.log([tenSPError.textContent, donGiaError.textContent, soLuongError.textContent]);
        if (tenSPError.textContent === '' && donGiaError.textContent === '' && soLuongError.textContent === '') {
            btnThem.removeAttribute('disabled');
        } else {
            btnThem.setAttribute('disabled', 'disable');
        }
    }
</script>