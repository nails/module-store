<?php

namespace Nails\Admin\Store;

use Nails\Store\Admin\Controller\Base;

class Sale extends Base
{
    const CONFIG_MODEL_NAME     = 'Sale';
    const CONFIG_MODEL_PROVIDER = 'nailsapp/module-store';
    const CONFIG_SIDEBAR_GROUP  = 'Store';
    const CONFIG_SIDEBAR_ICON   = 'fa-shopping-cart';
}
