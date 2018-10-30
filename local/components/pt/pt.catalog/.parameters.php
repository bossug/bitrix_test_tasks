<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Loader,
	Bitrix\Iblock,
	Bitrix\Catalog;
Loader::includeModule('iblock');
//инициируется массив типов инфоблоков
$arTypesEx = CIBlockParameters::GetIBlockTypes();

//инициируется массив ID инфоблоков
$arIBlocks=array();

$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>'s1', "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
//print_r($db_iblock);
while($arRes = $db_iblock->Fetch()){
   $arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];
}

$arProperty_LNS = array();
$rsProp = CIBlockProperty::GetList(array("sort"=>"asc", "name"=>"asc"), array("ACTIVE"=>"Y", "IBLOCK_ID"=>(isset($arCurrentValues["IBLOCK_ID"])?$arCurrentValues["IBLOCK_ID"]:$arCurrentValues["ID"])));
while ($arr=$rsProp->Fetch())
{
   $arProperty[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
   if (in_array($arr["PROPERTY_TYPE"], array("L", "N", "S")))
   {
      $arProperty_LNS[$arr["CODE"]] = "[".$arr["CODE"]."] ".$arr["NAME"];
   }
}
$arComponentParameters = array(
   "GROUPS" => array(
   	"ACTION_SETTINGS" => array(
			"NAME" => GetMessage('IBLOCK_ACTIONS')
		),
   ),
   "PARAMETERS" => array(
   	  "SEF_MODE" => array(
			"section" => array(
				"NAME" => GetMessage("SECTION_PAGE"),
				"DEFAULT" => "#SECTION_ID#/",
				"VARIABLES" => array(
					"SECTION_ID",
					"SECTION_CODE",
					"SECTION_CODE_PATH",
				),
			),
			"element" => array(
				"NAME" => GetMessage("DETAIL_PAGE"),
				"DEFAULT" => "#SECTION_ID#/#ELEMENT_ID#/",
				"VARIABLES" => array(
					"ELEMENT_ID",
					"ELEMENT_CODE",
					"SECTION_ID",
					"SECTION_CODE",
					"SECTION_CODE_PATH",
				),
			),
	  ),
      "IBLOCK_TYPE" => array(
         "PARENT" => "BASE",
         "NAME" => GetMessage("T_IBLOCK_DESC_LIST_TYPE"),
         "TYPE" => "LIST",
         "VALUES" => $arTypesEx,
         "DEFAULT" => "news",
         "REFRESH" => "Y",
      ),
      "IBLOCK_ID" => array(
         "PARENT" => "BASE",
         "NAME" => GetMessage("T_IBLOCK_DESC_LIST_ID"),
         "TYPE" => "LIST",
         "VALUES" => $arIBlocks,
         "DEFAULT" => '={$_REQUEST["ID"]}',
         "ADDITIONAL_VALUES" => "Y",
         "REFRESH" => "Y",
      ),
      "CACHE_TIME"  =>  array("DEFAULT"=>36000000),
   ),
);

