<?php

namespace App\Services;

use App\DTO\Replies\CreateReplyDTO;
use App\Interfaces\ReplyRepositoryInterface;

class ReplySupportService
{
    public function __construct(protected ReplyRepositoryInterface $repository)
    {

    }

    public function getAllBySupportId(string $suportId): array
    {
        return $this->repository->getAllBySupportId($suportId);
    }

    public function createNew(CreateReplyDTO $dto)
    {
        $this->repository->createNew($dto);
    }
}