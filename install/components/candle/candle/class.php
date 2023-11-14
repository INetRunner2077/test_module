<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var CBitrixComponent $this */
/** @var array $arResult */

use Bitrix\Main\Context;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Candle\Test\ORM\CandleFormTable;


class CandleForm extends CBitrixComponent implements Controllerable

{
    /**
     * Возвращает фильтр для Action
     *
     * @return ActionFilter\Authentication
     */
    public function configureActions(): array
    {
        return [
            'send' => [
                'prefilters' => [
                    new ActionFilter\Authentication(),
                    // проверяет авторизован ли пользователь
                ],
            ],
        ];
    }

    /**
     * Добаляет запись в ORM таблицу
     *
     * @return array
     */
    public static function addTableAction()
    {
        $arData = Context::getCurrent()->getRequest()->getPostList();
        Loader::includeModule('candle.test');

        $result = CandleFormTable::add(
            array(
                'NAME'    => $arData['NAME'],
                'SURNAME' => $arData['SURNAME'],
                'NUMBER'  => $arData['NUMBER'],
                'ACCESS'  => $arData['ACCESS'],
            )
        );

        if (!$result->isSuccess()) {
            $errors = $result->getErrors();
            foreach ($errors as $error) {
                $errorMass['errors'][] = $error->getMessage();
            }
            $errorMass['status'] = 'error';

            return $errorMass;
        }

        return [
            'status'  => 'success',
            'message' => Loc::getMessage('SUCCESS')
        ];
    }

    public function executeComponent()
    {
        $this->includeComponentTemplate();
    }
}