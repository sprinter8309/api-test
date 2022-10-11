<?php

namespace Modules\ManageModule\Commands;

use Modules\ManageModule\Commands\Base\Command;
use Modules\ManageModule\Commands\Base\CommandParams;
use Modules\ManageModule\Exceptions\CarIsNotFreeForLeaseException;
use Modules\ManageModule\Exceptions\UserIsAlreadyHasLeaseCarException;
use Modules\ManageModule\Factories\CarFactory;
use Modules\CarLease\Repositories\CarRepository;
use Modules\CarLease\Services\CarService;
use Modules\CarLease\Services\PersonService;

class AssignPersonCarCommand implements Command
{
    public const ASSIGN_PERSON_SUCCESS_MESSAGE = 'Person succesfully assigned to car for lease';
    
    public function __construct(public CarRepository $car_repository,
                                public CarService $car_service,
                                public PersonService $person_service,
                                public CarFactory $car_factory)
    {
        
    }
    
    public function execute(CommandParams $command_params)
    {
        if (!$this->car_service->checkIsPossibleCarAssign($command_params->request->input('car_id', null))) {
            throw new CarIsNotFreeForLeaseException("Error - car is not free for lease");
        }
        
        if (!$this->person_service->checkIsPossiblePersonAssign($command_params->request->input('person_id', null))) {
            throw new UserIsAlreadyHasLeaseCarException("Error - user is already has lease car");
        }
        
        $new_lease_link = $this->car_factory->createCarLeaseLink($command_params->request->input('car_id'), 
                                                                 $command_params->request->input('person_id'));
        
        $this->car_repository->addNewCarLease($new_lease_link);
        
        return static::ASSIGN_PERSON_SUCCESS_MESSAGE;
    }
}
