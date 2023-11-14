<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
use  Bitrix\Main\Localization\Loc;
/** @var CBitrixComponent $this */
/** @var array $arResult */
?>

<form id="candle__form">
    <input name="NAME" placeholder="<?=Loc::GetMessage('NAME')?>" class="textbox"
           required/>
    <input name="SURNAME" placeholder="<?=Loc::GetMessage('SURNAME')?>" class="textbox"
           required/>
    <input name="NUMBER" placeholder="<?=Loc::GetMessage('NUMBER')?>"
           class="textbox" required/>

    <label class="access__label"> Имеет доступ? </label>
    <select name="ACCESS">
        <option value="Да" selected><?=Loc::GetMessage('ACCESS_YES')?></option>
        <option value="Нет"><?=Loc::GetMessage('ACCESS_NO')?></option>
    </select>
    <input name="submit" class="button" type="submit" value="Отправить"/>
</form>


<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="modal__text" class="modal-body">
        </div>
    </div>
</div>