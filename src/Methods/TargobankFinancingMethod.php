<?php
namespace TargobankFinancing\Methods;

use Plenty\Modules\Payment\Method\Services\PaymentMethodBaseService;
use Plenty\Plugin\ConfigRepository;
use Plenty\Modules\Basket\Contracts\BasketRepositoryContract;
use Plenty\Modules\Frontend\Services\AccountService;
use Plenty\Modules\Order\Models\Order;

class TargobankFinancingMethod extends PaymentMethodBaseService
{
    private $basketRepo;
    private $settings;
    private $accountService;

    public function __construct(
        BasketRepositoryContract $basketRepo,
        ConfigRepository $settings,
        AccountService $accountService
    ) {
        $this->basketRepo = $basketRepo;
        $this->settings = $settings;
        $this->accountService = $accountService;
    }

    public function isActive(): bool
    {
        $active = $this->settings->get('TargobankFinancing.is_active', true);
        return $active;
    }

    public function getName(string $lang = 'de'): string
    {
        return 'Targobank Financing';
    }

    public function getFee(): float                                                                                                                                                 
    {
        return 0.00;
    }

    public function getIcon(string $lang): string
    {
        return '/assets/to/icon.png';
    }

    public function getDescription(string $lang): string
    {
        return 'Targobank Financing allows you to finance your purchase.';
    }

    public function getSourceUrl(string $lang): string
    {
        return '';
    }

    public function isSwitchableTo(): bool
    {
        return false;
    }

    public function isSwitchableFrom(): bool
    {
        return false;
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
        return false;
    }

    public function getBackendIcon(): string
    {
        return '/assets/to/backend_icon.svg';
    }
}
?>