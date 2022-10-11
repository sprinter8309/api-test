<?php

namespace Modules\ManageModule\Entities;

use App\Components\Dto\BaseDto;

class CreateCarDto extends BaseDto
{
    public string $brand;
    
    public string $model;
    
    public string $color;
    
    public string $number;
}
