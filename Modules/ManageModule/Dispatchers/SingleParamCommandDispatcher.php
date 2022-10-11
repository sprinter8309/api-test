<?php

namespace Modules\ManageModule\Dispatchers;

use Modules\ManageModule\Commands\Base\Command;
use Modules\ManageModule\Commands\Base\CommandParams;
use Exception;

class SingleParamCommandDispatcher
{
    public function dispatch(Command $command, mixed $single_param)
    {
        try {
            $command_result = $command->execute(CommandParams::loadFromArray([
                'single_param'=>$single_param
            ]));
        } catch (\Throwable $exc) {
            throw new Exception("Error in processing command - ".$exc->getMessage());
        }
        
        return $command_result;
    }
}
