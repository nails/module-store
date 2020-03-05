<?php

namespace Nails\Store\Model\Cart;

use Nails\Common\Model\Base;
use Nails\Config;

class Product extends Base
{
    const TABLE_NAME = NAILS_DB_PREFIX . 'store_cart_product';
}
