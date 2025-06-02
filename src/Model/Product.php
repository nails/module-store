<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;
use Nails\Store\Constants;

class Product extends Base
{
    const TABLE_NAME    = NAILS_DB_PREFIX . 'store_product';
    const AUTO_SET_SLUG = true;
    const FIELD_CLASSES = [
        'body'     => ['ModelFieldWidgets', \Nails\Cms\Constants::MODULE_SLUG],
        'image_id' => ['ModelFieldObject', \Nails\Cdn\Constants::MODULE_SLUG],
    ];

    // --------------------------------------------------------------------------

    const STATUS_OUT_OF_STOCK = 'OUT_OF_STOCK';
    const STATUS_IN_STOCK     = 'IN_STOCK';
    const STATUS_PRE_ORDER    = 'PRE_ORDER';
    const STATUS_TO_ORDER     = 'TO_ORDER';

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
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
        $aFields['label']
            ->setIsRequired(true);

        $aFields['image_id']
            ->setLabel('Image');

        //  Downloads
        $aFields['is_digital']
            ->setInfo('Customers will be sent an email with a download link for digital products')
            ->setFieldset('Downloads')
            ->setAllowNull(false);

        $aFields['downloads'] = (object) [
            'key'        => 'downloads',
            'label'      => 'Downloads',
            'type'       => 'cdn_object_picker_multi_with_label',
            'allow_null' => true,
            'validation' => [],
            'fieldset'   => 'Downloads',
        ];

        //  Categories
        $aFields['category_id']
            ->setLabel('Primary Category')
            ->setClass('js-store-searcher')
            ->setInfo('The product\'s primary category defines its URL, e.g. <code>/category-name/product-name</code>')
            ->setData(['api' => 'category'])
            ->setFieldset('Categories');

        $aFields['categories'] = (object) [
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
        $aFields['sku']
            ->setFieldset('Inventory')
            ->setLabel('SKU')
            ->setInfo('This is the unique identifier for your product in your store');

        $aFields['status']
            ->setFieldset('Inventory');

        $aFields['stock_level']
            ->setFieldset('Inventory');

        $aFields['lead_time']
            ->setFieldset('Inventory')
            ->setInfo('The turn around (in days) for your product to be dispatched; applies only to "To Order" items');

        //  Listing
        $aFields['is_published']
            ->setFieldset('Listing')
            ->setAllowNull(false);

        $aFields['date_published']
            ->setFieldset('Listing');

        //  SEO
        $aFields['seo_title']
            ->setLabel('SEO Title')
            ->setFieldset('SEO');

        $aFields['seo_description']
            ->setLabel('SEO Description')
            ->setFieldset('SEO');

        $aFields['seo_meta']
            ->setLabel('SEO Meta')
            ->setFieldset('SEO');

        $aFields['seo_script']
            ->setLabel('SEO Script')
            ->setFieldset('SEO');

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
