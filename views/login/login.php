<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div style="background-image: url('https://png.pngtree.com/thumb_back/fh260/back_our/20190621/ourmid/pngtree-black-atmosphere-home-life-password-lock-smart-lock-full-screen-poster-image_188879.jpg') ; background-size: cover;">
        <div class="login-page bg-image5 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17">
            <?php if (isset($_COOKIE['msg'])) { ?>
                <div class="alert alert-msg">
                    <div class="d-flex justify-content-around align-items-center toast-msg">
                        <i class="fa-solid fa-circle-exclamation" style="color: red"></i>
                        <div class="mx-2">
                            <strong>Notify:</strong> <?= $_COOKIE['msg'] ?>
                        </div>
                        <i class="fa-solid fa-x" id="cancel"></i>
                    </div>
                </div>
            <?php } ?>
            <?php if (isset($_COOKIE['success'])) { ?>
                <div class="alert alert-msg">
                    <div class="d-flex justify-content-around align-items-center toast-msg" style="background-color: #38e439;">
                        <i class="fa-solid fa-circle-check" style="color: green"></i>
                        <div class=" mx-2">
                            <strong>Notify:</strong> <?= $_COOKIE['success'] ?>
                        </div>
                        <i class="fa-solid fa-x" id="cancel"></i>
                    </div>
                </div>
            <?php } ?>
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                <form action="login" id="form1" method="post" role="form">
                                    <div class="form-group">
                                        <label for="singin-email-2">Username or email address *</label>
                                        <input type="text" class="form-control" id="singin-email-2" name="taikhoan" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password-2">Password *</label>
                                        <input type="password" class="form-control" id="singin-password-2" name="matkhau" required>
                                    </div><!-- End .form-group -->

                                    <a href="#" class="forgot-link">Forgot Your Password?</a>
                                    <div class="form-footer">
                                        <button for="form1" name="submit" type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                            <label class="custom-control-label" for="signin-remember-2">Remember
                                                Me</label>
                                        </div><!-- End .custom-checkbox -->

                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                <!-- Xử lý đăng ký điều hướng route -->
                                <form action="./?act=taikhoan&xuli=dangky" method="post" role="form" id="form2">

                                    <div class="form-group">
                                        <label for="register-email">First Name *</label>
                                        <input type="text" name="Ho" class="form-control" id="register-email" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-email">Last Name *</label>
                                        <input type="text" name="Ten" class="form-control" id="register-email" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-password">User name *</label>
                                        <input type="text" name="TaiKhoan" class="form-control" id="register-password" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-password">Email address *</label>
                                        <input type="email" name="Email" class="form-control" id="register-password" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-password">Password *</label>
                                        <input type="password" name="MatKhau" class="form-control" id="register-password" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-password">Confirm new password *</label>
                                        <input type="password" name="check_password" class="form-control" id="register-password" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-footer">
                                        <button for="form2" type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="1" name="TrangThai" class="custom-control-input" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">I agree to the
                                                <a href="#">privacy policy</a> *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </div>
</main><!-- End .main -->
<script>
    let iconCancel = document.querySelector("#cancel");
    let alert = document.querySelector(".alert-msg");
    console.log(alert)
    iconCancel.addEventListener('click', () => {
        console.log("click")
        alert.style.display = 'none';
    });
</script>