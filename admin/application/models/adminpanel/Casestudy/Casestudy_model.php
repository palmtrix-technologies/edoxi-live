<?php
class Casestudy_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	public function AddCasestudy($data)
	{
		
        $this->db->insert('ci_casestudy',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    
	}

	public function updateCasestudy($data,$id)
	{
		$this->db->where('ci_casestudy_id', $id);
		$this->db->update('ci_casestudy',$data);
		return  $id;
       
	}

	public function get_allcasestudy()
	{

		$sql="SELECT *  FROM `ci_casestudy` ";
		
		
		$query = $this->db->query($sql);

		
   		$result = $query->result();
     	return $result;
		
	}

	public function get_casestudybyid($id)
	{

		$sql="SELECT *  FROM `ci_casestudy` where ci_casestudy_id=".$id;
		
	
		$query = $this->db->query($sql);
		return $query->row();
		
	}

	public function deletecase($id)
	{
          
		$this->db->where('ci_casestudy_id', $id);
		$this->db->delete("ci_casestudy");
    
	}

	
	


	
}
?>