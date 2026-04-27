<?php
require_once __DIR__ . '/../includes/app.php';
$assetBasePath = isset($assetBasePath) ? rtrim($assetBasePath, '/') . '/' : '';
$siteBasePath = isset($siteBasePath) ? rtrim($siteBasePath, '/') . '/' : '';
$footerProperties = array_slice(array_values(get_all_properties()), 0, 5);
$settings = get_site_settings();
$globalNotice = get_flash('global_notice');
$globalWhatsappNumber = normalize_phone((string) ($settings['phone'] ?? ''));
$globalWhatsappLink = $globalWhatsappNumber !== '' ? ('https://wa.me/' . $globalWhatsappNumber . '?text=Hello%20BM%20Real%20Estate') : '';
?>
<?php if ($globalWhatsappLink !== ''): ?>
    <a href="<?php echo htmlspecialchars($globalWhatsappLink, ENT_QUOTES, 'UTF-8'); ?>" class="whatsapp-float-btn"
        target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
            <path fill="currentColor"
                d="M16 3C8.82 3 3 8.74 3 15.83c0 2.51.74 4.97 2.14 7.08L3 29l6.3-2.06a13.1 13.1 0 0 0 6.7 1.82c7.18 0 13-5.74 13-12.83S23.18 3 16 3Zm0 23.65c-2.07 0-4.08-.56-5.83-1.64l-.42-.25-3.74 1.22 1.23-3.63-.27-.42a11.6 11.6 0 0 1-1.79-6.1C5.18 9.93 10.03 5.2 16 5.2s10.82 4.73 10.82 10.63S21.97 26.65 16 26.65Zm6.1-8.08c-.33-.16-1.97-.96-2.27-1.07-.3-.1-.52-.16-.74.16-.22.31-.85 1.06-1.04 1.28-.19.21-.37.24-.7.08-.33-.16-1.38-.5-2.63-1.58-.97-.84-1.63-1.88-1.82-2.2-.19-.31-.02-.48.14-.64.14-.14.33-.37.49-.56.16-.18.21-.31.32-.52.11-.21.05-.39-.03-.55-.08-.16-.74-1.77-1.01-2.43-.27-.64-.54-.55-.74-.56h-.63c-.22 0-.57.08-.86.39s-1.13 1.1-1.13 2.67c0 1.56 1.16 3.08 1.32 3.29.16.21 2.27 3.6 5.62 4.9.8.35 1.42.56 1.9.72.8.25 1.52.21 2.09.13.64-.1 1.97-.79 2.25-1.56.28-.77.28-1.42.19-1.56-.08-.13-.3-.21-.63-.36Z" />
        </svg>
    </a>
<?php endif; ?>
<?php if ($globalNotice !== ''): ?>
    <div class="global-popup-notice" role="alert"><?php echo htmlspecialchars($globalNotice, ENT_QUOTES, 'UTF-8'); ?></div>
