<?php

if (!function_exists('property_asset_url')) {
    function property_asset_url(string $basePath, string $path): string
    {
        if (preg_match('/^(https?:)?\/\//i', $path) === 1 || str_starts_with($path, 'data:')) {
            return $path;
        }
        return rtrim($basePath, '/') . '/' . ltrim($path, '/');
    }
}

$basePath = $basePath ?? '.';
$property = $property ?? [];
$assetBasePath = $basePath;
$siteBasePath = $basePath;

$propertyName = $property['name'] ?? 'Property';
$propertySlug = $property['slug'] ?? '';
$pageTitle = $property['pageTitle'] ?? ($propertyName . ' - BM Real Estate');
$category = $property['category'] ?? 'Property';
$heroImage = $property['heroImage'] ?? 'images/banner/banner-property-1.webp';
$galleryImages = $property['galleryImages'] ?? [$heroImage, 'images/banner/banner-property-2.webp', 'images/banner/banner-property-3.webp', $heroImage];
$galleryImages = array_values(array_filter(array_map(static fn($image) => trim((string) $image), is_array($galleryImages) ? $galleryImages : []), static fn($image) => $image !== ''));
if (empty($galleryImages)) {
    $galleryImages = [$heroImage];
}
$description = $property['description'] ?? [
    $propertyName . ' is presented as a premium investment opportunity with strong connectivity and thoughtful planning.',
    'The layout supports comfortable living while keeping the project suitable for buyers who want long-term value and practical access.',
];
$location = $property['location'] ?? 'Agra, Uttar Pradesh';
$price = $property['price'] ?? 'On request';
$priceSuffix = $property['priceSuffix'] ?? '';
$beds = $property['beds'] ?? '3';
$baths = $property['baths'] ?? '2';
$sqft = $property['sqft'] ?? '1150';
$overviewId = $property['overviewId'] ?? 'BM-001';
$nearby = $property['nearby'] ?? 'Located near local conveniences, road access, and neighborhood facilities.';
$nearbyItems = $property['nearbyItems'] ?? [
    'Main connectivity routes and daily commute options.',
    'Shops, schools, and neighborhood services close by.',
];
$attachments = $property['attachments'] ?? [
    ['image' => 'images/home/file-1.png', 'name' => $propertyName . '-Document.pdf'],
    ['image' => 'images/home/file-2.png', 'name' => $propertyName . '-Brochure.pdf'],
];
$overview = $property['overview'] ?? [
    ['icon' => 'icon-house-line', 'label' => 'ID', 'value' => $overviewId],
    ['icon' => 'icon-sliders-horizontal', 'label' => 'Type', 'value' => $category],
    ['icon' => 'icon-garage', 'label' => 'Garages', 'value' => '1'],
    ['icon' => 'icon-bed1', 'label' => 'Bedrooms', 'value' => $beds . ' Rooms'],
    ['icon' => 'icon-bathtub', 'label' => 'Bathrooms', 'value' => $baths . ' Rooms'],
    ['icon' => 'icon-crop', 'label' => 'Land Size', 'value' => $sqft . ' SqFt'],
    ['icon' => 'icon-hammer', 'label' => 'Year Built', 'value' => '2024'],
    ['icon' => 'icon-ruler', 'label' => 'Size', 'value' => $sqft . ' SqFt'],
];
$details = $property['details'] ?? [
    ['label' => 'ID', 'value' => '#' . $overviewId],
    ['label' => 'Beds', 'value' => $beds],
    ['label' => 'Price', 'value' => $price],
    ['label' => 'Year built', 'value' => '2024'],
    ['label' => 'Size', 'value' => $sqft . ' sqft'],
    ['label' => 'Type', 'value' => $category],
    ['label' => 'Rooms', 'value' => '9'],
    ['label' => 'Status', 'value' => 'For sale'],
    ['label' => 'Baths', 'value' => $baths],
    ['label' => 'Garage', 'value' => '1'],
];
$features = $property['features'] ?? [
    ['Smoke alarm', 'Carbon monoxide alarm', 'First aid kit', 'Self check-in with lockbox', 'Security cameras'],
    ['Hangers', 'Bed linens', 'Extra pillows & blankets', 'Iron', 'TV with standard cable'],
    ['Refrigerator', 'Microwave', 'Dishwasher', 'Coffee maker'],
];
$featureItems = [];
foreach (is_array($features) ? $features : [] as $featureGroup) {
    if (is_array($featureGroup)) {
        foreach ($featureGroup as $featureItem) {
            $featureText = trim((string) $featureItem);
            if ($featureText !== '') {
                $featureItems[] = $featureText;
            }
        }
        continue;
    }

    $featureText = trim((string) $featureGroup);
    if ($featureText !== '') {
        $featureItems[] = $featureText;
    }
}
$featureItems = array_slice(array_values(array_unique($featureItems)), 0, 15);
$featureColumns = array_chunk($featureItems, 5);
$map = $property['map'] ?? [
    'address' => $location,
    'city' => 'Agra',
    'state' => 'Uttar Pradesh',
    'postal' => '282001',
    'area' => $sqft . ' SqFt',
    'country' => 'India',
];
$mapEmbed = $property['mapEmbed'] ?? 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d135905.11693909427!2d-73.95165795400088!3d41.17584829642291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sNew%20York!5e0!3m2!1sen!2s!4v1727094281524!5m2!1sen!2s';
$mapEmbed = trim((string) $mapEmbed);
if ($mapEmbed !== '' && stripos($mapEmbed, '<iframe') !== false) {
    if (preg_match('/src=["\']([^"\']+)["\']/i', $mapEmbed, $matches) === 1 && isset($matches[1])) {
        $mapEmbed = trim((string) $matches[1]);
    } else {
        $mapEmbed = '';
    }
}
if (trim($mapEmbed) === '') {
    $mapQuery = trim(implode(', ', array_filter([$map['address'] ?? '', $map['city'] ?? '', $map['state'] ?? '', $map['country'] ?? ''])));
    if ($mapQuery === '') {
        $mapQuery = $location;
    }
    $mapEmbed = 'https://maps.google.com/maps?q=' . rawurlencode($mapQuery) . '&output=embed';
}
$defaultWebsiteUrl = property_asset_url($basePath, 'contact.php');
if ($propertySlug !== '') {
    $defaultWebsiteUrl .= '?property=' . rawurlencode($propertySlug);
}
$websiteUrl = $property['websiteUrl'] ?? $defaultWebsiteUrl;
$websiteLabel = $property['websiteLabel'] ?? 'Click here for more info';
$websiteIsExternal = preg_match('/^https?:\/\//i', $websiteUrl) === 1;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap">
    <meta name="description" content="Real Estate HTML Template">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php include $basePath . '/components/links.php'; ?>
