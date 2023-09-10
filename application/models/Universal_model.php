<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Universal_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getPegawai()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('jabatan', 'pegawai.kode_jab = jabatan.kode_jab');
        $this->db->join('divisi', 'pegawai.id_divisi = divisi.id_divisi');
        $this->db->order_by('pegawai.id_divisi', 'DESC'); // Mengurutkan berdasarkan nama pegawai (abjad)
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_pegawai($keyword)
    {
        // Query untuk mengambil data pegawai berdasarkan keyword
        $this->db->select('nama, nip');
        $this->db->like('nama', $keyword);
        $query = $this->db->get('pegawai');

        return $query->result();
    }

    // jabatan
    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        $result = $this->db->get($table)->row_array();

        return isset($result[$field]) ? $result[$field] : null;
    }

    public function generateKodeJabatan()
    {
        $kode_terakhir = $this->getMax('jabatan', 'kode_jab');

        if ($kode_terakhir !== null) {
            $kode_tambah = intval(substr($kode_terakhir, -2)) + 1;
        } else {
            $kode_tambah = 1;
        }

        $number = str_pad($kode_tambah, 2, '0', STR_PAD_LEFT);
        return 'JA' . $number;
    }

    public function getPinjaman()
    {
        $this->db->select('*');
        $this->db->from('pinjaman');
        $this->db->join('pegawai', 'pinjaman.nip_pegawai = pegawai.nip');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getUserPegawai($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('pegawai', 'pegawai.nip = user.username');
        $this->db->join('jabatan', 'jabatan.kode_jab = pegawai.kode_jab');
        $this->db->join('divisi', 'pegawai.id_divisi = divisi.id_divisi');
        $this->db->where('user.username', $username);
        return $this->db->get();
    }

    public function joinPegawaiJabatan($bulanTahun)
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('pegawai', 'pegawai.nip = absensi.nip_pegawai');
        $this->db->join('jabatan', 'jabatan.kode_jab = absensi.kode_jab');
        $this->db->where('absensi.bulan', $bulanTahun);

        return $this->db->get()->result_array();
    }

    public function InputjoinPegawaiJabatan($bulanTahun)
    {
        return $this->db->query("
			SELECT pegawai.*, jabatan.nama_jabatan FROM pegawai 
			INNER JOIN jabatan ON pegawai.kode_jab = jabatan.kode_jab 
			WHERE NOT EXISTS (SELECT * FROM absensi 
			WHERE bulan = '$bulanTahun' AND pegawai.nip = absensi.nip_pegawai)")->result_array();
    }

    public function tambah_batch($data)
    {
        $jumlahData = count($data);
        if ($jumlahData > 0) {
            $this->db->insert_batch('absensi', $data);
        }
    }

    // ********************* pinjaman *********************
    public function updateGajiBulanan()
    {
        // Ambil semua pinjaman yang belum lunas
        $this->db->where('sisa_pinjaman >', 0);
        $pinjaman = $this->db->get('pinjaman')->result_array();

        // Loop melalui pinjaman dan kurangi sisa bulan pinjaman
        foreach ($pinjaman as $pinjaman_item) {
            // Update sisa bulan pinjaman
            $new_sisa = max($pinjaman_item['sisa_pinjaman'] - 1, 0);

            $this->db->where('id_pinjaman', $pinjaman_item['id_pinjaman']);
            $this->db->update('pinjaman', array('sisa_pinjaman' => $new_sisa));
        }
    }

    public function updateTanggalKlikGaji($username)
    {
        $data = array(
            'tanggal_klik_gaji' => date('Y-m-d')
        );

        $this->db->where('username', $username);
        $this->db->update('user', $data);
    }

    public function getTanggalKlikGaji($username)
    {
        $this->db->select('tanggal_klik_gaji');
        $this->db->from('user');
        $this->db->where('username', $username);

        $query = $this->db->get();
        return $query->row_array()['tanggal_klik_gaji'];
    }

    // ********************* lembur *********************
    public function getLembur()
    {
        $this->db->select('*');
        $this->db->from('lembur');
        $this->db->join('pegawai', 'lembur.nip_pegawai = pegawai.nip');
        $query = $this->db->get();

        return $query->result_array();
    }

    // **************** GAJI PEGAWAI *********************

    public function joinJabatanPGajiPegawai($bulanTahun)
    {
        $this->db->from('pegawai');
        $this->db->join('absensi', 'absensi.nip_pegawai = pegawai.nip');
        $this->db->join('jabatan', 'jabatan.kode_jab = absensi.kode_jab');
        $this->db->where('absensi.bulan', $bulanTahun);
        $this->db->order_by('pegawai.nama', 'asc');
        return $this->db->get()->result_array();
    }

    public function getPinjamann($nip)
    {
        $this->db->select_sum('cicilan');
        $this->db->from('pinjaman');
        $this->db->where('nip_pegawai', $nip);
        $this->db->where('sisa_pinjaman >', 0);
        return $this->db->get()->row_array()['cicilan'];
    }

    public function getMangkir($nip)
    {
        $this->db->select_sum('mangkir');
        $this->db->from('absensi');
        $this->db->where('nip_pegawai', $nip);
        return $this->db->get()->row_array()['mangkir'];
    }

    public function getTotalLemburByNIP($nip, $bulan, $tahun)
    {
        $this->db->select('SUM(lembur.lama_lembur * jabatan.lembur) AS total_lembur');
        $this->db->from('lembur');
        $this->db->join('jabatan', 'jabatan.kode_jab = (SELECT kode_jab FROM pegawai WHERE nip = lembur.nip_pegawai)');
        $this->db->where('lembur.nip_pegawai', $nip);
        $this->db->where('MONTH(lembur.tgl_lembur)', $bulan);
        $this->db->where('YEAR(lembur.tgl_lembur)', $tahun);

        $query = $this->db->get();
        return $query->row_array()['total_lembur'];
    }

    public function getTotalGaji($nip)
    {
        $this->db->select('jabatan.gaji_pokok, jabatan.tunjangan');
        $this->db->from('absensi');
        $this->db->join('pegawai', 'absensi.nip_pegawai = pegawai.nip');
        $this->db->join('jabatan', 'pegawai.kode_jab = jabatan.kode_jab');
        $this->db->where('absensi.nip_pegawai', $nip);

        $query = $this->db->get();
        return $query->row_array();
    }

    // **************** GAJI USER PEGAWAI *********************

    public function userGajiPegawai($bulanTahun)
    {
        $nipOrUsername = $this->session->level == 'pegawai' ?
            $this->session->username :
            $this->session->UserID;

        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('absensi', 'absensi.nip_pegawai = pegawai.nip');
        $this->db->join('jabatan', 'jabatan.kode_jab = pegawai.kode_jab');
        $this->db->where('absensi.bulan', $bulanTahun);

        // Tambahkan kondisi untuk memfilter data berdasarkan NIP atau username
        if ($this->session->level == 'pegawai') {
            $this->db->where('pegawai.nip', $nipOrUsername);
        } else {
            $this->db->where('user.username', $nipOrUsername);
        }

        return $this->db->get()->result_array();
    }

    public function pinjamanUser($nip)
    {
        $this->db->select_sum('cicilan');
        $this->db->from('pinjaman');
        $this->db->where('nip_pegawai', $nip);
        $this->db->where('sisa_pinjaman >', 0);
        return $this->db->get()->row_array()['cicilan'];
    }

    public function userMangkir($nip)
    {
        $this->db->select_sum('mangkir');
        $this->db->from('absensi');
        $this->db->where('nip_pegawai', $nip);
        return $this->db->get()->row_array()['mangkir'];
    }

    public function totalLemburByNIP($nip, $bulan, $tahun)
    {
        $this->db->select('SUM(lembur.lama_lembur * jabatan.lembur) AS total_lembur');
        $this->db->from('lembur');
        $this->db->join('jabatan', 'jabatan.kode_jab = (SELECT kode_jab FROM pegawai WHERE nip = lembur.nip_pegawai)');
        $this->db->where('lembur.nip_pegawai', $nip);
        $this->db->where('MONTH(lembur.tgl_lembur)', $bulan);
        $this->db->where('YEAR(lembur.tgl_lembur)', $tahun);

        $query = $this->db->get();
        return $query->row_array()['total_lembur'];
    }

    public function userTotalGaji($nip)
    {
        $this->db->select('jabatan.gaji_pokok, jabatan.tunjangan');
        $this->db->from('absensi');
        $this->db->join('pegawai', 'absensi.nip_pegawai = pegawai.nip');
        $this->db->join('jabatan', 'pegawai.kode_jab = jabatan.kode_jab');
        $this->db->where('absensi.nip_pegawai', $nip);

        $query = $this->db->get();
        return $query->row_array();
    }

    // cetak slip gaji
    public function cetak_slip($bulanTahun)
    {
        $this->db->from('pegawai');
        $this->db->join('absensi', 'absensi.nip_pegawai = pegawai.nip');
        $this->db->join('jabatan', 'jabatan.kode_jab = pegawai.kode_jab');
        $this->db->where('absensi.bulan', $bulanTahun);
        $this->db->order_by('pegawai.nama', 'asc');
        return $this->db->get()->result_array();
    }

    public function getPotonganByTitle($title)
    {
        $this->db->where('potongan', $title);
        return $this->db->get('potongan')->result_array();
    }

    // cetak slip gaji user
    public function cetak_slip_user($bulanTahun)
    {
        $nipOrUsername = $this->session->level == 'pegawai' ?
            $this->session->username :
            $this->session->UserID;

        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('absensi', 'absensi.nip_pegawai = pegawai.nip');
        $this->db->join('jabatan', 'jabatan.kode_jab = pegawai.kode_jab');
        $this->db->where('absensi.bulan', $bulanTahun);

        // Tambahkan kondisi untuk memfilter data berdasarkan NIP atau username
        if ($this->session->level == 'pegawai') {
            $this->db->where('pegawai.nip', $nipOrUsername);
        } else {
            $this->db->where('user.username', $nipOrUsername);
        }

        return $this->db->get()->result_array();
    }
}
