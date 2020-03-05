<?php

namespace Nails\Store\Model\Sale;

use Nails\Common\Model\Base;

class Product extends Base
{
    const TABLE_NAME = NAILS_DB_PREFIX . 'store_sale_product';

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->addExpandableField([
            'trigger'   => 'sale',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'sale',
            'model'     => 'Sale',
            'provider'  => 'nails/module-store',
            'id_column' => 'sale_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'product',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'product',
            'model'     => 'Product',
            'provider'  => 'nails/module-store',
            'id_column' => 'product_id',
        ]);
    }
}
