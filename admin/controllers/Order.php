<?php

namespace Nails\Admin\Store;

use Nails\Store\Admin\Controller\Base;

class Order extends Base
{
    const CONFIG_MODEL_NAME     = 'Order';
    const CONFIG_MODEL_PROVIDER = 'nails/module-store';
    const CONFIG_SIDEBAR_GROUP  = 'Store';
    const CONFIG_SIDEBAR_ICON   = 'fa-shopping-cart';
}
