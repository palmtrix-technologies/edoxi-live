<?php
class Homemanagement_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	public function add_hub($id)
	{
		$data = array(
			'BatchID'=>$id
		);
        $this->db->insert('ci_home_upcoming_batches',$data);
	
    
	}
	public function delete_hub($id)
	{
          
		$this->db->where('BatchID', $id);
		$this->db->delete("ci_home_upcoming_batches");
    
	}
	public function get_reminingbatches()
	{

		$sql="select ci_course_batches.*,tbl_course.course_name from ci_course_batches inner join tbl_course on tbl_course.course_id=ci_course_batches.CourseID WHERE ci_course_batches.course_batchesID not in (SELECT BatchID FROM `ci_home_upcoming_batches`)";
		
		
		$query = $this->db->query($sql);

		
   		$result = $query->result();
     	return $result;
		
	}

	public function get_homebatches()
	{

		$sql="SELECT ci_course_batches.*,tbl_course.course_name FROM `ci_home_upcoming_batches`
		inner join ci_course_batches on ci_course_batches.course_batchesID=ci_home_upcoming_batches.BatchID
		inner join tbl_course on tbl_course.course_id=ci_course_batches.CourseID";
		
		
		$query = $this->db->query($sql);

		
   		$result = $query->result();
     	return $result;
		
	}


	
	
	
	

	

	


	
}
?>