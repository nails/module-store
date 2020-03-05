<?php

namespace Nails\Store\Model\Product;

use Nails\Common\Model\Base;

class Shipping extends Base
{
    const TABLE_NAME = NAILS_DB_PREFIX . 'store_product_shipping';

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
    }
}
