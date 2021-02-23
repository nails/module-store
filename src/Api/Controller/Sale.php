<?php

namespace Nails\Store\Api\Controller;

use Nails\Api\Controller\CrudController;
use Nails\Store\Constants;

class Sale extends CrudController
{
    const CONFIG_MODEL_NAME     = 'Sale';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;
}
