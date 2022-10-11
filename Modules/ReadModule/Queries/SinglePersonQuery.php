<?php

namespace Modules\ReadModule\Queries;

use Modules\ReadModule\Queries\Base\Query;
use Modules\ReadModule\Queries\Base\QueryParams;
use Modules\ReadModule\Serializers\PersonSerializer;
use Modules\ReadModule\Repositories\PersonReadRepository;

class SinglePersonQuery implements Query
{
    public function __construct(public PersonReadRepository $person_read_repository)
    {
        
    }
    
    public function execute(QueryParams $query_params)
    {
        $person_info_data = $this->person_read_repository->getPersonById($query_params->single_param);
        return PersonSerializer::serialize($person_info_data);
    }
}
