<div class="row">
	<div class="col-md-12"></div>
</div>
<div class="row">
	<div class="col-md-4">photo</div>
	<div class="col-md-8">
		<div class="title"><h1><?=$arResult['detail']['NAME']?></h1></div>
		<div class="text"><?=$arResult['detail']['DETAIL_TEXT']?></div>
		<div class="price"><?=($arResult['prop']['price']?'Цена: '.$arResult['prop']['price'].' руб':'')?></div>
	</div>
</div>