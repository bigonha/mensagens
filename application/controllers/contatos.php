<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contatos extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        $this->Sessao_model->verificar();
        $this->load->model('Contatos_model');
    }
    
    function salvar()
    {	
    	$email_usuario = $this->input->post('email');
		$query = $this->db->get_where('usuarios',['email'=>$email_usuario]);
		
		if($query->num_rows() == 1){
			if($this->db->get_where('usuarios_tem_contatos',['id_usuario'=>$this->session->userdata('id_usuario'), 'id_contato'=> $query->row()->id ])->num_rows() == 0){
				$this->db->insert('usuarios_tem_contatos',['id_usuario'=>$this->session->userdata('id_usuario'), 'id_contato'=>$query->row()->id]);
				if($this->db->affected_rows() == 1)
					$this->session->set_flashdata('success','O contato foi adicionado com sucesso.');
				else
					$this->session->set_flashdata('error','Não foi possível adicionar o usuário aos contatos.');
			}else{
				$this->session->set_flashdata('error','Este usuário já pertence à sua lista de contatos.');
			}
		}else{
			$this->session->set_flashdata('error','O usuário ainda não está utilizando o aplicativo. Um convite lhe foi enviado.');
		}
		redirect('contatos');
    }
    
    function adicionar(){
    	$data['header'] = 'Adicionar';
		$data['botao_menu']['left']['controller'] = 'contatos';
		$data['botao_menu']['left']['titulo'] = '< Contatos';    		
		    	
    	$this->load->view('header');
    	$this->load->view('menu', $data);
    	$this->load->view('contatos-adicionar', $data);
    	$this->load->view('footer');    	
    }
    
    function index()
    {
    	$data['contatos'] = $this->Contatos_model->get_all();
    	$data['header'] = 'Contatos';
		$data['botao_menu']['right']['controller'] = 'contatos/adicionar';
		$data['botao_menu']['right']['titulo'] = '+ Contato';    		
		
		$data['menu_footer_selected'] = 'contatos';
				    	
    	$this->load->view('header');
    	$this->load->view('menu', $data);
    	$this->load->view('contatos', $data);
		$this->load->view('menu-footer',$data);  	
    	$this->load->view('footer');    	    	
    
    }
    
}