<?php

namespace Danylo\ShippingModule\Plugin\Checkout;

use Magento\Checkout\Block\Checkout\LayoutProcessor;
use Psr\Log\LoggerInterface;

class LayoutProcessorPlugin
{
    protected \Psr\Log\LoggerInterface $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    /**
     * @param LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(LayoutProcessor $subject, array $jsLayout)
    {
        $customAttributeCode = 'customvar';

        $customField = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/date',
                /*'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input',*/
                'tooltip' => [
                    'description' => 'this is custom var field',
                ],
            ],

            'dataScope' => 'shippingAddress.custom_attributes' . '.' . $customAttributeCode,
            'label' => 'Custom Var',
            'provider' => 'checkoutProvider',
            'sortOrder' => 0,
            'validation' => [
                'required-entry' => false
            ],
            'options' => [],
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
        ];

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children'][$customAttributeCode] = $customField;

        return $jsLayout;
    }
}
