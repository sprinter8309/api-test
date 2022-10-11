<?php

namespace Modules\ManageModule\Commands;

use Modules\ManageModule\Commands\Base\Command;
use Modules\ManageModule\Commands\Base\CommandParams;
use Modules\CarLease\Repositories\PersonRepository;

class DeletePersonCommand implements Command
{
    public const DELETE_PERSON_SUCCESS_MESSAGE = 'Person and its lease succesfully removed';
    
    public function __construct(public PersonRepository $person_repository)
    {
        
    }
    
    public function execute(CommandParams $command_params)
    {
        $this->person_repository->freeCarFromPerson($command_params->single_param);
        $this->person_repository->deletePerson($command_params->single_param);
        
        return static::DELETE_PERSON_SUCCESS_MESSAGE;
    }
}
