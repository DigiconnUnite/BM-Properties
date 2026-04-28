-- Create table for hero section management
CREATE TABLE IF NOT EXISTS `hero_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_sort_order` (`sort_order`),
  KEY `idx_is_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default hero section data
INSERT INTO `hero_section` (`title`, `subtitle`, `description`, `image_path`, `sort_order`, `is_active`) VALUES
('Find your', 'Dream Home', 'At BM Properties, we help you discover the perfect property that fits your lifestyle and budget. Whether you are looking to buy, sell, or rent, our carefully selected listings in prime locations ensure quality, comfort, and long-term value. Start your journey with us and find a place you can truly call home.', 'images/slider/sli-1.webp', 1, 1),
('Find your', 'Perfect Property', 'At BM Properties, we help you discover the perfect property that fits your lifestyle and budget. Whether you are looking to buy, sell, or rent, our carefully selected listings in prime locations ensure quality, comfort, and long-term value. Start your journey with us and find a place you can truly call home.', 'images/slider/sli-2.webp', 2, 1),
('Find your', 'Perfect Space', 'At BM Properties, we help you discover the perfect property that fits your lifestyle and budget. Whether you are looking to buy, sell, or rent, our carefully selected listings in prime locations ensure quality, comfort, and long-term value. Start your journey with us and find a place you can truly call home.', 'images/slider/sli-3.webp', 3, 1),
('Find your', 'Dream Home', 'At BM Properties, we help you discover the perfect property that fits your lifestyle and budget. Whether you are looking to buy, sell, or rent, our carefully selected listings in prime locations ensure quality, comfort, and long-term value. Start your journey with us and find a place you can truly call home.', 'images/slider/sli-4.webp', 4, 1);
