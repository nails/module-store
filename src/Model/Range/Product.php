<?php

namespace Nails\Store\Model\Range;

use Nails\Common\Model\Base;
use Nails\Store\Constants;

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
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'range_id',
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
