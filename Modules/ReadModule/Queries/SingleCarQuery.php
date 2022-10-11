<?php

namespace Modules\ReadModule\Queries;

use Modules\ReadModule\Queries\Base\Query;
use Modules\ReadModule\Queries\Base\QueryParams;
use Modules\ReadModule\Serializers\CarSerializer;
use Modules\ReadModule\Repositories\CarReadRepository;

class SingleCarQuery implements Query
{
    public function __construct(public CarReadRepository $car_read_repository)
    {
        
    }
    
    public function execute(QueryParams $query_params)
    {
        $car_info_data = $this->car_read_repository->getCarById($query_params->single_param);
        return CarSerializer::serialize($car_info_data);
    }
}
