<?php

namespace Test\Test\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Test\Test\Api\Data\PostInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->getConnection()->
        query("INSERT INTO myTest_model SET name = 'John'");
    }

//    protected $_postFactory;

//    public function __construct(PostInterface $postFactory)
//    {
//        $this->_postFactory = $postFactory;
//    }

//    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
//    {
//        $data = [
//            'name'         => "John",
//            'email'        => "example@gmail.com",
//            'telephone'    => '380671234567',
//        ];
//        $post = $this->_postFactory->create();
//        $post->setData($data)->save();
//    }
}
