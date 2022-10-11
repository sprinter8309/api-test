<?php

namespace Modules\ReadModule\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

/**
 * Класс-репозиторий для работы с получением из БД записей о машинах
 *
 * @author Oleg Pyatin
 */
class CarReadRepository
{
    public function getAllCars(): Collection
    {
        return DB::table('car')
                ->leftJoin('car_person', function ($join) {
                    $join->on('car.id', '=', 'car_person.car_id')
                         ->whereNull('car_person.expired_at');
                })
                ->leftJoin('person', 'person.id', '=', 'car_person.person_id')
                ->where('car.is_delete', 'f')
                ->whereNull('car_person.expired_at')
                ->select('car.id as car_id', 'car.brand as car_brand', 'car.model as car_model', 'car.color as car_color', 'car.number as car_number',
                         'person.id as person_id', 'person.name as person_name', 'person.phone as person_phone')
                ->get();
    }
    
    public function getCarById(int $car_id): ?object
    {
        return DB::table('car')
                ->leftJoin('car_person', function ($join) {
                    $join->on('car.id', '=', 'car_person.car_id')
                         ->whereNull('car_person.expired_at');
                })
                ->leftJoin('person', 'person.id', '=', 'car_person.person_id')
                ->where('car.id', $car_id)
                ->where('car.is_delete', 'f')
                ->whereNull('car_person.expired_at')
                ->select('car.id as car_id', 'car.brand as car_brand', 'car.model as car_model', 'car.color as car_color', 'car.number as car_number',
                         'person.id as person_id', 'person.name as person_name', 'person.phone as person_phone')
                ->first();
    }
}
