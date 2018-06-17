<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;

class Order extends Base
{
    const STATUS_PENDING   = 'PENDING';
    const STATUS_PAID      = 'PAID';
    const STATUS_PACKED    = 'PACKED';
    const STATUS_SHIPPED   = 'SHIPPED';
    const STATUS_CANCELLED = 'CANCELLED';

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->table              = NAILS_DB_PREFIX . 'store_order';
        $this->tableAutoSetTokens = true;
    }
}
