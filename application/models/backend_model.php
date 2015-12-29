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
        } else {
            return $this->db->get_where('slider_home', array('IDFoto' => $IDFoto))->row();
        }
    }

    function delete_image_slider($IDFoto) {
        $this->db->delete('slider_home', array('IDFoto' => $IDFoto));
    }

    function insert_laporan_saldo_kas() {
        foreach ($this->cart->contents() as $items){
            if($items["options"]["jenis"] == 0){
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
    
    function select_laporan_saldo($awal = FALSE, $akhir = FALSE){
        $sql = "SELECT j.IDJurnal, j.keterangan, j.keterangan, j.tanggal, j.sifat, (CASE WHEN j.sifat = 'D' THEN j.nilai_jurnal ELSE 0 END) as kasmasuk, (CASE WHEN j.sifat = 'K' THEN j.nilai_jurnal ELSE 0 END) as kaskeluar
                FROM jurnal j 
                " . ($awal && $akhir ? "WHERE DATE(j.tanggal) >= '" . strftime("%Y-%m-%d", strtotime($awal)) . "' AND DATE(j.tanggal) <= '" . strftime("%Y-%m-%d", strtotime($akhir)) . "'" : "") . "
                GROUP BY j.IDJurnal ORDER BY j.tanggal ASC;";
//        echo $sql; exit;
        
        return $this->db->query($sql)->result();
    }
    
    function select_laporan_pindahan($awal = FALSE, $akhir = FALSE){
        $sql = "SELECT j.IDJurnal, j.keterangan, j.keterangan, j.tanggal, j.sifat, (CASE WHEN j.sifat = 'D' THEN j.nilai_jurnal ELSE 0 END) as kasmasuk, (CASE WHEN j.sifat = 'K' THEN j.nilai_jurnal ELSE 0 END) as kaskeluar
                FROM jurnal j 
                " . ($awal ? "WHERE DATE(j.tanggal) <= '" . strftime("%Y-%m-%d", strtotime($awal))."'" : "") . "
                GROUP BY j.IDJurnal ORDER BY j.tanggal ASC;";
//        echo $sql; exit;        
        return $this->db->query($sql)->result();
    }
}
