<?php
class Whitepaper_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	
	public function addwhitepaper($data)
	{
		$this->db->insert('ci_whitepapers',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function select_whitepaper_by_id($id)
	{
		$this->db->where('ci_witepaperID', $id);
		$query = $this->db->get('ci_whitepapers');
		return $query->row();
	}

	public function updatewhitepaper($data,$id)
	{
	
		$this->db->where('ci_witepaperID', $id);
		$this->db->update('ci_whitepapers', $data);
		
		return  $id;
    
	}

	public function getall_whitepaper()
	{
		$query = $this->db->get('ci_whitepapers');
		return $query->result();
	}
	
}
?>