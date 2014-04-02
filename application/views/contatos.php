<div data-role="content">	
	<?php if(isset($contatos)):?>
	<ul class="contatos" data-role="listview">
		<?php foreach($contatos as $c):?>
			<li>
				<img src="<?php echo ASSETSPATH; ?>img/no-picture.jpg" style="-webkit-border-radius:10px;"/>			
					<h3><?php echo $c->nome; ?></h3>
					<p><?php echo $c->email;?></p>
					<form action="<?php echo APPLICATIONPATH;?>conversas/salvar/" method="post" data-ajax="false">
						<input type="hidden" name="id_usuario" value="<?php echo $c->id; ?>" />
						<button type="submit">Conversar</button>
					</form>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</div>