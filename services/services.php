<?php

return [
    'models' => [
        'Cart'            => function () {
            if (class_exists('\App\Store\Model\Cart')) {
                return new \App\Store\Model\Cart();
            } else {
                return new \Nails\Store\Model\Cart();
            }
        },
        'CartProduct'     => function () {
            if (class_exists('\App\Store\Model\Cart')) {
                return new \App\Store\Model\Cart\Product();
            } else {
                return new \Nails\Store\Model\Cart\Product();
            }
        },
        'Category'        => function () {
            if (class_exists('\App\Store\Model\Category')) {
                return new \App\Store\Model\Category();
            } else {
                return new \Nails\Store\Model\Category();
            }
        },
        'Order'           => function () {
            if (class_exists('\App\Store\Model\Order')) {
                return new \App\Store\Model\Order();
            } else {
                return new \Nails\Store\Model\Order();
            }
        },
        'OrderProduct'    => function () {
            if (class_exists('\App\Store\Model\Order\Product')) {
                return new \App\Store\Model\Order\Product();
            } else {
                return new \Nails\Store\Model\Order\Product();
            }
        },
        'Product'         => function () {
            if (class_exists('\App\Store\Model\Product')) {
                return new \App\Store\Model\Product();
            } else {
                return new \Nails\Store\Model\Product();
            }
        },
        'ProductDownload' => function () {
            if (class_exists('\App\Store\Model\Product\Download')) {
                return new \App\Store\Model\Product\Download();
            } else {
                return new \Nails\Store\Model\Product\Download();
            }
        },
        'ProductImage'    => function () {
            if (class_exists('\App\Store\Model\Product\Image')) {
                return new \App\Store\Model\Product\Image();
            } else {
                return new \Nails\Store\Model\Product\Image();
            }
        },
        'ProductMeta'     => function () {
            if (class_exists('\App\Store\Model\Product\Meta')) {
                return new \App\Store\Model\Product\Meta();
            } else {
                return new \Nails\Store\Model\Product\Meta();
            }
        },
        'ProductPrice'    => function () {
            if (class_exists('\App\Store\Model\Product\Price')) {
                return new \App\Store\Model\Product\Price();
            } else {
                return new \Nails\Store\Model\Product\Price();
            }
        },
        'ProductShipping' => function () {
            if (class_exists('\App\Store\Model\Product\Shipping')) {
                return new \App\Store\Model\Product\Shipping();
            } else {
                return new \Nails\Store\Model\Product\Shipping();
            }
        },
        'ProductTag'      => function () {
            if (class_exists('\App\Store\Model\Product\Tag')) {
                return new \App\Store\Model\Product\Tag();
            } else {
                return new \Nails\Store\Model\Product\Tag();
            }
        },
        'Range'           => function () {
            if (class_exists('\App\Store\Model\Range')) {
                return new \App\Store\Model\Range();
            } else {
                return new \Nails\Store\Model\Range();
            }
        },
        'RangeProduct'    => function () {
            if (class_exists('\App\Store\Model\Range\Product')) {
                return new \App\Store\Model\Range\Product();
            } else {
                return new \Nails\Store\Model\Range\Product();
            }
        },
        'Sale'            => function () {
            if (class_exists('\App\Store\Model\Sale')) {
                return new \App\Store\Model\Sale();
            } else {
                return new \Nails\Store\Model\Sale();
            }
        },
        'SaleProduct'     => function () {
            if (class_exists('\App\Store\Model\Sale\Product')) {
                return new \App\Store\Model\Sale\Product();
            } else {
                return new \Nails\Store\Model\Sale\Product();
            }
        },
        'Tag'             => function () {
            if (class_exists('\App\Store\Model\Tag')) {
                return new \App\Store\Model\Tag();
            } else {
                return new \Nails\Store\Model\Tag();
            }
        },
        'Voucher'         => function () {
            if (class_exists('\App\Store\Model\Voucher')) {
                return new \App\Store\Model\Voucher();
            } else {
                return new \Nails\Store\Model\Voucher();
            }
        },
    ],
];
