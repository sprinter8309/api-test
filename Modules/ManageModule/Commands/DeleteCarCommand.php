<?php

namespace Modules\ManageModule\Commands;

use Modules\ManageModule\Commands\Base\Command;
use Modules\ManageModule\Commands\Base\CommandParams;
use Modules\CarLease\Repositories\CarRepository;

class DeleteCarCommand implements Command
{
    public const DELETE_CAR_SUCCESS_MESSAGE = 'Car and its lease succesfully removed';
    
    public function __construct(public CarRepository $car_repository)
    {
        
    }
    
    public function execute(CommandParams $command_params)
    {
        $this->car_repository->freeCarFromPerson($command_params->single_param);
        $this->car_repository->deleteCar($command_params->single_param);
        
        return static::DELETE_CAR_SUCCESS_MESSAGE;
    }
}
