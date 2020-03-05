<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;

class Sale extends Base
{
    const TABLE_NAME = NAILS_DB_PREFIX . 'store_sale';

    // --------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->tableAutoSetSlugs = true;
    }
}
