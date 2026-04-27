# BM Properties - Complete System Documentation

## Table of Contents
1. [System Overview](#system-overview)
2. [File Structure](#file-structure)
3. [Admin Panel](#admin-panel)
4. [Frontend Pages](#frontend-pages)
5. [Database Schema](#database-schema)
6. [Features and Functionality](#features-and-functionality)
7. [How Content Management Works](#how-content-management-works)
8. [Recent Updates](#recent-updates)

## System Overview

BM Properties is a PHP-based real estate management system that allows administrators to manage properties, gallery images, categories, and other content through an admin panel while displaying them dynamically on the frontend.

### Key Technologies
- **Backend**: PHP with MySQL/MariaDB
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Image Processing**: WEBP format support
- **Email**: PHPMailer for automated responses
- **File Upload**: Secure image upload with validation

## File Structure

### Root Directory Structure
```
BM-Properties/
├── admin/                    # Admin panel files
├── components/               # Reusable frontend components
├── config/                  # Configuration files
├── css/                     # Stylesheets
├── database/                # Database schema and migrations
├── fonts/                   # Font files
├── images/                  # Static images
├── includes/                # Core PHP functions and utilities
├── js/                     # JavaScript files
├── property-details/         # Individual property pages
├── uploads/                 # User-uploaded content
├── vendor/                  # Composer dependencies
└── Frontend PHP files       # Public-facing pages
```

### Admin Panel Files (`admin/`)
- `_bootstrap.php` - Admin initialization and security
- `_layout_top.php` - Admin header and sidebar
- `_layout_bottom.php` - Admin footer
- `categories.php` - Category management
- `gallery.php` - Gallery image management
- `property-form.php` - Add/edit properties with dynamic repeaters
- `properties.php` - Property listing management
- `top-properties.php` - Featured properties management
- `cities.php` - Location management
- `partners.php` - Partner companies management
- `testimonials.php` - Customer testimonials
- `messages.php` - Contact form messages
- `enquiries.php` - Property enquiries

### Core System Files (`includes/`)
- `app.php` - Frontend initialization and core functions
- `database.php` - Database connection and configuration
- `mailer.php` - Email functionality with templates
- `migrations.php` - Database schema management
- `repository.php` - Database operations and data access

## Admin Panel

### Authentication & Security
- Session-based authentication with CSRF protection
- Admin user management with profile system
- Secure file upload with validation

### Content Management Features

#### Properties Management
- **Property Form** (`admin/property-form.php`):
  - Dynamic repeaters for amenities, highlights, details
  - Image upload (WEBP format, max 1MB, up to 5 images)
  - Categories, descriptions, location data
  - Map integration with embed support
  - WhatsApp contact integration

- **Property Listing** (`admin/properties.php`):
  - Paginated property management
  - Status control (active/inactive)
  - Quick edit/delete actions

#### Top Properties Management
- **Top Properties Form** (`admin/top-properties.php`):
  - Featured property showcase
  - Dynamic highlights repeater (max 3 items)
  - Image upload and management
  - Removed: detail link and sort order fields

#### Gallery Management
- **Gallery Form** (`admin/gallery.php`):
  - Image upload for frontend gallery
  - Title and status management
  - Paginated listing with thumbnails

#### Categories Management
- **Categories Form** (`admin/categories.php`):
  - Property categorization system
  - Slug generation and management
  - Sort order and status control

### Dynamic Repeaters System
The admin panel uses a sophisticated repeater system for dynamic content:

**JavaScript Implementation** (`js/admin-property-images.js`):
```javascript
initTextRepeater({
  mode: "single",           // or "pair" for label-value pairs
  listId: "features-list",   // Target list container
  addButtonId: "features-add-btn",  // Add button
  storeId: "features-textarea",     // Hidden textarea for form submission
  textInputId: "features-input",     // Input field
  maxItems: 15,             // Optional limit
});
```

**Available Repeaters**:
- **Features/Amenities**: Single text items (max 15)
- **Highlights**: Single text items (max 6 for properties, 3 for top properties)
- **Details**: Label-value pairs with predefined options
- **Nearby Items**: Single text items

## Frontend Pages

### Public-Facing Pages

#### Home Page (`index.php`)
- **Dynamic Gallery Section**: Fetches top 6 images from gallery database
- **Property Listings**: Integrated property showcase
- **Categories Section**: Property type navigation
- **Testimonials**: Customer reviews display

#### About Page (`about.php`)
- **Dynamic Gallery Section**: Same as home page - top 6 gallery images
- **Company Information**: Static content sections
- **Location Showcase**: City/explore sections

#### Property Details Pages (`property-details/`)
- Individual property pages with full information
- Image galleries, amenities, highlights
- Contact and enquiry forms
- Map integration

#### Contact Page (`contact.php`)
- Contact form with validation
- AJAX form submission
- Auto-reply email functionality
- FAQ section

#### Gallery Page (`gallery.php`)
- Public gallery display
- Fancybox lightbox integration
- Responsive grid layout

### Frontend Components (`components/`)
- `header.php` - Navigation and branding
- `footer.php` - Site footer and links
- `loader.php` - Loading animation
- `links.php` - CSS and JS includes
- `property-listing.php` - Reusable property display

## Database Schema

### Core Tables

#### Properties
- Full property information storage
- Gallery images (JSON array)
- Features and amenities (JSON)
- Location and map data
- Status and categorization

#### Gallery Items
- Image path storage
- Title and metadata
- Upload tracking
- Status management

#### Categories
- Property categorization
- Slug generation
- Sort order

#### Top Properties
- Featured property showcase
- Highlights (JSON array)
- Image management

#### Messages & Enquiries
- Contact form submissions
- Property enquiries
- Status tracking

### Data Storage Format
- **JSON Arrays**: Used for complex data like features, highlights, gallery images
- **File Paths**: Relative paths for web access
- **Timestamps**: Created/updated tracking

## Features and Functionality

### Image Management
- **Format Support**: WEBP only (optimized for web)
- **Size Limits**: 1MB per image
- **Upload Security**: MIME type validation, file extension checks
- **Storage**: Organized by type (properties, gallery, top-properties)

### Email System
- **Auto-replies**: Contact form and enquiry submissions
- **Template System**: Consistent branding with color #1563df
- **PHPMailer Integration**: SMTP support with fallback

### Dynamic Content
- **Gallery Integration**: Home and about pages pull from database
- **Property Listings**: Dynamic with pagination
- **Category Filtering**: Property type organization

### Security Features
- **CSRF Protection**: All form submissions protected
- **Input Sanitization**: `clean_text()` function for all inputs
- **SQL Injection Prevention**: Prepared statements throughout
- **File Upload Security**: Extension and MIME validation

## How Content Management Works

### Adding a Property (Step-by-Step)

1. **Access Admin Panel**: Navigate to `admin/properties.php`
2. **Add New Property**: Click to open `admin/property-form.php`
3. **Basic Information**:
   - Select category
   - Enter property title and slug
   - Add reference website URL
4. **Image Upload**:
   - Upload up to 5 WEBP images
   - Use dynamic repeater for management
   - Images automatically populate hero image
5. **Dynamic Content**:
   - **Amenities**: Use repeater to add features (max 15)
   - **Highlights**: Add featured highlights (max 6)
   - **Details**: Add property specifications with predefined labels
6. **Location Information**:
   - Address components (city, state, postal, etc.)
   - Map embed URL or iframe code
7. **Additional Information**:
   - Nearby items with repeater
   - WhatsApp contact number
   - Status (active/inactive)
8. **Save**: Property is stored with all associations

### Managing Gallery Images

1. **Access Gallery**: Navigate to `admin/gallery.php`
2. **Add Images**:
   - Enter image title
   - Upload WEBP image file
   - Set active status
3. **Frontend Display**: Images automatically appear in:
   - Home page gallery section (top 6)
   - About page gallery section (top 6)
   - Public gallery page

### Managing Top Properties

1. **Access Top Properties**: Navigate to `admin/top-properties.php`
2. **Add Featured Property**:
   - Enter title and card tag
   - Upload image
   - Add highlights using dynamic repeater (max 3)
   - Write summary
   - Set active status
3. **Display**: Properties appear in featured sections

## Recent Updates

### Completed Improvements

1. **Top Properties Enhancement**:
   - Removed detail link and sort order fields
   - Added dynamic highlights repeater (similar to amenities)
   - Improved user experience with add/remove functionality

2. **Dynamic Gallery Integration**:
   - Home page now fetches top 6 gallery images from database
   - About page now fetches top 6 gallery images from database
   - Fallback to static images if no gallery items exist
   - Added "Project Gallery" section titles

3. **Email Template Updates**:
   - Updated color scheme to #1563df for brand consistency
   - Applied to contact form auto-replies
   - Applied to enquiry form auto-replies

4. **Code Organization Review**:
   - Analyzed `_layout_top.php` and `_layout_bottom.php`
   - Identified proper separation of concerns
   - Layout files handle HTML structure, content files handle business logic

### Technical Implementation Details

#### Dynamic Highlights Repeater
```php
// HTML Structure
<div class="admin-form-full admin-repeater" id="top-highlights-repeater">
    <label>Highlights</label>
    <div class="admin-repeater-controls">
        <input class="form-control" id="top-highlights-input" type="text" placeholder="Enter highlight">
        <button class="btn btn-outline-primary admin-btn" type="button" id="top-highlights-add-btn">Add</button>
    </div>
    <ul class="admin-upload-list" id="top-highlights-list"></ul>
    <textarea class="form-control d-none" id="top-highlights-textarea" name="highlights" rows="3"></textarea>
</div>
```

#### Gallery Integration
```php
<?php
$galleryItems = get_gallery_items(true);
$topGalleryItems = array_slice($galleryItems, 0, 6);
?>
<?php foreach ($topGalleryItems as $galleryItem): ?>
    <div class="swiper-slide">
        <?php
        $imagePath = (string) ($galleryItem['image_path'] ?? '');
        $imageSrc = preg_match('/^https?:\/\//i', $imagePath) ? $imagePath : $imagePath;
        ?>
        <a href="<?php echo htmlspecialchars($imageSrc, ENT_QUOTES, 'UTF-8'); ?>" data-fancybox="gallery">
            <img src="<?php echo htmlspecialchars($imageSrc, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars((string) $galleryItem['title'], ENT_QUOTES, 'UTF-8'); ?>">
        </a>
    </div>
<?php endforeach; ?>
```

## Best Practices

### Security
- Always sanitize user input using `clean_text()`
- Validate file uploads with MIME type checking
- Use prepared statements for database operations
- Implement CSRF tokens for all forms

### Performance
- Use pagination for large datasets
- Optimize images (WEBP format, size limits)
- Implement caching where appropriate
- Use efficient database queries

### User Experience
- Dynamic repeaters for better content management
- AJAX form submissions for seamless interaction
- Responsive design for mobile compatibility
- Clear feedback messages and error handling

## Conclusion

BM Properties is a comprehensive real estate management system with robust admin functionality, dynamic content management, and modern frontend features. The system emphasizes security, performance, and user experience while maintaining clean, maintainable code structure.

The recent updates have enhanced the system by:
- Simplifying top properties management
- Making gallery content dynamic
- Improving email template consistency
- Maintaining proper code organization

This documentation provides a complete understanding of the system architecture, functionality, and implementation details for future development and maintenance.
