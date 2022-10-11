<?php

namespace Modules\CarLease\Services;

use Modules\CarLease\Repositories\PersonRepository;

class PersonService
{
    public function __construct(public PersonRepository $person_repository)
    {
        
    }
    
    public function checkIsPossiblePersonAssign(int $person_id): bool
    {
        if (empty($this->person_repository->getActualPersonCar($person_id))) {
            return true;
        } else {
            return false;
        }
    }
}
    