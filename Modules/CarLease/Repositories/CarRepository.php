<?php

namespace Modules\CarLease\Repositories;

use Modules\CarLease\Entities\Car;
use Modules\CarLease\Entities\CarPerson;
use Carbon\Carbon;

/**
 * Класс-репозиторий для работы с БД с записями о машинах
 *
 * @author Oleg Pyatin
 */
class CarRepository
{
    /**
     * Функция сохранения новой записи о машине
     *
     * @param Car $new_car  Заполненная запись для создания новой машины
     * @return bool  Сохранилось или нет
     */
    public function saveNewCar(Car $new_car): bool
    {
        return $new_car->save();
    }
    
    public function freeCarFromPerson(int $car_id): void
    {
        $car_person_link = CarPerson::where(['car_id'=>$car_id])
                                    ->whereNull('expired_at')
                                    ->first();
        
        if (!empty($car_person_link)) {
            $car_person_link->expired_at = Carbon::now();
            $car_person_link->save();
        }
    }
    
    public function getActualCarLease(int $car_id): ?CarPerson
    {
        return CarPerson::where(['car_id'=>$car_id])
            ->whereNull('expired_at')
            ->first();
    }

    public function deleteCar(int $car_id): void
    {
        $delete_car = Car::findOrFail($car_id);
        
        if (!empty($delete_car)) {
            $delete_car->is_delete = true;
            $delete_car->save();
        }
    }
    
    public function addNewCarLease(CarPerson $new_lease_link): bool
    {
        return $new_lease_link->save();
    }
}
