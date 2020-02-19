<?php

namespace Test\Test\Block;

use Magento\Mtf\Config\FileResolver\ScopeConfig;
use Test\Test\Api\PostRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Test\Test\Model\ResourceModel\Post\CollectionFactory;

class Post extends Template
{
    private $postRepository;

    private $searchCriteriaBuilder;

    private $scopeConfig;

    private $collectionFactory;

    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        CollectionFactory $collectionFactory,
        PostRepositoryInterface $postRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
        $this->collectionFactory = $collectionFactory;
        $this->postRepository = $postRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function getPost()
    {
        $count = $this-> customConfig();
        $collection = $this->collectionFactory->create();
        $collection->addFieldToSelect('*')->setPageSize($count);
        return $collection;
//        $searchCriteria = $this->searchCriteriaBuilder
//
//            ->create();
//
//        $searchResult = $this->postRepository->getList($searchCriteria);
//
//        return $searchResult;
    }
    public function customConfig(){
        return $this->scopeConfig->getValue('filter/general/display_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
