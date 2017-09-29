<?php foreach ($container_item_navbar as $key => $value): ?>
	<li class="ui-state-default" id="<?php echo $value['id_navbar'] ?>">
		<span class="ui-icon ui-icon-arrowthick-2-n-s"></span> <?php echo $value['navbar'] ?>
	</li>
<?php endforeach ?>