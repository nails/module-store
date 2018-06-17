<?php

namespace Nails\Store\Model\Cart;

use Nails\Common\Model\Base;

class Product extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->table = NAILS_DB_PREFIX . 'store_cart_product';
    }
}
