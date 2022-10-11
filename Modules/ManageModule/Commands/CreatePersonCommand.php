<?php

namespace Modules\ManageModule\Commands;

use Modules\ManageModule\Commands\Base\Command;
use Modules\ManageModule\Commands\Base\CommandParams;
use Modules\ManageModule\Entities\CreatePersonDto;
use Modules\ManageModule\Factories\PersonFactory;
use Modules\CarLease\Repositories\PersonRepository;

class CreatePersonCommand implements Command
{
    public const CREATE_PERSON_SUCCESS_MESSAGE = 'Person succesfully added to list';
    
    public function __construct(public PersonFactory $person_factory,
                                public PersonRepository $person_repository)
    {
        
    }
    
    public function execute(CommandParams $command_params)
    {
        $create_person_data = CreatePersonDto::loadFromArray([
            'name'=>$command_params->request->input('name', ''),
            'surname'=>$command_params->request->input('surname', ''),
            'age'=>$command_params->request->input('age', ''),
            'phone'=>$command_params->request->input('phone', ''),
        ]);

        $new_person = $this->person_factory->createPerson($create_person_data);

        $this->person_repository->saveNewPerson($new_person);
        
        return static::CREATE_PERSON_SUCCESS_MESSAGE;
    }
}
