<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
?>
<div class="row">
	<div class="col-md-3">
		<?$APPLICATION->IncludeComponent("pt:pt.catalog.section.list","list",
			Array($arParams),
			$component
		);?>
	</div>
	<div class="col-md-9">
		<?$APPLICATION->IncludeComponent("pt:pt.catalog.section","sect",
			Array(
				'SECTION_ID'=>($_REQUEST['SECTION_ID']>0?$_REQUEST['SECTION_ID']:21),
				'SHOW_ALL_WO_SECTION'=>($_REQUEST['SECTION_ID']>0?'N':'Y'),
				'INCLUDE_SUBSECTIONS'=>'Y',
				'IBLOCK_ID'=>$arParams['IBLOCK_ID'],
			),
			$component
		);?>
	</div>
</div>
