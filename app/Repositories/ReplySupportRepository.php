<?php

namespace App\Repositories;

use App\DTO\Replies\CreateReplyDTO;
use App\Interfaces\ReplyRepositoryInterface;
use App\Models\ReplySupport;
use Auth;
use stdClass;

class ReplySupportRepository implements ReplyRepositoryInterface
{
    public function __construct(protected ReplySupport $model)
    {

    }

    public function getAllBySupportId(string $suportId): array
    {
        $replies = $this->model->where('support_id', $suportId)->get();
        return $replies->toArray();
    }

    public function createNew(CreateReplyDTO $dto): stdClass
    {
        $reply = $this->model->create([
            'content' => $dto->content,
            'support_id' => $dto->supportId,
            'user_id' => Auth::user()->id,
        ]);

        $reply = $reply->with('user')->first();

        return (object) $reply->toArray();
    }
}