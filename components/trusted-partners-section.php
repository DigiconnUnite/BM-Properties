<?php
$trustedSettings = get_site_settings();
$trustedHeading = (string) ($trustedSettings['trusted_partners_heading'] ?? 'Trusted by over 20+ major companies');
$trustedPartners = get_trusted_partners(true);
$trustedSectionClass = $trustedSectionClass ?? 'flat-section pt-0';
?>
<section class="<?php echo htmlspecialchars($trustedSectionClass, ENT_QUOTES, 'UTF-8'); ?>">
    <div class="container2">
        <h6 class="mb-20 text-center text-capitalize text-black-4"><?php echo htmlspecialchars($trustedHeading, ENT_QUOTES, 'UTF-8'); ?></h6>
        <div dir="ltr" class="swiper tf-sw-partner" data-preview="6" data-tablet="4" data-mobile-sm="3"
            data-mobile="3" data-space="15" data-space-md="30" data-space-lg="30" data-loop="true"
            data-autoplay="true" data-delay="0">
            <div class="swiper-wrapper">
                <?php foreach ($trustedPartners as $partner): ?>
                    <div class="swiper-slide">
                        <div class="partner-item">
                            <?php
                            $logoPath = (string) ($partner['logo_path'] ?? '');
                            $companyName = (string) ($partner['company_name'] ?? '');
                            ?>
                            <img class="lazyload" data-src="<?php echo htmlspecialchars($logoPath, ENT_QUOTES, 'UTF-8'); ?>"
                                src="<?php echo htmlspecialchars($logoPath, ENT_QUOTES, 'UTF-8'); ?>"
                                alt="<?php echo htmlspecialchars($companyName, ENT_QUOTES, 'UTF-8'); ?>" />
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if (count($trustedPartners) === 0): ?>
                    <div class="swiper-slide">
                        <div class="partner-item">
                            <img class="lazyload" data-src="images/logo/logo-new2.png" src="images/logo/logo-new2.png" alt="BM Properties" />
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
