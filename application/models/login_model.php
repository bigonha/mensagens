<?php
class Login_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function verificar($email,$senha)
    {	
    	$result = false;
    	$usuario = $this->db->get_where('usuarios',array('email'=>$email))->row();
    	if($usuario){
    		if($usuario->senha == $senha){
    			$result = $usuario->id;
    		}
    	}
    	return $result;
    }


}
?>