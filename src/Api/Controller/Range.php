<?php

namespace Nails\Store\Api\Controller;

use Nails\Api\Controller\CrudController;
use Nails\Store\Constants;

class Range extends CrudController
{
    const CONFIG_MODEL_NAME     = 'Range';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;
}
