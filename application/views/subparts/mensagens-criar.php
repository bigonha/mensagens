<div data-role="footer" data-position="fixed">
<form id="anexo_form" enctype="multipart/form-data" style="clear:none; background-image:url('<?php echo ASSETSPATH; ?>img/icon-photo.png'); position:relative; margin-left:5px; height:37px; width:37px; float:left; margin-right:10px; top:10px;" action="<?php echo APPLICATIONPATH;?>mensagens/enviar_anexo/<?php if(isset($id_conversa)){ echo $id_conversa;}?>" method="post">
	<input type="file" id="anexo_form_file_input" name="file" style="width:37px; display:inline; clear:none; opacity:0; height:37px;"/>
</form>
<form id="mensagem_form" method="post" action="<?php echo APPLICATIONPATH;?>mensagens/enviar/<?php if(isset($id_conversa)){ echo $id_conversa;}?>" data-ajax="false" style="display:inline; clear:none;" > <!-- data-ajax="false"-->
	<input type="text" name="conteudo" id="conteudo" style="width:80%; clear:none; display:inline;"/>
	<button type="submit">Enviar</button>
</form>

</div>

<script>
$(function() {

	$('#conteudo').focus();


	$('#mensagem_form').submit(function() {
	
	  		$.ajax({
			  url: $('#mensagem_form').attr('action'),
			  data: { conteudo: $('#conteudo').val()},
			  type: "post"
			}).done(function ( data ) {
				$('#conteudo').val('');	
				$('#mensagens-enviadas').click();		
			});
			
	  return false;
	});
	
	$('#anexo_form_file_input').on('change',function(){
		if($(this).val()){
			$('#anexo_form').submit();
		}
	});

});
</script>