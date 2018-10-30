<?
/*echo '<pre>';
print_r($arResult);*/
function menuchild($id){
	if($id['CHILD']){
		?><ul style="padding-left: 20px"><?
		foreach($id['CHILD'] as $child):?>
			<li><a href="<?=$child['SECTION_PAGE_URL']?>"><?=$child['NAME']?>
				<?=menuchild($child);?>
			</li>
		<?endforeach;?>
		</ul><?
	}
}
?>
<div class="row">
	<ul>
		<?foreach($arResult['ROOT'] as $root){
			?><li><a href="<?=$root['SECTION_PAGE_URL']?>"><?=$root['NAME']?></a>
				<?=menuchild($root)?>
			</li><?
		}?>
	</ul>
</div>