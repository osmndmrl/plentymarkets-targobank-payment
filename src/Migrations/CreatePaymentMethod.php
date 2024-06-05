<?php

namespace PaymentMethod\Migrations;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodRepositoryContract;

/**
 * Class CreatePaymentMethod
 */
class CreatePaymentMethod
{
    /**
     * @var PaymentMethodRepositoryContract
     */
    private $paymentMethodRepositoryContract;

    /**
     * CreatePaymentMethod constructor.
     *
     * @param PaymentMethodRepositoryContract $paymentMethodRepositoryContract
     */
    public function __construct(PaymentMethodRepositoryContract $paymentMethodRepositoryContract)
    {
        $this->paymentMethodRepositoryContract = $paymentMethodRepositoryContract;
    }

    /**
     * The run method will register the payment method when the migration runs.
     */
    public function run()
    {
        $this->paymentMethodRepositoryContract->createPaymentMethod([
            'pluginKey' => 'PaymentMethod', // Unique key for the plugin
            'paymentKey' => 'examplePayment', // Unique key for the payment method
            'name' => 'Example Payment' // Default name for the payment method
        ]);
    }
}
