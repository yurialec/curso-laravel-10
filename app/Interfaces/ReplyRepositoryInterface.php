<?php

namespace App\Interfaces;

use App\DTO\Replies\CreateReplyDTO;

interface ReplyRepositoryInterface
{

    public function getAllBySupportId(string $supportId): array;
    public function createNew(\App\DTO\Replies\CreateReplyDTO $dto): \stdClass;
}