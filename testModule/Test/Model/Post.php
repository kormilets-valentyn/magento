<?php

namespace testModule\Test\Model;

use Magento\Framework\Model\AbstractModel;
use testModule\Test\Api\Data\PostInterface;


class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(\testModule\Test\Model\ResourceModel\Post::class);
    }
    public function getName()
    {
        return $this->getData(PostInterface::NAME);
    }

    public function getEmail()
    {
        return $this->getData(PostInterface::EMAIL);
    }

    public function getTelephone()
    {
        return $this->getData(PostInterface::TELEPHONE);
    }
}
