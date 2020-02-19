<?php


namespace Test\Test\Model;

use Test\Test\Api\Data\PostInterface;
use Test\Test\Api\Data\PostSearchResultsInterface;
use Test\Test\Api\PostRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Test\Test\Api\Data\PostSearchResultsInterfaceFactory;
use Test\Test\Model\ResourceModel\Post\CollectionFactory;
use Test\Test\Model\PostFactory;
use Test\Test\Model\ResourceModel\Post as ResourceModel;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;


class PostRepository implements PostRepositoryInterface
{

    protected $resource;


    protected $postFactory;


    protected $collectionProcessor;


    protected $collectionFactory;


    protected $searchResultsFactory;


    public function __construct(
        ResourceModel $resource,
        PostFactory $postFactory,
        CollectionProcessorInterface $collectionProcessor,
        CollectionFactory $collectionFactory,
        PostSearchResultsInterfaceFactory $postSearchResultsInterfaceFactory
    ) {
        $this->resource = $resource;
        $this->postFactory = $postFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $postSearchResultsInterfaceFactory;
    }


    public function getById(int $id)
    {
        $post = $this->postFactory->create();
        $this->resource->load($post, $id);

        if (!$post->getId()) {
            throw new NoSuchEntityException(__('Post with id "%1" does not exist.', $id));
        }
    }

    public function deleteById(int $id)
    {
        $this->delete($this->getById($id));
    }


    public function save(PostInterface $post): void
    {
        try {
            $this->resource->save($post);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
    }


    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }


    public function delete(PostInterface $post)
    {
        try {
            $this->resource->delete($post);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return $this;
    }
}