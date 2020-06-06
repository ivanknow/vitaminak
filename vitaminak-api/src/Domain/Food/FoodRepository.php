<?php
declare(strict_types=1);

namespace App\Domain\Food;

interface FoodRepository
{
    /**
     * @return Food[]
     */
    public function findAll(): array;


    /**
     * @return Food[]
     */
    public function findByDesc($desc): array;

    /**
     * @param int $id
     * @return Food
     * @throws FoodNotFoundException
     */
    public function findFoodOfId(int $id): Food;
}
