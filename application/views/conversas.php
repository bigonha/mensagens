<div data-role="content" style="position:absolute; top:50px; left:0; bottom:50px; right:0; -webkit-overflow-scrolling: touch; overflow:scroll;">	
	<?php if(isset($conversas)):?>
	<ul class="conversas" data-role="listview">
		<?php foreach($conversas as $c):?>
			<li>
				<a href="<?php echo APPLICATIONPATH;?>conversas/ver/<?php echo $c->id;?>">
					<?php foreach($c->usuarios as $u){ if($u->id != $this->session->userdata('id_usuario')) $usuarios[] = $u->nome; } ?>
					<h3><?php echo implode(", ", $usuarios); ?></h3>
					<p>Última mensagem em <?php if(!empty($c->last_message)){ echo $c->last_message;}else{ echo 'nunca';}?></p>
				</a>
			</li>
			<?php $usuarios = array(); ?>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</div>