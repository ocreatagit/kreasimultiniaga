<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Backend_model');
        $this->load->helper(array('url', 'html', 'form'));
        $this->config->set_item('base_url', 'http://localhost/kreasimultiniaga/');
    }

    public function index() {
        
    }

    public function home() {
        $data['gambars'] = $this->Backend_model->get_image_slider();
        $this->load->view('BackEnd/v_header');
        $this->load->view('BackEnd/v_navigasi');
        $this->load->view('BackEnd/v_home', $data);
    }

    public function project() {
        if ($this->input->post('btn_simpan')) {
            $this->Backend_model->insert_project();
        }
        $data['projects'] = $this->Backend_model->get_project();
        $this->load->view('BackEnd/v_header');
        $this->load->view('BackEnd/v_navigasi');
        $this->load->view('BackEnd/v_project', $data);
    }

    public function edit_project($IDProject = FALSE) {
        if (!$IDProject) {
            redirect('');
        }
        if ($this->input->post('btn_simpan')) {
            $this->Backend_model->update_project($IDProject);
        }
        $data['IDProject'] = $IDProject;
        $data['projects'] = $this->Backend_model->get_project($IDProject);
        $data['gambars'] = $this->Backend_model->get_project_image($IDProject);
        $this->load->view('BackEnd/v_header');
        $this->load->view('BackEnd/v_navigasi');
        $this->load->view('BackEnd/v_edit_project', $data);
    }

    public function process() {
        if ($this->input->post('btn_simpan')) {
            $config['upload_path'] = "./uploads";
            $config['allowed_types'] = '*';
            $config['max_size'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("gambar")) {
                echo $response = $this->upload->display_errors();
                exit;
            } else {
                $response = $this->upload->data();
                $this->Backend_model->insert_process($response['file_name']);
            }
        }
        $data['processes'] = $this->Backend_model->get_process();
        $this->load->view('BackEnd/v_header');
        $this->load->view('BackEnd/v_navigasi');
        $this->load->view('BackEnd/v_process', $data);
    }

    public function about_us() {
        $data['gambars'] = $this->Backend_model->get_image_slider();
        $this->load->view('BackEnd/v_header');
        $this->load->view('BackEnd/v_navigasi');
        $this->load->view('BackEnd/v_about_us', $data);
    }

    public function upload_home() {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = getcwd() . '/uploads/';
            $ext = end((explode(".", $fileName)));
            $fileName = random_string('alnum', 20) . "." . $ext;
            $targetFile = $targetPath . $fileName;
            move_uploaded_file($tempFile, $targetFile);
            $this->Backend_model->insert_image_slider($fileName);
        }
    }

    public function upload_project($IDProject = FALSE) {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = getcwd() . '/uploads/';
            $ext = end((explode(".", $fileName)));
            $fileName = random_string('alnum', 20) . "." . $ext;
            $targetFile = $targetPath . $fileName;
            move_uploaded_file($tempFile, $targetFile);
            if ($IDProject) {
                $this->Backend_model->insert_image_project($fileName, $IDProject);
            } else {
                $this->Backend_model->insert_image_project($fileName);
            }
        }
    }

    public function delete_slider($IDFoto = FALSE) {
        if (!$IDFoto) {
            redirect('');
        }
        $gambar = $this->Backend_model->get_image_slider($IDFoto)->path;
        unlink(getcwd() . '/uploads/' . $gambar);
        $this->Backend_model->delete_image_slider($IDFoto);
        redirect('backend/home');
    }
    
    public function delete_image_project($IDGambar = FALSE, $IDProject = FALSE) {
        if (!$IDGambar || !$IDProject) {
            redirect('');
        }
        $gambar = $this->Backend_model->get_project_image(false, $IDGambar)->path;
        unlink(getcwd() . '/uploads/' . $gambar);
        $this->Backend_model->delete_project_image($IDGambar);
        redirect('backend/edit_project/'.$IDProject);
    }

}
