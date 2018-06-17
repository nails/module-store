<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;

class Tag extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->table             = NAILS_DB_PREFIX . 'store_tag';
        $this->tableAutoSetSlugs = true;
    }
}
