<?php
class Usuarios_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function salvar($data){
    	$data['ultimo_acesso'] = date("Y-m-d H:i:s");
    	$data['status'] = 'offline';
    	$this->db->insert('usuarios',$data);
    }
    
    function get_all($except_id = null){
    	if($except_id != null){
    		$this->db->where('id !='.$except_id);
    	}
    	return $this->db->get('usuarios')->result();
    }
    
    function salvar_adicionar_usuario($data){
    	$query = $this->db->get_where('conversas_tem_usuarios',$data);
    	if($query->num_rows() == 0)
    		$this->db->insert('conversas_tem_usuarios',$data);
    }


}
?>