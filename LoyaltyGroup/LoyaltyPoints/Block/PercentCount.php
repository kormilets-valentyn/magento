<?php
namespace LoyaltyGroup\LoyaltyPoints\Block;

class PercentCount
{
    public $scopeConfig;


    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function getPercentOfLoyalty()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORES;
        return $this->scopeConfig->getValue("loyalty/general/display_text", $storeScope);
    }
}
