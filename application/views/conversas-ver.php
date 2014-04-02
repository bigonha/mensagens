<div data-role="content" id="mensagens-enviadas" style="position:absolute; top:40px; left:0; bottom:80px; right:0; -webkit-overflow-scrolling: touch; overflow:scroll;">	


<?php if(isset($mensagens)):?>
<div id="conteudo_conversa">
		<?php $this->load->view('subparts/mensagens-ajax'); ?>

<?php endif; ?>
</div>

</div>

<?php if(isset($mensagens_criar)){ echo $mensagens_criar; }?>

<script>
$(function() {
$("html,body").animate({ scrollTop: 99999999 }, "slow");
function empurrar_scroll() { 
$("html,body").animate({ scrollTop: 99999999 }, "slow");
}
empurrar_scroll();

setInterval(
	function (){
		mensagem_id = $('#conteudo_conversa div').last().data('mensagemid');
		if(!mensagem_id)
			mensagem_id = 1;
		$.ajax({
		  url: "http://mensagens.bigonha.com/index.php/mensagens/get_incoming/<?php if(isset($id_conversa)) echo $id_conversa; ?>/"+mensagem_id,
		}).done(function ( data ) {
			if($.trim(data).length){
				$('#conteudo_conversa').append(data);
				empurrar_scroll();
			}
		});

}
,1000);
                 
});
</script>