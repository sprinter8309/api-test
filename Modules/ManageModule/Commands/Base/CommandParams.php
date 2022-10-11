<?php

namespace Modules\ManageModule\Commands\Base;

use Illuminate\Http\Request;
use App\Components\Dto\BaseDto;

class CommandParams extends BaseDto
{
    public ?Request $request;
    
    public mixed $single_param;
}
