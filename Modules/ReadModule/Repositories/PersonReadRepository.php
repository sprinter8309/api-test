<?php

namespace Modules\ReadModule\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

/**
 * Класс-репозиторий для работы с получением из БД записей о пользователях
 *
 * @author Oleg Pyatin
 */
class PersonReadRepository
{
    public function getAllPersons(): Collection
    {
        return DB::table('person')
                ->leftJoin('car_person', function ($join) {
                    $join->on('person.id', '=', 'car_person.person_id')
                         ->whereNull('car_person.expired_at');
                })
                ->leftJoin('car', 'car.id', '=', 'car_person.car_id')
                ->where('person.is_delete', 'f')
                ->whereNull('car_person.expired_at')
                ->select('person.id as person_id', 'person.name as person_name', 'person.surname as person_surname', 'person.age as person_age', 'person.phone as person_phone',
                         'car.id as car_id', 'car.brand as car_brand', 'car.model as car_model', 'car.number as car_number')
                ->get();
    }
    
    public function getPersonById(int $person_id): ?object
    {
        return DB::table('person')
                ->leftJoin('car_person', function ($join) {
                    $join->on('person.id', '=', 'car_person.person_id')
                         ->whereNull('car_person.expired_at');
                })
                ->leftJoin('car', 'car.id', '=', 'car_person.car_id')
                ->where('person.id', $person_id)
                ->where('person.is_delete', 'f')
                ->whereNull('car_person.expired_at')
                ->select('person.id as person_id', 'person.name as person_name', 'person.surname as person_surname', 'person.age as person_age', 'person.phone as person_phone',
                         'car.id as car_id', 'car.brand as car_brand', 'car.model as car_model', 'car.number as car_number')
                ->first();
    }
}
