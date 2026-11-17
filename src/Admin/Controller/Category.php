<?php

namespace Nails\Store\Admin\Controller;

use Nails\Store\Constants;

class Category extends Base
{
    const CONFIG_MODEL_NAME     = 'Category';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;
    const CONFIG_SIDEBAR_GROUP  = 'Store';
    const CONFIG_SIDEBAR_ICON   = 'fa-shopping-cart';
}
