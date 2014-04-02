<?php
class Contatos_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	function get_all()
	{	
		$contatos = array();
		$contatos_query = $this->db->get_where('usuarios_tem_contatos',[ 'id_usuario' => $this->session->userdata('id_usuario') ]);
    	if($contatos_query->num_rows() > 0){
    		foreach($contatos_query->result() as $c){
    			$contatos[] = $this->db->get_where('usuarios',['id'=>$c->id_contato])->row();
    		}
    	}
    	return $contatos;
    }

}