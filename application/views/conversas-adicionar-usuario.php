	<div data-role="content">	
		<?php if(isset($usuarios)): ?>
		<form action="<?php echo APPLICATIONPATH;?>conversas/salvar_adicionar_usuario/<?php echo $id_conversa;?>" method="post" data-ajax="false">
			<select name="id_usuario">
			<?php foreach($usuarios as $u):?>
				<option value="<?php echo $u->id;?>"> <?php echo $u->nome;?></option>
			<?php endforeach; ?>
			</select>
			<button type="submit">Adicionar</button>
		</form>
		<?php endif; ?>
	</div><!-- /content -->

