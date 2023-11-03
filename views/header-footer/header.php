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
                                    <a href="#">USD</a>
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
                                    <a href="#">English</a>
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
                                    <a href="#">Contact</a>
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
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="./?act=shop" method="post">

                        <div class="header-search-wrapper search-wrapper-wide">
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="keyword" required id="q" placeholder="Search in ...">
                            <div style="flex: 0 0 160px;" class="select-custom">
                                <select style="background: none; border-radius: 3rem;color: #333; font-weight: 500;" id="cat" name="searchcategory">
                                    <option value="" style="color: #333; font-weight: 500;">Categories</option>
                                </select>
                            </div><!-- End .select-custom -->


                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
    <div class="mb-2"></div>
    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
            </div><!-- End .header-left -->
            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container" class="active">
                            <a href="store">Store</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="categoris-smartphone">Smart Phone</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="categoris-laptop">Laptop</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="categoris-tablet">Tablet</a>
                        </li>
                        <li class="megamenu-container">
                            <a href="categoris-smartwacthes">Smart Watches</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->

            <div class="header-right">
                <?php if (isset($_SESSION['isLogin_Admin'])) { ?>
                    <div class="dropdown compare-dropdown">
                        <a href="AdminConsole" class="dropdown-toggle">
                            <div class="icon">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            <p>MANAGEMENT PAGE</p>
                        </a>
                    </div><!-- End .compare-dropdown -->
                <?php } else { ?>
                    <div class="dropdown compare-dropdown">
                        <a href="login" class="dropdown-toggle d-flex flex-row justify-content-center align-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                            <i class="fa-regular fa-user"></i>
                            <?php if (isset($_SESSION['isLogin'])) { ?>
                                <p><?= $_SESSION['login']['Ho'] ?> <?= $_SESSION['login']['Ten'] ?></p>
                            <?php } else { ?>
                                <p>Login</p>
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="compare-products">
                                <li class="compare-product">

                                    <?php if (isset($_SESSION['isLogin'])) {
                                    } else { ?>
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="fa-solid fa-xmark"></i></a>
                                        <h4 class="compare-product-title"><a href="login">Login</a></h4>
                                    <?php } ?>
                                </li>
                                <li class="compare-product">
                                    <a href="./personal" class="btn-remove" title="Remove Product"><i class="fa-solid fa-xmark"></i></a>
                                    <h4 class="compare-product-title"><a href="personal">My account</a></h4>
                                </li>
                            </ul>

                            <div class="compare-actions">
                                <a href="./?act=taikhoan&xuli=dangxuat" class="btn btn-outline-primary-2"><span>Logout</span><i class="icon-long-arrow-right"></i></a>
                            </div>
                        </div><!-- End .dropdown-menu -->
                    <?php } ?>
                    </div>
            </div><!-- End .container -->
        </div><!-- End .header-bottom -->
</header><!-- End .header -->