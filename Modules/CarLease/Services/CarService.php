<?php

namespace Modules\CarLease\Services;

use Modules\CarLease\Repositories\CarRepository;

class CarService
{
    public function __construct(public CarRepository $car_repository)
    {
        
    }
    
    public function checkIsPossibleCarAssign(int $car_id): bool
    {
        if (empty($this->car_repository->getActualCarLease($car_id))) {
            return true;
        } else {
            return false;
        }
    }
}
