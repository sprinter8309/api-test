<?php

namespace Modules\ManageModule\Entities;

use App\Components\Dto\BaseDto;

class CreatePersonDto extends BaseDto
{
    public string $name;
    
    public string $surname;
    
    public string $age;
    
    public string $phone;
}
