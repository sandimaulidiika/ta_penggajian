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
        $this->db->join('jabatan', 'pegawai.id_jabatan = jabatan.id_jabatan');
        $this->db->join('divisi', 'pegawai.id_divisi = divisi.id_divisi');
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
        $this->db->join('pegawai', 'pegawai.id_user = user.id_user');
        $this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');
        $this->db->where('user.username', $username);
        return $this->db->get();
    }

    public function joinPegawaiJabatan($bulanTahun)
    {
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('pegawai', 'pegawai.nip = absensi.nip_pegawai');
        $this->db->join('jabatan', 'jabatan.id_jabatan = absensi.id_jabatan');
        $this->db->where('absensi.bulan', $bulanTahun);

        return $this->db->get()->result_array();
    }

    public function InputjoinPegawaiJabatan($bulanTahun)
    {
        return $this->db->query("
			SELECT pegawai.*, jabatan.nama_jabatan FROM pegawai 
			INNER JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan 
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
        $this->db->select('pegawai.nip, pegawai.nama, pegawai.jk_pegawai, jabatan.nama_jabatan, jabatan.gaji_pokok, jabatan.tunjangan, absensi.mangkir');
        $this->db->from('pegawai');
        $this->db->join('absensi', 'absensi.nip_pegawai = pegawai.nip');
        $this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');
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

    public function getPotongan($nip)
    {
        $this->db->select_sum('mangkir');
        $this->db->from('absensi');
        $this->db->where('nip_pegawai', $nip);
        return $this->db->get()->row_array()['mangkir'];
    }

    public function getTotalLemburByNIP($nip)
    {
        $this->db->select('SUM(lama_lembur * jabatan.lembur) AS total_lembur');
        $this->db->from('lembur');
        $this->db->join('jabatan', 'jabatan.id_jabatan = (SELECT id_jabatan FROM pegawai WHERE nip = lembur.nip_pegawai)');
        $this->db->where('lembur.nip_pegawai', $nip);

        $query = $this->db->get();
        return $query->row_array()['total_lembur'];
    }

    public function getTotalGaji($nip)
    {
        $this->db->select('jabatan.gaji_pokok, jabatan.tunjangan');
        $this->db->from('absensi');
        $this->db->join('pegawai', 'absensi.nip_pegawai = pegawai.nip');
        $this->db->join('jabatan', 'pegawai.id_jabatan = jabatan.id_jabatan');
        $this->db->where('absensi.nip_pegawai', $nip);

        $query = $this->db->get();
        return $query->row_array();
    }
}
