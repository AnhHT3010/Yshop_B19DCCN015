<header class="header header-intro-clearance header-4">
    <div class="header-top">
        <div class="container">
            <!-- <div class="header-left">
                <a href="">Q&A</a>
            </div> -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">USD<i class="fa-solid fa-chevron-down pl-1"></i></a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">Eur</a></li>
                                            <li><a href="#">Usd</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div>
                            </li>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">English<i class="fa-solid fa-chevron-down pl-1"></i></a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Spanish</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div>
                            </li>
                            <li>
                                <a href="accordions">Accordions</a>
                            </li>
                            <li>
                                <a href="wishlist"> Wishlist</a>
                            </li>
                            <li><a href="comingsoon">Coming Soon</a></li>
                            <li><a href="blogs">24h Technology</a></li>

                            <li>
                                <div class="header-dropdown">
                                    <a href="#">Contact<i class="fa-solid fa-chevron-down pl-1"></i></a>

                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="about">About</a></li>
                                            <li><a href="contact">Contact</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div>
                            </li>
                            <li>
                                <?php if (isset($_SESSION['isLogin_Admin'])) { ?>
                            <li><a href="./?act=taikhoan&xuli=dangxuat">Sign Out</a></li>
                        <?php } ?>
                    </li>
                </ul>
                </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->

        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="." class="logo">
                    <img src="public/assets/images/logo.png" alt="YShop Logo" width="220" height="120">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="fa-brands fa-searchengin"></i></a>
                    <form action="./?act=shop" method="post">

                        <div class="header-search-wrapper search-wrapper-wide">
                            <button class="btn btn-primary" type="submit"><i class="fa-brands fa-searchengin"></i></button>
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="keyword" required id="q" placeholder="Search in ...">
                            <div style="flex: 0 0 160px;" class="select-custom">
                                <i class="fa-solid fa-arrow-down"></i>
                                <select style="background: none; border-radius: 3rem;color: #333; font-weight: 500;" id="cat" name="searchcategory">
                                    <div>
                                        <option value="" style="color: #333; font-weight: 500;">Categories</option>
                                        <i class="fa-solid fa-arrow-down"></i>
                                    </div>
                                    <?php
                                    $i = 1;
                                    foreach ($data_catalogdetails as $row) : ?>
                                        <!-- <option style="font-size: 1.5rem; color:#39f" disabled value=""><?= $data_categories[$i - 1]['TenDM'] ?></option> -->
                                        <?php foreach ($row as $value) { ?>
                                            <option value="<?= $value['TenLSP'] ?>"><?= $value['TenLSP'] ?></option>
                                        <?php  } ?>
                                    <?php $i++;
                                    endforeach; ?>
                                    <?php
                                    $i = 1;
                                    // print_r($data_brands);
                                    foreach ($data_brands as $row) : ?>
                                        <li><a href="#"><?= $data_categories[$i - 1]['TenDM'] ?></a>;
                                            <?php foreach ($row as $value) {
                                                if ($value != NULL) { ?>
                                                    <option value="<?= $value['TenLSP'] ?>"><?= $value['TenLSP'] ?></option>
                                            <?php }
                                            } ?>
                                        </li>
                                    <?php $i++;
                                    endforeach; ?>
                                </select>
                            </div><!-- End .select-custom -->


                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>
            <div class="header-right">
                <div class="dropdown compare-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                        <?php if (isset($_SESSION['isLogin'])) { ?>
                            <?php if (isset($_SESSION['login']['HinhAnh']) or $_SESSION['login']['HinhAnh'] != '') { ?>
                                <img style="box-shadow: inset 0 -2em 0em rgb(0 154 200 / 50%), 0 0 0 1px white" src="<?= $_SESSION['login']['HinhAnh'] ?>" width="50px" class="rounded-circle" />
                            <?php } else { ?>
                                <img src="https://icons.iconarchive.com/icons/papirus-team/papirus-status/512/avatar-default-icon.png" alt="avatar" width="50px" class="rounded-circle" />
                            <?php } ?>
                            <p style="color: black; font-weight: 500; font-size: 1.5rem"><?= $_SESSION['login']['Ho'] ?>
                                <?= $_SESSION['login']['Ten'] ?></p>
                        <?php } else { ?>
                            <a href="account" style="color: black; font-weight: 500;"><i class="fa-solid fa-user"></i><span>Login</span></a>
                        <?php } ?>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right rounded">
                        <ul class="compare-products">
                            <li class="compare-product">

                                <?php if (isset($_SESSION['isLogin'])) {
                                } else { ?>
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="fa-solid fa-arrow-right"></i></a>
                                    <h4 class="compare-product-title"><a href="account">Login</a></h4>
                                <?php } ?>
                            </li>
                            <li class="compare-product">
                                <a href="./personal" class="btn-remove" title="Remove Product"><i class="fa-solid fa-arrow-right"></i></a>
                                <h4 class="compare-product-title"><a href="personal">My account</a></h4>
                            </li>
                        </ul>
                        <?php if (isset($_SESSION['isLogin'])) { ?>

                            <div class="compare-actions">
                                <a href="./?act=taikhoan&xuli=dangxuat" class="btn btn-outline-primary-2"><span>Logout</span><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                            </div>
                        <?php }  ?>

                    </div><!-- End .dropdown-menu -->
                </div><!-- End .compare-dropdown -->
                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <?php if (count($data_cart)) { ?>
                                <?php if (isset($data_cart)) { ?>
                                    <span class="cart-count border border-dark" style="box-shadow:inset 0 -3em 3em rgb(200 0 0 / 50%), 0 0 0 2px white, 0.3em 0.3em 1em rgb(255 0 0 / 60%);">
                                    <?php echo count($data_cart);
                                } ?></span>
                                <?php } ?>
                        </div>
                        <p style="font-size: 1.5rem; padding-top: 5px; color: white; font-weight: 500; display:inline">
                            Cart</p>
                    </a>
                    <?php if (count($data_cart)) { ?>
                        <div class="dropdown-menu dropdown-menu-right">

                            <div class="dropdown-cart-products">
                                <?php $thanhtien = 0;
                                if (isset($data_cart) && is_array($data_cart)) {
                                    foreach ($data_cart as $value) { ?>
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="<?= $value['MaSP'] ?>.html"><?= $value['TenSP'] ?></a>
                                                </h4>
                                                <?php $thanhtien += $value['SoLuongTrongGio'] * $value['DonGia']; ?>
                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty"><?= $value['SoLuongTrongGio'] ?></span>
                                                    x <?= number_format($value['DonGia']) ?> đ
                                                </span>
                                            </div>

                                            <figure class="product-image-container">
                                                <a href="<?= $value['MaSP'] ?>.html" class="product-image">
                                                    <img class="rounded" src="<?= $value['AnhDaiDien'] ?>" alt="product">
                                                </a>
                                            </figure>
                                            <a href="./?act=cart&xuli=deleteAll&id=<?= $value['MaSP'] ?>" class="btn-remove" title="Remove Product"><i class="fa-solid fa-xmark"></i></a>
                                        </div>
                                <?php }
                                } ?>
                            </div>

                            <div class="dropdown-cart-total">
                                <span>Tổng tiền: </span>

                                <span class="cart-total-price"> <?= number_format($thanhtien) ?> đ</span>
                            </div>

                            <div class="dropdown-cart-action">
                                <a href="cart" class="btn btn-outline-primary-2">Xem Giỏ Hàng</a>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
    <div class="mb-2"></div>
    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                        <i class="fa-solid fa-bars" style="left: 3rem;"></i>
                        Browse Categories
                        <i class="fa-solid fa-chevron-down pl-1"></i>
                    </a>

                    <div class="dropdown-menu">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                                <li class="item-lead"><a href="#">Daily offers</a></li>
                                <li class="item-lead"><a href="#">Gift Ideas</a></li>

                                <?php
                                $i = 1;
                                // print_r($data_brands);
                                foreach ($data_brands as $row) : ?>
                                    <li><a href="#"><?= $data_categories[$i - 1]['TenDM'] ?></a>;
                                        <?php foreach ($row as $value) {
                                            if ($value != NULL) { ?>
                                                <ul class="">
                                                    <?php foreach ($row as $value) { ?>
                                                        <li><a href=""><?= $value['TenLSP'] ?></a></li>
                                                    <?php } ?>
                                                </ul><!-- End .menu-vertical -->
                                        <?php }
                                        } ?>
                                    </li>
                                <?php $i++;
                                endforeach; ?>
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .header-left -->
            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <?php for ($i = 0; $i < 5; $i++) { ?>
                            <li class="megamenu-container">
                                <a href="type-product-categoris-<?= $data_categories[$i]['MaDM'] ?>">
                                    <?= $data_categories[$i]['TenDM'] ?></a>
                            </li>
                        <?php } ?>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->
        </div><!-- End .header-bottom -->
</header><!-- End .header -->