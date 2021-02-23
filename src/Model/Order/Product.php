<?php

namespace Nails\Store\Model\Order;

use Nails\Common\Model\Base;
use Nails\Store\Constants;

class Product extends Base
{
    const TABLE_NAME = NAILS_DB_PREFIX . 'store_order_product';

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->addExpandableField([
            'trigger'   => 'order',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'order',
            'model'     => 'Order',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'order_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'product',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'product',
            'model'     => 'Product',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'product_id',
        ]);
    }
}
