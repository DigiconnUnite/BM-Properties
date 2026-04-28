# Database Installation Instructions

This document provides step-by-step instructions for updating the BM Properties database with the new features.

## New Features Added

1. **Dynamic Hero Section Management**
2. **Property Badge Management (Featured/For Sale)**

## Installation Steps

### 1. Hero Section Table Creation

Run the following SQL command to create the hero section table:

```sql
-- Run this file: database/create_hero_section_table.sql
```

This will:
- Create the `hero_section` table
- Insert default hero section data
- Set up proper indexes for performance

### 2. Property Badge Fields

**IMPORTANT**: If you have an existing database, you MUST run this SQL update:

```sql
-- Run this file: database/add_property_badges.sql
```

This will add these columns to the `properties` table:
- `featured_badge_text` (varchar) - Text for the first badge (default: "Featured")
- `for_sale_badge_text` (varchar) - Text for the second badge (default: "For Sale")

**Note**: The main database schema (`bm_properties.sql`) has been updated to include these columns for new installations.

## What Each Feature Does

### Hero Section Management

**Location in Admin Panel:** Hero Section menu item

**Features:**
- Upload up to 4 hero slider images (WEBP format, max 1MB)
- Set title, subtitle (rotating text), and description
- Control sort order and active status
- Images automatically appear in both main slider and circular thumbnails
- Only images slide, text remains static as requested

**Frontend Behavior:**
- Dynamic content replaces static hero section
- Fallback to static content if no dynamic data exists
- Maintains same slider functionality and UI

### Property Badge Management

**Location in Admin Panel:** Property Form → Badge Settings

**Features:**
- Custom text input for "Featured" badge (default: "Featured")
- Custom text input for "For Sale" badge (default: "For Sale")
- Flexible badge text per property (e.g., "Hot Deal", "New Launch", "Available", "Premium")
- Leave field empty to hide specific badge
- Maintains existing badge styling and positioning

**Frontend Behavior:**
- Badges appear on property cards using custom text from admin
- Empty fields hide badges completely
- Maintains existing badge styling (primary and style-1 classes)

## File Locations

### Database Files
- `database/create_hero_section_table.sql` - Hero section table creation
- `database/add_property_badges.sql` - Property badge fields

### Admin Panel Files
- `admin/hero-section.php` - Hero section management interface
- `admin/property-form.php` - Updated with badge controls

### Frontend Files
- `index.php` - Updated to use dynamic hero section
- `components/property-listing.php` - Updated to use dynamic badges

### Repository Functions
- `includes/repository.php` - Added hero section and badge functions

## Performance Optimization

### .htaccess Cache Settings
The `.htaccess` file has been created with:
- Browser caching for images (1 year)
- CSS/JS caching (1 month)
- Font caching (1 year)
- GZIP compression enabled
- Security headers added

## Testing Checklist

After installation, test the following:

### Hero Section
1. Access Admin Panel → Hero Section
2. Add/edit hero section items
3. Upload images and set content
4. Verify homepage displays dynamic content
5. Test slider functionality

### Property Badges
1. Access Admin Panel → Properties → Edit Property
2. Configure badge settings
3. Check property listing page for badge display
4. Test custom badge text functionality

### Performance
1. Verify browser caching is working
2. Check page load times
3. Test compression is enabled

## Troubleshooting

### Hero Section Not Showing
- Check if hero_section table exists
- Verify at least one active hero section item exists
- Check image paths are correct

### Badges Not Displaying
- Run the property badge SQL update
- Check property badge settings in admin panel
- Verify property listing component is updated

### Performance Issues
- Ensure .htaccess file is in root directory
- Check server supports mod_expires and mod_deflate
- Verify file permissions

## Default Data

The hero section table includes sample data with:
- 4 default hero section items
- Existing slider images
- Sample titles and descriptions
- All items set to active

This ensures the dynamic hero section works immediately after installation.
