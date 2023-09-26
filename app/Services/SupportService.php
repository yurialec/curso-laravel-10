<?php

namespace App\Services;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Interfaces\PaginationInterface;
use App\Interfaces\SupportRepositoryInterface;
use stdClass;

class SupportService
{
    /**
     * A classe tem um metodo construtor
     * para instanciar um novo objeto da interface da repository
     * @param SupportRepositoryInterface $repository
     */
    public function __construct(protected SupportRepositoryInterface $repository)
    {
    }

    /**
     * Metodo create
     *
     * @param CreateSupportDTO $dto instancia um novo objeto da classe CreateSupportDTO
     * e a mesma aguarda um parametro
     * @return stdClass
     */
    public function create(CreateSupportDTO $dto): stdClass
    {
        return $this->repository->create($dto);
    }

    /**
     * Metodo update
     *
     * @param UpdateSupportDTO $dto instancia um novo objeto da classe UpdateSupportDTO
     * e a mesma aguarda um parametro
     * @return stdClass|null
     */
    public function update(UpdateSupportDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    /** Retorna um array de todos os registros @param string|null $filter @return array */
    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function paginate(
        int $page = 1,
        int $totalPerPage = 15,
        string $filter = null
    ): PaginationInterface {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter
        );
    }

    /** Traz somente um registro @param integer $id @return stdClass|null */
    public function findOne(int $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    /** Deletar registro @param integer $id @return void */
    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
