<?php

namespace Nails\Store\Api\Controller;

use Nails\Api\Controller\CrudController;

class Order extends CrudController
{
    const CONFIG_MODEL_NAME     = 'Order';
    const CONFIG_MODEL_PROVIDER = 'nails/module-store';
}
