<?php
class Others_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	public function getallcourses()
	{
		$query = $this->db->get('tbl_course');
		
		 $result = $query->result();
		return $result;
    }


	public function Get_all_Testimonials()
	{
		$sql="select tbl_testimonial.*,tbl_course.course_name from tbl_testimonial inner join tbl_course on tbl_course.course_id=tbl_testimonial.testimonial_course";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function Add_testimonial($data)
	{
          
        $this->db->insert('tbl_testimonial',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    
	}

	
	public function delete_testimonial($id)
	{
          
		$this->db->where('testimonial_id', $id);
		$this->db->delete("tbl_testimonial");
    
	}
	public function update_testimonial($data,$id)
	{
		$this->db->where('testimonial_id', $id);
		$this->db->update('tbl_testimonial', $data);      
		return  $id;
	}
	
	public function add_home_testimonial($id)
	{
		$data = array(
			'Testimonial_id'=>$id
		);
        $this->db->insert('ci_home_testimonials',$data);
	
    
	}
	public function delete_home_testimonial($id)
	{
          
		$this->db->where('Testimonial_id', $id);
		$this->db->delete("ci_home_testimonials");
    
	}
	public function get_remining_home_testimonials()
	{

		$sql="select tbl_testimonial.*,tbl_course.course_name from tbl_testimonial inner join tbl_course on tbl_course.course_id=tbl_testimonial.testimonial_course
		where tbl_testimonial.testimonial_id not in (select `Testimonial_id` from ci_home_testimonials )";
		
		
		$query = $this->db->query($sql);

		
   		$result = $query->result();
     	return $result;
		
	}

	public function get_home_testimonials()
	{

		$sql="select tbl_testimonial.*,tbl_course.course_name from ci_home_testimonials inner join tbl_testimonial on ci_home_testimonials.`Testimonial_id`=tbl_testimonial.testimonial_id inner join tbl_course on tbl_course.course_id=tbl_testimonial.testimonial_course
		";
		
		
		$query = $this->db->query($sql);

		
   		$result = $query->result();
     	return $result;
		
	}


	public function get_allgallery()
	{

		$sql="SELECT `ci_gallery_id`, `Image_type`, `imageurl`, `image_alt`, `image_meta`, `galary_Status` FROM `ci_gallery`";
		
		
		$query = $this->db->query($sql);

		
   		$result = $query->result();
     	return $result;
		
	}
	public function get_gallerytype()
	{

		$sql="SELECT DISTINCT `Image_type` FROM `ci_gallery`";
		
		
		$query = $this->db->query($sql);

		
   		$result = $query->result();
     	return $result;
		
	}

	//corporate testimonial

	public function add_corporate_testimonial($id)
	{
		$data = array(
			'Testimonial_id'=>$id
		);
        $this->db->insert('ci_corporate_testimonials',$data);
	
    
	}
	public function delete_corporate_testimonial($id)
	{
          
		$this->db->where('Testimonial_id', $id);
		$this->db->delete("ci_corporate_testimonials");
    
	}
	public function get_remining_corporate_testimonials()
	{
		
		$sql="select tbl_testimonial.*,tbl_course.course_name from tbl_testimonial inner join tbl_course on tbl_course.course_id=tbl_testimonial.testimonial_course
		where tbl_testimonial.testimonial_id not in (select `Testimonial_id` from ci_corporate_testimonials )";
		
		
		$query = $this->db->query($sql);
	
		
   		$result = $query->result();
     	return $result;
		
	}

	public function get_corporate_testimonials()
	{
		
		$sql="select tbl_testimonial.*,tbl_course.course_name from ci_corporate_testimonials 
		inner join tbl_testimonial on ci_corporate_testimonials.`Testimonial_id`=tbl_testimonial.testimonial_id 
		inner join tbl_course on tbl_course.course_id=tbl_testimonial.testimonial_course
		";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
		
	}

	//Course testimonial

	public function add_course_testimonial($id)
	{
		$data = array(
			'Testimonial_id'=>$id
		);
        $this->db->insert('ci_course_testimonials',$data);
	
    
	}
	public function delete_course_testimonial($id)
	{
          
		$this->db->where('Testimonial_id', $id);
		$this->db->delete("ci_course_testimonials");
    
	}
	public function get_remining_course_testimonials()
	{
		
		$sql="select tbl_testimonial.*,tbl_course.course_name from tbl_testimonial inner join tbl_course on tbl_course.course_id=tbl_testimonial.testimonial_course
		where tbl_testimonial.testimonial_id not in (select `Testimonial_id` from ci_course_testimonials )";
		
		
		$query = $this->db->query($sql);
	
		
   		$result = $query->result();
     	return $result;
		
	}

	public function get_course_testimonials()
	{
		
		$sql="select tbl_testimonial.*,tbl_course.course_name from ci_course_testimonials 
		inner join tbl_testimonial on ci_course_testimonials.`Testimonial_id`=tbl_testimonial.testimonial_id 
		inner join tbl_course on tbl_course.course_id=tbl_testimonial.testimonial_course
		";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
		
	}


	public function get_all_accredations()
	{
		
		$sql="SELECT * FROM `tbl_accreditations`";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
		
	}

	public function get_all_enq_type()
	{
		$sql="select distinct ci_enquiry_log.Enq_Type  from ci_enquiry_log";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
		
	}

	public function get_enq_bydateandtype($from, $to,$type)
	{
		$typeval="";
		if($type=='All')
		{

		}
		else{
		$typeval="and x.Enquiry='".$type."'";
		}
		$sql="
		select * from (
			SELECT ci_resource_download_log.`time` as EnqTime, 'Whitepaper Download' as Enquiry,`Name` as Name, `Phone` as Mobile, `Email` as Email, ci_whitepapers.Whitepaper_name as Coursename,'NIL' as Message , 'NIL' as Comapnyname FROM `ci_resource_download_log`
			inner join ci_whitepapers on ci_whitepapers.ci_witepaperID=ci_resource_download_log.resource_id and ci_resource_download_log.resource_type='whitepaper'
			union all
			SELECT  ci_resource_download_log.`time` as EnqTime, 'Broucher Download' as Enquiry,`Name` as Name, `Phone` as Mobile, `Email` as Email, tbl_course.course_name as Coursename,'NIL' as Message , 'NIL' as Comapnyname
			FROM `ci_resource_download_log`
			inner join ci_course_brouchers on ci_resource_download_log.resource_id=ci_course_brouchers.ci_course_broucherID and ci_resource_download_log.resource_type='broucher'
			inner join tbl_course on tbl_course.course_id=ci_course_brouchers.CourseID
			union all
			
			SELECT `Added_datetime` as EnqTime,`Enq_Type` as Enquiry,`Name` as Name, `Mobile` as Mobile, `Email` as Email , IFNULL(`Course_Name`,'NIL') as 'Coursename',IFNULL(`Description`,'NIL') as 'Message',IFNULL(`Company_name`,'NIL') as 'Companyname' FROM `ci_enquiry_log`
			  ) x  
		WHERE  (x.EnqTime BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:59')".$typeval." order by EnqTime desc";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
		
	}

	
	

}
?>