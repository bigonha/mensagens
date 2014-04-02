<?php 
class Anexos_model extends CI_Model {

	
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->helper('url');        
    }
    
    private function upload($file = null)
    {
    	$result = false;
    	if($file != null && $file['error'] == 0 ){
    		$filename = url_title(convert_accented_characters(pathinfo($file['name'],PATHINFO_FILENAME)), '_' , true).'_'.date('Y-m-d-H-i-s');
    		$filename .='.'.pathinfo($file['name'],PATHINFO_EXTENSION);
    		$folder = $this->garantir_pasta_existe(ASSETSFOLDER.'anexos/'.date('Y').'/'.date('m').'/');
    		if($folder && move_uploaded_file($file['tmp_name'],$folder.$filename))
    			$result = date('Y').'/'.date('m').'/'.$filename;
    	}
    	return $result;
    }
    
    private function garantir_pasta_existe($folder_path){
		$result = false;
		if (!file_exists($folder_path))
			mkdir($folder_path, 0777, true);
		if(file_exists($folder_path))
			$result = $folder_path;
		return $result;
    }
    
    function insert($file = null){
    	$result = false;
    	$file_path = $this->upload($file);
    	if( $file_path !== false ){
    		$data['file_path'] = $file_path;
    		$data['horario'] = date( 'Y-m-d H:i:s' );
    		$data['enviado_por'] = $this->session->userdata('id_usuario');
    		$this->db->insert('anexos', $data);
    		$result = $this->db->insert_id();
    	}
    	return $result;
    }
    
	function get_by_id($id=null){
    	$result = false;
    	if($id != null){
    		$this->db->where(['id'=>$id]);
    		$query = $this->db->get('anexos');
    		if($query->num_rows() == 1)
    			$result = $query->row();
    	}
    	//$this->relations($result);
    	return $result;
    }
    
/*    function relations(&$result_row)
    {		
    	if($result_row !== false){
    		$result_row->enviado_por = $this->Usuarios_model->get_by_id($result_row->enviado_por);
    	}
    	
    }    
    */
    
    
}