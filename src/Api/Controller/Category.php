<?php

namespace Nails\Store\Api\Controller;

use Nails\Api\Controller\CrudController;
use Nails\Store\Constants;

class Category extends CrudController
{
    const CONFIG_MODEL_NAME     = 'Category';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;
}
