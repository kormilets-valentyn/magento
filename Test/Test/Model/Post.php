<?php

namespace Test\Test\Model;

use Magento\Framework\Model\AbstractModel;
use Test\Test\Api\Data\PostInterface;


class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(\Test\Test\Model\ResourceModel\Post::class);
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
