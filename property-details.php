<?php

require_once __DIR__ . '/includes/app.php';

$slug = isset($_GET['slug']) ? normalize_slug((string) $_GET['slug']) : '';
$property = $slug !== '' ? get_property_by_slug($slug) : null;

if (!$property) {
	$allProperties = get_all_properties();
	$property = !empty($allProperties) ? reset($allProperties) : null;
}

if (!$property) {
	http_response_code(404);
	exit('No properties found. Please add properties from admin panel.');
}

$basePath = '.';

include __DIR__ . '/components/property-details-page.php';
