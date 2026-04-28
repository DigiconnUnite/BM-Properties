<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta charset="utf-8">
    <title>About BM Properties: Trusted Real Estate Experts</title>
    <meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap">
    <meta name="description" content="Learn about BM Properties, your trusted partner in real estate. We provide transparent, reliable, and customer-focused property solutions for buying, selling, and renting.">

    <meta name="author" content="BM Properties">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php include 'components/links.php';?>

</head>

<body class="body">


        <?php include 'components/loader.php';?>

    <div id="wrapper">
        <div id="pagee" class="clearfix">
            <?php include 'components/header.php';?>

            <!-- Page Title -->
            <section class="flat-title-page" style="background-image: url(images/breadcrumb/about.webp);">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li><a href="index.php" class="text-white">Home</a></li>
                            <li class="text-white">/ About</li>
                        </ul>
                        <h1 class="text-center text-white title">About us</h1>
                    </div>
                </div>
            </section>
            <!-- End Page Title -->

            <section class="flat-section about-welcome-section">
                <div class="container">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-6">
                            <div class="about-welcome-content">
                                <div class="text-subtitle text-primary">About BM Properties</div>
                                <h1 class="about-welcome-title">Welcome to the BM Properties</h1>
                                <p class="about-welcome-desc">BM Properties is dedicated to simplifying the property search experience by connecting buyers with reliable and well-planned real estate projects. With a strong presence in growing locations, we focus on offering under-construction and investment-friendly properties that match modern lifestyle needs as well as future growth expectations. Our goal is to make property buying smooth, transparent, and trustworthy for every client.</p>
                                <p class="about-welcome-desc">We believe that real estate is more than just land or buildings and about creating spaces where people build their future. that's why we carefully select projects that offer good location advantages, planned infrastructure, and long-term value. Whether you are looking for a residential plot, a family home, or an investment opportunity, we ensure that every option we present meets quality and reliability standards.</p>
                                <a href="contact.php" class="tf-btn btn-view primary hover-btn-view">
                                    Contact us
                                    <span class="icon icon-arrow-right2"></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-welcome-image-wrap">
                                <img src="images/about/about2.webp" alt="Luxury property showcase">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
             <!-- Service -->
            <section class="flat-section bg-primary-new">
                <div class="container">
                    <div class="box-title text-center wow fadeInUp">
                        <div class="text-subtitle text-primary">Our Services</div>
                        <h3 class="mt-4 title">Property Services You Can Trust</h3>
                    </div>
                    <div class="tf-grid-layout md-col-3 wow fadeInUp" data-wow-delay=".2s">
                        <div class="box-service">
                            <div class="image">
                                <img class="lazyload" data-src="images/service/home-1.webp"
                                    src="images/service/home-1.webp" alt="image-location">
                            </div>
                            <div class="content">
                                <h5 class="title">Buy A New Home</h5>
                                <p class="description">Find your dream home with ease through our wide range of verified properties. We provide expert guidance, helping you choose the right property that fits your lifestyle, budget, and future goals.</p>
                                <!-- <a href="sidebar-grid.html" class="tf-btn btn-line">Learn More <span
                                        class="icon icon-arrow-right2"></span></a> -->
                            </div>
                        </div>
                        <div class="box-service">
                            <div class="image">
                                <img class="lazyload" data-src="images/service/home-2.webp"
                                    src="images/service/home-2.webp" alt="image-location">
                            </div>
                            <div class="content">
                                <h5 class="title">Sell a home</h5>
                                <p class="description">Sell your property with confidence using our trusted approach and market expertise. We ensure proper exposure, the right pricing strategy, and smooth transactions for the best results.</p>
                                <!-- <a href="sidebar-grid.html" class="tf-btn btn-line">Learn More <span
                                        class="icon icon-arrow-right2"></span></a> -->
                            </div>
                        </div>
                        <div class="box-service">
                            <div class="image">
                                <img class="lazyload" data-src="images/service/home-3.webp"
                                    src="images/service/home-3.webp" alt="image-location">
                            </div>
                            <div class="content">
                                <h5 class="title">Rent a home</h5>
                                <p class="description">Discover rental properties that match your needs, whether for living or business. We offer flexible options and a hassle-free process to help you find the perfect space quickly.</p>
                                <!-- <a href="sidebar-grid.html" class="tf-btn btn-line">Learn More <span
                                        class="icon icon-arrow-right2"></span></a> -->
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- End Service -->


            <?php $trustedSectionClass = 'flat-section about-partners'; include 'components/trusted-partners-section.php'; unset($trustedSectionClass); ?>
            <?php if (false): ?>
              <!-- partner -->
            <section class="flat-section">
                <div class="container2">
                    <h6 class="mb-20 text-center text-capitalize text-black-4">Trusted by over 20+ major companies</h6>
                    <div dir="ltr" class="swiper tf-sw-partner" data-preview="6" data-tablet="4" data-mobile-sm="3" data-mobile="3" data-space="15" data-space-md="30" data-space-lg="30" data-loop="true" data-autoplay="true" data-delay="0">
                        <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/ahinsa.webp" src="images/partners/ahinsa.webp" alt="Ahinsa" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/corporate-park.webp" src="images/partners/corporate-park.webp" alt="Corporate Park" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/landmark-city.webp" src="images/partners/landmark-city.webp" alt="Landmark City" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/lodha.webp" src="images/partners/lodha.webp" alt="Lodha" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/upsic.webp" src="images/partners/upsic.webp" alt="UPSIC" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/ahinsa.webp" src="images/partners/ahinsa.webp" alt="Ahinsa" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/corporate-park.webp" src="images/partners/corporate-park.webp" alt="Corporate Park" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/landmark-city.webp" src="images/partners/landmark-city.webp" alt="Landmark City" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/lodha.webp" src="images/partners/lodha.webp" alt="Lodha" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/upsic.webp" src="images/partners/upsic.webp" alt="UPSIC" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <!-- End partner -->
            <?php endif; ?>
             <!-- Location -->
              <section class="flat-slider-detail-v1 px-10">
                <div class="box-title text-center wow fadeInUp">
                    <div class="text-subtitle text-primary">Gallery</div>
                    <h3 class="mt-4 title">Project Gallery</h3>
                </div>
                <?php
                $galleryItems = get_gallery_items(true);
                $topGalleryItems = array_slice($galleryItems, 0, 6);
                ?>
                <div dir="ltr" class="swiper tf-sw-location" data-preview="3" data-tablet="2" data-mobile-sm="2"
                    data-mobile="1" data-space-lg="10" data-space-md="10" data-space="10" data-pagination="1"
                    data-pagination-sm="2" data-pagination-md="2" data-pagination-lg="3" data-loop="true"
                    data-autoplay="true" data-delay="2800">
                    <div class="swiper-wrapper">
                        <?php foreach ($topGalleryItems as $galleryItem): ?>
                            <div class="swiper-slide">
                                <?php
                                $imagePath = (string) ($galleryItem['image_path'] ?? '');
                                $imageSrc = preg_match('/^https?:\/\//i', $imagePath) ? $imagePath : $imagePath;
                                ?>
                                <a href="<?php echo htmlspecialchars($imageSrc, ENT_QUOTES, 'UTF-8'); ?>" data-fancybox="gallery"
                                    class="box-img-detail d-block">
                                    <img src="<?php echo htmlspecialchars($imageSrc, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars((string) $galleryItem['title'], ENT_QUOTES, 'UTF-8'); ?>">
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <?php if (count($topGalleryItems) === 0): ?>
                            <!-- Fallback to static images if no gallery items exist -->
                            <div class="swiper-slide">
                                <a href="images/gallery/dream-avenues.webp" data-fancybox="gallery"
                                    class="box-img-detail d-block">
                                    <img src="images/gallery/dream-avenues.webp" alt="img-property">
                                </a>
                            </dwebp
                            <div class="swiper-slide">
                                <a href="images/gallery/landmark-city.webp" data-fancybox="gallery"
                                    class="box-img-detail d-block">
                                    <img src="images/gallery/landmark-city.webp" alt="img-property">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="images/gallery/the-grand-valley.webp" data-fancybox="gallery"
                                    class="box-img-detail d-block">
                                    <img src="images/gallery/the-grand-valley.webp" alt="img-property">
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- <div class="box-navigation">
                        <div class="navigation swiper-nav-next nav-next-location"><span class="icon icon-arr-l"></span></div>
                        <div class="navigation swiper-nav-prev nav-prev-location"><span class="icon icon-arr-r"></span></div> 
                    </div> -->
                    <div class="sw-pagination sw-pagination-location text-center"></div>
                </div>
            </section>
            <!-- End Location -->

            <?php include 'components/footer.php'; ?>
        </div>
        <!-- /#page -->

    </div>

    <!-- go top -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;">
            </path>
        </svg>
    </div>
    <?php include 'components/script.php'; ?>

</body>
</html>
