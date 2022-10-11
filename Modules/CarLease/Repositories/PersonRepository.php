<?php

namespace Modules\CarLease\Repositories;

use Modules\CarLease\Entities\CarPerson;
use Modules\CarLease\Entities\Person;
use Carbon\Carbon;

/**
 * Класс-репозиторий для работы с БД с записями о пользователях
 *
 * @author Oleg Pyatin
 */
class PersonRepository
{
    /**
     * Функция сохранения новой записи о пользователе
     *
     * @param Person $new_person  Заполненная запись для создания нового пользователя
     * @return bool  Сохранилось или нет
     */
    public function saveNewPerson(Person $new_person): bool
    {
        return $new_person->save();
    }
    
    public function freeCarFromPerson(int $person_id): void
    {
        $car_person_link = CarPerson::where(['person_id'=>$person_id])
                                    ->whereNull('expired_at')
                                    ->first();
        
        if (!empty($car_person_link)) {
            $car_person_link->expired_at = Carbon::now();
            $car_person_link->save();
        }
    }
    
    public function getActualPersonCar(int $person_id): ?CarPerson
    {
        return CarPerson::where(['person_id'=>$person_id])
            ->whereNull('expired_at')
            ->first();
    }
    
    public function deletePerson(int $person_id): void
    {
        $delete_person = Person::findOrFail($person_id);
        
        if (!empty($delete_person)) {
            $delete_person->is_delete = true;
            $delete_person->save();
        }
    }
}
