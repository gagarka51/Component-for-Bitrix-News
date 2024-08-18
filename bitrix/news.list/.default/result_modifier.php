<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Получение активных разделов (массив с их данными (название, id, т.д.))
$reqSection = CIBlockSection::GetList(
    Array("SORT" => "ASC"),
    Array(
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "ACTIVE"    => "Y",
    )
);
// Формирование разделов в массив
while ($arSection = $reqSection->GetNext())
    $arSections[] = $arSection; 

foreach ($arSections as $sect) {
    foreach ($arResult["ITEMS"] as $elem) {
        if ($sect["ID"] == $elem["IBLOCK_SECTION_ID"]) {
            $sect["ELEMENTS"][] = $elem;
        }
    }
    $arSect[] = $sect;
}

$arResult["SECTIONS"] = $arSect;

?>
