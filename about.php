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
            <section class="flat-title-page" style="background-image: url(images/breadcrumb/about.png);">
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
                                <!-- <div class="about-welcome-signature">
                                    <div class="top">
                                        <h6>Leslie Alexander</h6>
                                        <p class="text-variant-2">CEO & founder</p>
                                    </div>
                                    <img src="images/banner/signature.png" alt="Signature">
                                </div> -->
                                <a href="contact.php" class="tf-btn btn-view primary hover-btn-view">
                                    Contact us
                                    <span class="icon icon-arrow-right2"></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-welcome-image-wrap">
                                <img src="images/about/about2.png" alt="Luxury property showcase">
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
                                <img class="lazyload" data-src="images/service/home-1.png"
                                    src="images/service/home-1.png" alt="image-location">
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
                                <img class="lazyload" data-src="images/service/home-2.png"
                                    src="images/service/home-2.png" alt="image-location">
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
                                <img class="lazyload" data-src="images/service/home-3.png"
                                    src="images/service/home-3.png" alt="image-location">
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


            <?php $trustedSectionClass = 'flat-section'; include 'components/trusted-partners-section.php'; unset($trustedSectionClass); ?>
            <?php if (false): ?>
              <!-- partner -->
            <section class="flat-section">
                <div class="container2">
                    <h6 class="mb-20 text-center text-capitalize text-black-4">Trusted by over 20+ major companies</h6>
                    <div dir="ltr" class="swiper tf-sw-partner" data-preview="6" data-tablet="4" data-mobile-sm="3" data-mobile="3" data-space="15" data-space-md="30" data-space-lg="30" data-loop="true" data-autoplay="true" data-delay="0">
                        <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/ahinsa.png" src="images/partners/ahinsa.png" alt="Ahinsa" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/corporate-park.png" src="images/partners/corporate-park.png" alt="Corporate Park" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/landmark-city.png" src="images/partners/landmark-city.png" alt="Landmark City" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/lodha.png" src="images/partners/lodha.png" alt="Lodha" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/upsic.png" src="images/partners/upsic.png" alt="UPSIC" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/ahinsa.png" src="images/partners/ahinsa.png" alt="Ahinsa" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/corporate-park.png" src="images/partners/corporate-park.png" alt="Corporate Park" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/landmark-city.png" src="images/partners/landmark-city.png" alt="Landmark City" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/lodha.png" src="images/partners/lodha.png" alt="Lodha" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="partner-item">
                                <img class="lazyload" data-src="images/partners/upsic.png" src="images/partners/upsic.png" alt="UPSIC" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            <!-- End partner -->
            <?php endif; ?>
             <!-- Location -->
            <!-- <section class="flat-section">
                <div class="container">
                    <div class="box-title text-center wow fadeInUp">
                        <div class="text-subtitle text-primary">Explore Cities</div>
                        <h3 class="mt-4 title">Properties By Cities</h3>
                    </div>
                    <div dir="ltr" class="wow fadeInUp swiper tf-sw-mobile sw-over" data-screen="575" data-preview="1"
                        data-space="15" data-wow-delay=".2s">
                        <div class="tf-layout-mobile-sm sm-col-2 lg-col-3 swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="box-location-v3 hover-img not-overlay hover-btn-view">
                                    <div class="img-style">
                                        <img src="images/location/lo-sm-1.jpg" alt="image-location">
                                    </div>
                                    <div class="content">
                                        <h6><a href="topmap-list.html" class="link">Agra</a></h6>
                                        <p class="mt-4">50 properties</p>
                                        <a href="topmap-list.html" class="btn-view style-1"><span class="text">Explore
                                                Now</span> <span class="icon icon-arrow-right2"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location-v3 hover-img not-overlay hover-btn-view active">
                                    <div class="img-style">
                                        <img src="images/location/lo-sm-2.jpg" alt="image-location">
                                    </div>
                                    <div class="content">
                                        <h6><a href="topmap-list.html" class="link">Delhi</a></h6>
                                        <p class="mt-4">12 properties</p>
                                        <a href="topmap-list.html" class="btn-view style-1"><span class="text">Explore
                                                Now</span> <span class="icon icon-arrow-right2"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location-v3 hover-img not-overlay hover-btn-view">
                                    <div class="img-style">
                                        <img src="images/location/lo-sm-3.jpg" alt="image-location">
                                    </div>
                                    <div class="content">
                                        <h6><a href="topmap-list.html" class="link">Noida</a></h6>
                                        <p class="mt-4">14 properties</p>
                                        <a href="topmap-list.html" class="btn-view style-1"><span class="text">Explore
                                                Now</span> <span class="icon icon-arrow-right2"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location-v3 hover-img not-overlay hover-btn-view">
                                    <div class="img-style">
                                        <img src="images/location/lo-sm-4.jpg" alt="image-location">
                                    </div>
                                    <div class="content">
                                        <h6><a href="topmap-list.html" class="link">Gurugram</a></h6>
                                        <p class="mt-4">18 properties</p>
                                        <a href="topmap-list.html" class="btn-view style-1"><span class="text">Explore
                                                Now</span> <span class="icon icon-arrow-right2"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location-v3 hover-img not-overlay hover-btn-view">
                                    <div class="img-style">
                                        <img src="images/location/lo-sm-5.jpg" alt="image-location">
                                    </div>
                                    <div class="content">
                                        <h6><a href="topmap-list.html" class="link">Lucknow</a></h6>
                                        <p class="mt-4">27 properties</p>
                                        <a href="topmap-list.html" class="btn-view style-1"><span class="text">Explore
                                                Now</span> <span class="icon icon-arrow-right2"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location-v3 hover-img not-overlay hover-btn-view">
                                    <div class="img-style">
                                        <img src="images/location/lo-sm-6.jpg" alt="image-location">
                                    </div>
                                    <div class="content">
                                        <h6><a href="topmap-list.html" class="link">Mathura</a></h6>
                                        <p class="mt-4">25 properties</p>
                                        <a href="topmap-list.html" class="btn-view style-1"><span class="text">Explore
                                                Now</span> <span class="icon icon-arrow-right2"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location-v3 hover-img not-overlay hover-btn-view">
                                    <div class="img-style">
                                        <img src="images/location/lo-sm-7.jpg" alt="image-location">
                                    </div>
                                    <div class="content">
                                        <h6><a href="topmap-list.html" class="link">Seattle</a></h6>
                                        <p class="mt-4">188 properties</p>
                                        <a href="topmap-list.html" class="btn-view style-1"><span class="text">Explore
                                                Now</span> <span class="icon icon-arrow-right2"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location-v3 hover-img not-overlay hover-btn-view">
                                    <div class="img-style">
                                        <img src="images/location/lo-sm-8.jpg" alt="image-location">
                                    </div>
                                    <div class="content">
                                        <h6><a href="topmap-list.html" class="link">Denver</a></h6>
                                        <p class="mt-4">193 properties</p>
                                        <a href="topmap-list.html" class="btn-view style-1"><span class="text">Explore
                                                Now</span> <span class="icon icon-arrow-right2"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location-v3 hover-img not-overlay hover-btn-view">
                                    <div class="img-style">
                                        <img src="images/location/lo-sm-9.jpg" alt="image-location">
                                    </div>
                                    <div class="content">
                                        <h6><a href="topmap-list.html" class="link">Austin</a></h6>
                                        <p class="mt-4">309 properties</p>
                                        <a href="topmap-list.html" class="btn-view style-1"><span class="text">Explore
                                                Now</span> <span class="icon icon-arrow-right2"></span> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sw-pagination sw-pagination-mb text-center d-sm-none d-block"></div>
                        <div class="sec-btn text-center">
                            <a href="topmap-list.html" class="tf-btn btn-view primary size-1 hover-btn-view">View All
                                Cities <span class="icon icon-arrow-right2"></span></a>
                        </div>
                    </div>

                </div>
            </section> -->
            

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
                                <a href="images/gallery/dream-avenues.jpg" data-fancybox="gallery"
                                    class="box-img-detail d-block">
                                    <img src="images/gallery/dream-avenues.jpg" alt="img-property">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="images/gallery/landmark-city.jpg" data-fancybox="gallery"
                                    class="box-img-detail d-block">
                                    <img src="images/gallery/landmark-city.jpg" alt="img-property">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="images/gallery/the-grand-valley.jpg" data-fancybox="gallery"
                                    class="box-img-detail d-block">
                                    <img src="images/gallery/the-grand-valley.jpg" alt="img-property">
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

              <!-- Location -->
            <!-- <section class="px-10">
                <div class="box-title text-center wow fadeInUp">
                    <div class="text-subtitle text-primary">Explore Cities</div>
                    <h3 class="mt-4 title">Our Location For You</h3>
                </div>
                <div class="wow fadeInUp" data-wow-delay=".2s">
                    <div dir="ltr" class="swiper tf-sw-location" data-preview="6" data-tablet="3" data-mobile-sm="2"
                        data-mobile="1" data-space-lg="8" data-space-md="8" data-space="8" data-pagination="1"
                        data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="box-location">
                                    <a href="topmap-grid.html" class="image img-style">
                                        <img class="lazyload" data-src="images/location/location-1.jpg"
                                            src="images/location/location-1.jpg" alt="image-location">
                                    </a>
                                    <div class="content">
                                        <div class="inner-left">
                                            <span class="sub-title fw-6">321 Property</span>
                                            <h6 class="title text-line-clamp-1 link">Naperville</h6>
                                        </div>
                                        <a href="topmap-grid.html" class="box-icon line w-44 round"><i
                                                class="icon icon-arrow-right2"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location">
                                    <a href="topmap-grid.html" class="image img-style">
                                        <img class="lazyload" data-src="images/location/location-2.jpg"
                                            src="images/location/location-2.jpg" alt="image-location">
                                    </a>
                                    <div class="content">
                                        <div class="inner-left">
                                            <span class="sub-title fw-6">321 Property</span>
                                            <h6 class="title text-line-clamp-1 link">Pembroke Pines</h6>
                                        </div>
                                        <a href="topmap-grid.html" class="box-icon line w-44 round"><i
                                                class="icon icon-arrow-right2"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location">
                                    <a href="topmap-grid.html" class="image img-style">
                                        <img class="lazyload" data-src="images/location/location-3.jpg"
                                            src="images/location/location-3.jpg" alt="image-location">
                                    </a>
                                    <div class="content">
                                        <div class="inner-left">
                                            <span class="sub-title fw-6">321 Property</span>
                                            <h6 class="title text-line-clamp-1 link">Toledo</h6>
                                        </div>
                                        <a href="topmap-grid.html" class="box-icon line w-44 round"><i
                                                class="icon icon-arrow-right2"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location">
                                    <a href="topmap-grid.html" class="image img-style">
                                        <img class="lazyload" data-src="images/location/location-4.jpg"
                                            src="images/location/location-4.jpg" alt="image-location">
                                    </a>
                                    <div class="content">
                                        <div class="inner-left">
                                            <span class="sub-title fw-6">321 Property</span>
                                            <h6 class="title text-line-clamp-1 link">Orange</h6>
                                        </div>
                                        <a href="topmap-grid.html" class="box-icon line w-44 round"><i
                                                class="icon icon-arrow-right2"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location">
                                    <a href="topmap-grid.html" class="image img-style">
                                        <img class="lazyload" data-src="images/location/location-5.jpg"
                                            src="images/location/location-5.jpg" alt="image-location">
                                    </a>
                                    <div class="content">
                                        <div class="inner-left">
                                            <span class="sub-title fw-6">321 Property</span>
                                            <h6 class="title text-line-clamp-1 link">Fairfield</h6>
                                        </div>
                                        <a href="topmap-grid.html" class="box-icon line w-44 round"><i
                                                class="icon icon-arrow-right2"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location">
                                    <a href="topmap-grid.html" class="image img-style">
                                        <img class="lazyload" data-src="images/location/location-6.jpg"
                                            src="images/location/location-6.jpg" alt="image-location">
                                    </a>
                                    <div class="content">
                                        <div class="inner-left">
                                            <span class="sub-title fw-6">321 Property</span>
                                            <h6 class="title text-line-clamp-1 link">Naperville</h6>
                                        </div>
                                        <a href="topmap-grid.html" class="box-icon line w-44 round"><i
                                                class="icon icon-arrow-right2"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-location">
                                    <a href="topmap-grid.html" class="image img-style">
                                        <img class="lazyload" data-src="images/location/location-1.jpg"
                                            src="images/location/location-1.jpg" alt="image-location">
                                    </a>
                                    <div class="content">
                                        <div class="inner-left">
                                            <span class="sub-title fw-6">321 Property</span>
                                            <h6 class="title text-line-clamp-1 link">Austin</h6>
                                        </div>
                                        <a href="topmap-grid.html" class="box-icon line w-44 round"><i
                                                class="icon icon-arrow-right2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sw-pagination sw-pagination-location text-center"></div>
   >
                </div>
            </section>  -->
            <!-- End Location
             
            
            < Recommended -->
            <!-- <section class="flat-section flat-recommended">
                <div class="container">
                    <div class="box-title text-center wow fadeInUp">
                        <div class="text-subtitle text-primary">Featured Properties</div>
                        <h3 class="title mt-4">Discover Homelengoâ€™s Finest Properties for Your Dream Home</h3>
                    </div>
                    <div class="flat-tab-recommended flat-animate-tab wow fadeInUp" data-wow-delay=".2s">
                        <ul class="nav-tab-recommended justify-content-md-center" role="tablist">
                            <li class="nav-tab-item" role="presentation">
                                <a href="#viewAll" class="nav-link-item" data-bs-toggle="tab">View All</a>
                            </li>
                            <li class="nav-tab-item" role="presentation">
                                <a href="#apartment" class="nav-link-item  active" data-bs-toggle="tab">Apartment</a>
                            </li>
                            <li class="nav-tab-item" role="presentation">
                                <a href="#villa" class="nav-link-item" data-bs-toggle="tab">Villa</a>
                            </li>
                            <li class="nav-tab-item" role="presentation">
                                <a href="#studio" class="nav-link-item" data-bs-toggle="tab">Studio</a>
                            </li>
                            <li class="nav-tab-item" role="presentation">
                                <a href="#house" class="nav-link-item" data-bs-toggle="tab">House</a>
                            </li>
                            <li class="nav-tab-item" role="presentation">
                                <a href="#office" class="nav-link-item" data-bs-toggle="tab">Office</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="viewAll" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home2/landamrk-city.jpg"
                                                            src="images/home/house-5.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png2.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-30.jpg"
                                                            src="images/home/house-30.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png3.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-1.jpg"
                                                            src="images/home/house-1.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png4.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-23.jpg"
                                                            src="images/home/house-23.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png5.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-15.jpg"
                                                            src="images/home/house-15.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png6.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-6.jpg"
                                                            src="images/home/house-6.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png1.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="sidebar-grid.html"
                                        class="tf-btn btn-view primary size-1 hover-btn-view">View All Properties <span
                                            class="icon icon-arrow-right2"></span></a>
                                </div>
                            </div>
                            <div class="tab-pane active show" id="apartment" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-5.jpg"
                                                            src="images/home/house-5.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png2.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-30.jpg"
                                                            src="images/home/house-30.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png3.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-1.jpg"
                                                            src="images/home/house-1.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png4.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-23.jpg"
                                                            src="images/home/house-23.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png5.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-15.jpg"
                                                            src="images/home/house-15.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png6.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-6.jpg"
                                                            src="images/home/house-6.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png1.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="sidebar-grid.html"
                                        class="tf-btn btn-view primary size-1 hover-btn-view">View All Properties <span
                                            class="icon icon-arrow-right2"></span></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="villa" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-5.jpg"
                                                            src="images/home/house-5.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png2.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-30.jpg"
                                                            src="images/home/house-30.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png3.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-1.jpg"
                                                            src="images/home/house-1.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png4.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-23.jpg"
                                                            src="images/home/house-23.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png5.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-15.jpg"
                                                            src="images/home/house-15.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png6.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-6.jpg"
                                                            src="images/home/house-6.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png1.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="sidebar-grid.html"
                                        class="tf-btn btn-view primary size-1 hover-btn-view">View All Properties <span
                                            class="icon icon-arrow-right2"></span></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="studio" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-13.jpg"
                                                            src="images/home/house-13.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png1.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-14.jpg"
                                                            src="images/home/house-14.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png2.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-15.jpg"
                                                            src="images/home/house-15.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png3.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-16.jpg"
                                                            src="images/home/house-16.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png4.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-17.jpg"
                                                            src="images/home/house-17.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png5.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-18.jpg"
                                                            src="images/home/house-18.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png6.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="sidebar-grid.html"
                                        class="tf-btn btn-view primary size-1 hover-btn-view">View All Properties <span
                                            class="icon icon-arrow-right2"></span></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="house" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-13.jpg"
                                                            src="images/home/house-13.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png1.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-14.jpg"
                                                            src="images/home/house-14.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png2.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-15.jpg"
                                                            src="images/home/house-15.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png3.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-16.jpg"
                                                            src="images/home/house-16.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png4.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-17.jpg"
                                                            src="images/home/house-17.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png5.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-18.jpg"
                                                            src="images/home/house-18.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png6.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="sidebar-grid.html"
                                        class="tf-btn btn-view primary size-1 hover-btn-view">View All Properties <span
                                            class="icon icon-arrow-right2"></span></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="office" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-13.jpg"
                                                            src="images/home/house-13.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png1.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-14.jpg"
                                                            src="images/home/house-14.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png2.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-15.jpg"
                                                            src="images/home/house-15.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png3.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-16.jpg"
                                                            src="images/home/house-16.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png4.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-17.jpg"
                                                            src="images/home/house-17.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png5.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="homelengo-box">
                                            <div class="archive-top">
                                                <a href="property-details-v1.html" class="images-group">
                                                    <div class="images-style">
                                                        <img class="lazyload" data-src="images/home/house-18.jpg"
                                                            src="images/home/house-18.jpg" alt="img">
                                                    </div>
                                                    <div class="top">
                                                        <ul class="d-flex gap-6">
                                                            <li class="flag-tag primary">Featured</li>
                                                            <li class="flag-tag style-1">For Sale</li>
                                                        </ul>

                                                    </div>
                                                    <div class="bottom">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        145 Brooklyn Ave, Califonia, New York
                                                    </div>
                                                </a>

                                            </div>
                                            <div class="archive-bottom">
                                                <div class="content-top">
                                                    <h6 class="text-capitalize"><a href="property-details-v1.html"
                                                            class="link"> Casa Lomas de MachalÃ­ Machas</a></h6>
                                                    <ul class="meta-list">
                                                        <li class="item">
                                                            <i class="icon icon-bed"></i>
                                                            <span class="text-variant-1">Beds:</span>
                                                            <span class="fw-6">3</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-bath"></i>
                                                            <span class="text-variant-1">Baths:</span>
                                                            <span class="fw-6">2</span>
                                                        </li>
                                                        <li class="item">
                                                            <i class="icon icon-sqft"></i>
                                                            <span class="text-variant-1">Sqft:</span>
                                                            <span class="fw-6">1150</span>
                                                        </li>
                                                    </ul>

                                                </div>

                                                <div class="content-bottom">
                                                    <div class="d-flex gap-8 align-items-center">
                                                        <div class="avatar avt-40 round">
                                                            <img src="images/avatar/avt-png6.png" alt="avt">
                                                        </div>
                                                        <span>Arlene McCoy</span>
                                                    </div>
                                                    <h6 class="price">$7250,00</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="sidebar-grid.html"
                                        class="tf-btn btn-view primary size-1 hover-btn-view">View All Properties <span
                                            class="icon icon-arrow-right2"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section> -->
            <!-- End Recommended -->

            <!-- <section class="flat-slider-detail-v1 px-10">
                <div dir="ltr" class="swiper tf-sw-location" data-preview="3" data-tablet="2" data-mobile-sm="2"
                    data-mobile="1" data-space-lg="10" data-space-md="10" data-space="10" data-pagination="1"
                    data-pagination-sm="2" data-pagination-md="2" data-pagination-lg="3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="images/banner/banner-property-1.jpg" data-fancybox="gallery"
                                class="box-img-detail d-block">
                                <img src="images/banner/banner-property-1.jpg" alt="img-property">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="images/banner/banner-property-3.jpg" data-fancybox="gallery"
                                class="box-img-detail d-block">
                                <img src="images/banner/banner-property-3.jpg" alt="img-property">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="images/banner/banner-property-2.jpg" data-fancybox="gallery"
                                class="box-img-detail d-block">
                                <img src="images/banner/banner-property-2.jpg" alt="img-property">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="images/banner/banner-property-1.jpg" data-fancybox="gallery"
                                class="box-img-detail d-block">
                                <img src="images/banner/banner-property-1.jpg" alt="img-property">
                            </a>
                        </div>
                    </div>
                    <div class="sw-pagination sw-pagination-location text-center"></div>
                </div>
            </section> -->

            <!-- Agents -->
            <!-- <section class="flat-section flat-agents">
                <div class="container">
                    <div class="box-title text-center wow fadeInUp">
                        <div class="text-subtitle text-primary">Our Teams</div>
                        <h3 class="title mt-4">Meet Our Agents</h3>
                    </div>
                    <div class="tf-grid-layout xl-col-4 sm-col-2">
                        <div class="box-agent hover-img wow fadeIn" data-wow-delay=".21s">
                            <a href="#" class="box-img img-style">
                                <img class="lazyload" data-src="images/agents/agent-1.jpg"
                                    src="images/agents/agent-1.jpg" alt="image-agent">
                                <ul class="agent-social">
                                    <li><span class="icon icon-facebook"></span></li>
                                    <li><span class="icon icon-x"></span></li>
                                    <li><span class="icon icon-linkedin"></span></li>
                                    <li><span class="icon icon-instargram"></span></li>
                                </ul>
                            </a>
                            <div class="content">
                                <div class="info">
                                    <h5><a class="link" href="#">Chris Patt</a></h5>
                                    <p class="text-variant-1">Administrative Staff</p>
                                </div>
                                <div class="box-icon">
                                    <span class="icon icon-phone"></span>
                                    <span class="icon icon-mail"></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-agent hover-img wow fadeIn" data-wow-delay=".2s">
                            <a href="#" class="box-img img-style">
                                <img class="lazyload" data-src="images/agents/agent-2.jpg"
                                    src="images/agents/agent-2.jpg" alt="image-agent">
                                <ul class="agent-social">
                                    <li><span class="icon icon-facebook"></span></li>
                                    <li><span class="icon icon-x"></span></li>
                                    <li><span class="icon icon-linkedin"></span></li>
                                    <li><span class="icon icon-instargram"></span></li>
                                </ul>
                            </a>
                            <div class="content">
                                <div class="info">
                                    <h5><a class="link" href="#">Esther Howard</a></h5>
                                    <p class="text-variant-1">Administrative Staff</p>
                                </div>
                                <div class="box-icon">
                                    <span class="icon icon-phone"></span>
                                    <span class="icon icon-mail"></span>

                                </div>
                            </div>
                        </div>
                        <div class="box-agent hover-img wow fadeIn" data-wow-delay=".3s">
                            <a href="#" class="box-img img-style">
                                <img class="lazyload" data-src="images/agents/agent-3.jpg"
                                    src="images/agents/agent-3.jpg" alt="image-agent">
                                <ul class="agent-social">
                                    <li><span class="icon icon-facebook"></span></li>
                                    <li><span class="icon icon-x"></span></li>
                                    <li><span class="icon icon-linkedin"></span></li>
                                    <li><span class="icon icon-instargram"></span></li>
                                </ul>
                            </a>
                            <div class="content">
                                <div class="info">
                                    <h5><a class="link" href="#">Darrell Steward</a></h5>
                                    <p class="text-variant-1">Administrative Staff</p>
                                </div>
                                <div class="box-icon">
                                    <span class="icon icon-phone"></span>
                                    <span class="icon icon-mail"></span>

                                </div>
                            </div>
                        </div>
                        <div class="box-agent hover-img wow fadeIn" data-wow-delay=".4s">
                            <a href="#" class="box-img img-style">
                                <img class="lazyload" data-src="images/agents/agent-4.jpg"
                                    src="images/agents/agent-4.jpg" alt="image-agent">
                                <ul class="agent-social">
                                    <li><span class="icon icon-facebook"></span></li>
                                    <li><span class="icon icon-x"></span></li>
                                    <li><span class="icon icon-linkedin"></span></li>
                                    <li><span class="icon icon-instargram"></span></li>
                                </ul>
                            </a>
                            <div class="content">
                                <div class="info">
                                    <h5><a class="link" href="#"> Robert Fox</a></h5>
                                    <p class="text-variant-1">Administrative Staff</p>
                                </div>
                                <div class="box-icon">
                                    <span class="icon icon-phone"></span>
                                    <span class="icon icon-mail"></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- End Agents -->
          
            <!-- img with text -->
            <!-- <section class="flat-section bg-primary-new">
                <div class="container3">
                    <div class="flat-img-with-text-v2">
                        <div class="content-left tf-image-box">
                            <div class="grid-img-group">
                                <div class="tf-image-wrap item-1">
                                    <div class="img-style hover-img-wrap">
                                        <img class="lazyload" data-src="images/banner/img-w-text-sm1.jpg"
                                            src="images/banner/img-w-text-sm1.jpg" alt="">
                                    </div>
                                    <div class="tag-item ani5">
                                        <i class="icon icon-check-circle"></i>
                                        <span>Proven Expertise</span>
                                    </div>
                                </div>
                                <div class="tf-image-wrap item-2">
                                    <div class="img-style hover-img-wrap">
                                        <img class="lazyload" data-src="images/banner/img-w-text2.jpg"
                                            src="images/banner/img-w-text2.jpg" alt="">
                                    </div>
                                    <div class="tag-item tag-item-1 ani4">
                                        <i class="icon icon-check-circle"></i>
                                        <span>Customized Solutions</span>
                                    </div>
                                    <div class="tag-item tag-item-2 ani5">
                                        <i class="icon icon-check-circle"></i>
                                        <span>Transparent Partnerships</span>
                                    </div>
                                </div>
                                <div class="tf-image-wrap item-3">
                                    <div class="img-style hover-img-wrap">
                                        <img class="lazyload" data-src="images/banner/img-w-text-sm2.jpg"
                                            src="images/banner/img-w-text-sm2.jpg" alt="">
                                    </div>
                                    <div class="tag-item ani4">
                                        <i class="icon icon-check-circle"></i>
                                        <span>Local Area Knowledge</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-right">
                            <div class="box-title wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="2000ms">
                                <div class="text-subtitle text-primary">Our Benifit</div>
                                <h3 class="title mt-4">Discover what sets our Real Estate expertise apart</h3>
                                <p class="desc text-variant-1">Our seasoned professionals, armed with extensive market
                                    knowledge, walk alongside you through every phase of your property endeavor.</p>
                            </div>
                            <div class="flat-service">
                                <a href="#" class="box-benefit hover-btn-view">
                                    <div class="icon-box">
                                        <span class="icon">
                                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_13434_4230)">
                                                    <path
                                                        d="M49.1313 20.4375V20.3961L49.102 20.3668L34.477 5.74179L34.406 5.67085L34.3353 5.74202L19.8041 20.367L19.775 20.3963V20.4375V26.7188C19.775 27.1389 19.4384 27.5562 18.9375 27.5562C18.679 27.5562 18.4713 27.4705 18.3285 27.3277C18.1857 27.1849 18.1 26.9773 18.1 26.7188V20.0625C18.1 19.9335 18.1214 19.8306 18.1617 19.7398C18.2022 19.6487 18.2641 19.5648 18.352 19.477L18.3522 19.4767L33.352 4.38321C33.9692 3.76601 34.8433 3.76601 35.4605 4.38321L50.5543 19.477C50.6421 19.5648 50.704 19.6487 50.7446 19.7398C50.7849 19.8306 50.8063 19.9335 50.8063 20.0625V32.0625C50.8063 32.2644 50.7043 32.4746 50.5426 32.6363C50.3808 32.7981 50.1706 32.9 49.9688 32.9C49.5486 32.9 49.1313 32.5634 49.1313 32.0625V20.4375ZM49.0312 10.6812C48.6111 10.6812 48.1938 10.3446 48.1938 9.84375V4.3125C48.1938 3.68839 47.6736 3.275 47.1562 3.275H45.8438C45.2196 3.275 44.8063 3.79513 44.8063 4.3125V4.6875C44.8063 5.10763 44.4696 5.525 43.9688 5.525C43.7102 5.525 43.5026 5.43926 43.3598 5.29648C43.217 5.15369 43.1313 4.94603 43.1313 4.6875V4.3125C43.1313 2.86555 44.3074 1.6 45.8438 1.6H47.1562C48.6032 1.6 49.8687 2.77613 49.8687 4.3125V9.84375C49.8687 10.0456 49.7668 10.2558 49.6051 10.4176C49.4433 10.5793 49.2331 10.6812 49.0312 10.6812Z"
                                                        fill="#1563DF" stroke="white" stroke-width="0.2" />
                                                    <path
                                                        d="M49.6705 20.8422L49.6709 20.8419L49.6642 20.8353L34.4767 5.74157L34.406 5.6713L34.3355 5.74179L19.2417 20.8355C18.2516 21.8256 16.4391 21.8303 15.3504 20.834C14.266 19.748 14.2665 18.0311 15.3519 16.9457L30.7267 1.66468L30.7269 1.66446C31.7391 0.652268 33.1198 0.1 34.5 0.1C35.8811 0.1 37.2594 0.652766 38.176 1.66102L38.1759 1.66109L38.1792 1.66446L53.4605 16.9457C54.5464 18.0317 54.5464 19.7496 53.4605 20.8355C52.9155 21.3805 52.2842 21.65 51.5625 21.65C50.8351 21.65 50.1162 21.377 49.6705 20.8422ZM16.5232 18.1166L16.523 18.1168C16.1089 18.5308 16.1089 19.2504 16.523 19.6645C16.937 20.0785 17.6566 20.0785 18.0707 19.6645L33.3519 4.38321C33.6142 4.12093 34.0574 3.94375 34.4062 3.94375C34.755 3.94375 35.1982 4.12093 35.4605 4.38321L50.7417 19.6645C51.1558 20.0785 51.8754 20.0785 52.2894 19.6645C52.7035 19.2504 52.7035 18.5308 52.2894 18.1168L37.0094 2.83673C35.6575 1.38987 33.2488 1.38984 31.8969 2.83663L16.5232 18.1166ZM13.233 36.2205L13.2325 36.2212C13.1113 36.3827 12.9037 36.4897 12.6772 36.5221C12.4508 36.5544 12.2214 36.5099 12.06 36.3887C11.8985 36.2676 11.7915 36.06 11.7591 35.8335C11.7268 35.6074 11.7712 35.3783 11.892 35.2169C13.1952 33.5416 15.0597 31.9558 17.3952 30.5545L17.3952 30.5546L17.3982 30.5526C21.1084 28.141 25.9333 28.6032 29.2761 31.6675L29.2768 31.6681C30.2316 32.5274 31.2863 32.9125 32.3437 32.9125H37.7812C40.0697 32.9125 41.9937 34.8365 41.9937 37.125V37.2188C41.9937 38.2253 41.6277 39.1421 41.0762 39.8775L41.0761 39.8774L41.073 39.882C40.9091 40.1278 40.6644 40.2125 40.4062 40.2125C40.2492 40.2125 40.0865 40.1345 39.8968 40.0397C39.7392 39.918 39.636 39.714 39.6151 39.4944C39.594 39.2728 39.6577 39.0461 39.8207 38.8832C40.2199 38.484 40.4125 37.8926 40.4125 37.2188V37.125C40.4125 35.661 39.2402 34.5875 37.875 34.5875H32.4375C30.871 34.5875 29.4886 34.036 28.193 32.833C25.4423 30.272 21.3613 29.8903 18.3215 31.8842C16.159 33.2007 14.4613 34.6143 13.233 36.2205ZM40.2187 31.4C39.7986 31.4 39.3812 31.0634 39.3812 30.5625V25.6875C39.3812 24.7846 38.5824 24.0875 37.7812 24.0875H30.9375C30.0345 24.0875 29.3375 24.8863 29.3375 25.6875V27.75C29.3375 28.1701 29.0008 28.5875 28.5 28.5875C28.2414 28.5875 28.0338 28.5018 27.891 28.359C27.7482 28.2162 27.6625 28.0085 27.6625 27.75V25.6875C27.6625 23.9597 29.1195 22.4125 30.9375 22.4125H37.7812C39.509 22.4125 41.0562 23.8695 41.0562 25.6875V30.5625C41.0562 30.7644 40.9543 30.9746 40.7925 31.1363C40.6308 31.2981 40.4206 31.4 40.2187 31.4Z"
                                                        fill="#1563DF" stroke="white" stroke-width="0.2" />
                                                    <path
                                                        d="M22.0345 49.4757L22.0354 49.4755L22.0303 49.4629C21.8635 49.0457 22.1188 48.5532 22.5196 48.4731C22.9777 48.3814 23.3439 48.3813 23.7188 48.3813L23.7216 48.3812L36.8466 48.0062L36.8469 48.0062C39.8622 47.912 42.6884 47.158 45.4185 45.8401L45.4197 45.8394C49.9243 43.5871 53.9608 40.9591 57.4351 38.0488C57.7482 37.8377 57.85 37.5216 57.85 37.2188C57.85 37.0665 57.8245 36.9351 57.7711 36.8149C57.7178 36.6951 57.6391 36.5914 57.5395 36.4918L57.5396 36.4916L57.5342 36.4869C56.095 35.2396 54.0804 35.0493 52.3577 36.0063L52.3576 36.0062L52.3527 36.0093C49.553 37.7824 45.9085 39.1853 41.04 40.3088L41.0093 40.3159L40.9882 40.3394C40.1642 41.2548 39.0667 41.7125 37.875 41.7125H31.3125C30.8924 41.7125 30.475 41.3759 30.475 40.875C30.475 40.6165 30.5607 40.4088 30.7035 40.266C30.8463 40.1232 31.054 40.0375 31.3125 40.0375H37.875C38.7447 40.0375 39.4342 39.7454 39.9251 39.0581L39.9297 39.0517L39.9332 39.0447C40.0081 38.8949 40.1577 38.8144 40.3466 38.7198C45.2215 37.5939 48.7912 36.1855 51.5196 34.4924C53.8274 33.2011 56.6869 33.4794 58.6224 35.1384L58.6222 35.1387L58.6294 35.1439C59.2518 35.5884 59.525 36.303 59.525 37.125C59.525 37.9391 59.1634 38.7525 58.44 39.295L58.4399 39.2949L58.4368 39.2975C54.8804 42.1988 50.6677 44.9138 46.0796 47.2547L46.0791 47.2549C43.1873 48.7474 40.0147 49.4942 36.8408 49.5875L23.7188 49.9625H23.7174H23.0625H23.0211L22.9918 49.9918C22.9291 50.0545 22.8735 50.0563 22.7812 50.0563C22.4509 50.0563 22.1168 49.8051 22.0345 49.4757ZM13.7707 59.5695L13.7708 59.5694L13.7674 59.5649L0.736198 42.2212L0.737 42.2206L0.726961 42.2105C0.573335 42.0569 0.56875 41.8206 0.56875 41.625C0.56875 41.3947 0.721343 41.2355 0.888471 41.1519L0.896383 41.148L0.903477 41.1427L5.30973 37.8615L5.31 37.8613C6.04095 37.313 6.95685 37.0375 7.875 37.0375C9.24745 37.0375 10.4383 37.6771 11.265 38.6867L20.1699 50.5912L20.1699 50.5912L20.1711 50.5926C20.8132 51.4183 21.1773 52.5157 20.9951 53.6086C20.811 54.7131 20.2595 55.8135 19.3457 56.5454L14.948 59.7267C14.7578 59.8217 14.5948 59.9 14.4375 59.9C14.1793 59.9 13.9346 59.8153 13.7707 59.5695ZM2.66005 41.8253L2.57769 41.885L2.63881 41.9663L14.5451 57.8101L14.6048 57.8896L14.6847 57.8302L18.3389 55.113C18.9264 54.7203 19.3143 54.0382 19.4115 53.3579C19.5097 52.6707 19.3114 52.0837 18.927 51.507L18.9271 51.507L18.9238 51.5026L10.0184 39.5974C10.0182 39.5973 10.0181 39.5971 10.018 39.5969C9.62477 39.0566 8.98973 38.7168 8.32299 38.6198C7.6566 38.5229 6.9484 38.6671 6.40771 39.1082L2.66005 41.8253Z"
                                                        fill="#1563DF" stroke="white" stroke-width="0.2" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_13434_4230">
                                                        <rect width="60" height="60" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">Buy A New Home</h5>
                                        <p class="description">Explore diverse properties and expert guidance for a
                                            seamless buying experience.</p>
                                        <span class="btn-view style-1"><span class="text">Explore Now</span> <span
                                                class="icon icon-arrow-right2"></span> </span>
                                    </div>
                                </a>
                                <a href="#" class="box-benefit hover-btn-view">
                                    <div class="icon-box">
                                        <span class="icon">
                                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_13434_4244)">
                                                    <path
                                                        d="M36.5625 5.53125C34.0312 5.25 31.4062 5.71875 28.9687 7.03125C24.375 9.65625 22.125 14.7187 22.875 19.5937L3.09374 30.8437C2.90624 30.9375 2.71874 31.2187 2.62499 31.4062C2.15624 33.1875 1.78124 34.4062 1.31249 36.0937C1.12499 36.5625 1.49999 37.125 1.96874 37.2187C3.65624 37.6875 4.87499 38.0625 6.65624 38.5312C6.93749 38.625 7.21874 38.5312 7.40624 38.4375L8.62499 37.6875C8.90624 37.5937 8.99999 37.3125 9.09374 37.0312L9.56249 34.2187C9.65624 33.6562 10.3125 33.2812 10.7812 33.4687L12.8437 34.2187C13.4062 34.4062 13.9687 34.125 14.0625 33.4687L14.4375 31.3125C14.5312 30.75 15.1875 30.375 15.6562 30.5625L17.7187 31.3125C18.2812 31.5 18.8437 31.2187 18.9375 30.5625L19.3125 28.4062C19.4062 27.8437 20.0625 27.4687 20.5312 27.6562L23.25 28.6875C23.5312 28.7812 23.8125 28.7812 24 28.5937L26.25 27.375"
                                                        stroke="#1563DF" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M53.1563 23.4375C52.125 28.5937 48 32.3438 43.125 33.1875L42.4688 36.6562C42.375 36.9375 42.2813 37.125 42 37.3125L39.375 38.7187C38.9063 39 38.7188 39.6562 39.0938 40.125L40.5 41.8125C40.875 42.2812 40.6875 42.9375 40.2188 43.2187L38.3438 44.25C37.7813 44.5312 37.6875 45.1875 38.0625 45.6562L39.4688 47.3437C39.8438 47.8125 39.75 48.4687 39.1875 48.75L37.3125 49.7812C36.8438 50.0625 36.6563 50.7187 37.0313 51.1875L38.9063 53.4375C39.0938 53.625 39.1875 53.9062 39.0938 54.1875L38.8125 55.5937C38.7188 55.875 38.625 56.0625 38.4375 56.25C36.8438 57.2812 35.8125 58.0313 34.4063 58.9688C33.9375 59.25 33.375 59.1562 33.0938 58.6875C32.0625 57.1875 31.4063 56.1562 30.375 54.6562C30 54.375 30 54.0938 30 53.8125L34.4063 31.5C30.1875 28.875 27.8438 23.8125 28.875 18.6562C30.1875 12 36.6563 7.59375 43.4063 8.90625C50.1563 10.2187 54.4688 16.7812 53.1563 23.4375Z"
                                                        stroke="#1563DF" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M41.8125 20.4375C43.8318 20.4375 45.4687 18.8005 45.4687 16.7812C45.4687 14.762 43.8318 13.125 41.8125 13.125C39.7932 13.125 38.1562 14.762 38.1562 16.7812C38.1562 18.8005 39.7932 20.4375 41.8125 20.4375Z"
                                                        stroke="#1563DF" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M53.25 19.3125C55.875 18 57.9375 15.5625 58.5 12.4687C59.5312 7.21875 56.1562 2.15625 50.9062 1.125C45.6562 0.0937479 40.5937 3.46875 39.5625 8.71875V8.8125C39 11.7187 39.8437 14.625 41.5312 16.7812"
                                                        stroke="#1563DF" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_13434_4244">
                                                        <rect width="60" height="60" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">Rent a home</h5>
                                        <p class="description">Explore a diverse variety of listings tailored precisely
                                            to suit your unique lifestyle needs.</p>
                                        <span class="btn-view style-1"><span class="text">Explore Now</span> <span
                                                class="icon icon-arrow-right2"></span> </span>

                                    </div>
                                </a>
                                <a href="#" class="box-benefit hover-btn-view">
                                    <div class="icon-box">
                                        <span class="icon">
                                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_13434_4259)">
                                                    <path
                                                        d="M47.3438 45.375V59.0625H5.625V39.1875M26.625 14.3438C26.3437 14.25 26.0625 14.3437 25.7812 14.5312L5.34375 35.0625C4.3125 36.0938 2.71875 36.0938 1.6875 35.0625C1.21875 34.5938 0.9375 33.9375 0.9375 33.2813C0.9375 32.625 1.21875 31.9687 1.6875 31.5L22.2188 10.9687C23.7188 9.46875 25.7812 8.90625 27.6562 9.375M0.9375 59.0625H52.0312"
                                                        stroke="#1563DF" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M33.6563 51.75V44.0625C33.6563 42.0938 32.8125 40.3125 31.5 39C30.1875 37.6875 28.4062 36.8437 26.4375 36.8437C22.5 36.8437 19.2187 40.0312 19.2187 44.0625V51.75M36.8437 58.0313V59.0625H16.125V58.0313C16.125 56.625 17.25 55.5 18.6562 55.5H34.3125C35.7187 55.5 36.8437 56.625 36.8437 58.0313ZM59.0625 15.2812C59.0625 20.8125 51.9375 33.375 47.8125 40.4062C46.4062 42.6562 43.125 42.6562 41.7187 40.4062C37.5 33.4687 30.4687 20.9062 30.4687 15.2812C30.375 7.3125 36.8438 0.9375 44.7188 0.9375C52.5937 0.9375 59.0625 7.3125 59.0625 15.2812Z"
                                                        stroke="#1563DF" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M44.7187 24.4688C49.7929 24.4688 53.9062 20.3554 53.9062 15.2812C53.9062 10.2071 49.7929 6.09375 44.7187 6.09375C39.6446 6.09375 35.5312 10.2071 35.5312 15.2812C35.5312 20.3554 39.6446 24.4688 44.7187 24.4688Z"
                                                        stroke="#1563DF" stroke-width="1.5" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M22.6875 46.2188V48.0938V46.2188Z" fill="black" />
                                                    <path d="M22.6875 46.2188V48.0938" stroke="#1563DF"
                                                        stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_13434_4259">
                                                        <rect width="60" height="60" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </span>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">Sell a home</h5>
                                        <p class="description">Showcasing your property's best features for a successful
                                            sale.</p>
                                        <span class="btn-view style-1"><span class="text">Explore Now</span> <span
                                                class="icon icon-arrow-right2"></span> </span>

                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- img with text -->
            <!-- Testimonial -->
            <!-- <section class="flat-section">
                <div class="container">
                    <div class="box-title px-15">
                        <div class="text-center wow fadeInUpSmall" data-wow-delay=".2s" data-wow-duration="2000ms">
                            <div class="text-subtitle text-primary">Our Testimonials</div>
                            <h3 class="title mt-4">Whatâ€™s people sayâ€™s</h3>
                            <p class="desc text-variant-1">Our seasoned team excels in real estate with years of
                                successful market navigation, offering informed decisions and optimal results.</p>
                        </div>
                    </div>
                    <div dir="ltr" class="swiper tf-sw-testimonial" data-preview="3" data-tablet="2" data-mobile-sm="1"
                        data-mobile="1" data-space="15" data-space-md="30" data-space-lg="30" data-centered="false"
                        data-loop="false">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="box-tes-item style-2 wow fadeIn" data-wow-delay=".2s"
                                    data-wow-duration="2000ms">
                                    <span class="icon icon-quote"></span>
                                    <p class="note body-2">
                                        "My experience with property management services has exceeded expectations. They
                                        efficiently manage properties with a professional and attentive approach in
                                        every situation. I feel reassured that any issue will be resolved promptly and
                                        effectively."
                                    </p>
                                    <div class="box-avt d-flex align-items-center gap-12">
                                        <div class="avatar avt-60 round">
                                            <img src="images/avatar/avt-png1.png" alt="avatar">
                                        </div>
                                        <div class="info">
                                            <h6>Courtney Henry</h6>
                                            <p class="caption-2 text-variant-1 mt-4">CEO Themesflat</p>
                                            <ul class="list-star">
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-tes-item style-2 wow fadeIn" data-wow-delay=".2s"
                                    data-wow-duration="2000ms">
                                    <span class="icon icon-quote"></span>
                                    <p class="note body-2">
                                        "My experience with property management services has exceeded expectations. They
                                        efficiently manage properties with a professional and attentive approach in
                                        every situation. I feel reassured that any issue will be resolved promptly and
                                        effectively."
                                    </p>
                                    <div class="box-avt d-flex align-items-center gap-12">
                                        <div class="avatar avt-60 round">
                                            <img src="images/avatar/avt-png2.png" alt="avatar">
                                        </div>
                                        <div class="info">
                                            <h6>Esther Howard</h6>
                                            <p class="caption-2 text-variant-1 mt-4">CEO Themesflat</p>
                                            <ul class="list-star">
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-tes-item style-2 wow fadeIn" data-wow-delay=".2s"
                                    data-wow-duration="2000ms">
                                    <span class="icon icon-quote"></span>
                                    <p class="note body-2">
                                        "My experience with property management services has exceeded expectations. They
                                        efficiently manage properties with a professional and attentive approach in
                                        every situation. I feel reassured that any issue will be resolved promptly and
                                        effectively."
                                    </p>
                                    <div class="box-avt d-flex align-items-center gap-12">
                                        <div class="avatar avt-60 round">
                                            <img src="images/avatar/avt-png4.png" alt="avatar">
                                        </div>
                                        <div class="info">
                                            <h6>Annette Black</h6>
                                            <p class="caption-2 text-variant-1 mt-4">CEO Themesflat</p>
                                            <ul class="list-star">
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box-tes-item style-2 wow fadeIn" data-wow-delay=".2s"
                                    data-wow-duration="2000ms">
                                    <span class="icon icon-quote"></span>
                                    <p class="note body-2">
                                        "My experience with property management services has exceeded expectations. They
                                        efficiently manage properties with a professional and attentive approach in
                                        every situation. I feel reassured that any issue will be resolved promptly and
                                        effectively."
                                    </p>
                                    <div class="box-avt d-flex align-items-center gap-12">
                                        <div class="avatar avt-60 round">
                                            <img src="images/avatar/avt-png6.png" alt="avatar">
                                        </div>
                                        <div class="info">
                                            <h6>Bessie Cooper</h6>
                                            <p class="caption-2 text-variant-1 mt-4">CEO Themesflat</p>
                                            <ul class="list-star">
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                                <li class="icon icon-star"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="sw-pagination sw-pagination-testimonial text-center"></div>
                    </div>
                </div>
            </section> -->
            <!-- End Testimonial -->
            <!-- banner -->
            <!-- <section class="flat-section flat-banner">
                <div class="container">
                    <div class="wrap-banner bg-primary-new">
                        <div class="box-left">
                            <div class="box-title">
                                <div class="text-subtitle text-primary">Become Partners</div>
                                <h3 class="mt-4 fw-8">List your Properties on Homelengo, join Us Now!</h3>
                            </div>
                            <a href="contact.html" class="tf-btn btn-view primary size-1 hover-btn-view">Contact Now<span class="icon icon-arrow-right2"></span></a>
                        </div>
                        <div class="box-right">
                            <img src="images/banner/banner.png" alt="image">
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- end banner -->

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
