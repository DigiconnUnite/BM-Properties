-- Add badge fields to properties table
ALTER TABLE `properties` 
ADD COLUMN `featured_badge_text` varchar(50) NOT NULL DEFAULT 'Featured' AFTER `card_highlights_json`,
ADD COLUMN `for_sale_badge_text` varchar(50) NOT NULL DEFAULT 'For Sale' AFTER `featured_badge_text`;
