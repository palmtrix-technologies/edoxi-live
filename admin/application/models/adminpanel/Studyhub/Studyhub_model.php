<?php
class Studyhub_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	public function get_all_authors()
	{
		$query = $this->db->get('ci_studyhub_author');
		
		 $result = $query->result();
		return $result;
    }


	public function get_all_studyhubs()
	{
		$sql="
		SELECT Author_name,ci_studyhub.* FROM `ci_studyhub`
		inner join ci_studyhub_author  on ci_studyhub.AuthorId=ci_studyhub_author.ci_studyhub_authorid";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function delete_stydyhub($id)
	{
	 $this->db->where("ci_studyhubid", $id);
	 $this->db->delete("ci_studyhub");
	}
 

	public function Addstudyhub_section($data)
	{
          
        $this->db->insert_batch('ci_studyhub_sections',$data);
		
		return  "success";
    
	}
	public function Addstudy_related($data)
	{
          
        $this->db->insert_batch('ci_studyhub_related',$data);
		
		return  "success";
    
	}
	public function get_studyhub_byid($id)
	{
		$sql="
		SELECT Author_name,ci_studyhub.* FROM `ci_studyhub`
		inner join ci_studyhub_author  on ci_studyhub.AuthorId=ci_studyhub_author.ci_studyhub_authorid
		where ci_studyhubid=".$id;
		$query = $this->db->query($sql);
   		$result = $query->row();
     	return $result;
	}
	public function get_studyhub_related($id)
	{
		$sql="
		SELECT * FROM `ci_studyhub_related`
		 where ci_studyhubid=".$id;
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function get_studyhub_sections($id)
	{
		$sql="
		SELECT * FROM `ci_studyhub_sections`
		 where studyhub_id=".$id." ORDER BY `SortOrder` ASC";

		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function delete_sections($id)
	{
          
		$this->db->where('studyhub_id', $id);
		$this->db->delete("ci_studyhub_sections");
    
	}	

	public function delete_related($id)
	{
          
		$this->db->where('ci_studyhubid', $id);
		$this->db->delete("ci_studyhub_related");
    
	}	

   public function deleteall_main()
   {
	$this->db->where('1', 1);
	$this->db->delete("ci_studyhub_recent");
   }


	public function get_ci_studyhub_recent()
	{
		
		$sql=" SELECT Author_name,ci_studyhub.* FROM `ci_studyhub`
				inner join ci_studyhub_recent tbl on tbl.studyhub_id=ci_studyhub.ci_studyhubid
				inner join ci_studyhub_author  on ci_studyhub.AuthorId=ci_studyhub_author.ci_studyhub_authorid";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function get_ci_studyhub_recommented()
	{
		$sql=" SELECT Author_name,ci_studyhub.* FROM `ci_studyhub`
				inner join ci_studyhub_recommented tbl on tbl.studyhub_id=ci_studyhub.ci_studyhubid
				inner join ci_studyhub_author  on ci_studyhub.AuthorId=ci_studyhub_author.ci_studyhub_authorid";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function get_ci_studyhub_popular()
	{
		$sql=" SELECT Author_name,ci_studyhub.* FROM `ci_studyhub`
				inner join ci_studyhub_popular tbl on tbl.studyhub_id=ci_studyhub.ci_studyhubid
				inner join ci_studyhub_author  on ci_studyhub.AuthorId=ci_studyhub_author.ci_studyhub_authorid";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function add_recent_article($id)
	{
		$data = array(
			'studyhub_id'=>$id
		);
        $this->db->insert('ci_studyhub_recent',$data);
	
    
	}
	public function add_popular_article($id)
	{
		$data = array(
			'studyhub_id'=>$id
		);
        $this->db->insert('ci_studyhub_popular',$data);
	
    
	}
	public function add_recommented_article($id)
	{
		$data = array(
			'studyhub_id'=>$id
		);
        $this->db->insert('ci_studyhub_recommented',$data);
	
    
	}
	public function delete_recommented_article($id)
	{
          
		$this->db->where('studyhub_id', $id);
		$this->db->delete("ci_studyhub_recommented");
    
	}
	public function delete_recent_article($id)
	{
          
		$this->db->where('studyhub_id', $id);
		$this->db->delete("ci_studyhub_recent");
    
	}
	public function delete_popular_article($id)
	{
          
		$this->db->where('studyhub_id', $id);
		$this->db->delete("ci_studyhub_popular");
    
	}
	

}
?>