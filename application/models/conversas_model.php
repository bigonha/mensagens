<?php
class Conversas_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function get_last_message_by_id($id_conversa){
    	$result = array();
    	$this->db->where(['pertence_a_conversa'=>$id_conversa]);
    	$this->db->limit(1);
    	$this->db->order_by('horario_de_envio', 'desc'); 
    	$query = $this->db->get('mensagens');
    	if($query->num_rows() == 1)
    		$result = $query->row();
    	return $result;
    }
    
    function get_all_by_user_id($id_usuario)
    {	
    	$result = array();
    	$ids_conversa_array = array();
    	//pega todas as conversas do usuário
    	$this->db->select('conversas_tem_usuarios.id_conversa');
    	$this->db->where(['id_usuario'=>$id_usuario]);
    	$ids_conversas = $this->db->get('conversas_tem_usuarios');
    	//se ele tiver conversas
    	if($ids_conversas->num_rows() > 0){
    		//transferir os objetos para um array soh de valores
    		foreach($ids_conversas->result() as $id_conversa){
    			$ids_conversa_array[] = $id_conversa->id_conversa;
    		}
    		return $this->get_by_ids($ids_conversa_array);
    	}
    }
    
    function get_by_ids($ids_array = array()){
    	$result = array();
    	if(!empty($ids_array)){
    		$this->db->where_in('id', $ids_array);
    		$result = $this->db->get('conversas')->result();
    		$this->push_usuarios_data_into_result($result);
    	}
    	return $result;
    }
    
    private function push_usuarios_data_into_result(&$result){
    	foreach($result as $r){
    		$this->db->select('id_usuario');
    		$this->db->where(['id_conversa'=>$r->id]);
    		$ids_usuarios = $this->db->get('conversas_tem_usuarios');
    		if($ids_usuarios->num_rows() > 0){
    			foreach($ids_usuarios->result() as $id_usuario){
    				$r->usuarios[] = $this->db->get_where('usuarios',['id'=>$id_usuario->id_usuario])->row();
    			}
    		}
    	}
    }


}