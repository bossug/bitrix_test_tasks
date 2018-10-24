<?
CModule::IncludeModule("iblock");
$arFilter         = array(
 'ACTIVE'        => 'Y',
 'IBLOCK_ID'     => 8,
 'GLOBAL_ACTIVE' => 'Y',
);
$arSelect         = array('IBLOCK_ID', 'ID', 'NAME', 'DEPTH_LEVEL', 'IBLOCK_SECTION_ID');
$arOrder          = array('DEPTH_LEVEL' => 'ASC', 'SORT' => 'ASC');
$rsSections       = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
$sectionLinc      = array();
$arResult['ROOT'] = array();
$sectionLinc[0]   = &$arResult['ROOT'];
while ($arSection = $rsSections->GetNext()) {
 $sectionLinc[(int)$arSection['IBLOCK_SECTION_ID']]['CHILD'][$arSection['ID']] = $arSection;
 $sectionLinc[$arSection['ID']]= &$sectionLinc[(int)$arSection['IBLOCK_SECTION_ID']]['CHILD'][$arSection['ID']];
}
unset( $sectionLinc );
$arResult['ROOT'] = $arResult['ROOT']['CHILD'];
$this->IncludeComponentTemplate();