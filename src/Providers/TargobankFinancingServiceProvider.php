<?php
namespace TargobankFinancing\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodContainer;
use TargobankFinancing\Methods\TargobankFinancingMethod;
use Plenty\Modules\Basket\Events\Basket\AfterBasketCreate;
use Plenty\Modules\Basket\Events\Basket\AfterBasketChanged;
use Plenty\Modules\Basket\Events\BasketItem\AfterBasketItemAdd;

class TargobankFinancingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->getApplication()->register(TargobankFinancingRouteServiceProvider::class);
    }

    public function boot(PaymentMethodContainer $payContainer)
    {
        $payContainer->register('targobank::targobank_financing', TargobankFinancingMethod::class,
            [
                AfterBasketChanged::class,
                AfterBasketItemAdd::class,
                AfterBasketCreate::class,
             
            ]
        );
    }
}
?>