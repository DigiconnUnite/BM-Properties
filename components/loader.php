
<?php
$assetBasePath = isset($assetBasePath) ? rtrim($assetBasePath, '/') . '/' : '';
?>
    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
            <img src="<?php echo htmlspecialchars($assetBasePath, ENT_QUOTES, 'UTF-8'); ?>images/logo/logo-new2.png" alt="Logo">
        </div>
    </div>
    <!-- /preload -->