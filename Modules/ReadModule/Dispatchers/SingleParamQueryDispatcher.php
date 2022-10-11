<?php

namespace Modules\ReadModule\Dispatchers;

use Modules\ReadModule\Queries\Base\Query;
use Modules\ReadModule\Queries\Base\QueryParams;

class SingleParamQueryDispatcher
{
    public function dispatch(Query $query, mixed $single_param)
    {
        return $query->execute(QueryParams::loadFromArray([
            'single_param'=>$single_param
        ]));
    }
}
