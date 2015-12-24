<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('FrontEnd/v_head');
        $this->load->view('FrontEnd/v_main');
        $this->load->view('FrontEnd/v_foot');
    }

    public function ourProject() {
        $data['title'] = 'OUR PROJECT - KREASI MULTI NIAGA';
        $this->load->library('project');

        $this->load->view('v_header', $data);
        $this->load->view('v_cart', $data);
        $this->load->view('v_footer');
    }

}
