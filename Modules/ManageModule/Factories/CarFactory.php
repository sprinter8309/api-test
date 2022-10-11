<?php

namespace Modules\ManageModule\Factories;

use Modules\CarLease\Entities\Car;
use Modules\CarLease\Entities\CarPerson;
use Modules\ManageModule\Entities\CreateCarDto;

/**
 * Класс-фабрика для создания записей в БД о новых машинах
 *
 * @author Oleg Pyatin
 */
class CarFactory
{
    /**
     * Функция для создания новой машины
     * @return Car
     */
    public function createCar(CreateCarDto $create_car_dto): Car
    {
        $new_car = new Car();
        
        $new_car->brand = $create_car_dto->brand;
        $new_car->model = $create_car_dto->model;
        $new_car->color = $create_car_dto->color;
        $new_car->number = $create_car_dto->number;
        $new_car->is_delete = false;
        
        return $new_car;
    }
    
    public function createCarLeaseLink(int $car_id, int $person_id): CarPerson
    {
        $new_lease_link = new CarPerson();
        
        $new_lease_link->car_id = $car_id;
        $new_lease_link->person_id = $person_id;
        $new_lease_link->expired_at = null;
        
        return $new_lease_link;
    }
}
