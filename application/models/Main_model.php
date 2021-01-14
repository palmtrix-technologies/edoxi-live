<?php
class main_model extends CI_Model{
   
   	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------

	public function GetCourse_search($name)
	{
          
        $sql="select `course_id`,`course_slug` from tbl_course where `course_name`='".$name."'";
		
		
		$query = $this->db->query($sql);
		return $query->row();
   		
    
	}

	public function Getslugdetails($slug)
	{
          
        $sql="SELECT * FROM `ci_slug` where Slug='".$slug."'";
		
		
		$query = $this->db->query($sql);
		return $query->row();
   		
    
	}


	public function GetAllcourse_forsearch()
	{
          
        $sql="select `course_name` as name from tbl_course";
		
		
		$query = $this->db->query($sql);
		return $query->result();
   		
    
	}


	


	public function get_courseimage_byid($id)
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
		$sql="SELECT tbl_course.course_name,tbl_course.course_id,tbl_course.course_slug from tbl_course inner join `ci_realated_courses` on tbl_course.course_id= ci_realated_courses.replatedcourseId where ci_realated_courses.CourseId=".$id;
		
		
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
		
	}

	public function getaccreditationsbycourse($id)
	{
		$sql="SELECT * FROM `ci_course_accreditations` inner join tbl_accreditations on tbl_accreditations.accreditation_id=ci_course_accreditations.accreditationsID 
		 WHERE CourseID=".$id;
		
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
		
	}
	public function getbatchesbycourse($id)
	{
		$sql="SELECT *,DATE_FORMAT(`StartDate`, '%b %d') as formateddate FROM `ci_course_batches` WHERE   `StartDate` >CURRENT_DATE() and `CourseID`=".$id;
		
		
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
		
	}

	public function getfaqbycourse($id)
	{
		$sql="SELECT * from tbl_course_faq where `course_faq_id`=".$id;
		
		
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

	public function getcoursebyid($id)
	{
		$sql="SELECT * FROM `tbl_course` where course_id=".$id;
		
		
		$query = $this->db->query($sql);
   		// $result = $query->result();
		 // return $result;
		 return $query->row();
		
	}


//   category start

public function get_category_byid($id)
	{
		$this->db->where('category_id', $id);
		$query = $this->db->get('tbl_category');
		
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

	public function get_categorysections_byid($id)
	{
		$this->db->where('CategoryID', $id);
		$this->db->order_by("SortOrder", "asc");
		$query = $this->db->get('ci_category_sections');
		
		
		 $result = $query->result();
		return$result;
	}

//   subcategory start
public function get_subcategory_byid($id)
	{
		$this->db->where('subcategory_id', $id);
		$query = $this->db->get('tbl_subcategory');
		
		// $result = $query->result();
		return $query->row();
	}

	public function get_subcategoryimage_byid($id)
	{
		$this->db->where('ImageID', $id);
		$query = $this->db->get('ci_image_master');
		
		// $result = $query->result();
		return $query->row();
	}

	public function get_subcategorysections_byid($id)
	{
		$this->db->where('CategoryID', $id);
		$this->db->order_by("SortOrder", "asc");
		$query = $this->db->get('ci_subcategory_sections');
		
		 $result = $query->result();
		return$result;
	}

	
	//menu

	function display_header_menu()
    {       
       

        // $qry ="SELECT  category_id,tbl_category.category_name,tbl_category.category_slug
		// from  tbl_category";

		$qry="SELECT distinct * from (SELECT distinct category_postedby,tbl_category.category_id,tbl_category.category_name,tbl_category.category_slug FROM `ci_header_menu` 
		inner join coursecategory on coursecategory.CoursecategoryId=ci_header_menu.Item_ID 
		inner join tbl_category on tbl_category.category_id=coursecategory.CategoryID 
		union all
		SELECT distinct category_postedby,tbl_category.category_id,tbl_category.category_name,tbl_category.category_slug FROM `ci_header_menu` 
		inner join ci_subparents on ci_subparents.subparent_Id=ci_header_menu.Item_ID and ci_header_menu.type='subcategory' 
		inner join tbl_category on tbl_category.category_id=ci_subparents.CategoryId) x
		order by category_postedby asc";
        
        $query = $this->db->query( $qry);

        return $query->result();
	}
	
	function Subcatgorybycategoryid($catid)
	{
		// $qry ="SELECT ci_subparents.subparent_Id,tbl_subcategory.subcategory_id,tbl_subcategory.subcategory_name,tbl_subcategory.subcategory_slug  from ci_subparents 
		// inner join tbl_subcategory on tbl_subcategory.subcategory_id=ci_subparents.SubCategoryId
		// where CategoryId=".$catid;

		$qry="select distinct * from (SELECT distinct tbl_subcategory.subcategory_id,tbl_subcategory.subcategory_name,tbl_subcategory.subcategory_slug 
		from  ci_header_menu
		inner join coursecategory on coursecategory.CoursecategoryId=ci_header_menu.Item_ID
		inner join tbl_subcategory on tbl_subcategory.subcategory_id=coursecategory.SubcategoryID
		where coursecategory.CategoryID=".$catid."
		union all
		SELECT distinct tbl_subcategory.subcategory_id,tbl_subcategory.subcategory_name,tbl_subcategory.subcategory_slug 
		from  ci_header_menu
		inner join ci_subparents on ci_subparents.subparent_Id=ci_header_menu.Item_ID and ci_header_menu.type='subcategory'
		inner join tbl_subcategory on tbl_subcategory.subcategory_id=ci_subparents.SubCategoryId
        where ci_subparents.CategoryId=".$catid.") x";
        
        $query = $this->db->query( $qry);

        return $query->result();

	}

	function coursesmenubyid($category,$subCategory)
	{


		// $qry ="SELECT tbl_course.course_name,tbl_course.course_id,tbl_course.course_slug FROM `coursecategory`
		// inner join tbl_course on tbl_course.course_id=coursecategory.CourseId
		// where coursecategory.CategoryID=".$category." and coursecategory.SubcategoryID=".$subCategory;
		$qry="SELECT tbl_course.course_name,tbl_course.course_id,tbl_course.course_slug
		from  ci_header_menu
		inner join coursecategory on coursecategory.CoursecategoryId=ci_header_menu.Item_ID
		inner join tbl_course on tbl_course.course_id=coursecategory.CourseId
		where coursecategory.CategoryID=".$category." and coursecategory.SubcategoryID=".$subCategory;
        
        $query = $this->db->query( $qry);

        return $query->result();

	}

	//category page

	function subcategorybyCategoryID($categoryId)
	{
		

$qry ="select tbl_subcategory.subcategory_name,tbl_subcategory.subcategory_slug,
(select count(*) from coursecategory where coursecategory.CategoryID=ci_subparents.CategoryId and coursecategory.SubcategoryID=ci_subparents.SubCategoryId) as counts
from ci_subparents
inner join tbl_subcategory on tbl_subcategory.subcategory_id=ci_subparents.SubCategoryId
where ci_subparents.CategoryId=".$categoryId;
        
        $query = $this->db->query( $qry);

        return $query->result();
	}

	function coursesbysubcategoryid($subCategory)
	{
		$qry ="SELECT tbl_course.course_name,tbl_course.course_id,tbl_course.course_slug FROM `coursecategory`
		inner join tbl_course on tbl_course.course_id=coursecategory.CourseId
		where  coursecategory.SubcategoryID=".$subCategory;
        
        $query = $this->db->query( $qry);

        return $query->result();

	}

	//case study

	function getallcasestudy()
	{
		$qry ="SELECT * FROM `ci_casestudy`";
        
        $query = $this->db->query( $qry);

        return $query->result();

	}
	function Get_casestudy_bySlug($slug)
	{
		$qry ="SELECT * FROM `ci_casestudy` where slug='".$slug."'";
        
        $query = $this->db->query( $qry);

        return $query->row();

	}
	function getallrelatedcasestudy($slug)
	{
		$qry ="SELECT * FROM `ci_casestudy` where slug!='".$slug."'";
        
        $query = $this->db->query( $qry);

        return $query->result();

	}

	
  //whitepapers

  
  function getallwhitepapers()
  {
	  $qry ="SELECT * FROM `ci_whitepapers`";
	  
	  $query = $this->db->query( $qry);

	  return $query->result();

  }
  function Get_whitepaper_bySlug($slug)
  {
	  $qry ="SELECT * FROM `ci_whitepapers` where slug='".$slug."'";
	  
	  $query = $this->db->query( $qry);

	  return $query->row();

  }
  function get_whitepaperdetails_byid($id)
  {
	  $qry ="SELECT * FROM `ci_whitepapers` where ci_witepaperID='".$id."'";
	  
	  $query = $this->db->query( $qry);

	  return $query->row();

  }

  
  //Brouchers

  function getallBrouchers()
  {
	  $qry ="SELECT `ci_course_broucherID`,tbl_course.course_name FROM ci_course_brouchers 
	  inner join tbl_course on tbl_course.course_id=ci_course_brouchers.CourseID";
	  
	  $query = $this->db->query( $qry);

	  return $query->result();

  }
  function getbrocherdetails_byid($id)
  {
	  $qry ="SELECT `ci_course_broucherID`,tbl_course.course_name,ci_course_brouchers.Broucher_file,ci_course_brouchers.Email_content FROM ci_course_brouchers 
	  inner join tbl_course on tbl_course.course_id=ci_course_brouchers.CourseID where ci_course_broucherID=".$id;
	  
	  $query = $this->db->query( $qry);

	  return $query->row();

  }

  function add_resource_log($data)
  {
	$this->db->insert('ci_resource_download_log',$data);

  }

  function add_enquiry_log($data)
  {
	$this->db->insert('ci_enquiry_log',$data);

  }

  function get_home_upcoming_batches()
  {
	  $qry='SELECT tbl_course.course_name,tbl_course.course_slug,DATE_FORMAT(ci_course_batches.StartDate, "%d-%m-%Y ") as date,DAYNAME(ci_course_batches.StartDate)as startday,ci_course_batches.Timeing,ci_course_batches.Batch_pattern FROM `ci_home_upcoming_batches`
	  inner join ci_course_batches on ci_course_batches.course_batchesID=ci_home_upcoming_batches.BatchID
	  inner join tbl_course on tbl_course.course_id=ci_course_batches.CourseID
	  where `StartDate` >CURRENT_DATE();'
	  ;
	    $query = $this->db->query( $qry);

		return $query->result();
  }


  function getall_courses()
  {
	  $qry ="SELECT * FROM `tbl_course`";
	  
	  $query = $this->db->query( $qry);

	  return $query->result();

  }

  function getall_testimonial()
  {
	  $qry ="SELECT  tbl_testimonial.*,tbl_course.course_name FROM `tbl_testimonial` 
	  inner join tbl_course on tbl_course.course_id=tbl_testimonial.testimonial_course
	  order by tbl_testimonial.testimonial_postedon desc
	  ";
	  
	  $query = $this->db->query( $qry);

	  return $query->result();

  }

  function getall_hometestimonial()
  {
	  $qry ="SELECT tbl_testimonial.*,tbl_course.course_name FROM `tbl_testimonial`
	  inner join ci_home_testimonials on ci_home_testimonials.Testimonial_id=tbl_testimonial.testimonial_id
	  inner join tbl_course on tbl_course.course_id=tbl_testimonial.testimonial_course";
	  
	  $query = $this->db->query( $qry);

	  return $query->result();
  }

  function getall_coursetestimonial()
  {
	  $qry ="select tbl_testimonial.*,tbl_course.course_name from ci_course_testimonials 
	  inner join tbl_testimonial on ci_course_testimonials.`Testimonial_id`=tbl_testimonial.testimonial_id 
	  inner join tbl_course on tbl_course.course_id=tbl_testimonial.testimonial_course
	  ";
	  
	  $query = $this->db->query( $qry);

	  return $query->result();

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
  
	//study hub
	
	public function studyhub_search()
	{
		$sql="SELECT `Tittle`,`slug` FROM ci_studyhub";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}
	public function get_ci_studyhub_main()
	{
		$sql=" SELECT Author_name,ci_studyhub_author.Slug as author_slug,ci_studyhub.*, ifnull(`image_small`,`image`) as smallimg FROM `ci_studyhub`
				inner join ci_studyhub_author  on ci_studyhub.AuthorId=ci_studyhub_author.ci_studyhub_authorid
				ORDER BY `ci_studyhub`.`ci_studyhubid` DESC
				";
		$query = $this->db->query($sql);
   		$result = $query->row();
     	return $result;
	}
	public function get_ci_studyhub_recent()
	{
		$sql=" SELECT Author_name,ci_studyhub_author.Slug as author_slug,ci_studyhub.*, ifnull(`image_small`,`image`) as smallimg FROM `ci_studyhub`
				inner join ci_studyhub_author  on ci_studyhub.AuthorId=ci_studyhub_author.ci_studyhub_authorid
				order by  ci_studyhub.ci_studyhubid desc ";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function get_ci_studyhub_recommented()
	{
		$sql=" SELECT Author_name,ci_studyhub_author.Slug as author_slug,ci_studyhub.* , ifnull(`image_small`,`image`) as smallimg FROM `ci_studyhub`
				inner join ci_studyhub_recommented tbl on tbl.studyhub_id=ci_studyhub.ci_studyhubid
				inner join ci_studyhub_author  on ci_studyhub.AuthorId=ci_studyhub_author.ci_studyhub_authorid";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function get_ci_studyhub_popular()
	{
		$sql=" SELECT Author_name,ci_studyhub_author.Slug as author_slug,ci_studyhub.*, ifnull(`image_small`,`image`) as smallimg FROM `ci_studyhub`
				inner join ci_studyhub_popular tbl on tbl.studyhub_id=ci_studyhub.ci_studyhubid
				inner join ci_studyhub_author  on ci_studyhub.AuthorId=ci_studyhub_author.ci_studyhub_authorid";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function get_studyhub_byid($slug)
	{
		$sql="
		SELECT Author_name,`profile_image`, ci_studyhub_author.Slug as author_slug,`profile`,ci_studyhub.* FROM `ci_studyhub`
		inner join ci_studyhub_author  on ci_studyhub.AuthorId=ci_studyhub_author.ci_studyhub_authorid
		where ci_studyhub.slug='".$slug."'";
		$query = $this->db->query($sql);
   		$result = $query->row();
     	return $result;
	}
	public function get_studyhub_related($slug)
	{
		$sql="
		SELECT ci_studyhub.* FROM `ci_studyhub_related`
		inner join ci_studyhub on ci_studyhub.ci_studyhubid=ci_studyhub_related.ci_studyhub_repeted
inner join ci_studyhub ab on ab.ci_studyhubid=ci_studyhub_related.ci_studyhubid
where ab.slug='".$slug."'";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function get_studyhub_sections($slug)
	{
		$sql="
		SELECT * FROM `ci_studyhub_sections`
		inner join ci_studyhub on ci_studyhub.ci_studyhubid=ci_studyhub_sections.studyhub_id
		 where ci_studyhub.slug='".$slug."' ORDER BY `SortOrder` ASC";

		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function get_lattest_article()
	{
		$sql="SELECT * FROM `ci_studyhub`  
		ORDER BY `ci_studyhub`.`Createddatetime`   DESC limit 5";

		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function get_author_article($slug)
	{
		$sql=" SELECT Author_name,ci_studyhub_author.Slug as author_slug,ci_studyhub.* FROM `ci_studyhub`
				inner join ci_studyhub_author  on ci_studyhub.AuthorId=ci_studyhub_author.ci_studyhub_authorid
				where ci_studyhub_author.Slug='".$slug."'";
		$query = $this->db->query($sql);
   		$result = $query->result();
     	return $result;
	}

	public function get_author($slug)
	{
		$sql=" SELECT Author_name,ci_studyhub_author.Slug as author_slug from ci_studyhub_author  
		where ci_studyhub_author.Slug='".$slug."'";
		$query = $this->db->query($sql);
   		$result = $query->row();
     	return $result;
	}
	
// seo related start
   public function get_seo_course($id)
	{
		$sql="SELECT 
		`course_seo_title` as tittle,
		`course_meta_description` as descriptions,
		`course_meta_keywords` as keyworddata
		FROM `tbl_course` where course_id=".$id;
		$query = $this->db->query($sql);
   		$result = $query->row();
     	return $result;
	}

	public function get_seo_caregory($id)
	{
		$sql="SELECT 
		`category_seo_title` as tittle,
		`category_meta_description` as descriptions,
		`category_meta_keywords` as keyworddata
		FROM `tbl_category` where category_id=".$id;
		$query = $this->db->query($sql);
   		$result = $query->row();
		 return $result;
		
	}

	public function get_seo_subcategory($id)
	{
		$sql="SELECT 
		`subcategory_seo_title` as tittle,
		`subcategory_meta_description` as descriptions,
		`subcategory_meta_keywords` as keyworddata
		FROM `tbl_subcategory` where subcategory_id=".$id;
		$query = $this->db->query($sql);
   		$result = $query->row();
		 return $result;
	
	}

	public function get_seo_casestudy($slug)
	{
		$sql="SELECT 
		`Meta_tittle` as tittle,
		`Metadescription` as descriptions,
		`Metadescription` as keyworddata
		FROM `ci_casestudy` where slug='".$slug."'";
		$query = $this->db->query($sql);
   		$result = $query->row();
		 return $result;
		
	}

	public function get_seo_whitepaper($slug)
	{
		$sql="SELECT 
		`seo_tittle` as tittle,
		`meta_description` as descriptions,
		`meta_keyword` as keyworddata
		FROM `ci_whitepapers` where slug='".$slug."'";
		$query = $this->db->query($sql);
   		$result = $query->row();
		 return $result;
		
	}

	public function get_seo_studyhub($slug)
	{
		$sql="SELECT 
		`Meta_tittle` as tittle,
		`meta_description` as descriptions,
		`meta_description` as keyworddata
		FROM `ci_studyhub`  where slug='".$slug."'";
		$query = $this->db->query($sql);
   		$result = $query->row();
		 return $result;
		
	}

	public function get_footer_subcaregory()
	{
		$sql="SELECT DISTINCT tbl_category.category_id as subcategory_id,tbl_category.category_slug as subcategory_slug,tbl_category.category_name as subcategory_name FROM `ci_footer_menu` inner join coursecategory on coursecategory.CoursecategoryId=ci_footer_menu.Item_ID 
		inner join tbl_category on tbl_category.category_id=coursecategory.CategoryID where ci_footer_menu.type='course'";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;

	}

	public function get_footer_course($subcat)
	{
		$sql="SELECT DISTINCT tbl_course.course_slug,tbl_course.course_name FROM `ci_footer_menu` inner join coursecategory on coursecategory.CoursecategoryId=ci_footer_menu.Item_ID inner join tbl_course on tbl_course.course_id=coursecategory.CourseId where ci_footer_menu.type='course' and coursecategory.CategoryID=".$subcat;
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;

	}

	// Courses page
function display_category()
{       
   

	$qry ="SELECT  category_id,tbl_category.category_name,tbl_category.category_slug
	from  tbl_category";
		$query = $this->db->query( $qry);

	return $query->result();
}

function Subcatgoryforcourses($catid)
{
	$qry ="SELECT ci_subparents.subparent_Id,tbl_subcategory.subcategory_id,tbl_subcategory.subcategory_name,tbl_subcategory.subcategory_slug  from ci_subparents 
	inner join tbl_subcategory on tbl_subcategory.subcategory_id=ci_subparents.SubCategoryId
	where CategoryId=".$catid;
	
	$query = $this->db->query( $qry);

	return $query->result();

}

function coursesforcourses($category,$subCategory)
{
	$qry ="SELECT tbl_course.* FROM `coursecategory`
	inner join tbl_course on tbl_course.course_id=coursecategory.CourseId
	where coursecategory.CategoryID=".$category." and coursecategory.SubcategoryID=".$subCategory;
	
	$query = $this->db->query( $qry);

	return $query->result();

}
function getdummy_date()
{
	$qry ="SELECT * from tbl_dummydate" ;
	
	$query = $this->db->query( $qry);

	return $query->row();

}
function getall_accreditations()
{
	$qry ="SELECT * from tbl_accreditations" ;
	
	$query = $this->db->query( $qry);

	return $query->result();

}

function getall_studyhub()
{
	$qry ="SELECT `Tittle`,`slug` FROM `ci_studyhub`" ;
	
	$query = $this->db->query( $qry);

	return $query->result();

}


function get_seo_static_bypage($page)
{
	$qry ="SELECT `Page`,`tittle`,`description` as descriptions FROM `ci_seo_static` where Page='".$page."'" ;
	
	$query = $this->db->query( $qry);

	return $query->row();

}


}
?>