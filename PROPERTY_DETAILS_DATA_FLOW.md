# Property Details Data Flow Guide

This file explains how property detail pages are working, how data is fetched, and how to update each page with different content.

## 1) How a property detail page is rendered

Each detail page under `property-details/` is a small wrapper file.

Example: `property-details/dream-avenue.php`

What it does:
1. Loads all property records from `components/properties-data.php`
2. Selects one record by its slug key (`dream-avenue`)
3. Sets `$basePath = '..'` (so shared files load correctly from subfolder)
4. Includes `components/property-details-page.php`

So, detail page files do not contain full HTML content. They only choose which property data to show.

## 2) Where the actual data is stored

All unique data for all properties is in:
- `components/properties-data.php`

This file returns a PHP array keyed by slug, for example:
- `grand-valley-empire`
- `dream-avenue`
- `vrindavan-global`
- etc.

Each slug contains fields like:
- `name`
- `pageTitle`
- `category`
- `heroImage`
- `galleryImages`
- `summary`
- `description`
- `location`
- `price`
- `beds`
- `baths`
- `sqft`
- `overviewId`
- `nearby`
- optional custom blocks (`overview`, `details`, `features`, `map`, `attachments`)

## 3) How data is fetched into the UI

The shared template file is:
- `components/property-details-page.php`

It receives one selected `$property` record and maps fields into UI sections:
- Page title from `pageTitle`
- Header title from `name`
- Main gallery from `galleryImages`
- Description paragraphs from `description`
- Feature stats from `beds`, `baths`, `sqft`
- Location block from `location`
- Map info from `map` / `mapEmbed`
- Property Details and Overview from `details` / `overview`

If a field is missing, the template uses default fallback values.

## 4) Why detail pages now show CSS/JS and logos correctly

Detail pages are inside a subfolder (`property-details/`), so relative paths can break unless prefixed.

This is now handled with base-path variables:
- `components/links.php` uses `$assetBasePath` for CSS/font/favicon files
- `components/script.php` uses `$assetBasePath` for JS files
- `components/header.php` and `components/footer.php` use:
  - `$assetBasePath` for image paths (logos)
  - `$siteBasePath` for page links (`index.php`, `properties.php`, etc.)

In `components/property-details-page.php`, both are set from `$basePath`:
- `$assetBasePath = $basePath`
- `$siteBasePath = $basePath`

For detail pages, `$basePath = '..'`, so assets resolve as `../css/...`, `../images/...`, etc.

## 5) How to edit one property's content

1. Open `components/properties-data.php`
2. Find the property slug block you want to update
3. Edit only that block's values
4. Save and refresh that property detail page

Example edits:
- Change property name: update `name`
- Change hero image: update `heroImage`
- Change gallery images: update `galleryImages` array
- Change description text: update `description` array
- Change metadata: update `location`, `price`, `beds`, `baths`, `sqft`

## 6) How to add a new property detail page

1. Add a new slug entry in `components/properties-data.php`
2. Create a new wrapper file in `property-details/` (copy any existing one)
3. In that wrapper, select the new slug and include `components/property-details-page.php`
4. Update card links (home/properties listings) to point to the new file

## 7) Important note

Do not add inline CSS in detail pages.
Use existing classes and shared styles from external CSS files only.
