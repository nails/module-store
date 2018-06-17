<?php

namespace Nails\Api\Store;

use Nails\Api\Controller\CrudController;

class Order extends CrudController
{
    const CONFIG_MODEL_NAME     = 'Order';
    const CONFIG_MODEL_PROVIDER = 'nailsapp/module-store';
}
