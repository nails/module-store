<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;

class Voucher extends Base
{
    const TABLE_NAME     = NAILS_DB_PREFIX . 'store_voucher';
    const AUTO_SET_TOKEN = true;
}
