<?php

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass;

/**
 * Classe abstrata da repository
 */
interface SupportRepositoryInterface
{
    /** Undocumented function @param string|null $filter @return array */
    public function getAll(string $filter = null): array;

    /** Undocumented function @param integer $id @return stdClass|null */
    public function findOne(int $id): stdClass|null;

    /** Undocumented function @param integer $id @return void */
    public function delete(int $id): void;

    /** Undocumented function @param CreateSupportDTO $dto @return stdClass */
    public function create(CreateSupportDTO $dto): stdClass;

    /** Undocumented function @param UpdateSupportDTO $dto @return stdClass|null */
    public function update(UpdateSupportDTO $dto): stdClass|null;
}
