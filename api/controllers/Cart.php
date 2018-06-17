<?php

namespace Nails\Api\Store;

use Nails\Api\Controller\Base;

class Cart extends Base
{
    public function getIndex()
    {
        //  @todo (Pablo - 2018-06-17) - Return the contents of the cart
        return [];
    }

    // --------------------------------------------------------------------------

    public function postProduct()
    {
        //  @todo (Pablo - 2018-06-17) - Add a new product to the cart
        return [];
    }

    // --------------------------------------------------------------------------

    public function putProduct()
    {
        //  @todo (Pablo - 2018-06-17) - update an existing cart product
        return [];
    }

    // --------------------------------------------------------------------------

    public function deleteProduct()
    {
        //  @todo (Pablo - 2018-06-17) - Delete an existing product
        return [];
    }
}
