<?php

namespace App\Services;

use App\DTO\Replies\CreateReplyDTO;
use App\Events\SupportReplied;
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
        $support = $this->repository->createNew($dto);
        SupportReplied::dispatch($support);

        return $support;
    }

    public function delete($id): bool
    {
        return $this->repository->delete($id);
    }
}