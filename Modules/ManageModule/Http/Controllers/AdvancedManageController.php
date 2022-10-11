<?php

namespace Modules\ManageModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ManageModule\Commands\FreeCarFromPersonCommand;
use Modules\ManageModule\Commands\AssignPersonCarCommand;
use Modules\ManageModule\Dispatchers\SimpleCommandDispatcher;
use Modules\ManageModule\Dispatchers\SingleParamCommandDispatcher;

class AdvancedManageController extends Controller
{
    public function __construct(public SimpleCommandDispatcher $simple_command_dispatcher,
                                public SingleParamCommandDispatcher $single_param_command_dispatcher)
    {
        
    }
    
    public function assignPersonToCar(AssignPersonCarCommand $assign_person_car_command, Request $request)
    {
        return $this->simple_command_dispatcher->dispatch($assign_person_car_command, $request); 
    }
    
    public function freeCarFromPerson(FreeCarFromPersonCommand $free_car_from_person_command, Request $request)
    {
        return $this->simple_command_dispatcher->dispatch($free_car_from_person_command, $request); 
    }
}
