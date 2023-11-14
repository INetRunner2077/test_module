<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true):
    die();
endif;
use Bitrix\Main\Localization\Loc;
$arComponentDescription = array(
    "NAME" => Loc::getMessage("IDEA_COMPONENT"),
    "DESCRIPTION" => Loc::getMessage("IDEA_COMPONENT_DESCRIPTION"),
    "ICON" => "/images/icon.gif",
    "PATH" => array(
        "ID" => "candle",
        "NAME" => Loc::getMessage("IDEA")
    ),
);