</head>

<body class="body">
    <?php include $basePath . '/components/loader.php'; ?>

    <div id="wrapper">
        <div id="pagee" class="clearfix">
            <?php include $basePath . '/components/header.php'; ?>
            <div class="flat-section-v4">
                <div class="container">
                    <div class="header-property-detail">
                        <div class="content-top d-flex justify-content-between align-items-center">
                            <div class="property-title-group">
                                <h3 class="title link fw-8">
                                    <?php echo htmlspecialchars($propertyName, ENT_QUOTES, 'UTF-8'); ?></h3>

                            </div>
                            <div class="box-price d-flex align-items-end">
                                <!-- <h3 class="fw-8"><?php echo htmlspecialchars($price, ENT_QUOTES, 'UTF-8'); ?></h3> -->
                                <?php if ($websiteUrl !== ''): ?>
                                    <a href="<?php echo htmlspecialchars($websiteUrl, ENT_QUOTES, 'UTF-8'); ?>"
                                        class="property-more-info-link" <?php if ($websiteIsExternal): ?>target="_blank"
                                            rel="noopener noreferrer" <?php endif; ?>>
                                        <?php echo htmlspecialchars($websiteLabel, ENT_QUOTES, 'UTF-8'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="content-bottom">
                            <!-- <div class="box-left">
                                <div class="info-box">
                                    <div class="label">Features</div>
                                    <ul class="meta">
                                        <li class="meta-item">
                                            <i class="icon icon-bed"></i>
                                            <span class="text-variant-1">Beds:</span>
                                            <span class="fw-6"><?php echo htmlspecialchars($beds, ENT_QUOTES, 'UTF-8'); ?></span>
                                        </li>
                                        <li class="meta-item">
                                            <i class="icon icon-bath"></i>
                                            <span class="text-variant-1">Baths:</span>
                                            <span class="fw-6"><?php echo htmlspecialchars($baths, ENT_QUOTES, 'UTF-8'); ?></span>
                                        </li>
                                        <li class="meta-item">
                                            <i class="icon icon-sqft"></i>
                                            <span class="text-variant-1">Sqft:</span>
                                            <span class="fw-6"><?php echo htmlspecialchars($sqft, ENT_QUOTES, 'UTF-8'); ?></span>
                                        </li>
                                    </ul>
                                </div> -->
                            <!-- <div class="info-box">
                                    <div class="label">Location</div>
                                    <p class="meta-item"><span class="icon icon-mapPin"></span><span class="text-variant-1"><?php echo htmlspecialchars($location, ENT_QUOTES, 'UTF-8'); ?></span></p>
                                </div> -->
                        </div>
                        <!-- <ul class="icon-box">
                                <li><a href="#" class="item">
                                        <svg class="icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.75 6.1875C15.75 4.32375 14.1758 2.8125 12.234 2.8125C10.7828 2.8125 9.53625 3.657 9 4.86225C8.46375 3.657 7.21725 2.8125 5.76525 2.8125C3.825 2.8125 2.25 4.32375 2.25 6.1875C2.25 11.6025 9 15.1875 9 15.1875C9 15.1875 15.75 11.6025 15.75 6.1875Z" stroke="#A3ABB0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a></li>
                                <li><a href="#" class="item">
                                        <svg class="icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.625 15.75L2.25 12.375M2.25 12.375L5.625 9M2.25 12.375H12.375M12.375 2.25L15.75 5.625M15.75 5.625L12.375 9M15.75 5.625H5.625" stroke="#A3ABB0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a></li>
                                <li><a href="#" class="item">
                                        <svg class="icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.41251 8.18022C5.23091 7.85345 4.94594 7.59624 4.60234 7.44895C4.25874 7.30167 3.87596 7.27265 3.51408 7.36645C3.1522 7.46025 2.83171 7.67157 2.60293 7.96722C2.37414 8.26287 2.25 8.62613 2.25 8.99997C2.25 9.37381 2.37414 9.73706 2.60293 10.0327C2.83171 10.3284 3.1522 10.5397 3.51408 10.6335C3.87596 10.7273 4.25874 10.6983 4.60234 10.551C4.94594 10.4037 5.23091 10.1465 5.41251 9.81972M5.41251 8.18022C5.54751 8.42322 5.62476 8.70222 5.62476 8.99997C5.62476 9.29772 5.54751 9.57747 5.41251 9.81972M5.41251 8.18022L12.587 4.19472M5.41251 9.81972L12.587 13.8052M12.587 4.19472C12.6922 4.39282 12.8358 4.56797 13.0095 4.70991C13.1832 4.85186 13.3834 4.95776 13.5985 5.02143C13.8135 5.08509 14.0392 5.10523 14.2621 5.08069C14.4851 5.05614 14.7009 4.98739 14.897 4.87846C15.093 4.76953 15.2654 4.62261 15.404 4.44628C15.5427 4.26995 15.6448 4.06775 15.7043 3.85151C15.7639 3.63526 15.7798 3.40931 15.751 3.18686C15.7222 2.96442 15.6494 2.74994 15.5368 2.55597C15.3148 2.17372 14.9518 1.89382 14.5256 1.77643C14.0995 1.65904 13.6443 1.71352 13.2579 1.92818C12.8715 2.14284 12.5848 2.50053 12.4593 2.92436C12.3339 3.34819 12.3797 3.80433 12.587 4.19472ZM12.587 13.8052C12.4794 13.999 12.4109 14.2121 12.3856 14.4323C12.3603 14.6525 12.3787 14.8756 12.4396 15.0887C12.5005 15.3019 12.6028 15.5009 12.7406 15.6746C12.8784 15.8482 13.0491 15.9929 13.2429 16.1006C13.4367 16.2082 13.6498 16.2767 13.87 16.302C14.0902 16.3273 14.3133 16.3089 14.5264 16.248C14.7396 16.1871 14.9386 16.0848 15.1122 15.947C15.2858 15.8092 15.4306 15.6385 15.5383 15.4447C15.7557 15.0534 15.8087 14.5917 15.6857 14.1612C15.5627 13.7307 15.2737 13.3668 14.8824 13.1493C14.491 12.9319 14.0293 12.8789 13.5989 13.0019C13.1684 13.1249 12.8044 13.4139 12.587 13.8052Z" stroke="#A3ABB0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a></li>
                                <li><a href="#" class="item">
                                        <svg class="icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.04 10.3718C4.86 10.3943 4.68 10.4183 4.5 10.4438M5.04 10.3718C7.66969 10.0418 10.3303 10.0418 12.96 10.3718M5.04 10.3718L4.755 13.5M12.96 10.3718C13.14 10.3943 13.32 10.4183 13.5 10.4438M12.96 10.3718L13.245 13.5L13.4167 15.3923C13.4274 15.509 13.4136 15.6267 13.3762 15.7378C13.3388 15.8489 13.2787 15.951 13.1996 16.0376C13.1206 16.1242 13.0244 16.1933 12.9172 16.2407C12.8099 16.288 12.694 16.3125 12.5767 16.3125H5.42325C4.92675 16.3125 4.53825 15.8865 4.58325 15.3923L4.755 13.5M4.755 13.5H3.9375C3.48995 13.5 3.06072 13.3222 2.74426 13.0057C2.42779 12.6893 2.25 12.2601 2.25 11.8125V7.092C2.25 6.28125 2.826 5.58075 3.62775 5.46075C4.10471 5.3894 4.58306 5.32764 5.0625 5.2755M13.2435 13.5H14.0618C14.2834 13.5001 14.5029 13.4565 14.7078 13.3718C14.9126 13.287 15.0987 13.1627 15.2555 13.006C15.4123 12.8493 15.5366 12.6632 15.6215 12.4585C15.7063 12.2537 15.75 12.0342 15.75 11.8125V7.092C15.75 6.28125 15.174 5.58075 14.3723 5.46075C13.8953 5.38941 13.4169 5.32764 12.9375 5.2755M12.9375 5.2755C10.3202 4.99073 7.67978 4.99073 5.0625 5.2755M12.9375 5.2755V2.53125C12.9375 2.0655 12.5595 1.6875 12.0938 1.6875H5.90625C5.4405 1.6875 5.0625 2.0655 5.0625 2.53125V5.2755M13.5 7.875H13.506V7.881H13.5V7.875ZM11.25 7.875H11.256V7.881H11.25V7.875Z" stroke="#A3ABB0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a></li>
                            </ul> -->
                    </div>
                </div>
            </div>
        </div>
        <section class="flat-slider-detail-v1 flat-slider-detail-v2 px-10">
            <div class="container">
                <div dir="ltr" class="swiper tf-sw-location" data-preview="3" data-tablet="2" data-mobile-sm="1"
                    data-mobile="1" data-space-lg="10" data-space-md="10" data-space="10" data-pagination="1"
                    data-pagination-sm="1" data-pagination-md="1" data-pagination-lg="3">
                    <div class="swiper-wrapper">
                        <?php foreach ($galleryImages as $galleryImage): ?>
                            <div class="swiper-slide">
                                <a href="<?php echo htmlspecialchars(property_asset_url($basePath, $galleryImage), ENT_QUOTES, 'UTF-8'); ?>"
                                    data-fancybox="gallery" class="box-img-detail d-block">
                                    <img src="<?php echo htmlspecialchars(property_asset_url($basePath, $galleryImage), ENT_QUOTES, 'UTF-8'); ?>"
                                        alt="<?php echo htmlspecialchars($propertyName, ENT_QUOTES, 'UTF-8'); ?>">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="sw-pagination sw-pagination-location text-center"></div>
                </div>
            </div>
        </section>
        <section class="flat-section-v3 flat-property-detail">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-7">
                        <div class="single-property-element single-property-desc">
                            <h5 class="fw-6 title">Description</h5>
                            <?php foreach ($description as $index => $paragraph): ?>
                                <p class="<?php echo $index === 0 ? 'text-variant-1' : 'mt-8 text-variant-1'; ?>">
                                    <?php echo htmlspecialchars($paragraph, ENT_QUOTES, 'UTF-8'); ?></p>
                            <?php endforeach; ?>
                        </div>
                        <!-- <div class="single-property-element single-property-overview">
                                <h6 class="title fw-6">Overview</h6>
                                <ul class="info-box">
                                    <?php foreach ($overview as $item): ?>
                                        <li class="item">
                                            <a href="#" class="box-icon w-52"><i class="icon <?php echo htmlspecialchars($item['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i></a>
                                            <div class="content">
                                                <span class="label"><?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?>:</span>
                                                <span><?php echo htmlspecialchars($item['value'], ENT_QUOTES, 'UTF-8'); ?></span>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div> -->
                        <div class="single-property-element single-property-info">
                            <h5 class="title fw-6">Property Details</h5>
                            <div class="row">
                                <?php foreach ($details as $item): ?>
                                    <div class="col-md-6">
                                        <div class="inner-box">
                                            <span
                                                class="label text-black-3"><?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></span>
                                            <div class="content text-black-3">
                                                <?php echo htmlspecialchars($item['value'], ENT_QUOTES, 'UTF-8'); ?></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="single-property-element single-property-feature">
                            <h5 class="title fw-6">Amenities And Features</h5>
                            <div class="wrap-feature">
                                <?php foreach ($featureColumns as $featureGroup): ?>
                                    <div class="box-feature">
                                        <ul>
                                            <?php foreach ($featureGroup as $featureItem): ?>
                                                <li class="feature-item">
                                                    <?php echo htmlspecialchars($featureItem, ENT_QUOTES, 'UTF-8'); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="single-property-element single-property-map">
                            <h5 class="title fw-6">Map location</h5>
                            <iframe class="map" src="<?php echo htmlspecialchars($mapEmbed, ENT_QUOTES, 'UTF-8'); ?>"
                                height="478" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <div class="info-map">
                                <ul class="box-left">
                                    <li>
                                        <span class="label fw-6">Address</span>
                                        <div class="text text-variant-1">
                                            <?php echo htmlspecialchars($map['address'], ENT_QUOTES, 'UTF-8'); ?></div>
                                    </li>
                                    <li>
                                        <span class="label fw-6">City</span>
                                        <div class="text text-variant-1">
                                            <?php echo htmlspecialchars($map['city'], ENT_QUOTES, 'UTF-8'); ?></div>
                                    </li>
                                    <li>
                                        <span class="label fw-6">State/county</span>
                                        <div class="text text-variant-1">
                                            <?php echo htmlspecialchars($map['state'], ENT_QUOTES, 'UTF-8'); ?></div>
                                    </li>
                                </ul>
                                <ul class="box-right">
                                    <li>
                                        <span class="label fw-6">Postal code</span>
                                        <div class="text text-variant-1">
                                            <?php echo htmlspecialchars($map['postal'], ENT_QUOTES, 'UTF-8'); ?></div>
                                    </li>
                                    <li>
                                        <span class="label fw-6">Area</span>
                                        <div class="text text-variant-1">
                                            <?php echo htmlspecialchars($map['area'], ENT_QUOTES, 'UTF-8'); ?></div>
                                    </li>
                                    <li>
                                        <span class="label fw-6">Country</span>
                                        <div class="text text-variant-1">
                                            <?php echo htmlspecialchars($map['country'], ENT_QUOTES, 'UTF-8'); ?></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="single-property-element single-property-attachments">
                                <h6 class="title fw-6">File Attachments</h6>
                                <div class="row">
                                    <?php foreach ($attachments as $attachment): ?>
                                        <div class="col-sm-6">
                                            <a href="#" target="_blank" class="attachments-item">
                                                <div class="box-icon w-60">
                                                    <img src="<?php echo htmlspecialchars(property_asset_url($basePath, $attachment['image']), ENT_QUOTES, 'UTF-8'); ?>" alt="file">
                                                </div>
                                                <span><?php echo htmlspecialchars($attachment['name'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                <i class="icon icon-download"></i>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div> -->
                        <div class="single-property-element single-property-nearby">
                            <h5 class="title fw-6">What's nearby?</h5>
                            <p><?php echo htmlspecialchars($nearby, ENT_QUOTES, 'UTF-8'); ?></p>
                            <ul class="nearby-list mt-12">
                                <?php foreach ($nearbyItems as $nearbyItem): ?>
                                    <li class="text-variant-1 mb-8">
                                        <span class="nearby-bullet" aria-hidden="true"></span>
                                        <span
                                            class="nearby-text"><?php echo htmlspecialchars($nearbyItem, ENT_QUOTES, 'UTF-8'); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include $basePath . '/components/footer.php'; ?>
    </div>
    </div>

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
        </svg>
    </div>

    <?php include $basePath . '/components/script.php'; ?>
</body>

</html>
