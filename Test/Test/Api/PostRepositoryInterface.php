<?php

namespace Test\Test\Api;

use Test\Test\Api\Data\PostInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface PostRepositoryInterface
{
    public function getById(int $id);

    public function deleteById(int $id);

    public function save(PostInterface $post): void;

    public function getList(SearchCriteriaInterface $searchCriteria);

    public function delete(PostInterface $post);
}
