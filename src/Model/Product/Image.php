<?php

namespace Nails\Store\Model\Product;

use Nails\Common\Model\Base;
use Nails\Common\Traits\Model\Sortable;

class Image extends Base
{
    use Sortable;

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->table = NAILS_DB_PREFIX . 'store_product_image';
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
