<?php

namespace PaymentMethod\Providers;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodContainer;
use Plenty\Plugin\ServiceProvider;

/**
 * Class PaymentMethodServiceProvider
 * @package PaymentMethod\Providers
 */
class PaymentMethodServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot(PaymentMethodContainer $payContainer)
    {
        $payContainer->register('PaymentMethod::examplePayment', PaymentMethod::class,
            [
                AfterBasketChanged::class,
                AfterBasketItemAdd::class,
                AfterBasketCreate::class,
                AfterBasketItemUpdate::class,
                AfterBasketItemRemove::class,
                FrontendLanguageChanged::class,
                FrontendShippingCountryChanged::class,
                FrontendCustomerAddressChanged::class
            ]
        );
    }
}
