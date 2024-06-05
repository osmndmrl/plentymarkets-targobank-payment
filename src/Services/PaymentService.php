<?php

namespace TargobankPayment\Services;

use Plenty\Plugin\Log\Loggable;

class PaymentService
{
    use Loggable;

    public function processPayment($sessionID, $amount, $paid)
    {
        // Targobank ödeme işlemlerini burada gerçekleştirin
        // Örneğin: API çağrısı yaparak ödeme bilgilerini işleyin
    }
}
