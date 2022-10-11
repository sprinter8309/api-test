<?php

namespace Modules\CarLease\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPerson extends Model
{
    protected $table = 'car_person';

    use HasFactory;
}
