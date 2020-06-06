<?php
declare(strict_types=1);

namespace App\Application\Actions\Food;

use Psr\Http\Message\ResponseInterface as Response;

class ListFoodsAction extends FoodAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        
        if($this->request->getQueryParams("desc")){
            $desc = $this->request->getQueryParams("desc");
            
            $foods = $this->foodRepository->findByDesc($desc);
        }else{
            $foods = $this->foodRepository->findAll();
        }
        
        $this->logger->info("Foods list was viewed.");

        return $this->respondWithData($foods);
    }
}
