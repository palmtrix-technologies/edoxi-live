<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    function __construct(){

        parent::__construct();
        $this->load->library('session');
		$this->load->model('main_model', 'mainmodel');
    }

    public function search()
    {
       
       
        if( isset($_POST['search']) )
        {
        $name=$_POST['search'];
        $dataval=$this->mainmodel->GetCourse_search($name);
        if( isset($dataval))
        {
        $id=$dataval->course_id;
        $datas=$this->mainmodel->getcoursebyid($id);
        $data["seo"]=$this->mainmodel->get_seo_course($id);
        $data["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $data["header_menus"] = $this->mainmodel->display_header_menu();
        $data["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
        $data['Coursecategory']=$this->mainmodel->get_coursecategory_byid($id);
		$data['courseaccrediations']=$this->mainmodel->getaccreditationsbycourse($id);
		$data['relatedcourses']=$this->mainmodel->getrelatedcoursesbid($id);
		$data["coursedata"]= $datas;
		$data['categoryimage']=$this->mainmodel->get_courseimage_byid($datas->ImageID);
        $data['categorysections']=$this->mainmodel->get_coursesections_byid($id);
        $data['batches']=$this->mainmodel->getbatchesbycourse($id);
        $data['faq']=$this->mainmodel->getfaqbycourse($id);
        $data['dummydate']=$this->mainmodel->getdummy_date();
        
        $this->load->view('course-detail-page', $data);
        }
        else{
            $data["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
            $data["header_menus"] = $this->mainmodel->display_header_menu();
            $data["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
            $this->load->view('404', $data);
        }
        }
        else{
            $data["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
            $data["header_menus"] = $this->mainmodel->display_header_menu();
            $data["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
            $this->load->view('404', $data);
        }

    }

	public function sluger($slug)
	{
        try { 
            
         
        $data=$this->mainmodel->Getslugdetails($slug);
       
        if( count( $data)>0)
        {
     
        $id=$data->dataid;

      
        if($data->slug_category=="category")
        {
            $this->getcategory($id);
        }
        else if($data->slug_category=="subcategory")
        {
            $this->getsubcategory($id);
        }
        else if($data->slug_category=="course")
        {
            $this->getCourse($id);
        }
        else{


        }
    }
    else
    {
        $result["seo"]=$this->mainmodel->get_seo_casestudy($slug);
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $result["header_menus"] = $this->mainmodel->display_header_menu();
        $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
        $this->load->view('404', $result);

    }
    } catch (Exception $e) {
        
        $result["seo"]=$this->mainmodel->get_seo_casestudy($slug);
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $result["header_menus"] = $this->mainmodel->display_header_menu();
        $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
        $this->load->view('404', $result);
      }
        
    }
    public function slugercat($slug)
	{
	    
        $data=$this->mainmodel->Getslugdetails("category/".$slug);
       
        $id=$data->dataid;

      
        if($data->slug_category=="category")
        {
            $this->getcategory($id);
        }
        else if($data->slug_category=="subcategory")
        {
            $this->getsubcategory($id);
        }
        else if($data->slug_category=="course")
        {
            $this->getCourse($id);
        }
        else{

        }
        
        
    }

    public function getCourse($id)
	{
        $datas=$this->mainmodel->getcoursebyid($id);
        $data["seo"]=$this->mainmodel->get_seo_course($id);
        $data["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $data["header_menus"] = $this->mainmodel->display_header_menu();
        $data["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$data['Coursecategory']=$this->mainmodel->get_coursecategory_byid($id);
		$data['courseaccrediations']=$this->mainmodel->getaccreditationsbycourse($id);
		$data['relatedcourses']=$this->mainmodel->getrelatedcoursesbid($id);
		$data["coursedata"]= $datas;
		$data['categoryimage']=$this->mainmodel->get_courseimage_byid($datas->ImageID);
        $data['categorysections']=$this->mainmodel->get_coursesections_byid($id);
        $data['batches']=$this->mainmodel->getbatchesbycourse($id);
        $data['faq']=$this->mainmodel->getfaqbycourse($id);
        $data['dummydate']=$this->mainmodel->getdummy_date();
        
        $data["page_type"]="course-detail-page";
        $this->load->view('course-detail-page', $data);
        
    }
    
    public function getcategory($id)
	{
        $result["seo"]=$this->mainmodel->get_seo_caregory($id);
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
         $data=$this->mainmodel->get_category_byid($id);
         $result["header_menus"] = $this->mainmodel->display_header_menu();
         $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
         $result['Categorydata']=$data;
         $result['categoryimage']=$this->mainmodel->get_categoryimage_byid($data->ImageID);
         $result['categorysections']=$this->mainmodel->get_categorysections_byid($id);
         $result["subcategories"]=$this->mainmodel->subcategorybyCategoryID($id);
         $this->load->view('category-page', $result);
      
    }
    
    public function getsubcategory($id)
	{
        $result["seo"]=$this->mainmodel->get_seo_subcategory($id);
        $data=$this->mainmodel->get_subcategory_byid($id);
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $result["header_menus"] = $this->mainmodel->display_header_menu();
        $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$result['subCategorydata']=$data;
		$result['subcategoryimage']=$this->mainmodel->get_subcategoryimage_byid($data->ImageID);
        $result['subcategorysections']=$this->mainmodel->get_subcategorysections_byid($id);
        $result['relatedcourses']=$this->mainmodel->coursesbysubcategoryid($id);
  
        $this->load->view('sub-category-page', $result);
    }
    

    public function casestudies()
	{
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $result["header_menus"] = $this->mainmodel->display_header_menu();
        $result['casestudies']=$this->mainmodel->getallcasestudy();
        $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
        $result["seo"]=$this->mainmodel->get_seo_static_bypage("Case Studies");
        
        $this->load->view('case-studies', $result);
    }

    public function sitemap()
	{
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $result["header_menus"] = $this->mainmodel->display_header_menu();
        $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
        $result["categorys"] = $this->mainmodel->display_category();
        $result["studyhubs"] = $this->mainmodel->getall_studyhub();
        $result["whitepapers"] = $this->mainmodel->getallwhitepapers();
        $result["casestudies"] = $this->mainmodel->getallcasestudy();
        $this->load->view('sitemap', $result);
    }

    public function casestudydetails($slug)
	{
        
        $result["seo"]=$this->mainmodel->get_seo_casestudy($slug);
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $result["header_menus"] = $this->mainmodel->display_header_menu();
        $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
        $result['casestudy']=$this->mainmodel->Get_casestudy_bySlug($slug);
        $result['casestudies']=$this->mainmodel->getallrelatedcasestudy($slug);
        if(empty($result['casestudy']))
        {
            $this->load->view('404', $result);
        }
        else{
            $this->load->view('case-studies-detail-page', $result);
        }
        
    }

    //whitepapers

    public function whitepapers()
	{
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $result["header_menus"] = $this->mainmodel->display_header_menu();
        $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
        $result['whitepapers']=$this->mainmodel->getallwhitepapers();
        $result["seo"]=$this->mainmodel->get_seo_static_bypage("White Paper");
        
        $this->load->view('white-papers', $result);
    }

    public function whitepaperdetails($slug)
	{
        $result["seo"]=$this->mainmodel->get_seo_whitepaper($slug);
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $result["header_menus"] = $this->mainmodel->display_header_menu();
        $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
        $result['whitepaper']=$this->mainmodel->Get_whitepaper_bySlug($slug);
        // $result['casestudies']=$this->mainmodel->getallrelatedcasestudy($slug);
        if(empty($result['whitepaper']))
        {
            $this->load->view('404', $result);
        }
        else{
            $this->load->view('white-papers-detail-page', $result);
        }
        
    }


    //courses
    public function courses()
	{
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $result["header_menus"] = $this->mainmodel->display_header_menu();
        $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
        $result["Testimonials"] = $this->mainmodel->getall_coursetestimonial();
        $result["categorys"] = $this->mainmodel->display_category();
        $result["seo"]=$this->mainmodel->get_seo_static_bypage("Courses");
       
        

        $result["page_type"]="courses";
        
        $this->load->view('courses', $result);
    }


    public function brochures()
	{
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $result["header_menus"] = $this->mainmodel->display_header_menu();
        $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
        $result["brouchers"] = $this->mainmodel->getallBrouchers();
        
        $result["seo"]=$this->mainmodel->get_seo_static_bypage("Brochures");
        $this->load->view('brochures', $result);
    }
    
    public function testimonials()
	{
        $result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
        $result["header_menus"] = $this->mainmodel->display_header_menu();
        $result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
        $result["test_courses"] = $this->mainmodel->getall_courses();
        $result["testimonials"] = $this->mainmodel->getall_testimonial();
        
        $this->load->view('testimonials', $result);
    }

    
    



    

    


    
	


	

	
	


	
}
