<?php

namespace Test\Test\Api\Data;

interface PostInterface
{
    const ENTITY_ID = 'entity_id';
    const NAME = 'name';
    const EMAIL = 'email';
    const TELEPHONE = 'telephone';

    public function getId();

    public function getName();

    public function getEmail();

    public function getTelephone();
}
