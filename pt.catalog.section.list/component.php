<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");
$arFilter         = array(
 'ACTIVE'        => 'Y',
 'IBLOCK_ID'     => $arParams[0]['IBLOCK_ID'],
 'GLOBAL_ACTIVE' => 'Y',
);
$arSelect         = array('IBLOCK_ID', 'ID', 'NAME', 'DEPTH_LEVEL', 'IBLOCK_SECTION_ID','SECTION_PAGE_URL','*');
$arOrder          = array('DEPTH_LEVEL' => 'ASC', 'SORT' => 'ASC');
$rsSections       = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
$sectionLinc      = array();
$arResult['ROOT'] = array();
$sectionLinc[0]   = &$arResult['ROOT'];
while ($arSection = $rsSections->GetNext()) {
 $arSection['RELATIVE_DEPTH_LEVEL'] = $arSection['DEPTH_LEVEL'] - $intSectionDepth;
 $sectionLinc[(int)$arSection['IBLOCK_SECTION_ID']]['CHILD'][$arSection['ID']] = $arSection;
 $sectionLinc[$arSection['ID']]= &$sectionLinc[(int)$arSection['IBLOCK_SECTION_ID']]['CHILD'][$arSection['ID']];
}
unset( $sectionLinc );
$arResult['ROOT'] = $arResult['ROOT']['CHILD'];
$arResult["SECTIONS"]=$arResult['ROOT'];
$this->IncludeComponentTemplate();