<?php

require_once __DIR__ . '/../includes/app.php';

$properties = get_all_properties();
$categories = get_categories(true);
$settings = get_site_settings();
$defaultWhatsappNumber = normalize_phone((string) ($settings['phone'] ?? ''));

if (!function_exists('render_property_card')) {
    function render_property_card(array $property): void
    {
        global $defaultWhatsappNumber;

        if (!function_exists('property_feature_icon_class')) {
            function property_feature_icon_class(string $feature): string
            {
                $featureLower = strtolower($feature);

                if (str_contains($featureLower, 'security') || str_contains($featureLower, 'cctv') || str_contains($featureLower, 'safe')) {
                    return 'fa-solid fa-shield-halved';
                }

                if (str_contains($featureLower, 'water') || str_contains($featureLower, 'supply') || str_contains($featureLower, 'faucet')) {
                    return 'fa-solid fa-faucet';
                }

                if (str_contains($featureLower, 'park') || str_contains($featureLower, 'green') || str_contains($featureLower, 'garden') || str_contains($featureLower, 'tree')) {
                    return 'fa-solid fa-tree';
                }

                if (str_contains($featureLower, 'club') || str_contains($featureLower, 'house')) {
                    return 'fa-solid fa-house-chimney';
                }

                if (str_contains($featureLower, 'indoor game')) {
                    return 'fa-solid fa-gamepad';
                }

                if (str_contains($featureLower, 'children')) {
                    return 'fa-solid fa-child-reaching';
                }

                if (str_contains($featureLower, 'banquet')) {
                    return 'fa-solid fa-champagne-glasses';
                }

                if (str_contains($featureLower, 'badminton')) {
                    return 'fa-solid fa-table-tennis-paddle-ball';
                }

                if (str_contains($featureLower, 'corner property') || str_contains($featureLower, 'corner')) {
                    return 'fa-solid fa-vector-square';
                }

                if (str_contains($featureLower, 'planned utilit') || str_contains($featureLower, 'utility')) {
                    return 'fa-solid fa-screwdriver-wrench';
                }

                if (str_contains($featureLower, 'power backup') || str_contains($featureLower, 'power')) {
                    return 'fa-solid fa-bolt';
                }

                if (str_contains($featureLower, 'lift') || str_contains($featureLower, 'elevator')) {
                    return 'fa-solid fa-elevator';
                }

                if (str_contains($featureLower, 'temple') || str_contains($featureLower, 'gopuram')) {
                    return 'fa-solid fa-gopuram';
                }

                if (str_contains($featureLower, 'gym')) {
                    return 'fa-solid fa-dumbbell';
                }

                if (str_contains($featureLower, 'road') || str_contains($featureLower, 'access') || str_contains($featureLower, 'connectivity')) {
                    return 'fa-solid fa-road';
                }

                return 'fa-solid fa-circle-check';
            }
        }

        $detailPage = $property['detailPage'] ?? ('property-details/' . $property['slug'] . '.php');
        $image = $property['heroImage'] ?? 'images/banner/banner-property-1.jpg';
        $name = $property['name'] ?? 'Property';
        $summary = $property['summary'] ?? '';
        $whatsappNumber = normalize_phone((string) ($property['whatsappNumber'] ?? ''));
        if ($whatsappNumber === '') {
            $whatsappNumber = $defaultWhatsappNumber;
        }
        $whatsappMessage = rawurlencode('Hello, I am interested in ' . $name . '. Please share more details.');
        $cardHighlights = [];

        if (isset($property['cardHighlights']) && is_array($property['cardHighlights'])) {
            foreach ($property['cardHighlights'] as $highlight) {
                if (is_string($highlight) && trim($highlight) !== '') {
                    $cardHighlights[] = trim($highlight);
                }
                if (count($cardHighlights) >= 4) {
                    break;
                }
            }
        }

        if (empty($cardHighlights) && isset($property['features']) && is_array($property['features'])) {
            foreach ($property['features'] as $featureGroup) {
                if (!is_array($featureGroup)) {
                    continue;
                }

                foreach ($featureGroup as $featureItem) {
                    if (!is_string($featureItem)) {
                        continue;
                    }

                    $trimmedFeature = trim($featureItem);
                    if ($trimmedFeature === '' || in_array($trimmedFeature, $cardHighlights, true)) {
                        continue;
                    }

                    $cardHighlights[] = $trimmedFeature;
                    if (count($cardHighlights) >= 4) {
                        break 2;
                    }
                }
            }
        }

        if (empty($cardHighlights)) {
            $cardHighlights = ['Prime Location', 'Smart Investment', 'Premium Amenities'];
        }
        ?>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="homelengo-box">
                <div class="archive-top">
                    <a href="<?php echo htmlspecialchars($detailPage, ENT_QUOTES, 'UTF-8'); ?>" class="images-group">
                        <div class="images-style">
                            <img class="lazyload" data-src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>"
                                src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>"
                                alt="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        <div class="top">
                            <ul class="d-flex gap-6">
                                <li class="flag-tag primary">Featured</li>
                                <li class="flag-tag style-1">For Sale</li>
                            </ul>
                        </div>
                            <?php if ($whatsappNumber !== ''): ?>
                                <a class="property-whatsapp-icon"
                                    href="https://wa.me/<?php echo htmlspecialchars($whatsappNumber, ENT_QUOTES, 'UTF-8'); ?>?text=<?php echo $whatsappMessage; ?>"
                                    target="_blank" rel="noopener noreferrer" aria-label="Enquire on WhatsApp">
                                    <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                                </a>
                            <?php endif; ?>
                    </a>
                </div>
                <div class="archive-bottom">
                    <div class="content-top">
                        <h6 class="text-capitalize"><a href="<?php echo htmlspecialchars($detailPage, ENT_QUOTES, 'UTF-8'); ?>"
                                class="link"><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></a></h6>
                        <ul class="meta-list feature-meta-list">
                            <?php foreach ($cardHighlights as $highlight): ?>
                                <li class="item">
                                    <i class="feature-icon <?php echo htmlspecialchars(property_feature_icon_class($highlight), ENT_QUOTES, 'UTF-8'); ?>"
                                        aria-hidden="true"></i>
                                    <span
                                        class="feature-text"><?php echo htmlspecialchars($highlight, ENT_QUOTES, 'UTF-8'); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="content-bottom">
                        <div class="d-flex gap-8 align-items-center">
                            <span><span
                                    class="text-line-clamp-2"><?php echo htmlspecialchars($summary, ENT_QUOTES, 'UTF-8'); ?></span></span>
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
];

foreach ($categories as $category) {
    $categorySlugs = [];
    foreach ($properties as $slug => $property) {
        if (($property['category_slug'] ?? '') === $category['slug']) {
            $categorySlugs[] = $slug;
        }
    }

    if (!empty($categorySlugs)) {
        $tabDefinitions[$category['slug']] = [
            'label' => $category['name'],
            'slugs' => $categorySlugs,
        ];
    }
}

$sectionSubtitle = $sectionSubtitle ?? 'Discover Premium Properties';
$sectionTitle = $sectionTitle ?? 'Prime locations, smart investment.';
$showViewAllButton = $showViewAllButton ?? true;
?>
<section class="flat-section flat-recommended">
    <div class="container">
        <div class="box-title text-center wow fadeInUp">
            <div class="text-subtitle text-primary">
                <?php echo htmlspecialchars($sectionSubtitle, ENT_QUOTES, 'UTF-8'); ?></div>
            <h3 class="title mt-4"><?php echo htmlspecialchars($sectionTitle, ENT_QUOTES, 'UTF-8'); ?></h3>
        </div>
        <div class="flat-tab-recommended flat-animate-tab wow fadeInUp" data-wow-delay=".2s">
            <ul class="nav-tab-recommended justify-content-md-center" role="tablist">
                <?php $firstTab = true; ?>
                <?php foreach ($tabDefinitions as $tabId => $tabDefinition): ?>
                    <li class="nav-tab-item" role="presentation">
                        <a href="#<?php echo htmlspecialchars($tabId, ENT_QUOTES, 'UTF-8'); ?>"
                            class="nav-link-item<?php echo $firstTab ? ' active' : ''; ?>"
                            data-bs-toggle="tab"><?php echo htmlspecialchars($tabDefinition['label'], ENT_QUOTES, 'UTF-8'); ?></a>
                    </li>
                    <?php $firstTab = false; ?>
                <?php endforeach; ?>
            </ul>
            <div class="tab-content">
                <?php $firstPane = true; ?>
                <?php foreach ($tabDefinitions as $tabId => $tabDefinition): ?>
                    <div class="tab-pane<?php echo $firstPane ? ' active show' : ''; ?>"
                        id="<?php echo htmlspecialchars($tabId, ENT_QUOTES, 'UTF-8'); ?>" role="tabpanel">
                        <div class="row">
                            <?php foreach ($tabDefinition['slugs'] as $slug): ?>
                                <?php if (isset($properties[$slug])): ?>
                                    <?php render_property_card($properties[$slug]); ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php if ($tabId === 'viewAll' && $showViewAllButton): ?>
                            <div class="text-center view-all">
                                <a href="properties.php" class="tf-btn btn-view primary size-1 hover-btn-view">View All
                                    Properties <span class="icon icon-arrow-right2"></span></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php $firstPane = false; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>