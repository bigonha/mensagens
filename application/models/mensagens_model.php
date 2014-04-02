<?php
class Mensagens_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function get_by_conversa_id($id_conversa,$limit=20)
    {	
    	$this->db->where(['pertence_a_conversa'=>$id_conversa]);
    	$this->db->order_by('horario_de_envio','DESC');
    	$this->db->limit($limit);
    	return $this->db->get('mensagens')->result();
    }
    
    function salvar($data){
    	//passar conteudo e id_conversa
    	$data['criado_por_usuario'] = $this->session->userdata('id_usuario');
    	$data['horario_de_envio'] = date("Y-m-d H:i:s");
    	$this->db->insert('mensagens',$data);

    }
    
    function get_incoming($id_conversa, $id_last_message){
    	$this->db->where(['pertence_a_conversa'=>$id_conversa]);
    	$this->db->order_by('horario_de_envio','DESC');
    	$this->db->where('id >'.$id_last_message);
    	return $this->db->get('mensagens')->result();
    }


}