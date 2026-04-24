<?php require_once __DIR__ . '/includes/app.php'; ?>
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
            <section class="flat-title-page page-title-default-bg">
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

                    <?php $galleryItems = get_gallery_items(true); ?>
                    <div class="row g-4 gallery-grid-custom wow fadeInUp" data-wow-delay=".2s">
                        <?php foreach ($galleryItems as $item): ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="gallery-card-custom">
                                    <img src="<?php echo htmlspecialchars($item['image_path'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?>">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <?php include 'components/footer.php'; ?>
        </div>
    </div>

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" class="progress-path-style">
            </path>
        </svg>
    </div>

    <?php include 'components/script.php'; ?>
</body>
</html>
