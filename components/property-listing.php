<?php

$properties = include __DIR__ . '/properties-data.php';

if (!function_exists('render_property_card')) {
    function render_property_card(array $property): void
    {
        $detailPage = $property['detailPage'] ?? ('property-details/' . $property['slug'] . '.php');
        $image = $property['heroImage'] ?? 'images/banner/banner-property-1.jpg';
        $name = $property['name'] ?? 'Property';
        $summary = $property['summary'] ?? '';
        $beds = $property['beds'] ?? '3';
        $baths = $property['baths'] ?? '2';
        $sqft = $property['sqft'] ?? '1150';
        ?>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="homelengo-box">
                <div class="archive-top">
                    <a href="<?php echo htmlspecialchars($detailPage, ENT_QUOTES, 'UTF-8'); ?>" class="images-group">
                        <div class="images-style">
                            <img class="lazyload" data-src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="top">
                            <ul class="d-flex gap-6">
                                <li class="flag-tag primary">Featured</li>
                                <li class="flag-tag style-1">For Sale</li>
                            </ul>
                        </div>
                        <div class="bottom">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
                        </div>
                    </a>
                </div>
                <div class="archive-bottom">
                    <div class="content-top">
                        <h6 class="text-capitalize"><a href="<?php echo htmlspecialchars($detailPage, ENT_QUOTES, 'UTF-8'); ?>" class="link"><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></a></h6>
                        <ul class="meta-list">
                            <li class="item">
                                <i class="icon icon-bed"></i>
                                <span class="text-variant-1">Beds:</span>
                                <span class="fw-6"><?php echo htmlspecialchars($beds, ENT_QUOTES, 'UTF-8'); ?></span>
                            </li>
                            <li class="item">
                                <i class="icon icon-bath"></i>
                                <span class="text-variant-1">Baths:</span>
                                <span class="fw-6"><?php echo htmlspecialchars($baths, ENT_QUOTES, 'UTF-8'); ?></span>
                            </li>
                            <li class="item">
                                <i class="icon icon-sqft"></i>
                                <span class="text-variant-1">Sqft:</span>
                                <span class="fw-6"><?php echo htmlspecialchars($sqft, ENT_QUOTES, 'UTF-8'); ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="content-bottom">
                        <div class="d-flex gap-8 align-items-center">
                            <span><span class="text-line-clamp-2"><?php echo htmlspecialchars($summary, ENT_QUOTES, 'UTF-8'); ?></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

$tabDefinitions = [
    'viewAll' => [
        'label' => 'View All',
        'slugs' => array_keys($properties),
    ],
    'plot' => [
        'label' => 'Plot',
        'slugs' => ['grand-valley-empire', 'landmark-city', 'dream-avenue'],
    ],
    'farmhouse' => [
        'label' => 'Farmhouse',
        'slugs' => ['vrindavan-global', 'green-valley-empire', 'upsic-project'],
    ],
    'office' => [
        'label' => 'Office',
        'slugs' => ['emporium-block', 'corporate-park-agra', 'padamdeep-tower'],
    ],
];

$sectionSubtitle = $sectionSubtitle ?? 'Discover Premium Properties';
$sectionTitle = $sectionTitle ?? 'Prime locations, smart investment.';
$showViewAllButton = $showViewAllButton ?? true;
?>
<section class="flat-section flat-recommended">
    <div class="container">
        <div class="box-title text-center wow fadeInUp">
            <div class="text-subtitle text-primary"><?php echo htmlspecialchars($sectionSubtitle, ENT_QUOTES, 'UTF-8'); ?></div>
            <h3 class="title mt-4"><?php echo htmlspecialchars($sectionTitle, ENT_QUOTES, 'UTF-8'); ?></h3>
        </div>
        <div class="flat-tab-recommended flat-animate-tab wow fadeInUp" data-wow-delay=".2s">
            <ul class="nav-tab-recommended justify-content-md-center" role="tablist">
                <?php $firstTab = true; ?>
                <?php foreach ($tabDefinitions as $tabId => $tabDefinition): ?>
                    <li class="nav-tab-item" role="presentation">
                        <a href="#<?php echo htmlspecialchars($tabId, ENT_QUOTES, 'UTF-8'); ?>" class="nav-link-item<?php echo $firstTab ? ' active' : ''; ?>" data-bs-toggle="tab"><?php echo htmlspecialchars($tabDefinition['label'], ENT_QUOTES, 'UTF-8'); ?></a>
                    </li>
                    <?php $firstTab = false; ?>
                <?php endforeach; ?>
            </ul>
            <div class="tab-content">
                <?php $firstPane = true; ?>
                <?php foreach ($tabDefinitions as $tabId => $tabDefinition): ?>
                    <div class="tab-pane<?php echo $firstPane ? ' active show' : ''; ?>" id="<?php echo htmlspecialchars($tabId, ENT_QUOTES, 'UTF-8'); ?>" role="tabpanel">
                        <div class="row">
                            <?php foreach ($tabDefinition['slugs'] as $slug): ?>
                                <?php if (isset($properties[$slug])): ?>
                                    <?php render_property_card($properties[$slug]); ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php if ($tabId === 'viewAll' && $showViewAllButton): ?>
                            <div class="text-center view-all">
                                <a href="properties.php" class="tf-btn btn-view primary size-1 hover-btn-view">View All Properties <span class="icon icon-arrow-right2"></span></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php $firstPane = false; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
