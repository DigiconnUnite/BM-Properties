<?php

require_once __DIR__ . '/_bootstrap.php';

require_csrf_post();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && (string) ($_POST['action'] ?? '') === 'delete') {
    $id = (int) ($_POST['id'] ?? 0);
    if ($id > 0) {
        delete_property($id);
    }
    header('Location: properties.php');
    exit;
}

function admin_property_count(string $whereClause): int
{
    $conn = db();
    $result = $conn->query('SELECT COUNT(*) AS total FROM properties WHERE ' . $whereClause);
    $row = $result ? $result->fetch_assoc() : [];

    return (int) ($row['total'] ?? 0);
}

$pageTitle = 'Listing List';
$activePage = 'properties';
$perPage = 10;
$page = max(1, (int) ($_GET['p'] ?? 1));
$offset = ($page - 1) * $perPage;
$total = get_admin_properties_total_count();
$properties = get_admin_properties_paginated($offset, $perPage);
$forSaleCount = admin_property_count("listing_type = 'for_sale'");
$forRentCount = admin_property_count("listing_type = 'for_rent'");

$propertyCards = [
    [
        'label' => 'Total Properties',
        'value' => number_format($total),
        'note' => 'All records in the database',
        'icon' => 'fa-building',
    ],
    [
        'label' => 'For Sale / Rent',
        'value' => number_format(admin_property_count("listing_type = 'for_sale_rent'")),
        'note' => 'Hybrid listings available',
        'icon' => 'fa-house-circle-check',
    ],
    [
        'label' => 'For Sale',
        'value' => number_format($forSaleCount),
        'note' => 'Properties available for sale',
        'icon' => 'fa-tags',
    ],
    [
        'label' => 'For Rent',
        'value' => number_format($forRentCount),
        'note' => 'Properties available for rent',
        'icon' => 'fa-key',
    ],
];

$startRecord = $total > 0 ? $offset + 1 : 0;
$endRecord = min($offset + $perPage, $total);

require_once __DIR__ . '/_layout.php';
admin_layout_top($pageTitle, $activePage);
?>
<div class="main-content properties-page-layout">
    <section class="properties-hero">
        <div>
            <!-- <div class="properties-hero-kicker">Real Estate</div> -->
            <h2 class="properties-hero-title">All Properties</h2>
            <p class="properties-hero-subtitle">A polished overview of all listings with quick access to manage, review, or remove each property.</p>
        </div>
        <a class="btn btn-primary admin-btn properties-add-btn" href="modules/properties/create.php">
            <i class="fa-solid fa-plus"></i>
            <span>Add New Property</span>
        </a>
    </section>

    <section class="properties-stats-grid">
        <?php foreach ($propertyCards as $card): ?>
            <article class="admin-card properties-stat-card">
                <div class="properties-stat-top">
                    <div class="properties-stat-copy">
                        <span class="properties-stat-label"><?php echo htmlspecialchars($card['label'], ENT_QUOTES, 'UTF-8'); ?></span>
                        <strong class="properties-stat-value"><?php echo htmlspecialchars($card['value'], ENT_QUOTES, 'UTF-8'); ?></strong>
                        <span class="properties-stat-note"><?php echo htmlspecialchars($card['note'], ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    <div class="properties-stat-icon">
                        <i class="fa-solid <?php echo htmlspecialchars($card['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </section>

    <section class="admin-card properties-table-card" id="properties-table">
        <div class="admin-card-head properties-card-head">
            <div>
                <!-- <h2>All Properties List</h2> -->
                <p class="properties-table-subtitle">Showing <?php echo $startRecord; ?> to <?php echo $endRecord; ?> of <?php echo number_format($total); ?> properties</p>
            </div>
            <!-- <span class="properties-period-chip">This Month <i class="fa-solid fa-chevron-down"></i></span> -->
        </div>
        <div class="table-responsive properties-table-wrap">
            <table class="table admin-table properties-table">
                <thead>
                    <tr>
                        <th>Properties Photo &amp; Name</th>
                        <th>Property Type</th>
                        <th>Rent/Sale</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($properties as $property): ?>
                        <?php
                        $listingType = strtolower((string) ($property['listingType'] ?? 'for_sale'));
                        $propertyStatus = strtolower((string) ($property['status'] ?? 'active'));
                        $propertyAddress = trim((string) ($property['map']['address'] ?? ''));
                        if ($propertyAddress === '' || $propertyAddress === 'Address not specified') {
                            $propertyAddress = trim((string) ($property['location'] ?? ''));
                        }
                        $heroImage = resolve_asset_path((string) ($property['heroImage'] ?? ''), '..');
                        if ($heroImage === '') {
                            $heroImage = resolve_asset_path('images/banner/banner-property-1.webp', '..');
                        }
                        ?>
                        <tr>
                            <td>
                                <div class="property-media-cell">
                                    <div class="property-media-thumb">
                                        <img src="<?php echo htmlspecialchars($heroImage, ENT_QUOTES, 'UTF-8'); ?>"
                                            alt="<?php echo htmlspecialchars((string) ($property['name'] ?? 'Property'), ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="property-media-copy">
                                        <div class="property-media-title">
                                            <?php echo htmlspecialchars((string) ($property['name'] ?? 'Property'), ENT_QUOTES, 'UTF-8'); ?>
                                        </div>
                                        <!-- <div class="property-media-subtitle">
                                            <?php echo htmlspecialchars((string) ($property['category'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                                        </div> -->
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="property-type-badge">
                                    <?php echo htmlspecialchars((string) ($property['category'] ?? 'Property'), ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            </td>
                            <td>
                                <span class="property-type-badge property-type-<?php echo htmlspecialchars($listingType, ENT_QUOTES, 'UTF-8'); ?>">
                                    <?php echo htmlspecialchars(listing_type_label($listingType), ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            </td>
                            <td class="properties-location-cell">
                                <?php echo htmlspecialchars($propertyAddress, ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <td>
                                <span class="admin-badge-status property-status-badge <?php echo $propertyStatus === 'active' ? 'active' : 'inactive'; ?>">
                                    <?php echo htmlspecialchars(ucfirst($propertyStatus), ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            </td>
                            <td>
                                <div class="property-action-group">
                                    <a class="property-icon-btn property-view-btn"
                                        href="../property-details.php?slug=<?php echo rawurlencode((string) ($property['slug'] ?? '')); ?>"
                                        target="_blank" rel="noopener noreferrer" aria-label="View property">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                    <a class="property-icon-btn property-edit-btn"
                                        href="modules/properties/edit.php?id=<?php echo (int) $property['id']; ?>"
                                        aria-label="Edit property">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <form method="post" class="inline-form" action="modules/properties/delete.php"
                                        onsubmit="return confirm('Delete this property?');">
                                        <input type="hidden" name="csrf_token"
                                            value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo (int) $property['id']; ?>">
                                        <button class="property-icon-btn property-delete-btn" type="submit" aria-label="Delete property">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <?php $paginationHtml = render_admin_pagination($total, $perPage, $page, 'properties.php'); ?>
    <?php if ($paginationHtml !== ''): ?>
        <div class="properties-pagination-wrap">
            <div class="admin-pagination-info">Page <?php echo $page; ?> of <?php echo max(1, (int) ceil($total / $perPage)); ?></div>
            <?php echo $paginationHtml; ?>
        </div>
    <?php endif; ?>
</div>
<?php admin_layout_bottom(); ?>
