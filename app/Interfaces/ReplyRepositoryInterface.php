<?php

namespace App\Interfaces;

interface ReplyRepositoryInterface
{

    public function getAllBySupportId(string $supportId): array;
    public function createNew(\App\DTO\Replies\CreateReplyDTO $dto): \stdClass;

    public function delete($id): bool;
}