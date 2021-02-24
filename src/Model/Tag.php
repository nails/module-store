<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;

class Tag extends Base
{
    const TABLE_NAME    = NAILS_DB_PREFIX . 'store_tag';
    const AUTO_SET_SLUG = true;
}
