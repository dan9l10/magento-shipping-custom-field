<?php

namespace Danylo\ShippingModule\Plugin\Quote;

use Magento\Quote\Model\QuoteRepository;

class SaveToQuote
{
    protected $quoteRepository;

    public function __construct(QuoteRepository $quoteRepository) {
        $this->quoteRepository = $quoteRepository;
    }

    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    ) {
       /* if(!$extAttributes = $addressInformation->getExtensionAttributes())
        {
            return;
        }

        $quote = $this->quoteRepository->getActive($cartId);

        $quote->setCustomvar($extAttributes->getCustomvar());*/
        $extensionAttributes = $addressInformation->getExtensionAttributes();
        $customField = $extensionAttributes->getCustomvar();
        $quote = $this->quoteRepository->getActive($cartId);
        $quote->setCustomvar($customField);
    }
}
