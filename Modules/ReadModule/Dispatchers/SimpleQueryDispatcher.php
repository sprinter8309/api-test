<?php

namespace Modules\ReadModule\Dispatchers;

use Illuminate\Http\Request;
use Modules\ReadModule\Queries\Base\Query;
use Modules\ReadModule\Queries\Base\QueryParams;

class SimpleQueryDispatcher
{
    public function dispatch(Query $query, Request $request)
    {
        return $query->execute(QueryParams::loadFromArray([
            'request'=>$request
        ]));
    }
}
