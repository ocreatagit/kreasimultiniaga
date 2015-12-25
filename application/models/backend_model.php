<?php

class Backend_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('security');
        $this->load->helper('string');
        $this->load->helper('date');
    }

    function insert_image_slider($filename) {
        $this->db->insert('slider_home', array('path' => $filename));
    }

    function get_image_slider($IDFoto = FALSE) {
        if (!$IDFoto) {
            $this->db->order_by("created_at", "desc"); 
            return $this->db->get('slider_home')->result();
        }else{
            return $this->db->get_where('slider_home', array('IDFoto' => $IDFoto))->row();
        }
    }
    
    function delete_image_slider($IDFoto){
        $this->db->delete('slider_home', array('IDFoto' => $IDFoto)); 
    }

}
