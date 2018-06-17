<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;

class Product extends Base
{
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
            'provider'  => 'nailsapp/module-store',
            'id_column' => 'category_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'downloads',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'downloads',
            'model'     => 'ProductDownload',
            'provider'  => 'nailsapp/module-store',
            'id_column' => 'product_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'images',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'images',
            'model'     => 'ProductImage',
            'provider'  => 'nailsapp/module-store',
            'id_column' => 'product_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'meta',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'meta',
            'model'     => 'ProductMeta',
            'provider'  => 'nailsapp/module-store',
            'id_column' => 'product_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'prices',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'prices',
            'model'     => 'ProductPrice',
            'provider'  => 'nailsapp/module-store',
            'id_column' => 'product_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'tags',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'tags',
            'model'     => 'ProductTag',
            'provider'  => 'nailsapp/module-store',
            'id_column' => 'product_id',
        ]);
    }
}
