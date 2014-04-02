<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conversas extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->Sessao_model->verificar();        
        $this->load->model('Conversas_model');
        $this->load->model('Contatos_model');        
        $this->load->model('Mensagens_model');
        $this->load->model('Usuarios_model');
    }
    
    public function criar(){
    	$data['header'] = 'Criar Conversa';
		$data['botao_menu']['left']['controller'] = 'conversas/';
		$data['botao_menu']['left']['titulo'] = '< Conversas';
		$data['usuarios'] = $this->Contatos_model->get_all();		
    	$this->load->view('header');    	
		$this->load->view('menu',$data);	
		$this->load->view('conversas-criar',$data);
		$this->load->view('footer');
    }
    
    public function salvar(){
    	$this->db->insert('conversas', ['iniciada_por_usuario'=> $this->session->userdata('id_usuario'), 'horario_inicio'=> date( 'Y-m-d H:i:s') ] );
    	$conversa_id = $this->db->insert_id();
    	$this->db->insert('conversas_tem_usuarios',['id_conversa'=>$conversa_id, 'id_usuario'=>$this->session->userdata('id_usuario')]);
    	$this->db->insert('conversas_tem_usuarios',['id_conversa'=>$conversa_id, 'id_usuario'=>$this->input->post('id_usuario')]);
    	redirect('conversas/ver/'.$conversa_id);
    }
	
	public function index()
	{
		$data['conversas'] = $this->Conversas_model->get_all_by_user_id($this->session->userdata('id_usuario'));
		foreach($data['conversas'] as $d){
			$last_msg = $this->Conversas_model->get_last_message_by_id($d->id);
			if( $last_msg !== array() ){
				$d->last_message = $this->Conversas_model->get_last_message_by_id($d->id)->horario_de_envio;
			}
		}
		$data['header'] = 'Conversas';
		$data['botao_menu']['right']['controller'] = 'conversas/criar';
		$data['botao_menu']['right']['titulo'] = 'Nova';
		$data['menu_footer_selected'] = 'conversas';
		$this->load->view('header');	
		$this->load->view('menu',$data);			
		$this->load->view('conversas',$data);
		$this->load->view('menu-footer',$data);
		$this->load->view('footer');		
	}
	
	public function ver($id_conversa){
		$data['mensagens'] = $this->Mensagens_model->get_by_conversa_id($id_conversa);
		$data['mensagens_criar'] = $this->load->view('subparts/mensagens-criar',array('id_conversa'=>$id_conversa),TRUE);
		$data['botao_menu']['right']['controller'] = 'conversas/adicionar_usuario/'.$id_conversa;
		$data['botao_menu']['right']['titulo'] = '+ Usuário';		
		$data['botao_menu']['left']['controller'] = 'conversas/';
		$data['botao_menu']['left']['titulo'] = '< Conversas';
		$data['id_conversa'] = $id_conversa;		
		$this->load->view('header');
		$this->load->view('menu',$data);
		$this->load->view('conversas-ver',$data);
		$this->load->view('footer');
	}
	
	public function adicionar_usuario($id_conversa){
		if($id_conversa != null){
			$data['usuarios'] = $this->Contatos_model->get_all();
			$data['id_conversa'] = $id_conversa;
			$data['header'] = 'Convidar à Conversa';
			$this->load->view('header');
			$this->load->view('menu',$data);
			$this->load->view('conversas-adicionar-usuario',$data);
			$this->load->view('footer');			
		}
		
	}
	
	public function salvar_adicionar_usuario($id_conversa){
		$this->Usuarios_model->salvar_adicionar_usuario(['id_conversa'=>$id_conversa, 'id_usuario'=>$this->input->post('id_usuario')]);
		redirect('conversas/ver/'.$id_conversa);
	}
	
}