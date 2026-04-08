<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Property Gallery – Explore Projects & Locations | BM Properties</title>
    <meta name="keywords" content="gallery, real estate, BM Real Estate">
    <meta name="description" content="Browse our gallery to explore images of residential and commercial projects, locations, and properties offered by BM Properties.">
    <meta name="author" content="BM Properties">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php include 'components/links.php'; ?>
</head>

<body class="body">
    <?php include 'components/loader.php'; ?>

    <div id="wrapper">
        <div id="pagee" class="clearfix">
            <?php include 'components/header.php'; ?>

            <!-- Page Title -->
            <section class="flat-title-page" style="background-image: url(images/banner/banner2.jpg);">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li><a href="index.php" class="text-white">Home</a></li>
                            <li class="text-white">/ Gallery</li>
                        </ul>
                        <h1 class="text-center text-white title">Property Gallery</h1>
                    </div>
                </div>
            </section>
            <!-- End Page Title -->

            <section class="flat-section gallery-section-custom">
                <div class="container">
                    <div class="box-title text-center wow fadeInUp" data-wow-delay=".1s">
                        <div class="text-subtitle text-primary">Our Visual Collection</div>
                        <h3 class="mt-4 title">Explore Our Featured Gallery</h3>
                    </div>

                    <div class="row g-4 gallery-grid-custom wow fadeInUp" data-wow-delay=".2s">
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-card-custom">
                                <img src="images/gallery/dream-avenues.jpg" alt="Modern property exterior">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-card-custom">
                                <img src="images/gallery/landmark-city.jpg" alt="Premium interior living space">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-card-custom">
                                <img src="images/gallery/the-grand-valley.jpg" alt="Luxury home view">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-card-custom">
                                <img src="images/gallery/upsic.jpg" alt="Stylish residential property">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-card-custom">
                                <img src="images/gallery/vrindavan-global.jpg" alt="High-end property details">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-card-custom">
                                <img src="images/gallery/corporate-park.png" alt="Real estate showcase image">
                            </div>
                        </div>
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="gallery-card-custom">
                                <img src="images/blog/blog-7.jpg" alt="Elegant architecture">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-card-custom">
                                <img src="images/blog/blog-8.jpg" alt="Modern home concept">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-card-custom">
                                <img src="images/blog/blog-9.jpg" alt="Featured property highlight">
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>

            <?php include 'components/footer.php'; ?>
        </div>
    </div>

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
