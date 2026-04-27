<?php
$topProperties = get_top_properties(true, 4);
?>
<?php if (count($topProperties) > 0): ?>
<section class="flat-section bg-primary-new">
    <div class="container">
        <div class="box-title text-center wow fadeInUp">
            <div class="text-subtitle text-primary">Top Properties</div>
            <h3 class="title mt-4">Best Property Value</h3>
        </div>
        <div dir="ltr" class="swiper tf-sw-mobile" data-screen="991" data-preview="1" data-space="15">
            <div class="tf-layout-mobile-lg lg-col-2 swiper-wrapper">
                <?php foreach ($topProperties as $index => $property): ?>
                    <?php
                    $imagePath = (string) ($property['image_path'] ?? '');
                    $imagePath = $imagePath !== '' ? $imagePath : 'images/top-properties/dream-avenues.webp';
                    $detailUrl = trim((string) ($property['detail_url'] ?? ''));
                    $detailUrl = $detailUrl !== '' ? $detailUrl : '#';
                    $title = (string) ($property['title'] ?? '');
                    $tagLabel = (string) (($property['tag_label'] ?? '') !== '' ? $property['tag_label'] : $title);
                    $highlights = array_slice(array_values(array_filter(array_map('strval', $property['highlights'] ?? []))), 0, 3);
                    $delay = '.' . min(4, $index + 1) . 's';
                    ?>
                    <div class="swiper-slide">
                        <div class="homelengo-box top-properties list-style-1 wow fadeInUp" data-wow-delay="<?php echo htmlspecialchars($delay, ENT_QUOTES, 'UTF-8'); ?>">
                            <div class="archive-top">
                                <a class="images-group" href="<?php echo htmlspecialchars($detailUrl, ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="images-style">
                                        <img class="lazyload" data-src="<?php echo htmlspecialchars($imagePath, ENT_QUOTES, 'UTF-8'); ?>"
                                            src="<?php echo htmlspecialchars($imagePath, ENT_QUOTES, 'UTF-8'); ?>" alt="img-property">
                                    </div>
                                    <div class="top">
                                        <ul class="d-flex gap-6 flex-wrap">
                                            <li class="flag-tag primary"><?php echo htmlspecialchars($tagLabel, ENT_QUOTES, 'UTF-8'); ?></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                            <div class="archive-bottom">
                                <div class="content-top">
                                    <h6 class="text-capitalize">
                                        <a class="link text-line-clamp-4" href="<?php echo htmlspecialchars($detailUrl, ENT_QUOTES, 'UTF-8'); ?>">
                                            <?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                    </h6>
                                    <ul class="meta-list top-feature-meta-list">
                                        <?php foreach ($highlights as $highlightIndex => $highlight): ?>
                                            <?php $icons = ['fa-shield-halved', 'fa-faucet', 'fa-tree']; ?>
                                            <li class="item">
                                                <i class="fa-solid <?php echo htmlspecialchars($icons[$highlightIndex] ?? 'fa-circle-check', ENT_QUOTES, 'UTF-8'); ?>"></i>
                                                <span class="text-variant-1"><?php echo htmlspecialchars($highlight, ENT_QUOTES, 'UTF-8'); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <div class="location">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z"
                                                stroke="#A3ABB0" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z"
                                                stroke="#A3ABB0" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <span class="text-line-clamp-4">
                                            <?php echo htmlspecialchars((string) ($property['summary'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="sw-pagination sw-pagination-mb text-center d-lg-none d-block"></div>
        </div>
    </div>
</section>
<?php endif; ?>
