<?php
class Course_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	public function addimage($data)
	{
                $this->db->insert('ci_image_master',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    
	}

	

	public function getallsubcategory()
	{
		$query = $this->db->get('tbl_subcategory');
		
		 $result = $query->result();
		return $result;
	}
	
	public function getallsubcategoryforlisting()
	{
		$sql="SELECT tbl_subcategory.*,tbl_category.category_name as catname,ci_subparents.subparent_Id as categ FROM `tbl_subcategory` 
		inner join ci_subparents on ci_subparents.SubCategoryId=tbl_subcategory.subcategory_id
		inner join tbl_category on ci_subparents.CategoryId=tbl_category.category_id";
		
		
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}
	



    
    public function getallaccreditations()
	{
		$query = $this->db->get('tbl_accreditations');
		
		 $result = $query->result();
		return $result;
    }
    public function getallcourses()
	{
		$query = $this->db->get('tbl_course');
		
		 $result = $query->result();
		return $result;
    }


	
	
	public function getallcategory()
	{
		$query = $this->db->get('tbl_category');
		
		 $result = $query->result();
		return $result;
    }
    
    public function Addcourse($data)
	{
          
        $this->db->insert('tbl_course',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    
	}
    public function Addcourse_section($data)
	{
		
        $this->db->insert_batch('ci_course_sections',$data);
		
		return  "success";
    
    }
    public function Addrelatedcourse($data)
	{
		
        $this->db->insert_batch('ci_realated_courses',$data);
		
		return  "success";
    
	}

	public function Addcoursecategory($data)
	{
		
          
        $this->db->insert_batch('coursecategory',$data);
		
		return  "course category success";
    
	}

	public function addCourseaccreditations($data)
	{
          
        $this->db->insert_batch('ci_course_accreditations',$data);
		
		return  "course category success";
    
	}

//edit start

	public function get_course_byid($id)
	{
		$this->db->where('course_id', $id);
		$query = $this->db->get('tbl_course');
		
		// $result = $query->result();
		return $query->row();
	}

	public function get_categoryimage_byid($id)
	{
		$this->db->where('ImageID', $id);
		$query = $this->db->get('ci_image_master');
		
		// $result = $query->result();
		return $query->row();
	}
	public function get_coursecategory_byid($id)
	{
		
		$sql="SELECT * FROM `coursecategory` where `CourseId`=".$id;
		
		
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
		
	}
	public function getrelatedcoursesbid($id)
	{
		$sql="SELECT * FROM `ci_realated_courses` where CourseId=".$id;
		
		
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
		
	}

	public function getcoursebyid($id)
	{
		$sql="SELECT * FROM `tbl_course` where course_id=".$id;
		
		
		$query = $this->db->query($sql);
   		// $result = $query->result();
		 // return $result;
		 return $query->row();
		
	}

	public function updatecoursecat($id,$fkey)
	{
		$sql="INSERT INTO `coursecategory`(`CourseId`, `Subcatparentid`, `CategoryID`, `SubcategoryID`) select ".$id.", ".$fkey.",ci_subparents.CategoryId,ci_subparents.SubCategoryId from ci_subparents where ci_subparents.subparent_Id=".$fkey;
		
		var_dump($sql);
		die();
		
		
		
		$query = $this->db->query($sql);

	}

	// updatecourse

	public function delete_course_section($id)
	{
		$this->db->where('courseId', $id);
        $this->db->delete("ci_course_sections");
		return  "success";
    
	}

	public function delete_Courseaccreditations($id)
	{
          
       
		$this->db->where('CourseID', $id);
        $this->db->delete("ci_course_accreditations");
		return  "success";
		
    
	}

	public function delete_coursecategory($id)
	{
          
       
		$this->db->where('CourseId', $id);
        $this->db->delete("coursecategory");
		return  "success";
		
    
	}

	public function delete_relatedcourse($id)
	{
          
       
		$this->db->where('CourseId', $id);
        $this->db->delete("ci_realated_courses");
		return  "success";
		
    
	}

	public function update_course($data,$id)
	{
		
		$this->db->where('course_id', $id);
		$this->db->update('tbl_course', $data);
      
		return  $id;
    
	}
	public function disable_status($id)
	{
		
		$this->db->where('course_id', $id);
		$this->db->delete('tbl_course');
      
		return  $id;
    
	}
	
	

	public function getaccreditationsbycourse($id)
	{
		$sql="SELECT *  FROM `ci_course_accreditations` WHERE CourseID=".$id;
		
		
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
		
	}

	

	public function get_coursesections_byid($id)
	{
		$this->db->where('courseId', $id);
		$this->db->order_by("SortOrder", "asc");
		$query = $this->db->get('ci_course_sections');
		
		 $result = $query->result();
		return$result;
	}

	
}
?>