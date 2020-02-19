<?php

namespace Test\Test\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Test\Test\Model\Post::class,
            \Test\Test\Model\ResourceModel\Post::class
        );
    }
}
