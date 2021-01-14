<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	function __construct(){

        parent::__construct();

		$this->load->model('main_model', 'mainmodel');
	}
	
	// --------------------------
	public function index()
	{
		$result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
		$result["header_menus"] = $this->mainmodel->display_header_menu();
		$result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$result["upcoming_batch"] = $this->mainmodel->get_home_upcoming_batches();
		$result["testimonials"] = $this->mainmodel->getall_hometestimonial();
		$result["page_type"]="home";
		$this->load->view('index',$result);
	}

	
	public function contactus()
	{
		$result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
		$result["header_menus"] = $this->mainmodel->display_header_menu();
		$result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$result["seo"]=$this->mainmodel->get_seo_static_bypage("Contact Us");
		$this->load->view('contact-us',$result);
	}
	public function aboutus()
	{
		$result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
		$result["header_menus"] = $this->mainmodel->display_header_menu();
		$result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$result["seo"]=$this->mainmodel->get_seo_static_bypage("About Us");
		$this->load->view('about-us',$result);
	}

	public function accreditations()
	{
		$result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
		$result["header_menus"] = $this->mainmodel->display_header_menu();
		$result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$result["accreditations"] = $this->mainmodel->getall_accreditations();
		$result["seo"]=$this->mainmodel->get_seo_static_bypage("Accreditations");
		$this->load->view('accreditations',$result);
	}
	public function corporatetraining()
	{
		$result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
		$result["header_menus"] = $this->mainmodel->display_header_menu();
		$result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$result["Testimonials"] = $this->mainmodel->get_corporate_testimonials();
		$result["seo"]=$this->mainmodel->get_seo_static_bypage("Corporate Training Solution");
		$result["page_type"]="corporate-training";
		$this->load->view('corporate-training',$result);
	}
	
	public function ourresource()
	{
		$result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
		$result["header_menus"] = $this->mainmodel->display_header_menu();
		$result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$result["seo"]=$this->mainmodel->get_seo_static_bypage("Resources");
		$this->load->view('our-resources',$result);
	}

	
	public function testimonials()
	{

		$result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
		$result["header_menus"] = $this->mainmodel->display_header_menu();
		$result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$this->load->view('testimonials',$result);
	}

	public function studyhub()
	{
		$result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
		$result["header_menus"] = $this->mainmodel->display_header_menu();
		$result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$result["std_search"] = $this->mainmodel->studyhub_search();
		$result["seo"]=$this->mainmodel->get_seo_static_bypage("Study Hub");
		$result["recent"] = $this->mainmodel->get_ci_studyhub_recent();
		$result["popular"] = $this->mainmodel->get_ci_studyhub_popular();
		$result["recomment"] = $this->mainmodel->get_ci_studyhub_recommented();
		$result["main"] = $this->mainmodel->get_ci_studyhub_main();


		
		$this->load->view('study-hub',$result);
	}
	public function studyhubdetail($slug)
	{
		$result["seo"]=$this->mainmodel->get_seo_studyhub($slug);
		$result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
		$result["header_menus"] = $this->mainmodel->display_header_menu();
		$result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$result["studyhub"]=$this->mainmodel->get_studyhub_byid($slug);
		if(count($result["studyhub"])>0)
		{
		$result["related"]=$this->mainmodel->get_studyhub_related($slug);
		$result["sectionsdata"]=$this->mainmodel->get_studyhub_sections($slug);
		$result["recent"]=$this->mainmodel->get_lattest_article($slug);
	
		$this->load->view('study-hub-detail-page',$result);
		}
		else{
			$this->load->view('404', $result);
		}
	}
	public function authordetails($slug)
	{
		$result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
		$result["header_menus"] = $this->mainmodel->display_header_menu();
		$result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$result["author_articles"]=$this->mainmodel->get_author_article($slug);
		$result["author"]=$this->mainmodel->get_author($slug);
		
		$this->load->view('study-hub-author-page',$result);
	}
	

	

	public function gallery()
	{
		$result["Searchdata"] = $this->mainmodel->GetAllcourse_forsearch();
		$result["header_menus"] = $this->mainmodel->display_header_menu();
		$result["footer_menus"] = $this->mainmodel->get_footer_subcaregory();
		$result["seo"]=$this->mainmodel->get_seo_static_bypage("Gallery");
	$result["page_type"]="gallery";
		$this->load->view('gallery',$result);
	}

	




	


	
}
