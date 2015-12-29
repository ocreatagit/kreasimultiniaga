<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Backend_model');
        $this->load->helper(array('url', 'html', 'form'));
        $this->load->library('session');
        $this->config->set_item('base_url', 'http://localhost/kreasimultiniaga/');
    }

    public function index() {
        if ($this->input->post('btn_login')) {
            if ($this->Backend_model->cek_username()) {
                if ($this->Backend_model->cek_password()) {
                    $this->session->set_userdata('administrator', $this->input->post('username'));
                    redirect('backend/home');
                }
            }
        }
        $this->load->view('BackEnd/v_header');
        $data['page'] = 'login';
        $this->load->view('BackEnd/v_navigasi', $data);
        $this->load->view('BackEnd/v_login');
    }

    public function generate_password($username = false, $password = FALSE) {
        if (!$password || !$username) {
            redirect();
        }
        $a = hash('sha512', random_string('alnum', 100));
        echo 'salt : ' . $a . '<br>';
        echo 'hash : ' . hash('sha512', $username . $a . $password) . '<br>';
    }

    public function logout() {
        $this->session->unset_userdata('administrator');
        redirect();
    }

    public function home() {
        if (!$this->session->has_userdata('administrator')) {
            redirect();
        }
        $data['gambars'] = $this->Backend_model->get_image_slider();
        $this->load->view('BackEnd/v_header');
        $data['page'] = 'home';
        $this->load->view('BackEnd/v_navigasi', $data);
        $this->load->view('BackEnd/v_home', $data);
    }

    public function project() {
        if (!$this->session->has_userdata('administrator')) {
            redirect();
        }
        if ($this->input->post('btn_simpan')) {
            $this->Backend_model->insert_project();
        }
        $data['projects'] = $this->Backend_model->get_project();
        $this->load->view('BackEnd/v_header');
        $data['page'] = 'project';
        $this->load->view('BackEnd/v_navigasi',$data);
        $this->load->view('BackEnd/v_project', $data);
    }

    public function edit_project($IDProject = FALSE) {
        if (!$this->session->has_userdata('administrator') || !$IDProject) {
            redirect();
        }
        if ($this->input->post('btn_simpan')) {
            $this->Backend_model->update_project($IDProject);
        }
        $data['IDProject'] = $IDProject;
        $data['projects'] = $this->Backend_model->get_project($IDProject);
        $data['gambars'] = $this->Backend_model->get_project_image($IDProject);
        $this->load->view('BackEnd/v_header');
        $data['page'] = 'project';
        $this->load->view('BackEnd/v_navigasi',$data);
        $this->load->view('BackEnd/v_edit_project', $data);
    }

    public function process() {
        if (!$this->session->has_userdata('administrator')) {
            redirect();
        }
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
        $data['page'] = 'process';
        $this->load->view('BackEnd/v_navigasi',$data);
        $this->load->view('BackEnd/v_process', $data);
    }

    public function edit_process($IDProcess) {
        if (!$this->session->has_userdata('administrator')) {
            redirect();
        }
        if ($this->input->post('btn_simpan')) {
            $config['upload_path'] = "./uploads";
            $config['allowed_types'] = '*';
            $config['max_size'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("gambar")) {
                $this->Backend_model->update_process($IDProcess);
            } else {
                $response = $this->upload->data();
                $this->Backend_model->update_process($IDProcess, $response['file_name']);
            }
        }
        $data['process'] = $this->Backend_model->get_process($IDProcess);
        $this->load->view('BackEnd/v_header');
        $data['page'] = 'process';
        $this->load->view('BackEnd/v_navigasi',$data);
        $this->load->view('BackEnd/v_edit_process', $data);
    }

    public function about_us() {
        if (!$this->session->has_userdata('administrator')) {
            redirect();
        }
        if ($this->input->post('btn_simpan')) {
            $this->Backend_model->update_about_us();
        }
        $data['about_us'] = $this->Backend_model->get_about_us();
        $this->load->view('BackEnd/v_header');
        $data['page'] = 'about_us';
        $this->load->view('BackEnd/v_navigasi',$data);
        $this->load->view('BackEnd/v_about_us', $data);
    }

    public function upload_home() {
        if (!$this->session->has_userdata('administrator')) {
            redirect();
        }
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
        if (!$this->session->has_userdata('administrator')) {
            redirect();
        }
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
        if (!$this->session->has_userdata('administrator') || !$IDFoto) {
            redirect();
        }
        $gambar = $this->Backend_model->get_image_slider($IDFoto)->path;
        unlink(getcwd() . '/uploads/' . $gambar);
        $this->Backend_model->delete_image_slider($IDFoto);
        redirect('backend/home');
    }

    public function delete_image_project($IDGambar = FALSE, $IDProject = FALSE) {
        if (!$this->session->has_userdata('administrator') || !$IDGambar || !$IDProject) {
            redirect();
        }
        $gambar = $this->Backend_model->get_project_image(false, $IDGambar)->path;
        unlink(getcwd() . '/uploads/' . $gambar);
        $this->Backend_model->delete_project_image($IDGambar);
        redirect('backend/edit_project/' . $IDProject);
    }

    public function delete_project($IDProject = FALSE) {
        if (!$this->session->has_userdata('administrator') || !$IDProject) {
            redirect();
        }
        $this->Backend_model->delete_project($IDProject);
        redirect('backend/project');
    }

    public function delete_process($IDProcess = FALSE) {
        if (!$this->session->has_userdata('administrator') || !$IDProcess) {
            redirect();
        }
        $this->Backend_model->delete_process($IDProcess);
        redirect('backend/process');
    }

}
