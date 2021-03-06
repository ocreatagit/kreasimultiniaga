<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Backend_model');
        $this->load->helper(array('url', 'html', 'form'));
        $this->load->library('session');
        $this->config->set_item('base_url', 'http://localhost/kmn');
    }

    public function index() {
        if ($this->input->post('btn_login')) {
            if ($this->Backend_model->cek_username()) {
                $this->session->set_userdata('administrator', $this->input->post('username'));
                if ($this->Backend_model->cek_password()) {
                    redirect('backend/home');
                } else {
                    $this->logout();
                }
            }
        }
        $this->load->view('BackEnd/v_header');
        $data['page'] = 'login';
        $this->load->view('BackEnd/v_navigasi', $data);
        $this->load->view('BackEnd/v_login');
    }

    public function generate_password($username = false, $password = FALSE, $notrandom = FALSE) {
        if (!$password || !$username || !$notrandom) {
            redirect();
        }
        $a = hash('sha512', random_string('alnum', 100));
        $data_pass = array(
            'username' => $username,
            'salt' => $a,
            'hash' => hash('sha512', $username . $a . $password)
        );
        return $data_pass;
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
        $this->load->view('BackEnd/v_foot', $data);
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
        $this->load->view('BackEnd/v_navigasi', $data);
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
        $this->load->view('BackEnd/v_navigasi', $data);
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
        $this->load->view('BackEnd/v_navigasi', $data);
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
        $this->load->view('BackEnd/v_navigasi', $data);
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
        $this->load->view('BackEnd/v_navigasi', $data);
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

    public function uang_kas() {
        if ($this->input->post("btn_pilih") || $this->input->post("btn_excel")) {
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
            
            $data["jenis_kas"] = $this->input->post("jenis");

            if ($tgl_awal && $tgl_akhir) {
                $data["periode"] = "Periode $tgl_awal S/D $tgl_akhir";
                $data["saldo_pindahan"] = $this->Backend_model->select_laporan_pindahan($tgl_awal, $tgl_akhir, $this->input->post("jenis"));
                $data["kass"] = $this->Backend_model->select_laporan_saldo($tgl_awal, $tgl_akhir, $this->input->post("jenis"));
            } else {
                $data["periode"] = "";
                $data["saldo_pindahan"] = array();
                $data["kass"] = $this->Backend_model->select_laporan_saldo(FALSE, FALSE, $this->input->post("jenis"));
            }
        } else {
            $data["saldo_pindahan"] = array();
            $data["kass"] = $this->Backend_model->select_laporan_saldo();
            $data["periode"] = "";
        }
        if ($this->input->post("btn_excel")) {
            $this->excel_kas($data, 'Laporan Kas', $this->input->post("btn_excel"));
        }

        $data["page"] = "uang_kas";
        $this->load->view('BackEnd/v_header');
        $this->load->view('BackEnd/v_navigasi', $data);
        $this->load->view('BackEnd/v_kas', $data);
        $this->load->view('BackEnd/v_foot');
    }

    function excel_kas($data, $filename, $post) {
        $this->load->library('custom_excel');
        $excel = $this->custom_excel;
        $excel->declare_excel();
        $row = 1;
        /* begin */
        $excel->add_cell($filename, "A", $row++)->font(20)->merge(array(0, 4))->alignment('center');
        $excel->add_cell("Periode :", 'A', $row)->alignment('right');
        $excel->add_cell($data['periode'] == "" ? date('F Y') : $data['periode'], 'B', $row++)->merge(array(0, 3))->alignment('left');

        $row++;
        $excel->add_cell('Tanggal', 'A', $row)->alignment('center')->border()->autoWidth()->font(16);
        $excel->add_cell('Keterangan', 'B', $row)->alignment('center')->border()->autoWidth()->font(16);
        $excel->add_cell('Kas Masuk', 'C', $row)->alignment('center')->border()->autoWidth()->font(16);
        $excel->add_cell('Kas Keluar', 'D', $row)->alignment('center')->border()->autoWidth()->font(16);
        $excel->add_cell('Saldo Akhir', 'E', $row++)->alignment('center')->border()->autoWidth()->font(16);

        $saldo = 0;
        if (count($data['saldo_pindahan']) > 0) {
            foreach ($data['saldo_pindahan'] as $saldo_kas):
                $saldo_kas->sifat == 'K' ? $saldo -= $saldo_kas->kaskeluar : $saldo += $saldo_kas->kasmasuk;
            endforeach;
        }
        $excel->add_cell("Saldo Sebelumnya", "D", $row)->border()->alignment('right');
        $excel->add_cell(($saldo < 0 ? "- Rp. " : "Rp. " ) . number_format($saldo, 0, ',', '.') . ",-", "E", $row++)->border()->alignment('right');

        foreach ($data['kass'] as $kas) :
            $excel->add_cell(strftime("%d-%m-%Y", strtotime($kas->tanggal)), "A", $row)->border();
            $excel->add_cell($kas->keterangan, "B", $row)->border();
            $excel->add_cell("Rp. " . number_format($kas->kasmasuk, 0, ",", ".") . ",-", "C", $row)->border()->alignment('right');
            $excel->add_cell("Rp. " . number_format($kas->kaskeluar, 0, ",", ".") . ",-", "D", $row)->border()->alignment('right');
            $excel->add_cell("Rp. " . number_format($kas->sifat == 'K' ? $saldo -= $kas->kaskeluar : $saldo += $kas->kasmasuk, 0, ',', '.') . ",-", "E", $row)->border()->alignment('right');
            $row++;
        endforeach;
        /* end */
        $excel->end_excel($filename, $post);
        print_r($saldo);
        exit;
        return $excel->get_filename();
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

        $data['page'] = "uang_kas";
        $this->load->view('BackEnd/v_header');
        $this->load->view('BackEnd/v_navigasi', $data);
        $this->load->view('BackEnd/v_input_kas', $data);
        $this->load->view('BackEnd/v_foot');
    }

    public function ubah_password() {
        if (!$this->session->has_userdata('administrator')) {
            redirect();
        }
        $data['alert'] = "";
        if ($this->input->post('btn_simpan')) {
            if ($this->Backend_model->cek_password()) {
                $pass = $this->generate_password($this->session->userdata('administrator'), $this->input->post('new2'), true);
                $this->Backend_model->change_password($pass);
                $data['alert'] = "success";
            } else {
                $data['alert'] = "password lama tidak cocok";
            }
        }
        $data['page'] = "change_pass";
        $this->load->view('BackEnd/v_header');
        $this->load->view('BackEnd/v_navigasi', $data);
        $this->load->view('BackEnd/v_ubah_pass', $data);
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
