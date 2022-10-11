<?php

namespace Modules\ManageModule\Dispatchers;

use Illuminate\Http\Request;
use Modules\ManageModule\Commands\Base\Command;
use Modules\ManageModule\Commands\Base\CommandParams;
use Exception;

class SimpleCommandDispatcher
{
    public function dispatch(Command $command, Request $request)
    {
        try {
            $command_result = $command->execute(CommandParams::loadFromArray([
                'request'=>$request
            ]));
        } catch (\Throwable $exc) {
            throw new Exception("Error in processing command - ".$exc->getMessage());
        }
        
        return $command_result;
    }
}
