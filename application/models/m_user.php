<?php

class M_user extends CI_Model
{

    // pegawai get all
    public function get_all_pegawai()
    {
        $hasil = $this->db->query('SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail 
        JOIN jenis_kelamin ON user_detail.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin 
        WHERE id_user_level = 1 ORDER BY user.username ASC');
        return $hasil;
    }

    // pegawai count all
    public function count_all_pegawai()
    {
        $hasil = $this->db->query('SELECT COUNT(id_user) as total_user FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail 
        JOIN jenis_kelamin ON user_detail.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin 
        WHERE id_user_level = 1');
        return $hasil;
    }

    // admin get_all
    public function get_all_admin()
    {
        $hasil = $this->db->query('SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail 
        JOIN jenis_kelamin ON user_detail.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin 
        
        WHERE id_user_level = 2 ORDER BY user.username ASC');
        return $hasil;
    }

    // admin count_all
    public function count_all_admin()
    {
        $hasil = $this->db->query('SELECT COUNT(id_user) as total_user FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail 
        JOIN jenis_kelamin ON user_detail.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin 
        WHERE id_user_level = 2');
        return $hasil;
    }

    // super_admin get_all
    public function get_all_super_admin()
    {
        $hasil = $this->db->query('SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail 
        JOIN jenis_kelamin ON user_detail.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin 
        WHERE id_user_level = 3');
        return $hasil;
    }

    // super_admin count_all
    public function count_all_super_admin()
    {
        $hasil = $this->db->query('SELECT COUNT(id_user) as total_user FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail 
        JOIN jenis_kelamin ON user_detail.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin 
        WHERE id_user_level = 3');
        return $hasil;
    }

    public function get_super_admin_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail 
        WHERE user.id_user='$id_user'");
        return $hasil;
    }

    public function get_admin_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail 
        WHERE user.id_user='$id_user'");
        return $hasil;
    }

    public function get_pegawai_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail 
        WHERE user.id_user='$id_user'");
        return $hasil;
    }

    public function cek_login($username)
    {

        $hasil = $this->db->query("SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE username='$username'");
        return $hasil;
    }

    // Super_admin Tambah Admin
    public function pendaftaran_user($id, $username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat)
    {
        $this->db->trans_start();

        $this->db->query("INSERT INTO user(id_user,username,password,email,id_user_level, id_user_detail) VALUES ('$id','$username','$password','$email','$id_user_level','$id')");
        $this->db->query("INSERT INTO user_detail(id_user_detail, nama_lengkap, id_jenis_kelamin, no_telp, alamat) VALUES ('$id','$nama_lengkap','$id_jenis_kelamin','$no_telp','$alamat')");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function check_user_exists($email, $no_telp)
    {
        // Cek di tabel user untuk email
        $this->db->from('user');
        $this->db->where('email', $email);
        $query1 = $this->db->get();
    
        // Cek di tabel user_detail untuk no_telp
        $this->db->from('user_detail');
        $this->db->where('no_telp', $no_telp);
        $query2 = $this->db->get();
    
        // Jika email atau no_telp sudah ada, kembalikan true
        if ($query1->num_rows() > 0) {
            return 'Email sudah terdaftar'; 
        } elseif ($query2->num_rows() > 0) {
            return 'Nomor telepon sudah terdaftar'; 
        } else {
            return false; // Data belum ada
        }
    }
    


    public function update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat, $nip, $pangkat, $jabatan)
    {
        $this->db->trans_start();


        $this->db->query("UPDATE user_detail SET nama_lengkap='$nama_lengkap', id_jenis_kelamin='$id_jenis_kelamin' ,no_telp='$no_telp', alamat='$alamat', nip='$nip', pangkat='$pangkat', jabatan='$jabatan' WHERE id_user_detail='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    //Tambah Pegawai
    public function insert_pegawai($id, $username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat)
    {
        $this->db->trans_start();

        $this->db->query("INSERT INTO user(id_user,username,password,email,id_user_level, id_user_detail) VALUES ('$id','$username','$password','$email','$id_user_level','$id')");
        $this->db->query("INSERT INTO user_detail(id_user_detail, nama_lengkap, id_jenis_kelamin, no_telp, alamat) VALUES ('$id','$nama_lengkap','$id_jenis_kelamin','$no_telp','$alamat')");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }


    // cek data pegawai
    public function check_existing_data($email, $no_telp)
    {
        // Cek di tabel user untuk email
        $this->db->from('user');
        $this->db->where('email', $email);
        $query1 = $this->db->get();

        // Cek di tabel user_detail untuk no_telp
        $this->db->from('user_detail');
        $this->db->where('no_telp', $no_telp);
        $query2 = $this->db->get();

        // Jika ada salah satu yang ditemukan
        if ($query1->num_rows() > 0 || $query2->num_rows() > 0) {
            return true; // Data sudah ada
        } else {
            return false; // Data belum ada
        }
    }


    public function update_pegawai($id, $username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat)
    {
        $this->db->trans_start();

        $this->db->query("UPDATE user SET username='$username', password='$password', email='$email', id_user_level='$id_user_level' WHERE id_user='$id'");
        $this->db->query("UPDATE user_detail SET nama_lengkap='$nama_lengkap', id_jenis_kelamin='$id_jenis_kelamin' ,no_telp='$no_telp', alamat='$alamat' WHERE id_user_detail='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }
    
    public function update_user($id, $username, $password, $email)
    {
        $this->db->trans_start();

        $this->db->query("UPDATE user SET username='$username', password='$password', email='$email' WHERE id_user='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function delete_pegawai($id)
    {
        $this->db->trans_start();

        $this->db->query("DELETE FROM user WHERE id_user='$id'");
        $this->db->query("DELETE FROM user_detail WHERE id_user_detail='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function delete_admin($id)
    {
        $this->db->trans_start();

        $this->db->query("DELETE FROM user WHERE id_user='$id'");
        $this->db->query("DELETE FROM user_detail WHERE id_user_detail='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }
}