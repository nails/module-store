<?php

namespace Nails\Store\Model\Sale;

use Nails\Common\Model\Base;
use Nails\Store\Constants;

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
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'sale_id',
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
