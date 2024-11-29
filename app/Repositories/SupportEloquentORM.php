<?php

namespace App\Repositories;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Interfaces\PaginationInterface;
use App\Interfaces\SupportRepositoryInterface;
use App\Models\Support;
use App\Presentation\PaginationPresenter;
use Exception;
use Illuminate\Support\Facades\Gate;
use stdClass;

/**
 * A classe reposiroty tem a responsabilidade de realizar a persistencia do banco de dados
 */
class SupportEloquentORM implements SupportRepositoryInterface
{
    /** Faz injecao de dependencia da model Support @param Support $model */
    public function __construct(
        protected Support $model
    ) {
    }

    /**
     * Paginacao
     *
     * @param integer $page
     * @param integer $totalPerPage
     * @param string|null $filter
     * @return PaginationInterface
     */
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        $result = $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('subject', $filter);
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    /** @param string|null $filter @return array */
    public function getAll(string $filter = null): array
    {
        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('subject', $filter);
                    $query->orWhere('body', 'like', "%{$filter}%");
                }
            })
            ->get()
            ->toArray();
    }

    /** Undocumented function @param integer $id @return stdClass|null */
    public function findOne($id): stdClass|null
    {
        $support = $this->model->find($id);

        if (!$support) {
            return null;
        }

        return (object) $support->toArray();
    }

    /** Undocumented function @param integer $id @return void */
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

            $support->replies()->delete();

            return (bool) $support->delete();
        } catch (Exception $err) {
            Log::error('Erro ao deletar registro', ['error' => $err->getMessage(), 'id' => $id]);
            return false;
        }
    }

    /** Undocumented function @param CreateSupportDTO $dto @return stdClass */
    public function create(CreateSupportDTO $dto): stdClass
    {
        $support = $this->model->create(
            (array) $dto
        );

        return (object) $support->toArray();
    }

    /** Undocumented function @param UpdateSupportDTO $dto @return stdClass|null */
    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        if (!$support = $this->model->find($dto->id)) {
            return null;
        }

        if (Gate::denies('owner', $support->user->id)) {
            abort(403, 'Not Authorized');
        }

        $support->update((array) $dto);

        return (object) $support->toArray();
    }
}
