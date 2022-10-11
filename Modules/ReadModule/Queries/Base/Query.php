<?php

namespace Modules\ReadModule\Queries\Base;

use Modules\ReadModule\Queries\Base\QueryParams;

/**
 * Интерфейс для реализации запросов получения данных
 *
 * @author Oleg Pyatin
 */
interface Query
{
    /**
     * Основной метод запроса
     */
    public function execute(QueryParams $query_params);
}
