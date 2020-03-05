<?php

namespace Nails\Store\Model\Product;

use Nails\Common\Model\Base;

class Category extends Base
{
    const TABLE_NAME = NAILS_DB_PREFIX . 'store_product_category';

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->addExpandableField([
            'trigger'   => 'product',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'product',
            'model'     => 'Product',
            'provider'  => 'nails/module-store',
            'id_column' => 'product_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'category',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'category',
            'model'     => 'Category',
            'provider'  => 'nails/module-store',
            'id_column' => 'category_id',
        ]);
    }
}
