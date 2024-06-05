<?php

namespace PaymentMethod\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

/**
 * Class PaymentMethodRouteServiceProvider
 * @package PaymentMethod\Providers
 */
class PaymentMethodRouteServiceProvider extends RouteServiceProvider
{
    public function map(Router $router)
    {
        $router->get('payment/paymentMethod/checkoutSuccess', 'PaymentMethod\Controllers\PaymentController@checkoutSuccess');
        $router->get('payment/paymentMethod/checkoutCancel' , 'PaymentMethod\Controllers\PaymentController@checkoutCancel' );
        $router->post('payment/paymentMethod/notification'  , 'PaymentMethod\Controllers\PaymentNotificationController@handleNotification');
    }
}
