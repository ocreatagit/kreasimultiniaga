<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Backend_model');
        $this->load->helper(array('url', 'html', 'form'));
        $this->config->set_item('base_url', 'http://localhost/kreasimultiniaga/');
    }

    public function index($page = FALSE) {
        $data['gambars'] = $this->Backend_model->get_image_slider();
        $this->load->view('BackEnd/v_header');
        $this->load->view('BackEnd/v_navigasi');
        $this->load->view('BackEnd/v_home', $data);
        $this->load->view('BackEnd/v_foot', $data);
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

    public function delete_slider($IDFoto = FALSE) {
        if (!$IDFoto) {
            redirect('');
        }
        $gambar = $this->Backend_model->get_image_slider($IDFoto)->path;
        unlink('/kreasimultiniaga/uploads/' . $gambar);
        $this->Backend_model->delete_image_slider($IDFoto);
        redirect('backend');
    }

    public function uang_kas() {
        if ($this->input->post("btn_pilih")) {
            if ($this->input->post('tanggal_awal')) {
                $tgl_awal = strftime('%d-%m-%Y', strtotime($this->input->post('tanggal_awal')));
            } else {
                $tgl_awal = FALSE;
            }
            if ($this->input->post('tanggal_akhir')) {
                $tgl_akhir = strftime('%d-%m-%Y', strtotime($this->input->post('tanggal_akhir')));
            } else {
                $tgl_akhir = FALSE;
            }

            $data["saldo_pindahan"] = $this->Backend_model->select_laporan_pindahan($tgl_awal, $tgl_akhir);
            $data["kass"] = $this->Backend_model->select_laporan_saldo($tgl_awal, $tgl_akhir);
            if ($tgl_awal && $tgl_akhir) {
                $data["periode"] = "Periode $tgl_awal S/D $tgl_akhir";
            } else {
                $data["periode"] = "";
            }
        } else {
            $data["saldo_pindahan"] = array();
            $data["kass"] = $this->Backend_model->select_laporan_saldo();
            $data["periode"] = "";
        }

        $this->load->view('BackEnd/v_header');
        $this->load->view('BackEnd/v_navigasi');
        $this->load->view('BackEnd/v_kas', $data);
        $this->load->view('BackEnd/v_foot');
    }

    public function input_kas() {
//        $this->cart->destroy();
        $this->load->library("form_validation");

        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        if ($this->input->post('btn_tambah')) {
            if ($this->form_validation->run() == TRUE) {
                $ke = 1;
                if ($this->cart->total_items() > 0) {
                    foreach ($this->cart->contents() as $items) {
                        if (strpos($items["id"], "UangKas") !== FALSE) {
                            $ke++;
                        }
                    }
                }

                $nominal = $this->input->post('nominal');
                $jenis = $this->input->post('jenis');
                $data = array(
                    'id' => 'UangKas_' . $ke,
                    'qty' => 1,
                    'price' => $nominal,
                    'name' => 'Uang Kas',
                    'options' => array('jenis_keterangan' => $jenis == 0 ? "Kas Masuk" : "Kas Keluar",
                        'jenis' => $jenis,
                        'tanggal' => $this->input->post("tanggal"),
                        'keterangan' => $this->input->post("keterangan")
                    )
                );

                $this->session->set_userdata("tanggal", $this->input->post("tanggal"));
                $this->cart->insert($data);

                $this->session->set_flashdata("status_uang_kas", "Data Telah Di Tambahkan!");
//                print_r($this->cart->contents());
//                exit;
            }
        }

        $data["status_uang_kas"] = $this->session->flashdata("status_uang_kas");
        $array_cart = $this->cart->contents();
        $data["array_cart"] = $this->msort($array_cart, array('tanggal'), SORT_REGULAR, 'UangKas');

        $this->load->view('BackEnd/v_header');
        $this->load->view('BackEnd/v_navigasi');
        $this->load->view('BackEnd/v_input_kas', $data);
        $this->load->view('BackEnd/v_foot');
    }

    function hapus_cart_saldo($id = FALSE) {
        $rowid = "";
        if ($this->cart->total_items() > 0) {
            foreach ($this->cart->contents() as $items) {
                if ($items["id"] == $id) {
                    $rowid = $items["rowid"];
                    break;
                }
            }

            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);

            $this->session->set_flashdata("status", "Data Telah Dihapus!");
        }
        redirect("backend/input_kas");
    }

    function insert_saldo() {
        $isEmpty = 0;
        foreach ($this->cart->contents() as $items) {
            if (strpos($items["id"], "UangKas") !== FALSE) {
                $isEmpty++;
            }
        }
        if ($isEmpty != 0) {
            $IDLaporan = $this->Backend_model->insert_laporan_saldo_kas();

            foreach ($this->cart->contents() as $items) {
                $this->Backend_model->insert_detail_laporan_kas($IDLaporan, $items["options"]["jenis"], strftime("%Y-%m-%d", strtotime($items["options"]["tanggal"])), $items["price"], $items["options"]["keterangan"]);

                $this->Backend_model->insert_jurnal_saldo($IDLaporan, $items["options"]["jenis_keterangan"], strftime("%Y-%m-%d", strtotime($items["options"]["tanggal"])), $items["price"], $items["options"]["keterangan"], true);

                $data = array('rowid' => $items['rowid'], 'qty' => 0);
                $this->cart->update($data);
            }
            $this->session->set_flashdata("status", "Data Telah Di Tambahkan!");
            redirect("backend/uang_kas");
        }
    }

    // --------------------- SORT ---------------------------- //
    function msort($array, $key, $sort_flags = SORT_REGULAR, $id) {
        $array_new = array();
        foreach ($array as $items) {
            if (strpos($items["id"], $id) !== FALSE) {
                $array_new[$items["rowid"]] = $items;
            }
        }

//        print_r($array_new); exit;

        if (is_array($array) && count($array) > 0) {
            if (!empty($key)) {
                $mapping = array();
                foreach ($array_new as $k => $v) {
                    $sort_key = '';
                    if (!is_array($key)) {
                        $sort_key = $v["options"][$key];
                    } else {
                        // @TODO This should be fixed, now it will be sorted as string
                        foreach ($key as $key_key) {
                            $sort_key .= $v["options"][$key_key];
                        }
                        $sort_flags = SORT_ASC;
                    }
                    $mapping[$k] = $sort_key;
                }
                asort($mapping, $sort_flags);

                $sorted = array();
                foreach ($mapping as $k => $v) {
                    $sorted[] = $array[$k];
                }
                return $sorted;
            }
        }
        return $array;
    }

}
