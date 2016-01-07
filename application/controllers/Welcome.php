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

        $this->load->model("Backend_model");

        $data["image_slider"] = $this->Backend_model->get_image_slider();
        $data["tentang"] = $this->Backend_model->get_about_us();
        $this->load->view('FrontEnd/v_head', $data);
        $this->load->view('FrontEnd/v_main', $data);
        $this->load->view('FrontEnd/v_foot');
    }

    public function ourProject() {
        $data['title'] = 'OUR PROJECT - KREASI MULTI NIAGA';
        $data['navbar'] = 'ourProject';

        $this->load->view('FrontEnd/v_head', $data);
        $this->load->view('FrontEnd/v_ourProject');
        $this->load->view('FrontEnd/v_foot');
    }

    public function ruko() {
        $data['title'] = 'RUKO - KREASI MULTI NIAGA';
        $data['navbar'] = 'ourProject';

        $this->load->model("Backend_model");
        $data["ruko"] = $this->Backend_model->get_new_project('Ruko');
        $data['image_slider'] = $this->Backend_model->get_project_image($data["ruko"]->IDProjek);

        $this->load->view('FrontEnd/v_head', $data);
        $this->load->view('FrontEnd/v_ruko');
        $this->load->view('FrontEnd/v_foot');
    }

    public function proses() {
        $data['title'] = 'PROSES PENGERJAAN - KREASI MULTI NIAGA';
        $data['navbar'] = 'proses';

        $this->load->model("Backend_model");
        $data["prosess"] = $this->Backend_model->get_process();
        $data["last_proses"] = $this->Backend_model->get_last_process_month();
        $this->load->view('FrontEnd/v_head', $data);
        $this->load->view('FrontEnd/v_proses', $data);
        $this->load->view('FrontEnd/v_foot');
    }

    public function gudang() {
        $data['title'] = 'GUDANG - KREASI MULTI NIAGA';
        $data['navbar'] = 'ourProject';

        $this->load->model("Backend_model");
        $data["ruko"] = $this->Backend_model->get_new_project('Gudang');
        if (count($this->Backend_model->get_new_project('Gudang')) > 0) {
            $data['image_slider'] = $this->Backend_model->get_project_image($data["ruko"]->IDProjek);
        }

        $this->load->view('FrontEnd/v_head', $data);
        $this->load->view('FrontEnd/v_ruko');
        $this->load->view('FrontEnd/v_foot');
    }

    public function kontakKami() {
        $data['title'] = 'Kontak Kami - KREASI MULTI NIAGA';
        $data['navbar'] = 'kontakkami';
        
        $this->load->model("Backend_model");
        $data["tentang"] = $this->Backend_model->get_about_us();
        $this->load->view('FrontEnd/v_head', $data);
        $this->load->view('FrontEnd/v_contactUS', $data);
        $this->load->view('FrontEnd/v_foot');
    }

}
