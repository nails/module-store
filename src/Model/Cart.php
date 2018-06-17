<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;

class Cart extends Base
{
    const STATUS_OPEN         = 'OPEN';
    const STATUS_CHECKING_OUT = 'CHECKING_OUT';
    const STATUS_COMPLETE     = 'COMPLETE';
    const STATUS_ABANDONED    = 'ABANDONED';

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->table              = NAILS_DB_PREFIX . 'store_cart';
        $this->tableAutoSetTokens = true;
        $this->addExpandableField([
            'trigger'   => 'products',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'products',
            'model'     => 'CartProduct',
            'provider'  => 'nailsapp/module-store',
            'id_column' => 'cart_id',
        ]);
    }
}
