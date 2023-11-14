<?php

namespace Candle\Test\ORM;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Data\DataManager;
Loc::loadMessages(__FILE__);

class CandleFormTable extends DataManager
{
    /**
     * @return string
     */
    public static function getTableName()
    {
        return 'candle_form';
    }

    /**
     * @return string
     */
    public static function getUfId()
    {
        return 'CANDLE_FORM';
    }

    /**
     * @return array
     */
    public static function getMap()
    {
        return [
            /** ID значения */
            new Fields\IntegerField('ID', [
                'primary' => true,
                'autocomplete' => true,
            ]),
            /** Имя */
            new Fields\StringField('NAME', [
                'required' => true,
            ]),
            /** Фамилия */
            new Fields\StringField('SURNAME', [
                'required' => true,
            ]),
            /** Доступ (ДА/НЕТ) */
            new Fields\StringField('ACCESS', [
                'required' => true,
            ]),
            /** Номер телефона */
            new Fields\StringField('NUMBER', [
                'required' => true,
            ]),
        ];
    }
}