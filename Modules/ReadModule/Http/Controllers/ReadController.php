<?php

namespace Modules\ReadModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ReadModule\Queries\AllCarsQuery;
use Modules\ReadModule\Queries\AllPersonsQuery;
use Modules\ReadModule\Queries\SingleCarQuery;
use Modules\ReadModule\Queries\SinglePersonQuery;
use Modules\ReadModule\Dispatchers\SimpleQueryDispatcher;
use Modules\ReadModule\Dispatchers\SingleParamQueryDispatcher;

class ReadController extends Controller
{
    public function __construct(public SimpleQueryDispatcher $simple_query_dispatcher,
                                public SingleParamQueryDispatcher $single_param_query_dispatcher)
    {
        
    }

    public function getAllCars(AllCarsQuery $all_cars_query, Request $request)
    {
        $cars_list = $this->simple_query_dispatcher->dispatch($all_cars_query, $request);        
        return response()->json($cars_list);
    }
    
    public function getAllPersons(AllPersonsQuery $all_persons_query, Request $request)
    {
        $persons_list = $this->simple_query_dispatcher->dispatch($all_persons_query, $request);        
        return response()->json($persons_list);
    }
    
    public function getCar(SingleCarQuery $single_car_query, string $car_id)
    {
        $car_info = $this->single_param_query_dispatcher->dispatch($single_car_query, $car_id);        
        return response()->json($car_info);
    }
    
    public function getPerson(SinglePersonQuery $single_person_query, string $person_id)
    {
        $person_info = $this->single_param_query_dispatcher->dispatch($single_person_query, $person_id);        
        return response()->json($person_info);
    }
}
