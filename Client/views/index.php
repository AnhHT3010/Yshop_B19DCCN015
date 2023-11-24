<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YShop - điện thoại, laptop, tablet, phụ kiện chính hãng</title>
    <link rel="shortcut icon" type="image/ico" href="../Client/public/assets/images/logo_icon.ico" />
    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon" sizes="20x20" href="Client/public/assets/images/logo-footer.png">
    <link rel="icon" type="image/png" sizes="10x10" href="Client/public/assets/images/logo-footer.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Client/public/assets/images/logo-footer.png">
    <link rel="manifest" href="Client/public/assets/images/logo-footer.png">
    <link rel="mask-icon" href="Client/public/assets/images/logo-footer.png" color="#666666">
    <meta name="application-name" content="meta">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="Client/public/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="Client/public/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="Client/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Client/public/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="Client/public/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="Client/public/assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="Client/public/assets/css/style.css">
    <!-- Main CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="Client/public/assets/css/plugins/nouislider/nouislider.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="Client/public/assets/css/scrollbar.css">
</head>

<body>
    <div class="page-wrapper">
        <?php require_once("header-footer/header.php"); ?>
        <?php if (isset($_COOKIE['msg-error'])) { ?>
            <div class="alert alert-msg">
                <div class="d-flex justify-content-around align-items-center toast-msg toast-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <div class="mx-2">
                        <strong>Thông báo: </strong> <?= $_COOKIE['msg-error'] ?>
                    </div>
                    <i class="fa-solid fa-x" id="cancel"></i>
                </div>
            </div>
        <?php } ?>
        <?php if (isset($_COOKIE['msg-info'])) { ?>
            <div class="alert alert-msg">
                <div class="d-flex justify-content-around align-items-center toast-msg toast-info">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <div class="mx-2">
                        <strong>Thông báo: </strong><?= $_COOKIE['msg-info'] ?>
                    </div>
                    <i class="fa-solid fa-x" id="cancel"></i>
                </div>
            </div>
        <?php } ?>
        <?php if (isset($_COOKIE['msg-warning'])) { ?>
            <div class="alert alert-msg">
                <div class="d-flex justify-content-around align-items-center toast-msg toast-warning">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <div class="mx-2">
                        <strong>Thông báo: </strong><?= $_COOKIE['msg-warning'] ?>
                    </div>
                    <i class="fa-solid fa-x" id="cancel"></i>
                </div>
            </div>
        <?php } ?>
        <?php if (isset($_COOKIE['msg-success'])) { ?>
            <div class="alert alert-msg">
                <div class="d-flex justify-content-around align-items-center toast-msg toast-success">
                    <i class="fa-regular fa-circle-check"></i>
                    <div class="mx-2">
                        <strong>Thông báo: </strong><?= $_COOKIE['msg-success'] ?>
                    </div>
                    <i class="fa-solid fa-x" id="cancel"></i>
                </div>
            </div>
        <?php } ?>
        <?php require_once("dieuhuong.php"); ?>

        <?php require_once("header-footer/footer.php"); ?>
    </div>
    <script>
        let iconCancel = document.querySelector("#cancel");
        let alert = document.querySelector(".alert-msg");
        console.log(alert)
        iconCancel.addEventListener('click', () => {
            console.log("click")
            alert.style.display = 'none';
        });
    </script>
    <script src="//static.filestackapi.com/filestack-js/3.x.x/filestack.min.js"></script>
    <!-- Plugins JS File -->
    <script src="Client/public/assets/js/jquery.min.js"></script>
    <script src="Client/public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="Client/public/assets/js/jquery.hoverIntent.min.js"></script>
    <script src="Client/public/assets/js/jquery.waypoints.min.js"></script>
    <script src="Client/public/assets/js/superfish.min.js"></script>
    <script src="Client/public/assets/js/owl.carousel.min.js"></script>
    <script src="Client/public/assets/js/bootstrap-input-spinner.js"></script>
    <script src="Client/public/assets/js/jquery.plugin.min.js"></script>
    <script src="Client/public/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="Client/public/assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="Client/public/assets/js/main.js"></script>
    <script src="Client/public/assets/js/jquery.elevateZoom.min.js"></script>
</body>