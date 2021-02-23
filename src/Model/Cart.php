<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;
use Nails\Config;
use Nails\Store\Constants;

class Cart extends Base
{
    const TABLE_NAME = NAILS_DB_PREFIX . 'store_cart';

    // --------------------------------------------------------------------------

    const STATUS_OPEN         = 'OPEN';
    const STATUS_CHECKING_OUT = 'CHECKING_OUT';
    const STATUS_COMPLETE     = 'COMPLETE';
    const STATUS_ABANDONED    = 'ABANDONED';

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->tableAutoSetTokens = true;
        $this->addExpandableField([
            'trigger'   => 'products',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'products',
            'model'     => 'CartProduct',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'cart_id',
        ]);
    }
}
