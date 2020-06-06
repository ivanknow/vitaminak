<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Food;

use App\Domain\Food\Food;
use App\Domain\Food\FoodNotFoundException;
use App\Domain\Food\FoodRepository;

class InMemoryFoodRepository implements FoodRepository
{
    /**
     * @var food[]
     */
    private $foods;

    /**
     * InMemoryFoodRepository constructor.
     *
     * @param array|null foods
     */
    public function __construct(array $foods = null)
    {

        $json_foods_str = file_get_contents ("alimentos.json");
        $foods = json_decode ($json_foods_str,true);
        $this->foods =  $foods;
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->foods);
    }


    public function findByDesc($desc): array
    {
        $allfoods = $this->foods['food'];
        $foods = [];
        $result = [];
        $result["query"] = $desc['desc'];
       
        foreach ($allfoods as $key => $food){
            //if($desc['desc'] == $food['desc']){
            if(strpos (strtoupper($food['desc']),strtoupper($desc['desc']))){
                $foods[] = $food;
            }
        }   
        $result["foods"] = $foods;
        return ($result);
    }

    /**
     * {@inheritdoc}
     */
    public function findFoodOfId(int $id): Food
    {
        if (!isset($this->foods[$id])) {
            throw new FoodNotFoundException();
        }

        return $this->foods[$id];
    }
}
