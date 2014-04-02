		<?php $mensagens = array_reverse($mensagens); 
		
		foreach($mensagens as $m): 
			if(substr($m->conteudo, 0, 3) === '###'){ ?>
				
				<div data-mensagemid="<?php echo $m->id; ?>" class="bubble<?php if($m->criado_por_usuario == $this->session->userdata('id_usuario')) echo '-right';?>"><small><?php echo $this->db->get_where('usuarios', 'id = '.$m->criado_por_usuario)->row()->nome; ?>:</small><br>
					<img src="<?php echo ASSETSPATH.'anexos/'.$this->db->get_where('anexos',['id'=> substr($m->conteudo, 3) ])->row()->file_path; ?>" width="100%"/>
				</div>
				
				
			<?php } else { ?>
				
				<div data-mensagemid="<?php echo $m->id; ?>" class="bubble<?php if($m->criado_por_usuario == $this->session->userdata('id_usuario')) echo '-right';?>"><small><?php echo $this->db->get_where('usuarios', 'id = '.$m->criado_por_usuario)->row()->nome; ?>: <?php echo $m->conteudo;?></small></div>
				
			<?php } ?>
		<?php endforeach;?>
