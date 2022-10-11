<?php

namespace Modules\ReadModule\Queries;

use Modules\ReadModule\Queries\Base\Query;
use Modules\ReadModule\Queries\Base\QueryParams;
use Modules\ReadModule\Serializers\CarSerializer;
use Modules\ReadModule\Repositories\CarReadRepository;

class AllCarsQuery implements Query
{
    public function __construct(public CarReadRepository $car_read_repository)
    {
        
    }
    
    public function execute(QueryParams $query_params)
    {
        $all_cars = $this->car_read_repository->getAllCars();
        return CarSerializer::serializeList($all_cars);
    }
}
