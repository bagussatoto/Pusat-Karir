<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Admin extends CI_Model {

	function cek_user($username,$password){
		$query = $this->db->get_where('tbl_admin', array(
       		'username' => $username,
       		'password' => $password
		));
		return $query->row();
	}
	function cek_session()
	{
		$userLogin = $this->session->userdata('user_ad');
		if (empty($userLogin)) {
			redirect(site_url('admin/login'));
		}
	}

	public function get($id=null)
    {
        if ($id==null)
        {
            return $this->db->get('tbl_admin')->result();
        }else{
            return $this->db->where('id_user_a',$id)->get('tbl_admin')->row_object();
        }
    }

    public function save($data)
    {
        return $this->db->insert('tbl_admin',$data);
    }

    public function update($id,$data)
    {
        return $this->db->where('id_user_a',$id)->update('tbl_admin',$data);
    }

    public function delete($id)
    {
        return $this->db->where('id_user_a',$id)->delete('tbl_admin');
    }

}
