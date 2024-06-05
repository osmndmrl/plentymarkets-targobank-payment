<?php

namespace PaymentMethod\Assistants\SettingsHandlers;

use Plenty\Modules\Plugin\Contracts\PluginLayoutContainerRepositoryContract;
use Plenty\Modules\System\Contracts\WebstoreRepositoryContract;
use Plenty\Modules\Wizard\Contracts\WizardSettingsHandler;

class PaymentMethodAssistantSettingsHandler implements WizardSettingsHandler
{
    private $pluginLayoutContainerRepository;

    public function __construct(PluginLayoutContainerRepositoryContract $pluginLayoutContainerRepository)
    {
        $this->pluginLayoutContainerRepository = $pluginLayoutContainerRepository;
    }

    public function handle(array $parameter)
    {
        $data = $parameter['data'];
        $webstoreId = $data['config_name'];

        if(!is_numeric($webstoreId) || $webstoreId <= 0){
            $webstoreId = $this->getWebstore($parameter['optionId'])->storeIdentifier;
        }

        $this->saveSettings($webstoreId, $data);
        $this->createContainer($webstoreId, $data);
        return true;
    }

    private function saveSettings($webstoreId, $data)
    {
        // Save settings logic
    }

    private function createContainer($webstoreId, $data)
    {
        // Create container logic
    }

    private function getWebstore($optionId)
    {
        // Get webstore logic
    }
}
