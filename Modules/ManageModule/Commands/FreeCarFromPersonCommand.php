<?php

namespace Modules\ManageModule\Commands;

use Modules\ManageModule\Commands\Base\Command;
use Modules\ManageModule\Commands\Base\CommandParams;
use Modules\CarLease\Repositories\CarRepository;

class FreeCarFromPersonCommand implements Command
{
    public const FREE_CAR_SUCCESS_MESSAGE = 'Car lease succesfully stopped';
    
    public function __construct(public CarRepository $car_repository)
    {
        
    }
    
    public function execute(CommandParams $command_params)
    {
        $car_id = $command_params->request->input('car_id', null);
        $this->car_repository->freeCarFromPerson($car_id);
        
        return static::FREE_CAR_SUCCESS_MESSAGE;
    }
}
