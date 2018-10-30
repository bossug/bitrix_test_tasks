<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
\Bitrix\Main\Loader::includeModule('iblock');
$APPLICATION->IncludeComponent("pt:pt.catalog.element","detail",
	Array(
      	"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
      	"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
      	"CACHE_TIME" => $arParams["CACHE_TIME"]
	),
	$component
);?>