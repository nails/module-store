<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;

class Voucher extends Base
{
    const TABLE_NAME = NAILS_DB_PREFIX . 'store_voucher';

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->tableAutoSetTokens = true;
    }
}
