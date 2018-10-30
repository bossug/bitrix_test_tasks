<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult=array();
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL",'*',"PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>IntVal($arParams['IBLOCK_ID']), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y",'SHOW_ALL_WO_SECTION'=>$arParams['SHOW_ALL_WO_SECTION'],'INCLUDE_SUBSECTIONS'=>$arParams['INCLUDE_SUBSECTIONS']);
if($arParams['SECTION_ID']){$arFilter=array_merge(array('SECTION_ID'=>$arParams['SECTION_ID']),$arFilter);}
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement()){ 
	$arFields = $ob->GetFields();  
	$arProps = $ob->GetProperties();
	foreach($arProps as $code=>$val){
		$prop[$code]=$val['VALUE'];
	}
	$arResult['list'][]=array('id'=>$arFields['ID'],'name'=>$arFields['NAME'],'annonce'=>$arFields['PREVIEW_TEXT'],'detail_page'=>$arFields['DETAIL_PAGE_URL'],'prop'=>$prop);
	unset($prop);
}
$this->IncludeComponentTemplate();