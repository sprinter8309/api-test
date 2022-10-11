<?php

namespace Modules\ManageModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ManageModule\Commands\CreateCarCommand;
use Modules\ManageModule\Commands\CreatePersonCommand;
use Modules\ManageModule\Commands\DeleteCarCommand;
use Modules\ManageModule\Commands\DeletePersonCommand;
use Modules\ManageModule\Dispatchers\SimpleCommandDispatcher;
use Modules\ManageModule\Dispatchers\SingleParamCommandDispatcher;

class SimpleManageController extends Controller
{
    public function __construct(public SimpleCommandDispatcher $simple_command_dispatcher,
                                public SingleParamCommandDispatcher $single_param_command_dispatcher)
    {
        
    }
    
    public function createCar(CreateCarCommand $create_car_command, Request $request)
    {
        return $this->simple_command_dispatcher->dispatch($create_car_command, $request);
    }
    
    public function createPerson(CreatePersonCommand $create_person_command, Request $request)
    {
        return $this->simple_command_dispatcher->dispatch($create_person_command, $request);
    }
    
    public function deleteCar(DeleteCarCommand $delete_car_command, string $delete_car_id)
    {
        return $this->single_param_command_dispatcher->dispatch($delete_car_command, $delete_car_id); 
    }
    
    public function deletePerson(DeletePersonCommand $delete_person_command, string $delete_person_id)
    {
        return $this->single_param_command_dispatcher->dispatch($delete_person_command, $delete_person_id); 
    }
}
