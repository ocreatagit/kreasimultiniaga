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

    function change_password($password) {
        $this->db->where('username', $password['username']);
        $this->db->update('admin', $password);
    }

    function insert_laporan_saldo_kas() {
        foreach ($this->cart->contents() as $items) {
            if ($items["options"]["jenis"] == 0) {
                $total += ($items["price"] + 0);
            } else {
                $total -= ($items["price"] + 0);
            }
        }

        $data = array(
            'tanggal' => date('Y-m-d'),
            'total' => $total
        );
        $this->db->insert("laporan_saldo", $data);

        return $IDLaporan = $this->db->insert_id();
    }

    function insert_detail_laporan_kas($IDLaporan, $jenis, $tanggal, $nominal, $keterangan) {
        $data = array(
            'jenis' => $jenis,
            'tanggal' => $tanggal,
            'nominal' => $nominal,
            'keterangan' => trim($keterangan),
            'IDLaporan' => $IDLaporan
        );
        $this->db->insert('detail_laporan_saldo', $data);
    }

    function insert_jurnal_saldo($noBukti, $jenis_transaksi, $tanggal_transaksi, $nilai_transaksi, $keterangan, $saldo = true) {
        $SQL = "SELECT * FROM transaksi WHERE keterangan = '$jenis_transaksi';";
        $transaksi = $this->db->query($SQL)->row();

        $data = array(
            'tanggal' => $tanggal_transaksi,
            'sifat' => $transaksi->sifat,
            'nilai_jurnal' => $nilai_transaksi,
            'keterangan' => $keterangan,
            'NoBukti' => $noBukti
        );
        $this->db->insert('jurnal', $data);
        $IDJurnal = $this->db->insert_id();

        $sql = "SELECT t.IDTransaksi, t.keterangan, a.IDAkun, a.namaAkun, ta.sifat
                FROM transaksi t
                INNER JOIN transaksi_akun ta ON ta.IDTransaksi = t.IDTransaksi
                INNER JOIN akun a ON a.IDAkun = ta.IDAkun 
                WHERE t.keterangan = '$jenis_transaksi';";
        $result = $this->db->query($sql)->result();

        foreach ($result as $trans) {
            $data = array(
                "IDJurnal" => $IDJurnal,
                "IDAkun" => $trans->IDAkun,
                "sifat" => $trans->sifat,
                "nilai" => $nilai_transaksi
            );
            $this->db->insert("jurnal_akun", $data);

            // SALDO HERE
            // SALDO END HERE
        }
    }

    function select_laporan_saldo($awal = FALSE, $akhir = FALSE, $jenis = 0) {
        $sql = "SELECT j.IDJurnal, j.keterangan, j.keterangan, j.tanggal, j.sifat, (CASE WHEN j.sifat = 'D' THEN j.nilai_jurnal ELSE 0 END) as kasmasuk, (CASE WHEN j.sifat = 'K' THEN j.nilai_jurnal ELSE 0 END) as kaskeluar
                FROM jurnal j 
                " . ($jenis == 0 ? "" : ($jenis == 1 ? "WHERE j.sifat='D'" : "WHERE j.sifat='K'")) . ($awal && $akhir ? " AND DATE(j.tanggal) >= '" . strftime("%Y-%m-%d", strtotime($awal)) . "' AND DATE(j.tanggal) <= '" . strftime("%Y-%m-%d", strtotime($akhir)) . "'" : "") . "
                GROUP BY j.IDJurnal ORDER BY j.tanggal ASC;";
//        echo $sql; exit;
        return $this->db->query($sql)->result();
    }

    function select_laporan_pindahan($awal = FALSE, $akhir = FALSE, $jenis = FALSE) {
        $sql = "SELECT j.IDJurnal, j.keterangan, j.keterangan, j.tanggal, j.sifat, (CASE WHEN j.sifat = 'D' THEN j.nilai_jurnal ELSE 0 END) as kasmasuk, (CASE WHEN j.sifat = 'K' THEN j.nilai_jurnal ELSE 0 END) as kaskeluar
                FROM jurnal j 
                " . ($jenis == 0 ? "" : ($jenis == 1 ? "WHERE j.sifat='D'" : "WHERE j.sifat='K'")) . ($awal ? "WHERE DATE(j.tanggal) <= '" . strftime("%Y-%m-%d", strtotime($awal)) . "'" : "") . "
                GROUP BY j.IDJurnal ORDER BY j.tanggal ASC;";
//        echo $sql; exit;
        return $this->db->query($sql)->result();
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

    function get_project($IDProject = FALSE, $Tipe = FALSE) {
        if ($Tipe) {
            $this->db->where("tipe", $Tipe);
        }
        if ($IDProject) {
            $this->db->where("IDProjek", $IDProject);
        }
        $res = $this->db->get('project');
        return $res->result();
    }

    function get_new_project($tipe) {
        $SQL = "SELECT * FROM project WHERE tipe = '$tipe' ORDER BY IDProjek DESC LIMIT 0, 1";
        return $this->db->query($SQL)->row();
    }

    function get_project_image($IDProject = FALSE, $IDGambar = FALSE) {
        if ($IDProject) {
            return $this->db->get_where('gambar', array('IDProject' => $IDProject))->result();
        } else {
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

    function delete_project_image($IDGambar) {
        $this->db->delete('gambar', array('IDGambar' => $IDGambar));
    }

    function delete_project($IDProject) {
        $this->db->delete('project', array('IDProjek' => $IDProject));
        $this->db->delete('gambar', array('IDProject' => $IDProject));
    }

    /* end-PROJECT */

    /* PROCESS */

    function get_process($IDProcess = FALSE) {
        $this->db->order_by("tanggal", 'ASC');
        if ($IDProcess) {
            return $this->db->get_where('process', array('IDProcess' => $IDProcess))->row();
        } else {
            return $this->db->get('process')->result();
        }
    }

    function get_last_process_month() {
        $SQL = "SELECT * FROM process  WHERE MONTH(tanggal) = " . date("m") . " ORDER BY tanggal DESC";
        return $this->db->query($SQL)->row();
    }

    function insert_process($fileName) {
        $data = array(
            'tanggal' => strftime("%Y-%m-%d", strtotime("01-" . $this->input->post("tanggal"))),
            'path' => $fileName,
            'judul' => $this->input->post('name'),
            'deskripsi' => $this->input->post('description')
        );
        $this->db->insert('process', $data);
    }

    function delete_process($IDProcess) {
        $this->db->delete('process', array('IDProcess' => $IDProcess));
    }

    function update_process($IDProcess, $fileName = FALSE) {
        $data = array(
            'tanggal' => strftime("%Y-%m-%d", strtotime("01-" . $this->input->post("tanggal"))),
            'judul' => $this->input->post('name'),
            'deskripsi' => $this->input->post('description')
        );
        if ($fileName) {
            $data['path'] = $fileName;
        }
        $this->db->where('IDProcess', $IDProcess);
        $this->db->update('process', $data);
    }

    /* end-PROCESS */

    /* About Us */

    function get_about_us() {
        return $this->db->get('about_us')->result();
    }

    function update_about_us() {
        $data = array(
            'jabatan' => $this->input->post('jabatan'),
            'phone' => $this->input->post('noHp'),
            'email' => $this->input->post('email'),
            'office' => nl2br($this->input->post('office'))
        );
        if ($this->db->get('about_us')->num_rows() > 0) {
            $this->db->update('about_us', $data);
        } else {
            $this->db->insert('about_us', $data);
        }
    }

    /* end-About Us */

    /* login */

    function cek_username() {
        $username = $this->input->post('username');
        return ($this->db->get_where('admin', array('username' => $username))->num_rows() > 0);
    }

    function cek_password() {
        $username = $this->session->userdata('administrator');
        $password = $this->input->post('password');
//        print_r($password ."".$username);exit;
        $data = $this->db->get_where('admin', array('username' => $username))->row();
        return $data->hash == hash('sha512', $username . $data->salt . $password);
    }

    /* end-login */
}
