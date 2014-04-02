<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function criar()
	{
		$this->load->view('welcome_message');
	}
	
	public function opcoes()
	{
		$data['user_info'] = $this->db->get_where('usuarios',['id'=>$this->session->userdata('id_usuario')])->row();
		$data['header'] = 'Opções';
		
		$this->load->view('header');
		$this->load->view('menu',$data);
		$this->load->view('usuarios-opcoes',$data);
		$this->load->view('menu-footer');		
		$this->load->view('footer');	
		
	}
	public function salvar($id=null){
		if( $id!=null &&
		    $this->input->post('nome')!='' && 
		    $this->input->post('email')!='' && 
		    $this->input->post('senha')!='' && 		   		   
		    $this->session->userdata('id_usuario') == $id){
		    
			$this->db->update('usuarios',$this->input->post(),['id'=>$id]);
			$this->session->set_flashdata('success','As informações foram alteradas com sucesso.');			
		}else{
			$this->session->set_flashdata('error','Erro na alteração. Todos os campos devem ser preenchidos.');			
		}
		redirect('usuarios/opcoes');
	}
	public function deletar(){
		if($id!=null){
		
		}
	}
}