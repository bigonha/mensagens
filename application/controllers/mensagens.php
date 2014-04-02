<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mensagens extends CI_Controller {

   	public function __construct()
   	{	
    	parent::__construct();    	
        $this->Sessao_model->verificar();    	
    	$this->load->model('Mensagens_model');
    	$this->load->model('Anexos_model');    	
    }
    
	
	public function enviar($id_conversa=null){
		if($id_conversa!=null && $this->input->post('conteudo')!=null){
			$this->Mensagens_model->salvar( ['conteudo'=>$this->input->post('conteudo'), 'pertence_a_conversa'=>$id_conversa ]);
		}
		if(!$this->input->is_ajax_request()){
			redirect('conversas/ver/'.$id_conversa);
		}
		else{
			echo 'id_conversa='.$id_conversa.' conteudo='.$this->input->post('conteudo');
		}
	}
	
	public function get_incoming($id_conversa, $id_last_message){
		if($this->input->is_ajax_request()){
			$data['mensagens'] = $this->Mensagens_model->get_incoming($id_conversa, $id_last_message);
			$this->load->view('subparts/mensagens-ajax', $data);
		}
		
	}
	
	public function enviar_anexo($id_conversa=null){
		$id_anexo = $this->Anexos_model->insert($_FILES['file']);
		if($id_anexo){
			$this->Mensagens_model->salvar( ['conteudo'=>'###'.$id_anexo, 'pertence_a_conversa'=>$id_conversa ]);
		}
		redirect('conversas/ver/'.$id_conversa);
	}

}