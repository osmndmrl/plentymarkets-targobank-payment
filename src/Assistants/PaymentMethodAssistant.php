<?php

namespace PaymentMethod\Assistants;

use PaymentMethod\Assistants\SettingsHandlers\PaymentMethodAssistantSettingsHandler;
use Plenty\Modules\System\Contracts\WebstoreRepositoryContract;
use Plenty\Modules\Wizard\Services\WizardProvider;
use Plenty\Plugin\Application;

class PaymentMethodAssistant extends WizardProvider
{
    private $webstoreRepository;
    private $webstoreValues;

    public function __construct(WebstoreRepositoryContract $webstoreRepository)
    {
        $this->webstoreRepository = $webstoreRepository;
    }

    protected function structure()
    {
        return [
            "title" => 'assistant.assistantTitle',
            "shortDescription" => 'assistant.assistantShortDescription',
            "iconPath" => $this->getIcon(),
            "settingsHandlerClass" => PaymentMethodAssistantSettingsHandler::class,
            "translationNamespace" => "PaymentMethod",
            "key" => "payment-paymentMethodAssistant-assistant",
            "topics" => ["payment"],
            "priority" => 990,
            "options" => [
                "config_name" => [
                    "type" => 'select',
                    'defaultValue' => $this->getMainWebstore(),
                    "options" => [
                        "name" => 'assistant.storeName',
                        'required' => true,
                        'listBoxValues' => $this->getWebstoreListForm(),
                    ],
                ],
            ],
            "steps" => [
                "stepOne" => [
                    "title" => "assistant.stepOneTitle",
                    "sections" => [
                        [
                            "title" => 'assistant.shippingCountriesTitle',
                            "description" => 'assistant.shippingCountriesDescription',
                            "form" => [
                                "shippingCountries" => [
                                    'type' => 'checkboxGroup',
                                    'defaultValue' => [],
                                    'options' => [
                                        'name' => 'assistant.shippingCountries',
                                        'checkboxValues' => $this->getCountriesListForm(),
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                "stepTwo" => [ /* Additional steps if needed */ ],
            ]
        ];
    }

    private function getIcon()
    {
        $app = pluginApp(Application::class);
        return $app->getUrlPath('PaymentMethod').'/images/icon.png';
    }

    private function getWebstoreListForm()
    {
        if ($this->webstoreValues === null) {
            $webstores = $this->webstoreRepository->loadAll();
            foreach ($webstores as $webstore) {
                $this->webstoreValues[] = [
                    "caption" => $webstore->name,
                    "value" => $webstore->storeIdentifier,
                ];
            }

            usort($this->webstoreValues, function ($a, $b) {
                return ($a['value'] <=> $b['value']);
            });
        }

        return $this->webstoreValues;
    }
}
