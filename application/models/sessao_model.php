<?php
class Sessao_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function criar($id_usuario)
    {	

    	$session_data = ['id_usuario' => $id_usuario, 'logged_in' => TRUE ];
		$this->session->set_userdata($session_data);

    }

    function destruir()
    {
    	$session_data = ['id_usuario' => '', 'logged_in' => '' ];
		$this->session->unset_userdata($session_data);
    }
    
    function verificar($retornar_boolean = false)
    {	
		if($this->session->userdata('logged_in')!=TRUE)
			redirect('login');

    }


}