<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

   	public function __construct()
   	{
    	parent::__construct();
		$this->load->model('Sessao_model');
		$this->load->model('Login_model');
		$this->load->model('Usuarios_model');
    }
    
    public function index(){
    	if($this->session->userdata('logged_in') == true){
    		redirect('conversas');
    	}else{
    		$data['botao_menu']['right']['controller'] = 'login/cadastrar';
			$data['botao_menu']['right']['titulo'] = 'Cadastrar-se';    		
    		$this->load->view('header');
    		$this->load->view('menu',$data);    		
    		$this->load->view('login');
    		$this->load->view('footer');    		
    	}
    }
    
	public function verificar()
	{	
		if($id_usuario = $this->Login_model->verificar( $this->input->post('email') , $this->input->post('senha') ) ){
			$this->Sessao_model->criar($id_usuario);
			redirect('conversas/','location');}
		else{
			redirect('login/','location');
		}
	}
	
	public function sair(){
		$this->Sessao_model->destruir();
				redirect('login');
	}
	
	public function cadastrar(){
		$data['botao_menu']['left']['controller'] = 'login';
		$data['botao_menu']['left']['titulo'] = '< Login'; 
		$data['header'] = 'Novo Cadastro';		 		
		$this->load->view('header');
		$this->load->view('menu',$data);			
		$this->load->view('login-cadastrar');
		$this->load->view('footer');	
	}
	
	public function salvar(){
		if($this->input->post('nome') && $this->input->post('email') && $this->input->post('senha')){
			$this->Usuarios_model->salvar([
				'nome'=>$this->input->post('nome'),
				'email'=>$this->input->post('email'),
				'senha'=>$this->input->post('senha')
			]);
		}
		redirect('login');
	}

}