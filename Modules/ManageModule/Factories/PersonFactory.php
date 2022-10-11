<?php

namespace Modules\ManageModule\Factories;

use Modules\CarLease\Entities\Person;
use Modules\ManageModule\Entities\CreatePersonDto;

/**
 * Класс-фабрика для создания записей в БД о новых пользователях машин
 *
 * @author Oleg Pyatin
 */
class PersonFactory
{
    /**
     * Функция для создания нового пользователя машины
     * @return Person
     */
    public function createPerson(CreatePersonDto $create_person_dto): Person
    {
        $new_person = new Person();
        
        $new_person->name = $create_person_dto->name;
        $new_person->surname = $create_person_dto->surname;
        $new_person->age = $create_person_dto->age;
        $new_person->phone = $create_person_dto->phone;
        $new_person->is_delete = false;
        
        return $new_person;
    }
}