<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;
use Nails\Store\Constants;

class Product extends Base
{
    const TABLE_NAME = NAILS_DB_PREFIX . 'store_product';

    // --------------------------------------------------------------------------

    const STATUS_OUT_OF_STOCK = 'OUT_OF_STOCK';
    const STATUS_IN_STOCK     = 'IN_STOCK';
    const STATUS_PRE_ORDER    = 'PRE_ORDER';
    const STATUS_TO_ORDER     = 'TO_ORDER';

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->table             = NAILS_DB_PREFIX . 'store_product';
        $this->tableAutoSetSlugs = true;
        $this->addExpandableField([
            'trigger'   => 'category',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'category',
            'model'     => 'Category',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'category_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'downloads',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'downloads',
            'model'     => 'ProductDownload',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'product_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'images',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'images',
            'model'     => 'ProductImage',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'product_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'meta',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'meta',
            'model'     => 'ProductMeta',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'product_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'prices',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'prices',
            'model'     => 'ProductPrice',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'product_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'tags',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'tags',
            'model'     => 'ProductTag',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'product_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'categories',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'categories',
            'model'     => 'ProductCategory',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'product_id',
        ]);
    }

    // --------------------------------------------------------------------------

    public function describeFields($sTable = null)
    {
        $aFields = parent::describeFields($sTable);

        //  Details
        $aFields['label']->validation[] = 'required';
        $aFields['image_id']->label     = 'Image';
        $aFields['image_id']->type      = 'cdn_object_picker';
        $aFields['body']->label         = 'Body';
        $aFields['body']->type          = 'cms_widgets';

        //  Downloads
        $aFields['is_digital']->info       = 'Customers will be sent an email with a download link for digital products';
        $aFields['is_digital']->fieldset   = 'Downloads';
        $aFields['is_digital']->allow_null = false;
        $aFields['downloads']              = (object) [
            'key'        => 'downloads',
            'label'      => 'Downloads',
            'type'       => 'cdn_object_picker_multi_with_label',
            'allow_null' => true,
            'validation' => [],
            'fieldset'   => 'Downloads',
        ];

        //  Categories
        $aFields['category_id']->label    = 'Primary Category';
        $aFields['category_id']->class    = 'js-store-searcher';
        $aFields['category_id']->info     = 'The product\'s primary category defines its URL, e.g. <code>/category-name/product-name</code>';
        $aFields['category_id']->data     = ['api' => 'category'];
        $aFields['category_id']->fieldset = 'Categories';
        $aFields['categories']            = (object) [
            'key'        => 'categories',
            'label'      => 'Secondary Categories',
            'info'       => 'Product will also appear in secondary categories',
            'type'       => 'text',
            'class'      => 'js-store-searcher',
            'data'       => [
                'api'      => 'category',
                'multiple' => true,
            ],
            'allow_null' => true,
            'validation' => [],
            'fieldset'   => 'Categories',
        ];

        //  Inventory
        $aFields['sku']->fieldset         = 'Inventory';
        $aFields['sku']->label            = 'SKU';
        $aFields['sku']->info             = 'This is the unique identifier for your product in your store';
        $aFields['status']->fieldset      = 'Inventory';
        $aFields['stock_level']->fieldset = 'Inventory';
        $aFields['lead_time']->fieldset   = 'Inventory';
        $aFields['lead_time']->info       = 'The turn around (in days) for your product to be dispatched; applies only to "To Order" items';

        //  Listing
        $aFields['is_published']->fieldset   = 'Listing';
        $aFields['is_published']->allow_null = false;
        $aFields['date_published']->fieldset = 'Listing';

        //  SEO
        $aFields['seo_title']->label          = 'SEO Title';
        $aFields['seo_title']->fieldset       = 'SEO';
        $aFields['seo_description']->label    = 'SEO Description';
        $aFields['seo_description']->fieldset = 'SEO';
        $aFields['seo_meta']->label           = 'SEO Meta';
        $aFields['seo_meta']->fieldset        = 'SEO';
        $aFields['seo_script']->label         = 'SEO Script';
        $aFields['seo_script']->fieldset      = 'SEO';

        //  Gallery
        $aFields['images'] = (object) [
            'key'        => 'images',
            'label'      => 'Gallery',
            'type'       => 'cdn_object_picker_multi',
            'allow_null' => true,
            'validation' => [],
            'fieldset'   => 'Gallery',
        ];

        return $aFields;
    }
}
