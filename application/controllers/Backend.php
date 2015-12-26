<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Backend_model');
        $this->load->helper(array('url', 'html', 'form'));
        $this->config->set_item('base_url','http://localhost/kreasimultiniaga/') ;
    }

    public function index($page = FALSE) {
        $data['gambars'] = $this->Backend_model->get_image_slider();
        $this->load->view('BackEnd/v_header');
        $this->load->view('BackEnd/v_navigasi');
        $this->load->view('BackEnd/v_home', $data);
    }

    public function upload() {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $fileName;
            move_uploaded_file($tempFile, $targetFile);
            $this->Backend_model->insert_image_slider($fileName);
        }
    }
    
    public function delete_slider($IDFoto = FALSE){
        if(!$IDFoto){
            redirect('');
        }
        $gambar = $this->Backend_model->get_image_slider($IDFoto)->path;
        unlink('/kreasimultiniaga/uploads/'.$gambar);
        $this->Backend_model->delete_image_slider($IDFoto);
        redirect('backend');
        
    }

}
