<?php

namespace Modules\ReadModule\Queries;

use Modules\ReadModule\Queries\Base\Query;
use Modules\ReadModule\Queries\Base\QueryParams;
use Modules\ReadModule\Serializers\PersonSerializer;
use Modules\ReadModule\Repositories\PersonReadRepository;

class AllPersonsQuery implements Query
{
    public function __construct(public PersonReadRepository $person_read_repository)
    {
        
    }
    
    public function execute(QueryParams $query_params)
    {
        $all_persons = $this->person_read_repository->getAllPersons();
        return PersonSerializer::serializeList($all_persons);
    }
}
