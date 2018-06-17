<?php

namespace Nails\Store\Model\Range;

use Nails\Common\Model\Base;

class Product extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->table = NAILS_DB_PREFIX . 'store_range_product';
        $this->addExpandableField([
            'trigger'   => 'range',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'range',
            'model'     => 'Range',
            'provider'  => 'nailsapp/module-store',
            'id_column' => 'range_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'product',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'product',
            'model'     => 'Product',
            'provider'  => 'nailsapp/module-store',
            'id_column' => 'product_id',
        ]);
    }
}
