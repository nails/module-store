<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;

class Sale extends Base
{
    const TABLE_NAME    = NAILS_DB_PREFIX . 'store_sale';
    const AUTO_SET_SLUG = true;
}
