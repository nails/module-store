<?php

namespace Nails\Store\Model\Product;

use Nails\Common\Model\Base;

class Tag extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->table = NAILS_DB_PREFIX . 'store_product_tag';
        $this->addExpandableField([
            'trigger'   => 'product',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'product',
            'model'     => 'Product',
            'provider'  => 'nails/module-store',
            'id_column' => 'product_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'tag',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'tag',
            'model'     => 'Tag',
            'provider'  => 'nails/module-store',
            'id_column' => 'tag_id',
        ]);
    }
}
