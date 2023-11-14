<?php

use Bitrix\Main\Application;
use Bitrix\Main\Entity\Base;
use Bitrix\Main\IO\Directory;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Candle\Test\Dependencies;
use Candle\Test\ORM\CandleFormTable;

Loc::loadMessages(__FILE__);

if (class_exists('candle_test')) {
    return;
}

class candle_test extends CModule
{

    public function __construct()
    {
        $arModuleVersion = [];
        include(__DIR__.'/version.php');

        $this->MODULE_ID = 'candle.test';
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->MODULE_NAME = Loc::getMessage('CANDLE_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('CANDLE_MODULE_DESC');
        $this->PARTNER_NAME = Loc::getMessage('CANDLE_PARTNER_NAME');
        $this->PARTNER_URI = Loc::getMessage('CANDLE_PARTNER_URI');
    }

    /**
     * @return bool
     */
    public function DoInstall()
    {
        $this->InstallFiles();
        RegisterModule("candle.test");
        Loader::includeModule('candle.test');
        Dependencies::InstallOrm();

        return true;
    }

    /**
     * @return bool
     */
    public function InstallFiles()
    {
        CopyDirFiles(
            $_SERVER['DOCUMENT_ROOT']
            .'/bitrix/modules/candle.test/install/components/',
            $_SERVER['DOCUMENT_ROOT'].'/bitrix/components/',
            true,
            true
        );

        return true;
    }

    /**
     * @return bool
     */
    public function UnInstallFiles()
    {
        Directory::deleteDirectory(
            $_SERVER['DOCUMENT_ROOT'].'/bitrix/components/candle/candle'
        );
        return true;
    }

    /**
     * @return bool
     */
    public function DoUninstall()
    {
        Loader::includeModule('candle.test');
        if (Application::getConnection()->isTableExists(
            Base::getInstance('Candle\Test\ORM\CandleFormTable')
                ->getDBTableName()
        )
        ) {
            $connection = Application::getConnection();
            $connection->dropTable(CandleFormTable::getTableName());
        }
        $this->UnInstallFiles();
        UnRegisterModule("candle.test");

        return true;
    }

}
