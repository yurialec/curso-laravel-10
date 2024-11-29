<?php

namespace App\Repositories;

use App\DTO\Replies\CreateReplyDTO;
use App\Interfaces\ReplyRepositoryInterface;
use App\Models\ReplySupport;
use Auth;
use Exception;
use Gate;
use Log;
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

    public function delete($id): bool
    {
        try {
            $support = $this->model->find($id);

            if (!$support) {
                return false;
            }

            if (Gate::denies('owner', $support->user->id)) {
                abort(403, 'Not Authorized');
            }

            return (bool) $support->delete();
        } catch (Exception $err) {
            Log::error('Erro ao deletar registro', [
                'error' => $err->getMessage(),
                'id' => $id
            ]);
            return false;
        }
    }
}