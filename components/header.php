<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$currentScript = str_replace('\\', '/', $_SERVER['PHP_SELF'] ?? '');
if ($currentPage === 'property-details.php' || str_contains($currentScript, '/property-details/')) {
    $currentPage = 'properties.php';
}
$assetBasePath = isset($assetBasePath) ? rtrim($assetBasePath, '/') . '/' : '';
$siteBasePath = isset($siteBasePath) ? rtrim($siteBasePath, '/') . '/' : '';
?>

<!-- Main Header -->
            <header id="header" class="main-header header-fixed fixed-header">
                <!-- Header Lower -->
               <div class="container">
                 <div class="header-lower">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="inner-header">
                                <div class="inner-header-left">
                                    <div class="logo-box flex">
                                        <div class="logo"><a href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>index.php"><img src="<?php echo htmlspecialchars($assetBasePath, ENT_QUOTES, 'UTF-8'); ?>images/logo/logo-new.png"
                                                    alt="logo" width="166" height="48"></a></div>
                                    </div>
                                    <div class="nav-outer flex align-center">
                                        <!-- Main Menu -->
                                        <nav class="main-menu show navbar-expand-md">
                                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                                <ul class="navigation clearfix">
                                                    <li class="home <?php echo $currentPage === 'index.php' ? 'current' : ''; ?>"><a href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>index.php">Home</a>
                                                    </li>
                                                    <li class="<?php echo $currentPage === 'about.php' ? 'current' : ''; ?>"><a href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>about.php">About</a>
                                                    </li>
                                                    <!-- <li class="<?php echo $currentPage === 'contact.php' ? 'current' : ''; ?>"><a href="contact.php">Contact</a>
                                                    </li> -->
                                                    <li class="<?php echo $currentPage === 'gallery.php' ? 'current' : ''; ?>"><a href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>gallery.php">Gallery</a>
                                                    </li>
                                                    <li class="<?php echo $currentPage === 'properties.php' ? 'current' : ''; ?>"><a href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>properties.php">Properties</a>
                                                    </li>
                                                    <!-- <li class=""><a href="blogs.php">Blogs</a>
                                                    </li> -->

                                                    <!-- <li class="dropdown2"><a href="#">Dashboard</a>
                                                        <ul>
                                                            <li><a href="dashboard.html">Dashboard</a></li>
                                                            <li><a href="my-property.html">My Properties</a></li>
                                                            <li><a href="message.html">Message</a></li>
                                                            <li><a href="my-favorites.html">My Favorites</a></li>
                                                            <li><a href="reviews.html">Reviews</a></li>
                                                            <li><a href="my-profile.html">My Profile</a></li>
                                                            <li><a href="add-property.html">Add Property</a></li>
                                                        </ul>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </nav>
                                        <!-- Main Menu End-->
                                    </div>
                                </div>
                                <div class="inner-header-right header-account">
                                    
                                    <div class="flat-bt-top">
                                        <a class="tf-btn primary" href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>contact.php">
                                            Contact
                                        </a>
                                    </div>
                                </div>

                                <div class="mobile-nav-toggler mobile-button"><span></span></div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Header Lower -->

                <!-- Mobile Menu  -->
                <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
                <div class="mobile-menu">
                    <div class="menu-backdrop"></div>
                    <nav class="menu-box">
                        <div class="nav-logo"><a href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>index.php"><img src="<?php echo htmlspecialchars($assetBasePath, ENT_QUOTES, 'UTF-8'); ?>images/logo/logo-new.png" alt="nav-logo"
                                    width="174" height="44"></a></div>
                        <div class="bottom-canvas">
                            <!-- <div class="login-box flex align-center">
                                <a href="#modalLogin" data-bs-toggle="modal">Login</a>
                                <span>/</span>
                                <a href="#modalRegister" data-bs-toggle="modal">Register</a>
                            </div> -->
                            <div class="menu-outer"></div>
                            <div class="button-mobi-sell">
                                <a class="tf-btn primary" href="contact.php">Contact us</a>
                            </div>
                            <!-- <div class="mobi-icon-box">
                                <div class="box d-flex align-items-center">
                                    <span class="icon icon-phone2"></span>
                                    <div>1-333-345-6868</div>
                                </div>
                                <div class="box d-flex align-items-center">
                                    <span class="icon icon-mail"></span>
                                    <div>themesflat@gmail.com</div>
                                </div>
                            </div> -->
                        </div>
                    </nav>
                </div>
                <!-- End Mobile Menu -->
               </div>

            </header>
            <!-- End Main Header -->