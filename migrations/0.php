<?php

/**
 * Migration:   0
 * Started:     17/06/2018
 * Finalised:   17/06/2018
 */

namespace Nails\Database\Migration\Nails\ModuleStore;

use Nails\Common\Console\Migrate\Base;

class Migration0 extends Base
{
    /**
     * Execute the migration
     * @return void
     */
    public function execute()
    {
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_cart` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `token` char(29) NOT NULL DEFAULT \'\',
                `status` enum(\'OPEN\',\'CHECKING_OUT\',\'COMPLETE\',\'ABANDONED\') DEFAULT \'OPEN\',
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_cart_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_cart_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_cart_product` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `cart_id` int(11) unsigned NOT NULL,
                `product_id` int(11) unsigned NOT NULL,
                `quantity` int(11) unsigned NOT NULL DEFAULT 1,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `cart_id` (`cart_id`),
                KEY `product_id` (`product_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_cart_product_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_cart_product_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_cart_product_ibfk_3` FOREIGN KEY (`cart_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_cart` (`id`) ON DELETE CASCADE,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_cart_product_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_product` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_category` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `slug` varchar(150) DEFAULT NULL,
                `label` varchar(150) DEFAULT NULL,
                `parent_id` int(11) unsigned DEFAULT NULL,
                `order` int(11) unsigned NOT NULL DEFAULT \'0\',
                `breadcrumbs` text,
                `body` text,
                `seo_title` varchar(150) DEFAULT NULL,
                `seo_description` varchar(150) DEFAULT NULL,
                `seo_meta` text,
                `seo_script` text,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_category_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_order` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `token` char(29) NOT NULL DEFAULT \'\',
                `status` enum(\'PENDING\',\'PAID\',\'PACKED\',\'SHIPPED\',\'CANCELLED\') DEFAULT \'PENDING\',
                `invoice_id` int(11) unsigned NOT NULL,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_order_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_order_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_order_product` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `order_id` int(11) unsigned NOT NULL,
                `product_id` int(11) unsigned NOT NULL,
                `quantity` int(11) unsigned NOT NULL DEFAULT 1,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `order_id` (`order_id`),
                KEY `product_id` (`product_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_order_product_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_order_product_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_order_product_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_order` (`id`) ON DELETE CASCADE,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_order_product_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_product` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_product` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `slug` varchar(150) DEFAULT NULL,
                `label` varchar(150) DEFAULT NULL,
                `excerpt` varchar(150) DEFAULT NULL,
                `body` text,
                `image_id` int(11) unsigned DEFAULT NULL,
                `category_id` int(11) unsigned DEFAULT NULL,
                `sku` varchar(150) DEFAULT NULL,
                `status` enum(\'OUT_OF_STOCK\',\'IN_STOCK\',\'PRE_ORDER\',\'TO_ORDER\') NOT NULL DEFAULT \'OUT_OF_STOCK\',
                `stock_level` int(11) unsigned DEFAULT \'0\',
                `lead_time` int(11) unsigned DEFAULT \'0\',
                `is_published` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
                `is_digital` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
                `date_published` datetime DEFAULT NULL,
                `seo_title` varchar(150) DEFAULT NULL,
                `seo_description` varchar(150) DEFAULT NULL,
                `seo_meta` text,
                `seo_script` text,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `category_id` (`category_id`),
                KEY `image_id` (`image_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_category` (`id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_ibfk_4` FOREIGN KEY (`image_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_product_category` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `product_id` int(11) unsigned NOT NULL,
                `category_id` int(11) unsigned NOT NULL,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `product_id` (`product_id`),
                KEY `category_id` (`category_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_category_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_category_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_product` (`id`) ON DELETE CASCADE,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_category_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_category` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_product_download` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `product_id` int(11) unsigned NOT NULL,
                `object_id` int(11) unsigned NOT NULL,
                `label` varchar(150) DEFAULT NULL,
                `order` int(11) unsigned NOT NULL DEFAULT \'0\',
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `product_id` (`product_id`),
                KEY `object_id` (`object_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_download_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_download_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_download_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_product` (`id`) ON DELETE CASCADE,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_download_ibfk_4` FOREIGN KEY (`object_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_product_image` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `product_id` int(11) unsigned NOT NULL,
                `object_id` int(11) unsigned NOT NULL,
                `order` int(11) unsigned NOT NULL DEFAULT \'0\',
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `product_id` (`product_id`),
                KEY `object_id` (`object_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_image_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_image_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_image_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_product` (`id`) ON DELETE CASCADE,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_image_ibfk_4` FOREIGN KEY (`object_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_product_meta` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `product_id` int(11) unsigned NOT NULL,
                `key` varchar(150) DEFAULT NULL,
                `value` varchar(150) DEFAULT NULL,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `product_id` (`product_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_meta_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_meta_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_meta_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_product` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_product_price` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `product_id` int(11) unsigned NOT NULL,
                `currency` char(3) NOT NULL DEFAULT \'\',
                `price` int(11) unsigned NOT NULL DEFAULT \'0\',
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `product_id` (`product_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_price_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `store_product_price_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_price_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_product` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_product_shipping` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `product_id` int(11) unsigned NOT NULL,
                `currency` char(3) NOT NULL DEFAULT \'\',
                `price` int(11) unsigned NOT NULL DEFAULT \'0\',
                `price_additional` int(11) unsigned NOT NULL DEFAULT \'0\',
                `label` varchar(150) DEFAULT \'\',
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `product_id` (`product_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_shipping_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_shipping_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_shipping_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_product` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_product_tag` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `product_id` int(11) unsigned NOT NULL,
                `tag_id` int(11) unsigned NOT NULL,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `product_id` (`product_id`),
                KEY `tag_id` (`tag_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_tag_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_tag_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_tag_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_product` (`id`) ON DELETE CASCADE,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_product_tag_ibfk_4` FOREIGN KEY (`tag_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_tag` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_range` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `slug` varchar(150) NOT NULL DEFAULT \'\',
                `label` varchar(150) DEFAULT \'\',
                `body` text,
                `image_id` int(11) unsigned DEFAULT NULL,
                `seo_title` varchar(150) DEFAULT NULL,
                `seo_description` varchar(150) DEFAULT NULL,
                `seo_meta` text,
                `seo_script` text,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `image_id` (`image_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_range_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_range_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_range_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_range_product` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `range_id` int(11) unsigned NOT NULL,
                `product_id` int(11) unsigned NOT NULL,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `range_id` (`range_id`),
                KEY `product_id` (`product_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_range_product_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_range_product_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_range_product_ibfk_3` FOREIGN KEY (`range_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_range` (`id`) ON DELETE CASCADE,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_range_product_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_product` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_sale` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `slug` varchar(150) NOT NULL DEFAULT \'\',
                `label` varchar(150) DEFAULT \'\',
                `body` text,
                `image_id` int(11) unsigned DEFAULT NULL,
                `seo_title` varchar(150) DEFAULT NULL,
                `seo_description` varchar(150) DEFAULT NULL,
                `seo_meta` text,
                `seo_script` text,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `image_id` (`image_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_sale_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_sale_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_sale_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `{{NAILS_DB_PREFIX}}cdn_object` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_sale_product` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `sale_id` int(11) unsigned NOT NULL,
                `product_id` int(11) unsigned NOT NULL,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                KEY `sale_id` (`sale_id`),
                KEY `product_id` (`product_id`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_sale_product_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_sale_product_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_sale_product_ibfk_3` FOREIGN KEY (`sale_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_sale` (`id`) ON DELETE CASCADE,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_sale_product_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `{{NAILS_DB_PREFIX}}store_product` (`id`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_tag` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `slug` varchar(150) DEFAULT NULL,
                `label` varchar(150) DEFAULT NULL,
                `body` text,
                `seo_title` varchar(150) DEFAULT NULL,
                `seo_description` varchar(150) DEFAULT NULL,
                `seo_meta` text,
                `seo_script` text,
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_tag_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_tag_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
        $this->query('
            CREATE TABLE `{{NAILS_DB_PREFIX}}store_voucher` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `slug` varchar(150) NOT NULL DEFAULT \'\',
                `label` varchar(150) DEFAULT \'\',
                `created` datetime NOT NULL,
                `created_by` int(11) unsigned DEFAULT NULL,
                `modified` datetime NOT NULL,
                `modified_by` int(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `created_by` (`created_by`),
                KEY `modified_by` (`modified_by`),
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_voucher_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL,
                CONSTRAINT `{{NAILS_DB_PREFIX}}store_voucher_ibfk_2` FOREIGN KEY (`modified_by`) REFERENCES `{{NAILS_DB_PREFIX}}user` (`id`) ON DELETE SET NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');
    }
}
