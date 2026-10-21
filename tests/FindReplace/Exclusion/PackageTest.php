<?php

namespace Tests\FindReplace\Exclusion;

use Nails\Store\FindReplace\Exclusion\Package;
use PHPUnit\Framework\TestCase;

class PackageTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        if (!defined('NAILS_DB_PREFIX')) {
            define('NAILS_DB_PREFIX', 'nails_');
        }
    }

    public function testHidden(): void
    {
        self::assertSame(
            [],
            (new Package())->hidden()
        );
    }

    public function testReadOnly(): void
    {
        self::assertSame(
            [
                NAILS_DB_PREFIX . 'store_product.sku',
                NAILS_DB_PREFIX . 'store_product_price.currency',
                NAILS_DB_PREFIX . 'store_product_shipping.currency',
                NAILS_DB_PREFIX . 'store_category.breadcrumbs',
                NAILS_DB_PREFIX . 'store_product_meta.key',
            ],
            (new Package())->readOnly()
        );
    }
}
