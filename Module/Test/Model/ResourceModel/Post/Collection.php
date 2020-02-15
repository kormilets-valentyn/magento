<?php

namespace Module\Test\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Module\Test\Model\Post::class,
            \Module\Test\Model\ResourceModel\Post::class
        );
    }
}
