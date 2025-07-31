<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";
use chriskacerguis\RestServer\RestController;
class Api extends RestController{
    public function __construct(){
		parent:: __construct();
		$this->load->model('User_model');
	}
    public function user_get($id=null){
        $this->db->select("*")->from('user');
		$this->db->order_by('nama','ASC');
        if($id){ //jika $id tidak null cari sesuai id
            $this->db->where('id_user',$id);
        }
		$user = $this->db->get()->result_array();
        if($user){
            $this->response([
                'status' => true,
                'pesan' => 'Data ditemukan',
                'data' => $user,
            ], 200);
        } else{
            $this->response([
                'status' => false,
                'pesan' => 'Data tidak ditemukan',
                'data' => null,
            ], 404);
        }
    }
    public function user_post(){
        $username = $this->input->post('username');
		$this->db->from('user');
		$this->db->where('username', $username);
		$cek = $this->db->get()->result_array();
		if($cek <> NULL){
            $this->response([
                'status' => false,
                'pesan' => 'Username sudah digunakan',
            ], 404);
		}else{
			$this->User_model->simpan();
            $this->response([
                'status' => true,
                'pesan' => 'Berhasil disimpan',
            ], 200);
		}
    }
    public function user_put() {
        $this->db->from('user')->where('id_user',$this->put('id_user'));
        $cek = $this->db->get()->result_array();
        if($cek){
            $data = array(
                'nama' => $this->put('nama'),
                'level' => $this->put('level')
            );
            $where = array(
                'id_user' => $this->put('id_user')
            );
            $this->db->update('user',$data, $where);
            $this->response([
                'status' => true,
                'pesan' => 'Berhasil diupdate'
            ],200);
        } else{
            $this->response([
                'status' => false,
                'pesan' => 'Id user tidak ditemukan'
            ],404);
        }
        // $id_user = $this->put('id_user');
        // $data = [
        //     'nama'     => $this->put('nama'),
        //     'username' => $this->put('username'),
        // ];
        // $this->db->where('id_user', $id_user);
        // $update = $this->db->update('user', $data);
        // if ($update) {
        //     $updated_data = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
        //     $this->response([
        //         'status' => true,
        //         'pesan'  => 'data berhasil diupdate',
        //         'data'   => $updated_data 
        //     ], 200);
        // } else {
        //     $this->response([
        //         'status' => false,
        //         'pesan'  => 'data gagal diupdate',
        //     ], 400);
        // }
    }

    public function user_delete() {
        $id_user = $this->delete('id_user');
        $this->db->where('id_user', $id_user);
        $delete = $this->db->delete('user');
        if ($delete) {
            $this->response([
                'status' => true,
                'pesan'  => 'data berhasil dihapus',
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'pesan'  => 'data gagal dihapus',
            ], 400);
        }
    }

    public function login_post() {
    //     // Ambil data dari input POST
    //     $username = $this->post('username');
    //     $password = md5($this->post('password'));
    
    //     // Validasi input sederhana
    //     if (!$username || !$password) {
    //         $this->response([
    //             'status' => false,
    //             'message' => 'Username dan password harus diisi'
    //         ],400);
    //         return;
    //     }
    
    //     // Query langsung ke database
    //     $this->db->where('username', $username);
    //     $this->db->where('password', $password); // password sudah di-md5
    //     $query = $this->db->get('user'); // pastikan nama tabel sesuai
    
    //     if ($query->num_rows() == 1) {
    //         $user = $query->row();
    //         $this->response([
    //             'status' => true,
    //             'message' => 'Login berhasil',
    //             'data' => [
    //                 'username' => $user->username
    //                 // tambahkan data lain jika perlu
    //             ]
    //         ], 200);
    //     } else {
    //         $this->response([
    //             'status' => false,
    //             'message' => 'Username atau password salah'
    //         ], 401);
    //     }
        $username = $this->post('username');
        $password = md5($this->post('password'));
        $this->db->from('user')->where('username',$username);
        $user = $this->db->get()->row();
        if($user){
            if($user->password==$password){
                $this->response([
                    'status' => true,
                    'pesan'  => 'Berhasil login',
                    'data'   => $user
                ], 200);
            } else{
                $this->response([
                    'status' => false,
                    'pesan'  => 'Password salah',
                ], 400);
            }
        } else{
            $this->response([
                'status' => false,
                'pesan'  => 'Username tidak ada',
            ], 400);
        }
    }
}