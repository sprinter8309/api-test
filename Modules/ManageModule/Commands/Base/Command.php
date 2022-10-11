<?php

namespace Modules\ManageModule\Commands\Base;

use Modules\ManageModule\Commands\Base\CommandParams;

/**
 * Интерфейс для реализации команд изменения данных
 *
 * @author Oleg Pyatin
 */
interface Command
{
    /**
     * Основной метод команды
     */
    public function execute(CommandParams $command_params);
}
