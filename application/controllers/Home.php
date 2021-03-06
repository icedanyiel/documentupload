<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Home extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->load->model("updocs_model"); 
        }

	public function index()
	{
        $this->load->view('templates/header');

        $data["fetch_data"] = $this->updocs_model->fetch_data();
        
        $this->load->view('home',$data);

        $this->load->view('templates/footer');
    }

    function ajaxsearch()
    {
       if(is_null($this->input->get('id')))
        {
            $this->load->view('home');
        }
        else
        {
        $this->load->model('updocs_model');
        
        $data['booktable']=$this->updocs_model->booktable($this->input->get('id')); 
        
        $this->load->view('output',$data);
        
        }
        
       
    }

}
