<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $data['title'] = 'KREASI MULTI NIAGA';
        $data['navbar'] = 'beranda';
        
        $this->load->view('FrontEnd/v_head', $data);
        $this->load->view('FrontEnd/v_main');
        $this->load->view('FrontEnd/v_foot');
    }

    public function ourProject() {
        $data['title'] = 'OUR PROJECT - KREASI MULTI NIAGA';
        $data['navbar'] = 'ourProject';
        
        $this->load->view('FrontEnd/v_head', $data);
        $this->load->view('FrontEnd/v_ourProject');
        $this->load->view('FrontEnd/v_foot');
    }
    
    public function ruko(){
        $data['title'] = 'RUKO - KREASI MULTI NIAGA';
        $data['navbar'] = 'ourProject';
        
        $this->load->view('FrontEnd/v_head', $data);
        $this->load->view('FrontEnd/v_ruko');
        $this->load->view('FrontEnd/v_foot');
    }
    
    public function gudang(){
        $data['title'] = 'GUDANG - KREASI MULTI NIAGA';
        $data['navbar'] = 'ourProject';
        
        $this->load->view('FrontEnd/v_head', $data);
        $this->load->view('FrontEnd/v_gudang');
        $this->load->view('FrontEnd/v_foot');
    }
}
