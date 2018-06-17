<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;

class Voucher extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->table              = NAILS_DB_PREFIX . 'store_voucher';
        $this->tableAutoSetTokens = true;
    }
}
