<?php

namespace App\Interfaces;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use stdClass;

/**
 * Classe abstrata da repository
 */
interface SupportRepositoryInterface
{
    /**
     * Paginacao
     *
     * @param integer $page
     * @param integer $totalPerPage
     * @param string|null $filter
     * @return PaginationInterface
     */
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface;

    /** Listar todos os registros @param string|null $filter @return array */
    public function getAll(string $filter = null): array;

    /** Localizar registro @param integer $id @return stdClass|null */
    public function findOne(int $id): stdClass|null;

    /** Deletar Registro @param integer $id @return void */
    public function delete(int $id): void;

    /** Criar novo registro @param CreateSupportDTO $dto @return stdClass */
    public function create(CreateSupportDTO $dto): stdClass;

    /** Atualizar Registro @param UpdateSupportDTO $dto @return stdClass|null */
    public function update(UpdateSupportDTO $dto): stdClass|null;
}
