<div data-role="content">	
	<form method="post" action="<?php echo APPLICATIONPATH;?>usuarios/salvar/<?php echo $user_info->id; ?>" data-ajax="false">
		<input type="text" name="nome" placeholder="Nome" value="<?php echo $user_info->nome; ?>"/>	
		<input type="text" name="email" placeholder="Email" value="<?php echo $user_info->email; ?>"/>
		<input type="password" name="senha" placeholder="Senha" value="<?php echo $user_info->senha; ?>"/>	
		<button type="submit">Alterar</button>
	</form>
</div><!-- /content -->