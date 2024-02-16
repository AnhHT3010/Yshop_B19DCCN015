<script>
    function readURL(input, thumbimage) {
        if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#thumbimage").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else { // Sử dụng cho IE
            $("#thumbimage").attr('src', input.value);

        }
        $("#thumbimage").show();
        $('.filename').text($("#uploadfile").val());
        $('.Choicefile').css('background', '#14142B');
        $('.Choicefile').css('cursor', 'default');
        $(".removeimg").show();
        $(".Choicefile").unbind('click');

    }
    $(document).ready(function() {
        $(".Choicefile").bind('click', function() {
            $("#uploadfile").click();

        });
        $(".removeimg").click(function() {
            $("#thumbimage").attr('src', '').hide();
            $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
            $(".removeimg").hide();
            $(".Choicefile").bind('click', function() {
                $("#uploadfile").click();
            });
            $('.Choicefile').css('background', '#14142B');
            $('.Choicefile').css('cursor', 'pointer');
            $(".filename").text("");
        });
    })
</script>

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
        <h1>Thêm danh mục</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=".">Pages</a></li>
                <li class="breadcrumb-item"><a href="danhmuc">Danh mục</a></li>
                <li class="breadcrumb-item active">Thêm danh mục</li>
            </ol>
            <div id="clock"></div>
        </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo mới danh mục</h3>
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a href="?mod=loaisanpham&act=add" class="btn btn-add btn-sm"><i class="bx bxs-comment-add"></i> Thêm thương hiệu</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="?mod=sanpham&act=add" class="btn btn-add btn-sm"><i class="bx bxs-comment-add"></i>
                                Thêm sản phẩm mới</a>
                        </div>
                    </div>
                    <form class="row" action="./?mod=danhmuc&act=store" method="POST" role="form" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <label class="control-label">Mã sản phẩm </label>
                            <input class="form-control" type="number" name="MaDM" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Tên danh mục</label>
                            <input class="form-control" name="TenDM" type="text">
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Ảnh danh mục</label>
                            <div id="myfileupload">
                                <input type="hidden" id="uploadfile" name="HinhAnh" />
                            </div>
                            <div id="thumbbox">
                                <img height="600" width="600" alt="Thumb image" id="thumbimage" style="display: none" />
                                <a class="removeimg" href="javascript:"></a>
                            </div>
                            <div id="boxchoice">
                                <a href="javascript:" class="Choicefile" id="Choicefile"><i class="bx bxs-image-add"></i> Chọn
                                    ảnh</a>
                                <p style="clear:both"></p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success w-25 m-auto">Thêm</button>
                    </form>
                </div>
            </div>
</main>

<script>
    const choiceFile = document.getElementById("Choicefile");
    const thumbimage = document.getElementById("thumbimage")
    const uploadfile = document.getElementById("uploadfile")
    choiceFile.addEventListener("click", () => {
        console.log("click")
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
</script>