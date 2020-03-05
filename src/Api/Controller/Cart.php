<?php

namespace Nails\Store\Api\Controller;

use Nails\Api;
use Nails\Factory;

class Cart extends Api\Controller\Base
{
    public function getIndex()
    {
        //  @todo (Pablo - 2018-06-17) - Return the contents of the cart
        return $oResponse = Factory::factory('ApiResponse', Api\Constants::MODULE_SLUG);
    }

    // --------------------------------------------------------------------------

    public function postProduct()
    {
        //  @todo (Pablo - 2018-06-17) - Add a new product to the cart
        return $oResponse = Factory::factory('ApiResponse', Api\Constants::MODULE_SLUG);
    }

    // --------------------------------------------------------------------------

    public function putProduct()
    {
        //  @todo (Pablo - 2018-06-17) - update an existing cart product
        return $oResponse = Factory::factory('ApiResponse', Api\Constants::MODULE_SLUG);
    }

    // --------------------------------------------------------------------------

    public function deleteProduct()
    {
        //  @todo (Pablo - 2018-06-17) - Delete an existing product
        return $oResponse = Factory::factory('ApiResponse', Api\Constants::MODULE_SLUG);
    }
}
