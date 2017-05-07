<?php
declare(strict_types = 1);
namespace Fin\Repository;


interface CategoryCostRepositoryInterface extends RepositoryInterface
{
    public function sumByPeriod(string $dateStart, string $dateEnd, int $userId): array;
}
