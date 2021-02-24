<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;

class Order extends Base
{
    const TABLE_NAME     = NAILS_DB_PREFIX . 'store_order';
    const AUTO_SET_TOKEN = true;

    // --------------------------------------------------------------------------

    const STATUS_PENDING   = 'PENDING';
    const STATUS_PAID      = 'PAID';
    const STATUS_PACKED    = 'PACKED';
    const STATUS_SHIPPED   = 'SHIPPED';
    const STATUS_CANCELLED = 'CANCELLED';
}
