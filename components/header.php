<?php
require_once __DIR__ . '/../includes/app.php';

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
                                <div class="logo"><a
                                        href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>index.php"><img
                                            src="<?php echo htmlspecialchars($assetBasePath, ENT_QUOTES, 'UTF-8'); ?>images/logo/logo-new.png"
                                            alt="logo" width="166" height="48"></a></div>
                            </div>
                            <div class="nav-outer flex align-center">
                                <!-- Main Menu -->
                                <nav class="main-menu show navbar-expand-md">
                                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                        <ul class="navigation clearfix">
                                            <li
                                                class="home <?php echo $currentPage === 'index.php' ? 'current' : ''; ?>">
                                                <a
                                                    href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>index.php">Home</a>
                                            </li>
                                            <li class="<?php echo $currentPage === 'about.php' ? 'current' : ''; ?>"><a
                                                    href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>about.php">About</a>
                                            </li>
                                            <!-- <li class="<?php echo $currentPage === 'contact.php' ? 'current' : ''; ?>"><a href="contact.php">Contact</a>
                                                    </li> -->
                                            <li class="<?php echo $currentPage === 'gallery.php' ? 'current' : ''; ?>">
                                                <a
                                                    href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>gallery.php">Gallery</a>
                                            </li>
                                            <li
                                                class="<?php echo $currentPage === 'properties.php' ? 'current' : ''; ?>">
                                                <a
                                                    href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>properties.php">Properties</a>
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
                            <button type="button" class="tf-btn primary header-enquiry-btn"
                                data-enquiry-open="1">Enquiry</button>
                            <div class="flat-bt-top">
                                <a class="tf-btn primary"
                                    href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>contact.php">
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
                <div class="nav-logo"><a
                        href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>index.php"><img
                            src="<?php echo htmlspecialchars($assetBasePath, ENT_QUOTES, 'UTF-8'); ?>images/logo/logo-new.png"
                            alt="nav-logo" width="174" height="44"></a></div>
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
                    <div class="button-mobi-sell mt-12">
                        <button type="button" class="tf-btn primary header-enquiry-btn" data-enquiry-open="1">Quick
                            Enquiry</button>
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

<div class="enquiry-modal" id="enquiryModal" aria-hidden="true">
    <div class="enquiry-modal-backdrop" data-enquiry-close="1"></div>
    <div class="enquiry-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="enquiryModalTitle">
        <button type="button" class="enquiry-modal-close" data-enquiry-close="1" aria-label="Close">×</button>
        <h4 id="enquiryModalTitle">Start posting your property, it's free</h4>
        <p class="enquiry-subtitle">Add Basic Details</p>

        <form method="post"
            action="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>enquiry-submit.php"
            class="enquiry-form-grid">
            <input type="hidden" name="csrf_token"
                value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
            <input type="hidden" name="source" value="header-modal">
            <input type="hidden" name="return_url"
                value="<?php echo htmlspecialchars(basename((string) ($_SERVER['PHP_SELF'] ?? 'index.php')), ENT_QUOTES, 'UTF-8'); ?>">

            <div class="enquiry-form-full">
                <label class="enquiry-label">You're looking to ...</label>
                <div class="enquiry-choice-row">
                    <label><input type="radio" name="looking_to" value="sell" checked> <span>Sell</span></label>
                    <label><input type="radio" name="looking_to" value="rent"> <span>Rent / Lease</span></label>
                    <label><input type="radio" name="looking_to" value="pg"> <span>PG</span></label>
                </div>
            </div>

            <div class="enquiry-form-full">
                <label class="enquiry-label">And it's a ...</label>
                <div class="enquiry-choice-row">
                    <label><input type="radio" name="property_group" value="residential" checked>
                        <span>Residential</span></label>
                    <label><input type="radio" name="property_group" value="commercial"> <span>Commercial</span></label>
                </div>
            </div>

            <div class="enquiry-form-full">
                <label for="enquiry-property-type" class="enquiry-label">Property Type</label>
                <input type="text" id="enquiry-property-type" class="form-control" name="property_type"
                    value="Flat/Apartment" maxlength="100" required>
            </div>

            <div>
                <label for="enquiry-name" class="enquiry-label">Full Name</label>
                <input type="text" id="enquiry-name" class="form-control" name="full_name" required maxlength="140"
                    minlength="2">
            </div>
            <div>
                <label for="enquiry-phone" class="enquiry-label">Phone Number</label>
                <input type="tel" id="enquiry-phone" class="form-control" name="phone" required pattern="[0-9]{10,15}"
                    minlength="10" maxlength="15">
            </div>
            <div>
                <label for="enquiry-email" class="enquiry-label">Email</label>
                <input type="email" id="enquiry-email" class="form-control" name="email" required maxlength="120">
            </div>
            <div>
                <label for="enquiry-subject" class="enquiry-label">Subject</label>
                <input type="text" id="enquiry-subject" class="form-control" name="subject" value="Property Enquiry"
                    maxlength="180" required>
            </div>

            <div class="enquiry-form-full">
                <label for="enquiry-message" class="enquiry-label">Message</label>
                <textarea id="enquiry-message" class="form-control" name="message" rows="3" minlength="10"
                    required></textarea>
            </div>

            <div class="enquiry-form-full">
                <button class="tf-btn primary enquiry-submit-btn" type="submit">Start now</button>
            </div>
        </form>
    </div>
</div>