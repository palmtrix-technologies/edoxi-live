<?php
class Whitepaper extends MY_Controller
{
    function __construct(){

        parent::__construct();
        // auth_check(); // check login auth
        // $this->rbac->check_module_access();

		$this->load->model('adminpanel/Whitepaper/Whitepaper_model', 'Whitepaper_model');
	}
	
	

	public function lists()
	{
		$data["whitepapers"]= $this->Whitepaper_model->getall_whitepaper();
		$this->load->view('admin/includes/_header');
        $this->load->view('adminpanel/Whitepaper/whitepaperlist',$data);
		$this->load->view('admin/includes/_footer');
	}

	public function add_whitepaper()
	{
		
		$this->load->view('admin/includes/_header');
        $this->load->view('adminpanel/Whitepaper/Createwhitepaper');
		$this->load->view('admin/includes/_footer');
	}


	public function Createwhitepaper(){

		$postdata=$this->input->post('postData');
		$data=$postdata["whitepaper"];
		$result= $this->Whitepaper_model->addwhitepaper($data);
		echo $result;

	 }

	 public function edit_whitepaper($id)
	{
		$data["whitepaper"]= $this->Whitepaper_model->select_whitepaper_by_id($id);
		$this->load->view('admin/includes/_header');
        $this->load->view('adminpanel/Whitepaper/Editwhitepaper',$data);
		$this->load->view('admin/includes/_footer');
	}
	public function updatewhitepaper(){

		
		$postdata=$this->input->post('postData');
		
		$data=$postdata["whitepaper"];
		$id=$postdata["id"];
		
		$result= $this->Whitepaper_model->updatewhitepaper($data,$id);
		echo $result;

	 }
	
	
	
	 
	
}

?>