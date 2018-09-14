<?php

namespace Nails\Store\Api\Controller;

use Nails\Api\Controller\Base;
use Nails\Factory;

class Cart extends Base
{
    public function getIndex()
    {
        //  @todo (Pablo - 2018-06-17) - Return the contents of the cart
        return $oResponse = Factory::factory('ApiResponse', 'nails/module-api');
    }

    // --------------------------------------------------------------------------

    public function postProduct()
    {
        //  @todo (Pablo - 2018-06-17) - Add a new product to the cart
        return $oResponse = Factory::factory('ApiResponse', 'nails/module-api');
    }

    // --------------------------------------------------------------------------

    public function putProduct()
    {
        //  @todo (Pablo - 2018-06-17) - update an existing cart product
        return $oResponse = Factory::factory('ApiResponse', 'nails/module-api');
    }

    // --------------------------------------------------------------------------

    public function deleteProduct()
    {
        //  @todo (Pablo - 2018-06-17) - Delete an existing product
        return $oResponse = Factory::factory('ApiResponse', 'nails/module-api');
    }
}
