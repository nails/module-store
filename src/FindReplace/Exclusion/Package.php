<?php

namespace Nails\Store\FindReplace\Exclusion;

use Nails\FindReplace\Interfaces\Exclusion;

class Package implements Exclusion
{
    public function hidden(): array
    {
        return [];
    }

    public function readOnly(): array
    {
        return [
            NAILS_DB_PREFIX . 'store_product.sku',
            NAILS_DB_PREFIX . 'store_product_price.currency',
            NAILS_DB_PREFIX . 'store_product_shipping.currency',
            NAILS_DB_PREFIX . 'store_category.breadcrumbs',
            NAILS_DB_PREFIX . 'store_product_meta.key',
        ];
    }
}
