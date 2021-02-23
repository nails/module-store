<?php

namespace Nails\Store\Model\Product;

use Nails\Common\Model\Base;
use Nails\Store\Constants;

class Tag extends Base
{
    const TABLE_NAME = NAILS_DB_PREFIX . 'store_product_tag';

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->addExpandableField([
            'trigger'   => 'product',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'product',
            'model'     => 'Product',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'product_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'tag',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'tag',
            'model'     => 'Tag',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'tag_id',
        ]);
    }
}
