<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$res = CIBlockElement::GetByID($arParams["ELEMENT_ID"]);
if($ar_res = $res->GetNext()){
	$arResult['detail']=$ar_res;
	$db_props = CIBlockElement::GetProperty($ar_res['IBLOCK_ID'], $ar_res['ID'], "sort", "asc", Array("*")); // XXX - множественное свойства типа "Строка"
	$props=array();
	while($ar_props = $db_props->Fetch()){
		
		if($ar_props['PROPERTY_TYPE']=='S'){
			$props[$ar_props['CODE']]=$ar_props['VALUE'];
		}
		//print_r($ar_props);
	}
	$arResult['prop']=$props;
}
$this->IncludeComponentTemplate();