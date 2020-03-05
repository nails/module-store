<?php

namespace Nails\Store\Model\Range;

use Nails\Common\Model\Base;

class Product extends Base
{
    const TABLE_NAME = NAILS_DB_PREFIX . 'store_range_product';

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->addExpandableField([
            'trigger'   => 'range',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'range',
            'model'     => 'Range',
            'provider'  => 'nails/module-store',
            'id_column' => 'range_id',
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
