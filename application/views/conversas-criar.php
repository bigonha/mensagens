<h3>Escolha um contato para iniciar uma conversa.</h3>	
	<div data-role="content">	
		<?php if(isset($usuarios)): ?>
		<form action="<?php echo APPLICATIONPATH;?>conversas/salvar/" method="post" data-ajax="false">
			<select name="id_usuario">
			<?php foreach($usuarios as $u):?>
				<option value="<?php echo $u->id;?>"> <?php echo $u->nome;?></option>
			<?php endforeach; ?>
			</select>
			<button type="submit">Iniciar Conversa</button>
		</form>
		<?php endif; ?>
	</div><!-- /content -->
