<?php

namespace Modules\ManageModule\Commands;

use Modules\ManageModule\Commands\Base\Command;
use Modules\ManageModule\Commands\Base\CommandParams;
use Modules\ManageModule\Entities\CreateCarDto;
use Modules\ManageModule\Factories\CarFactory;
use Modules\CarLease\Repositories\CarRepository;

class CreateCarCommand implements Command
{
    public const CREATE_CAR_SUCCESS_MESSAGE = 'Car succesfully added to list';
    
    public function __construct(public CarFactory $car_factory,
                                public CarRepository $car_repository)
    {
        
    }
    
    public function execute(CommandParams $command_params)
    {
        $create_car_data = CreateCarDto::loadFromArray([
            'brand'=>$command_params->request->input('brand', ''),
            'model'=>$command_params->request->input('model', ''),
            'color'=>$command_params->request->input('color', ''),
            'number'=>$command_params->request->input('number', ''),
        ]);

        $new_car = $this->car_factory->createCar($create_car_data);

        $this->car_repository->saveNewCar($new_car);
        
        return static::CREATE_CAR_SUCCESS_MESSAGE;
    }
}
