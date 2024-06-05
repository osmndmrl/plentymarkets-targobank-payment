<?php

namespace PaymentMethod\Controllers;

use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;

/**
 * Class PaymentController
 * @package PaymentMethod\Controllers
 */
class PaymentController
{
    public function checkoutSuccess(Request $request, Response $response)
    {
        // Handle successful checkout
        return $response->redirectTo('/checkout/success');
    }

    public function checkoutCancel(Request $request, Response $response)
    {
        // Handle checkout cancellation
        return $response->redirectTo('/checkout/cancel');
    }
}
