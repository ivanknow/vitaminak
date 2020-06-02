<?php
declare(strict_types=1);

namespace App\Domain\Food;

use App\Domain\DomainException\DomainRecordNotFoundException;

class FoodNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Food you requested does not exist.';
}
