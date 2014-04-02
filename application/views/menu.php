	<div data-role="header" data-position="fixed">
		<h1><?php if(isset($header)) echo $header; else echo APPLICATIONNAME;?></h1>
		<?php if(isset($botao_menu['right'])):?>
		<a href="<?php echo APPLICATIONPATH.$botao_menu['right']['controller']; ?>" class="ui-btn-right"><?php echo $botao_menu['right']['titulo']; ?></a>
		<?php endif; ?>
		<?php if(isset($botao_menu['left'])):?>
		<a href="<?php echo APPLICATIONPATH.$botao_menu['left']['controller']; ?>" class="ui-btn-left"><?php echo $botao_menu['left']['titulo']; ?></a>
		<?php endif; ?>		
	</div><!-- /header -->
	
	<?php if($this->session->flashdata('error')):?>

<div class="ui-bar ui-bar-e">						
	<h3 style="display:inline-block; width:92%; margin-top:5px;"><?php echo $this->session->flashdata('error'); ?> </h3><div style="display:inline-block; width:8%; margin-top:0px; text-align:right;"><a href="#" data-role="button" data-icon="delete" data-inline="true" data-iconpos="notext">Fechar</a></div>
</div>
		
	<?php endif; ?>
	
	<?php if($this->session->flashdata('success')):?>

<div class="ui-bar ui-bar-e">						
	<h3 style="display:inline-block; width:92%; margin-top:5px;"><?php echo $this->session->flashdata('success'); ?> </h3><div style="display:inline-block; width:8%; margin-top:0px; text-align:right;"><a href="#" data-role="button" data-icon="delete" data-inline="true" data-iconpos="notext">Fechar</a></div>
</div>
		
	<?php endif; ?>	