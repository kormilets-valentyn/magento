<?php

namespace LoyaltyGroup\LoyaltyPoints\Controller\Customer;

use Magento\Framework\App\Action\Action;

class Loyalty extends Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
