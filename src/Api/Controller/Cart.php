<?php

namespace Nails\Store\Api\Controller;

use Nails\Api;
use Nails\Api\Factory\ApiResponse;
use Nails\Factory;

class Cart extends Api\Controller\Base
{
    public function getIndex(): ApiResponse
    {
        //  @todo (Pablo - 2018-06-17) - Return the contents of the cart

        /** @var ApiResponse $oResponse */
        $oResponse = Factory::factory('ApiResponse', Api\Constants::MODULE_SLUG);
        return $oResponse;
    }

    // --------------------------------------------------------------------------

    public function postProduct(): ApiResponse
    {
        //  @todo (Pablo - 2018-06-17) - Add a new product to the cart

        /** @var ApiResponse $oResponse */
        $oResponse = Factory::factory('ApiResponse', Api\Constants::MODULE_SLUG);
        return $oResponse;
    }

    // --------------------------------------------------------------------------

    public function putProduct(): ApiResponse
    {
        //  @todo (Pablo - 2018-06-17) - update an existing cart product

        /** @var ApiResponse $oResponse */
        $oResponse = Factory::factory('ApiResponse', Api\Constants::MODULE_SLUG);
        return $oResponse;
    }

    // --------------------------------------------------------------------------

    public function deleteProduct(): ApiResponse
    {
        //  @todo (Pablo - 2018-06-17) - Delete an existing product

        /** @var ApiResponse $oResponse */
        $oResponse = Factory::factory('ApiResponse', Api\Constants::MODULE_SLUG);
        return $oResponse;
    }
}
