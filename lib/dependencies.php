<?php

namespace Candle\Test;

use Bitrix\Main\Application;
use Bitrix\Main\Entity\Base;
use Bitrix\Main\Loader;
use Candle\Test\ORM\CandleFormTable;

class Dependencies
{
    /**
     * Установка таблицы ORM
     */
    public static function InstallOrm()
    {

        if (!Application::getConnection()->isTableExists(
            Base::getInstance('Candle\Test\ORM\CandleFormTable')->getDBTableName()
        )) {
            Base::getInstance('Candle\Test\ORM\CandleFormTable')->createDBTable();
        }

    }

}