<?php endif; ?>
<!-- footer -->
<footer class="footer">
    <div class="inner-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-cl-1">
                        <div class="footer-logo mb-16"><a
                                href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>index.php"><img
                                    src="<?php echo htmlspecialchars($assetBasePath, ENT_QUOTES, 'UTF-8'); ?>images/logo/logo-footer-new.png"
                                    alt="logo" width="166" height="48"></a></div>
                        <p class="text-variant-2">BM Real Estate is committed to helping you find the right property
                            with ease and confidence. We specialize in offering trusted real estate solutions, including
                            under-construction and investment-ready projects in prime locations.</p>

                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-cl-3 footer-col-block">
                        <div class="fw-7 text-white footer-heading-mobile">Navigation</div>
                        <div class="tf-collapse-content">
                            <ul class="mt-10 navigation-menu-footer">
                                <li> <a href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>index.php"
                                        class="caption-1 text-variant-2">Home</a> </li>
                                <li> <a href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>about.php"
                                        class="caption-1 text-variant-2">About</a> </li>

                                <li> <a href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>gallery.php"
                                        class="caption-1 text-variant-2">Gallery</a> </li>
                                <li> <a href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>properties.php"
                                        class="caption-1 text-variant-2">Properties</a> </li>
                                <li> <a href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>contact.php"
                                        class="caption-1 text-variant-2">Contact</a> </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-cl-2 footer-col-block">
                        <div class="fw-7 text-white footer-heading-mobile">Our Properties</div>
                        <div class="tf-collapse-content">
                            <ul class="mt-10 navigation-menu-footer">
                                <?php foreach ($footerProperties as $footerProperty): ?>
                                    <li>
                                        <a href="<?php echo htmlspecialchars($siteBasePath, ENT_QUOTES, 'UTF-8'); ?>property-details.php?slug=<?php echo rawurlencode((string) $footerProperty['slug']); ?>"
                                            class="caption-1 text-variant-2">
                                            <?php echo htmlspecialchars((string) $footerProperty['name'], ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="footer-cl-4 footer-col-block">
                        <div class="fw-7 text-white footer-heading-mobile">Contact Info</div>
                        <ul class="mt-12">
                            <li class="mt-12 d-flex align-items-center gap-8">
                                <i class="icon icon-mapPinLine fs-20 text-variant-2"></i>
                                <p class="text-white">
                                    <?php echo htmlspecialchars((string) ($settings['office_address'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                                </p>
                            </li>
                            <li class="mt-12 d-flex align-items-center gap-8">
                                <i class="icon icon-phone2 fs-20 text-variant-2"></i>
                                <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', (string) ($settings['phone'] ?? '')); ?>"
                                    class="text-white caption-1"><?php echo htmlspecialchars((string) ($settings['phone'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></a>
                            </li>
                            <li class="mt-12 d-flex align-items-center gap-8">
                                <i class="icon icon-mail fs-20 text-variant-2"></i>
                                <p class="text-white">
                                    <?php echo htmlspecialchars((string) ($settings['email'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                                </p>
                            </li>
                        </ul>
                        <div class="wd-social mt-20">
                            <!-- <span>Follow Us:</span> -->
                            <ul class="list-social d-flex align-items-center mt-12">
                                <li>
                                    <a href="#" class="box-icon w-40 social" aria-label="Facebook">
                                        <svg class="icon" width="9" height="16" viewBox="0 0 9 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.60547 9L8.00541 6.10437H5.50481V4.22531C5.50481 3.43313 5.85413 2.66094 6.97406 2.66094H8.11087V0.195625C8.11087 0.195625 7.07925 0 6.09291 0C4.03359 0 2.68753 1.38688 2.68753 3.8975V6.10437H0.398438V9H2.68753V16H5.50481V9H7.60547Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                </li>

                                <li><a href="#" class="box-icon w-40 social" aria-label="Instagram">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.99812 4.66567C5.71277 4.66567 4.66383 5.71463 4.66383 7C4.66383 8.28537 5.71277 9.33433 6.99812 9.33433C8.28346 9.33433 9.3324 8.28537 9.3324 7C9.3324 5.71463 8.28346 4.66567 6.99812 4.66567ZM13.9992 7C13.9992 6.03335 14.008 5.07545 13.9537 4.11055C13.8994 2.98979 13.6437 1.99512 12.8242 1.17556C12.0029 0.35426 11.01 0.100338 9.88927 0.0460516C8.92263 -0.00823506 7.96475 0.000520879 6.99987 0.000520879C6.03323 0.000520879 5.07536 -0.00823506 4.11047 0.0460516C2.98973 0.100338 1.99508 0.356011 1.17554 1.17556C0.354253 1.99687 0.100336 2.98979 0.0460508 4.11055C-0.00823491 5.0772 0.00052087 6.0351 0.00052087 7C0.00052087 7.9649 -0.00823491 8.92455 0.0460508 9.88945C0.100336 11.0102 0.356004 12.0049 1.17554 12.8244C1.99683 13.6457 2.98973 13.8997 4.11047 13.9539C5.07711 14.0082 6.03499 13.9995 6.99987 13.9995C7.9665 13.9995 8.92438 14.0082 9.88927 13.9539C11.01 13.8997 12.0047 13.644 12.8242 12.8244C13.6455 12.0031 13.8994 11.0102 13.9537 9.88945C14.0097 8.92455 13.9992 7.96665 13.9992 7ZM6.99812 10.5917C5.01056 10.5917 3.40651 8.98759 3.40651 7C3.40651 5.01241 5.01056 3.40832 6.99812 3.40832C8.98567 3.40832 10.5897 5.01241 10.5897 7C10.5897 8.98759 8.98567 10.5917 6.99812 10.5917ZM10.7368 4.10004C10.2728 4.10004 9.89802 3.72529 9.89802 3.26122C9.89802 2.79716 10.2728 2.42241 10.7368 2.42241C11.2009 2.42241 11.5756 2.79716 11.5756 3.26122C11.5758 3.37142 11.5542 3.48056 11.5121 3.58239C11.47 3.68422 11.4082 3.77675 11.3303 3.85467C11.2523 3.93258 11.1598 3.99437 11.058 4.03647C10.9562 4.07858 10.847 4.10018 10.7368 4.10004Z"
                                                fill="white" />
                                        </svg>

                                    </a></li>
                                <li><a href="#" class="box-icon w-40 social" aria-label="YouTube">
                                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.6657 1.76024C15.4817 1.06737 14.9395 0.521689 14.2511 0.336504C13.0033 0 8 0 8 0C8 0 2.99669 0 1.7489 0.336504C1.06052 0.521718 0.518349 1.06737 0.334336 1.76024C0 3.01611 0 5.63636 0 5.63636C0 5.63636 0 8.25661 0.334336 9.51248C0.518349 10.2053 1.06052 10.7283 1.7489 10.9135C2.99669 11.25 8 11.25 8 11.25C8 11.25 13.0033 11.25 14.2511 10.9135C14.9395 10.7283 15.4817 10.2053 15.6657 9.51248C16 8.25661 16 5.63636 16 5.63636C16 5.63636 16 3.01611 15.6657 1.76024ZM6.36363 8.01535V3.25737L10.5454 5.63642L6.36363 8.01535Z"
                                                fill="white" />
                                        </svg>

                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="content-footer-bottom">
                <div class="copyright">All Rights Reserved 2026 <a href="index.php">BM Properties</a>.</div>
                <div class="developed-by">Designed by <a href="https://digiconnunite.com/" target="_blank"
                        rel="noopener noreferrer">Digiconn Unite Pvt Ltd</a></div>

                <ul class="menu-bottom">
                    <li><a href="terms.php">Terms Of Services</a> </li>

                    <li><a href="privacy.php">Privacy Policy</a> </li>
                    <!-- <li><a href="contact.html">Cookie Policy</a> </li> -->

                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->