<?php

namespace Nails\Store\Model\Sale;

use Nails\Common\Model\Base;

class Product extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->table = NAILS_DB_PREFIX . 'store_sale_product';
        $this->addExpandableField([
            'trigger'   => 'sale',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'sale',
            'model'     => 'Sale',
            'provider'  => 'nailsapp/module-store',
            'id_column' => 'sale_id',
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
