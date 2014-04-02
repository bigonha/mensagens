	<div data-role="content">	
		<form method="post" action="<?php echo APPLICATIONPATH;?>login/verificar" data-ajax="false">
			<input type="text" name="email" placeholder="Email"/>
			<input type="password" name="senha" placeholder="Senha"/>	
			<button type="submit">Entrar</button>
		</form>

		<p><?php //var_dump($this->session->all_userdata());?></p>	
	</div><!-- /content -->