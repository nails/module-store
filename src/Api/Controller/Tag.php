<?php

namespace Nails\Store\Api\Controller;

use Nails\Api\Controller\CrudController;
use Nails\Store\Constants;

class Tag extends CrudController
{
    const CONFIG_MODEL_NAME     = 'Tag';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;
}
