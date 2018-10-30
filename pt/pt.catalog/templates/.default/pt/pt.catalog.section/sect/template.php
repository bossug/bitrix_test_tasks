<?foreach($arResult['list'] as $list):?>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-9">
				<div class="name"><a href="<?=$list['detail_page']?>"><?=$list['name']?></a></div>
				<div class="announce"><p><?=TruncateText($list['annonce'],100)?></p></div>
				<div class="price"><?=$list['prop']['price']?></div>
			</div>
		</div>
	</div>
</div>
<?endforeach;?>