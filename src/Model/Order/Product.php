<?php

namespace Nails\Store\Model\Order;

use Nails\Common\Model\Base;

class Product extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->table = NAILS_DB_PREFIX . 'store_order_product';
        $this->addExpandableField([
            'trigger'   => 'order',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'order',
            'model'     => 'Order',
            'provider'  => 'nailsapp/module-store',
            'id_column' => 'order_id',
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
