<?php

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Models\Support;
use App\Repositories\SupportRepositoryInterface;
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
    public function findOne(int $id): stdClass|null
    {
        $support = $this->model->find($id);

        if (!$support) {
            return null;
        }

        return (object) $support->toArray();
    }

    /** Undocumented function @param integer $id @return void */
    public function delete(int $id): void
    {
        $this->model->findOrFail($id)->delete();
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

        $support->update(
            (array) $dto
        );

        return (object) $support->toArray();
    }
}
