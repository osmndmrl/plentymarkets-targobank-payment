<?php

namespace PaymentMethod\Methods;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodService;
use Plenty\Modules\Payment\Method\Services\PaymentMethodBaseService;
use Plenty\Plugin\Application;
use Plenty\Modules\Frontend\Services\Translator;
use Plenty\Modules\Frontend\Contracts\FrontendSessionStorageFactoryContract;

/**
 * Class PaymentMethod
 * @package PaymentMethod\Methods
 */
class PaymentMethod extends PaymentMethodBaseService
{
    /** @var FrontendSessionStorageFactoryContract */
    private $session;

    /** @var Application */
    private $application;

    /** @var Translator */
    private $translator;

    public function __construct(
        FrontendSessionStorageFactoryContract $session,
        Application $application,
        Translator $translator
    ) {
        $this->session = $session;
        $this->application = $application;
        $this->translator = $translator;
    }

    public function isActive(): bool
    {
        return true;
    }

    public function getName(string $lang = 'de'): string
    {
        return $this->translator->trans('PaymentMethod::PaymentMethod.paymentMethodName', [], $lang);
    }

    public function getFee(): float
    {
        return 0.00;
    }

    public function getIcon(string $lang): string
    {
        return $this->application->getUrlPath('paymentmethod').'/images/icon.png';
    }

    public function getDescription(string $lang): string
    {
        return $this->translator->trans('PaymentMethod::PaymentMethod.paymentMethodDescription', [], $lang);
    }

    public function getSourceUrl(string $lang): string
    {
        return '';
    }

    public function isSwitchableTo(): bool
    {
        return true;
    }

    public function isSwitchableFrom(): bool
    {
        return true;
    }

    public function isBackendSearchable(): bool
    {
        return true;
    }

    public function isBackendActive(): bool
    {
        return true;
    }

    public function getBackendName(string $lang): string
    {
        return $this->getName($lang);
    }

    public function canHandleSubscriptions(): bool
    {
        return true;
    }

    public function getBackendIcon(): string
    {
        return $this->application->getUrlPath('paymentmethod').'/images/backend_icon.svg';
    }
}
