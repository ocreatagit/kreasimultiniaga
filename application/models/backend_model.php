<?php

class Backend_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('security');
        $this->load->helper('string');
        $this->load->helper('date');
    }

    /* HOME */

    function insert_image_slider($filename) {
        $this->db->insert('slider_home', array('path' => $filename));
    }

    function get_image_slider($IDFoto = FALSE) {
        if (!$IDFoto) {
            $this->db->order_by("created_at", "desc");
            return $this->db->get('slider_home')->result();
        } else {
            return $this->db->get_where('slider_home', array('IDFoto' => $IDFoto))->row();
        }
    }

    function delete_image_slider($IDFoto) {
        $this->db->delete('slider_home', array('IDFoto' => $IDFoto));
    }

    /* end-HOME */

    /* PROJECT */

    function insert_image_project($filename, $IDProject = FALSE) {
        if (!$IDProject) {
            $sql = "SELECT AUTO_INCREMENT as IDProject FROM information_schema.tables WHERE TABLE_SCHEMA = 'kreasimultiniaga' AND TABLE_NAME = 'project'";
            $IDProject = $this->db->query($sql)->row()->IDProject;
        }
        $data = array(
            'IDProject' => $IDProject,
            'path' => $filename
        );
        $this->db->insert('gambar', $data);
    }

    function insert_project() {
        $data = array(
            'tipe' => $this->input->post('type'),
            'judul' => $this->input->post('name'),
            'deskripsi' => $this->input->post('description')
        );
        $this->db->insert('project', $data);
    }

    function get_project($IDProject = FALSE) {
        if ($IDProject) {
            return $this->db->get_where('project', array('IDProjek' => $IDProject))->row();
        } else {
            return $this->db->get('project')->result();
        }
    }

    function get_project_image($IDProject = FALSE, $IDGambar = FALSE) {
        if ($IDProject) {
            return $this->db->get_where('gambar', array('IDProject' => $IDProject))->result();
        }else{
            return $this->db->get_where('gambar', array('IDGambar' => $IDGambar))->row();
        }
    }

    function update_project($IDProject) {
        $data = array(
            'tipe' => $this->input->post('type'),
            'judul' => $this->input->post('name'),
            'deskripsi' => $this->input->post('description')
        );
        $this->db->where('IDProjek', $IDProject);
        $this->db->update('project', $data);
    }
    
    function delete_project_image($IDGambar){
        $this->db->delete('gambar', array('IDGambar' => $IDGambar));
    }

    /* end-PROJECT */

    /* PROCESS */

    function get_process() {
        return $this->db->get('process')->result();
    }

    function insert_process($fileName) {
        $data = array(
            'path' => $fileName,
            'judul' => $this->input->post('name'),
            'deskripsi' => $this->input->post('description')
        );
        $this->db->insert('process', $data);
    }

    /* end-PROCESS */
}
