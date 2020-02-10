<?php

namespace testModule\Test\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \testModule\Test\Model\Post::class,
            \TestModule\Test\Model\ResourceModel\Post::class
        );
    }
}
