<?php

namespace Nails\Store\Admin\Controller;

use Nails\Store\Constants;

class Voucher extends Base
{
    const CONFIG_MODEL_NAME     = 'Voucher';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;
    const CONFIG_SIDEBAR_GROUP  = 'Store';
    const CONFIG_SIDEBAR_ICON   = 'fa-shopping-cart';
}
