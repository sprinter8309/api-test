<?php

namespace Modules\ReadModule\Queries\Base;

use Illuminate\Http\Request;
use App\Components\Dto\BaseDto;

class QueryParams extends BaseDto
{
    public ?Request $request;
    
    public mixed $single_param;
}
